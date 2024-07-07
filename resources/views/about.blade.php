@extends('navbar')

@section('title', 'Dashboard - Laravel Admin Panel With Login and Registration')

@section('content')
<section class="dark:bg-gray-900 py-12">
    <div class="container mx-auto px-6 lg:px-8 py-12">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">About Us</h2>
            <p class="mt-4 text-lg leading-6 text-white">
                We are a team of passionate individuals dedicated to delivering the best services to our customers.
            </p>
        </div>

        <div class="mt-10 flex flex-wrap justify-center">
            <div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden m-4 hover">
                <img class="w-full h-56 object-cover object-center hover-zoom"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIf2W5L2yBQZ3S-mhC8cdAn4gm9BMkS7aNETDTtstAuFVLpX7tvJ8XfH-d7H_5emICBtI&usqp=CAU"
                    alt=""
                    style="transition: transform 0.5s ease;">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Hospital Mitra Keluarga</h3>
                    <p class="mt-4 text-gray-600">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste quo
                        veritatis dolores modi sunt nisi! Dolores veniam, recusandae fugit pariatur adipisci neque
                        voluptates minima, quaerat eos vitae cum vel velit!</p>
                </div>
            </div>

            <div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden m-4">
                <img class="w-full h-56 object-cover object-center hover-zoom"
                    src="https://static.gatra.com/foldershared/images/2021/farid/06-Jun/IMG_62011.jpg" alt=""
                    style="transition: transform 0.5s ease;">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Hospital Kardinah</h3>
                    <p class="mt-4 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati
                        velit minus ullam sed fugiat commodi voluptatibus repellendus optio sit temporibus possimus
                        repellat sapiente maiores molestiae, totam nihil quidem, consequatur aperiam?</p>
                </div>
            </div>

            <div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden m-4">
                <img class="w-full h-56 object-cover object-center hover-zoom"
                    src="https://globalrancangselaras.com/images/169094387946.jpg" alt=""
                    style="transition: transform 0.5s ease;">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Hospital Islam Harapan Anda</h3>
                    <p class="mt-4 text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum
                        temporibus magnam culpa soluta, asperiores eligendi adipisci iusto sequi nobis eveniet sapiente
                        obcaecati? Adipisci quod dolorum dolores impedit fugit libero. Rem.</p>
                </div>
            </div>

            <div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden m-4">
                <img class="w-full h-56 object-cover object-center hover-zoom"
                    src="https://rsudsoeselo.tegalkab.go.id/wp-content/uploads/2021/04/WhatsApp-Image-2021-04-28-at-12.55.59.jpeg"
                    alt=""
                    style="transition: transform 0.5s ease;">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Hopital Susilo</h3>
                    <p class="mt-4 text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum
                        temporibus magnam culpa soluta, asperiores eligendi adipisci iusto sequi nobis eveniet sapiente
                        obcaecati? Adipisci quod dolorum dolores impedit fugit libero. Rem.</p>
                </div>
            </div>

            <div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden m-4">
                <img class="w-full h-56 object-cover object-center hover-zoom" src="data:image/jpeg;base64,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" alt=""
                    style="transition: transform 0.5s ease;">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Hospita Mitra Siaga</h3>
                    <p class="mt-4 text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum
                        temporibus magnam culpa soluta, asperiores eligendi adipisci iusto sequi nobis eveniet sapiente
                        obcaecati? Adipisci quod dolorum dolores impedit fugit libero. Rem.</p>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    // Menambahkan efek hover zoom pada semua gambar dengan class "hover-zoom"
    document.querySelectorAll('.hover-zoom').forEach(function(img) {
        img.addEventListener('mouseover', function() {
            this.style.transform = 'scale(1.2)';
        });

        img.addEventListener('mouseout', function() {
            this.style.transform = 'scale(1)';
        });
    });
</script>
@endsection
{{-- @extends('footer') --}}
