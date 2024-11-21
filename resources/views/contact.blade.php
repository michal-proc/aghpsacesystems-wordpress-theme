{{--
  Template Name: Contact
--}}

@extends('layouts.app')

@section('content')
  <div class="position-relative">
    <div class="container container-custom-max-width">
      @include('components.page-heading', ['heading' => 'Kontakt', 'smaller' => true])
      <section class="contact-form-section">
        <div class="container">

          {!! get_field('contact_form') !!}

          <form class="contact-form" id="contactFormNotToSend">
            <div class="form-floating" data-aos="fade-right" data-aos-duration="800">
              <input type="text" class="form-control" id="contactFormNotToSendName" placeholder=" "
                     name="name"
                     required>
              <label for="contactFormNotToSendName">Imię</label>
            </div>
            <div class="form-floating" data-aos="fade-right" data-aos-duration="1000">
              <input type="text" class="form-control" id="contactFormNotToSendCompany" placeholder=" "
                     name="company">
              <label for="contactFormNotToSendCompany">Nazwa organizacji (opcjonalne)</label>
            </div>
            <div class="form-floating" data-aos="fade-right" data-aos-duration="1200">
              <input type="email" class="form-control" id="contactFormNotToSendEmail" placeholder=" "
                     name="email"
                     required>
              <label for="contactFormNotToSendEmail">Adres e-mail</label>
            </div>
            <div class="form-floating" data-aos="fade-right" data-aos-duration="1400">
              <textarea class="form-control" id="contactFormNotToSendMessage" placeholder=" "
                        name="message" required></textarea>
              <label for="contactFormNotToSendMessage">Twoja wiadomość</label>
            </div>
            <div data-aos="fade-right" data-aos-duration="1600">
              <button class="yellow-transparent-button" type="submit">Wyślij</button>
            </div>
          </form>
        </div>
        <div class="container container-custom-max-width contact-icons mt-4">
          <div data-aos="fade-right" data-aos-duration="1800">
            <p>Napisz do nas tutaj lub na<br/> naszych social media!</p>
            <a class="mr-3" href="{{ get_field('social_media_facebook', 'option') }}" target="_blank">
              <img src="@asset('images/icons/facebook.svg')" alt="Facebook">
            </a>
            <a class="mr-3" href="{{ get_field('social_media_instagram', 'option') }}" target="_blank">
              <img src="@asset('images/icons/instagram.svg')" alt="Instagram">
            </a>
            <a class="mr-3" href="{{ get_field('social_media_linkedin', 'option') }}" target="_blank">
              <img src="@asset('images/icons/linkedin.svg')" alt="LinkedIn">
            </a>
            <a class="mr-3" href="{{ get_field('social_media_x', 'option') }}" target="_blank">
              <img src="@asset('images/icons/x-twitter.svg')" alt="X (Twitter)">
            </a>
          </div>
          <div data-aos="fade-right" data-aos-duration="2000">
            <p class="mt-4">Możesz także napisać na nasz adres e-mail:</p>
            <a href="mailto:spacesystems@agh.edu.pl" class="email-link">
              <img src="@asset('images/icons/email.svg')" alt="E-mail"> spacesystems@agh.edu.pl
            </a>
          </div>
        </div>
      </section>
    </div>
    <img class="contact-map-image" src="{{ get_field('contact_map')['url'] }}" alt=""/>
  </div>
@endsection
