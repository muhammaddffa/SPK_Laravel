<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Alternatif;
use App\Models\Kriteria;

class CalculateController extends Controller
{
    public function topsis()
    {
        $criteria = Kriteria::all();
        $alternatives = Alternatif::all();
        
        if (count($criteria) == 0 || count($alternatives) == 0) {
            return view('modal.calculationModal.noCalculationModal');
        }
    
        $decisionMatrix = $this->getDecisionMatrix($alternatives);
        $normMatrix = $this->norm($decisionMatrix);
        $weightedNorm = $this->getWeightedNorm($normMatrix, $criteria);
        $idealPositive = $this->getIdealPositive($weightedNorm, $criteria);
        $idealNegative = $this->getIdealNegative($weightedNorm, $criteria);
        $solutionPositive = $this->getSolutionPositive($weightedNorm, $idealPositive);
        $solutionNegative = $this->getSolutionNegative($weightedNorm, $idealNegative);
        $preferenceValue = $this->getPreferenceValue($solutionPositive, $solutionNegative);
    
        return view('perhitungan.calculate', compact(
            'decisionMatrix', 
            'normMatrix', 
            'weightedNorm', 
            'idealPositive', 
            'idealNegative', 
            'solutionPositive', 
            'solutionNegative', 
            'preferenceValue', 
            'criteria', 
            'alternatives'
        ));
    }
    
    public function getDecisionMatrix($alternatives)
    {
        $matrix = [];
        foreach ($alternatives as $alternative) {
            $penilaians = Penilaian::where('alternatif_id', $alternative->id)
                ->orderBy('kriteria_id', 'asc')
                ->get();
    
            $temp = [];
            foreach ($penilaians as $penilaian) {
                array_push($temp, $penilaian->nilai);
            }
            array_push($matrix, $temp);
        }
    
        return $matrix;
    }
    
    public function norm($decisionMatrix)
    {
        $divider = $this->getNormDivider($decisionMatrix);
        $result = [];
    
        for ($i = 0; $i < count($decisionMatrix); $i++) {
            $temp = [];
            for ($j = 0; $j < count($decisionMatrix[$i]); $j++) {
                if ($divider[$j] != 0) {
                    array_push($temp, $decisionMatrix[$i][$j] / $divider[$j]);
                } else {
                    array_push($temp, 0);
                }
            }
            array_push($result, $temp);
        }
    
        return $result;
    }
    
    public function getNormDivider($decisionMatrix)
    {
        $result = [];
        for ($i = 0; $i < count($decisionMatrix[0]); $i++) {
            $column = array_column($decisionMatrix, $i);
            $temp = 0;
            foreach ($column as $value) {
                $temp = $temp + ($value ** 2);
            }
            array_push($result, sqrt($temp));
        }
    
        return $result;
    }
    
    public function getWeightedNorm($normMatrix, $criteria)
    {
        $result = [];
        for ($i = 0; $i < count($normMatrix); $i++) {
            $temp = [];
            for ($j = 0; $j < count($normMatrix[$i]); $j++) {
                $weighted = $normMatrix[$i][$j] * $criteria[$j]->weight;
                array_push($temp, $weighted);
            }
            array_push($result, $temp);
        }
    
        return $result;
    }
    
    public function getIdealPositive($weightedNorm, $criteria)
    {
        $result = [];
        for ($j = 0; $j < count($weightedNorm[0]); $j++) {
            if ($criteria[$j]->type == 'Benefit') {
                $data = collect(array_column($weightedNorm, $j))->min();
            } else {
                $data = collect(array_column($weightedNorm, $j))->max();
            }
            array_push($result, $data);
        }
    
        return $result;
    }
    
    public function getIdealNegative($weightedNorm, $criteria)
    {
        $result = [];
        for ($j = 0; $j < count($weightedNorm[0]); $j++) {
            if ($criteria[$j]->type == 'Benefit') {
                $data = collect(array_column($weightedNorm, $j))->max();
            } else {
                $data = collect(array_column($weightedNorm, $j))->min();
            }
            array_push($result, $data);
        }
    
        return $result;
    }
    
    public function getSolutionPositive($weightedNorm, $idealPositive)
    {
        $result = [];
        for ($i = 0; $i < count($weightedNorm); $i++) {
            $temp = 0;
            for ($j = 0; $j < count($idealPositive); $j++) {
                $temp = $temp + (pow($weightedNorm[$i][$j] - $idealPositive[$j], 2));
            }
            array_push($result, sqrt($temp));
        }
    
        return $result;
    }
    
    public function getSolutionNegative($weightedNorm, $idealNegative)
    {
        $result = [];
        for ($i = 0; $i < count($weightedNorm); $i++) {
            $temp = 0;
            for ($j = 0; $j < count($idealNegative); $j++) {
                $temp = $temp + (pow(($weightedNorm[$i][$j] - $idealNegative[$j]), 2));
            }
            array_push($result, sqrt($temp));
        }
    
        return $result;
    }
    
    public function getPreferenceValue($solutionPositive, $solutionNegative)
    {
        $result = [];
        for ($i = 0; $i < count($solutionPositive); $i++) {
            $temp = ($solutionNegative[$i] / ($solutionPositive[$i] + $solutionNegative[$i]));
            $temp = number_format($temp, 4);
            array_push($result, $temp);
        }
    
        return $result;
    }
}
