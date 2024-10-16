{{--
  Template Name: Sponsors
--}}

@extends('layouts.app')

@section('content')
  <div class="sponsors-container">
    <div class="container container-custom-max-width">
      @include('components.page-heading', ['heading' => 'Nasi sponsorzy', 'smaller' => true])
    </div>
    <div class="slider-container" data-aos="zoom-in">
      <div class="slick-slider">
        @foreach(get_field('sponsors') as $sponsor)
          <div class="slick-slide">
            <a href="{{ $sponsor['url'] }}" target="_blank">
              <img src="{{ $sponsor['image']['link'] }}" alt="Sponsor logo">
            </a>
          </div>
        @endforeach
      </div>
    </div>
    <div class="sponsors-content container container-custom-max-width mb-5">
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="sponsors-content-card pt-5" data-aos="zoom-in-right">
            <h1 class="mb-2 pb-2">Zostań sponsorem</h1>
            <div class="sponsors-content-card-content">{!! get_field('sponsors_content') !!}</div>
            <a href="{{ get_field('button_url') }}"
               class="yellow-black-button mt-2 mb-4">Zostań sponsorem</a>
            <div class="d-flex">
              <a class="mr-3 sponsors-content-card-icon" href="{{ get_field('social_media_facebook', 'option') }}"
                 target="_blank">
                <img src="@asset('images/icons/facebook.svg')" alt="Facebook">
              </a>
              <a class="mr-3 sponsors-content-card-icon" href="{{ get_field('social_media_instagram', 'option') }}"
                 target="_blank">
                <img src="@asset('images/icons/instagram.svg')" alt="Instagram">
              </a>
              <a class="mr-3 sponsors-content-card-icon" href="{{ get_field('social_media_linkedin', 'option') }}"
                 target="_blank">
                <img src="@asset('images/icons/linkedin.svg')" alt="LinkedIn">
              </a>
              <a class="mr-3 sponsors-content-card-icon" href="{{ get_field('social_media_x', 'option') }}"
                 target="_blank">
                <img src="@asset('images/icons/x-twitter.svg')" alt="X (Twitter)">
              </a>
            </div>
          </div>
        </div>
        <div class="sponsors-content-pills col-12 col-lg-6 p-3">
          <h3 class="sponsors-content-pills-heading" data-aos="fade-up">Czego potrzebujemy?</h3>
          <div class="sponsors-content-pills-pills d-flex flex-wrap">
            @foreach(get_field('needs') as $need)
              <button id="pillButton{{ $loop->index }}"
                      class="pill {{ $loop->index % 2 == 1 ? 'left' : 'right additional-margin-top' }}"
                      data-aos="{{ $loop->index % 2 == 1 ? 'fade-up' : 'fade-down' }}">{{ $need['text'] }}
              </button>
              <script>
                document.addEventListener('DOMContentLoaded', function () {
                  document.getElementById("pillButton{{ $loop->index }}").addEventListener('click', () => {
                    const descriptionElement = document.querySelector(".sponsors-content-pills-description");

                    descriptionElement.classList.remove('visible');

                    setTimeout(() => {
                      descriptionElement.innerHTML = `{!! $need['description'] !!}`;

                      const scrollToUpBtn = document.getElementById('scrollToUp');
                      const footer = document.querySelector('footer');
                      const footerRect = footer.getBoundingClientRect();
                      const windowHeight = window.innerHeight;

                      if (footerRect.top < windowHeight) {
                        scrollToUpBtn.style.bottom = `${windowHeight - footerRect.top + 25}px`;
                      } else {
                        scrollToUpBtn.style.bottom = '25px';
                      }

                      descriptionElement.classList.add('visible');
                    }, 250);
                  });
                });
              </script>
            @endforeach
          </div>
          <div class="sponsors-content-pills-description"></div>
        </div>
      </div>
    </div>
  </div>
@endsection
