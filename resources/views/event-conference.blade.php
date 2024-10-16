{{--
  Template Name: Event - Conference
  Template Post Type: post
--}}

@extends('layouts.app')

@section('content')
  <div class="event-conference-image">
    <img src="{{ get_field('event_image')['url'] }}" alt="">
  </div>

  <div class="event-conference container container-custom-max-width">
    <div class="row">
      <div class="col-12">
        <h3 class="event-conference-title" data-aos="fade-right">{{ get_field('event_name') }}</h3>
      </div>
    </div>
    <div class="row justify-content-between d-flex flex-column flex-lg-row align-items-center">
      @if(get_field('google_map'))
        <div class="event-conference-map col-10 col-md-9 col-xl-5 align-left mr-auto" data-aos="fade-right">
          {!! get_field('google_map') !!}
        </div>
      @endif
      @if(get_field('event_info'))
        <div class="event-conference-place-and-date col-10 col-md-9 col-xl-5 align-right ml-auto" data-aos="fade-left">
          <h3>{{ get_field('event_info') }}</h3>
        </div>
      @endif
    </div>

    @foreach(get_field('event_contents') as $content)
      @if($content['image'])
        <div class="col-12 event-conference-content-image" data-aos="flip-down">
          <img src="{{ $content['image']['url'] }}" alt="">
        </div>
      @elseif($content['text'])
        {{-- USE .project-view class TO KEEP SAME STYLES --}}
        <div class="project-view d-flex flex-column flex-lg-row align-items-center" style="margin-top: 0 !important;"
             data-aos="fade-down">
          <div class="project-view-content col-12 p-3">
            <div class="project-view-content-content">{!! $content['text'] !!}</div>
          </div>
        </div>
      @endif
    @endforeach

    @if(get_field('event_links'))
      <div class="d-flex flex-column event-conference-links">
        <h3 class="col-12 mb-4" data-aos="fade-right">Powiązane strony</h3>
        <div class="row" data-aos="fade-down">
          @foreach(get_field('event_links') as $link)
            <a class="@if($loop->index % 2) yellow-transparent-button @else yellow-black-button @endif ml-5 mt-3"
               href="{{ $link['url'] }}" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                  d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"/>
              </svg>
              <span>{{ $link['text'] }}</span>
            </a>
          @endforeach
        </div>
      </div>
    @endif

    @if(get_field('event_files'))
      <div class="d-flex flex-column event-conference-links">
        <h3 class="col-12 mb-4" data-aos="fade-right">Załączniki do pobrania</h3>
        <div class="row" data-aos="fade-down">
          @foreach(get_field('event_files') as $link)
            <a class="@if($loop->index % 2 == 0) yellow-transparent-button @else yellow-black-button @endif ml-5 mt-3"
               href="{{ $link['file']['link'] }}" download target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                  d="M208 0L332.1 0c12.7 0 24.9 5.1 33.9 14.1l67.9 67.9c9 9 14.1 21.2 14.1 33.9L448 336c0 26.5-21.5 48-48 48l-192 0c-26.5 0-48-21.5-48-48l0-288c0-26.5 21.5-48 48-48zM48 128l80 0 0 64-64 0 0 256 192 0 0-32 64 0 0 48c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 176c0-26.5 21.5-48 48-48z"/>
              </svg>
              <span>{{ $link['text'] }}</span>
            </a>
          @endforeach
        </div>
      </div>
    @endif

    @if(count(get_field('event_images')))
      <div class="d-flex flex-column justify-content-center event-conference-gallery">
        <div class="row justify-content-center">
          @foreach(get_field('event_images') as $image)
            <div class="col-6 col-md-4 col-lg-3 mb-4" data-aos="zoom-in">
              <img src="{{ $image['image']['url'] }}" alt="">
            </div>
          @endforeach
        </div>
      </div>
    @endif
  </div>
@endsection
