@extends('navbar')

@section('content')
<div class="contact" id="contact-me">
    <div class="container">
      <div class="contact-content">
        <h2>Contact Me</h2>
        <p class="mail">
          Get in touch with me <i class="fas fa-arrow-right"></i> muhammaddaffa463@gmail.com
        </p>
        <p class="links">Or find me on:</p>
        <a href="https://github.com/muhammaddffa" target="blank"><i class="fa fa-github"></i> Github</a>
        <a href="https://www.instagram.com/muhm_dffa" target="blank"><i class="fa fa-instagram"></i> Instagram</a>
      </div>
    </div>
  </div>
  <style>
html, body {
  height: 100%;
  margin: 0;
}

.contact {
  background: #07374a;
  position: relative;
  height: 100vh;
}

.contact-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.contact-content h2 {
  font-size: 2.5rem;
  font-weight: 400;
  color: #25b79f;
  padding-bottom: 0.5rem;
}

.contact-content .mail {
  color: #f0f0e6;
  padding-bottom: 0.2rem;
  font-size: 1rem;
}

.contact-content .links {
  color: #25b79f;
  padding: 0.5rem;
  padding-bottom: 1.8rem;
  font-size: 1rem;
}

.contact-content a {
  text-decoration: none;
  color: #25b79f;
  padding: 0.5rem;
  transition: 0.3s ease-in-out;
}

.contact-content a:hover {
  color: #f0f0e6;
}
  </style>
@endsection
