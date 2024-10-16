{{--
  Template Name: Join us
--}}

@extends('layouts.app')

@section('content')
  <div class="container container-custom-max-width">
    @include('components.page-heading', ['heading' => 'Dołącz do nas'])

    <div class="join-us">
      <div class="row">
        <p class="join-us-short-text" data-aos="fade-down-right">Jak wygląda rekrutacja?</p>
      </div>

      @foreach(get_field('join_us_steps') as $index => $step)
        <div class="join-us-step mb-4">
          <div class="row flex-column {{ $index % 2 == 0 ? 'align-left' : 'align-right' }}">
            <div
              class="join-us-step-title col-10 col-md-9 col-lg-7 col-xl-5 {{ $index % 2 == 0 ? 'align-left' : 'align-right' }}"
              data-aos="{{ $index % 2 == 0 ? 'zoom-in-right' : 'zoom-in-left' }}">
              <h3>{{ $step['title'] }}</h3>
            </div>
            <div class="join-us-step-text" data-aos="fade-up">
              <p>{{ $step['text'] }}</p>
            </div>
          </div>
        </div>
      @endforeach


      <div class="row join-us-row-recruitment justify-content-between">
        <div class="col-10 col-lg-5 mb-3 p-4 mr-auto" data-aos="fade-up-right">
          <p class="join-us-step-description">Poprzednia rekrutacja:</p>
          <div class="join-us-step-title align-left recruitment w-100" data-aos="zoom-in-right">
            <h4>{{ get_field('last_recruitment') }}</h4>
          </div>
        </div>
        <div class="col-10 col-lg-5 mb-3 p-4 ml-auto" data-aos="fade-up-left">
          <p class="join-us-step-description">Następna rekrutacja:</p>
          <div class="join-us-step-title align-right recruitment w-100" data-aos="zoom-in-left">
            <h4>{{ get_field('next_recruitment') }}</h4>
          </div>
        </div>
      </div>

      <div class="join-us-buttons row justify-content-center align-items-center mt-2" data-aos="zoom-in">
        @if(get_field('url_1'))
          <a href="{{ get_field('url_1') }}" class="btn yellow-black-button mx-2 mb-3 mt-3">
            Formularz rekrutacyjny</a>
        @endif
        <a href="{{ get_field('url_2') }}" class="btn yellow-transparent-button mx-2 mb-3 mt-3">
          Obserwuj po więcej
          info</a>
      </div>
    </div>
  </div>
@endsection
