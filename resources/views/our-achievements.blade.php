{{--
  Template Name: Our achievements
--}}

@extends('layouts.app')

@section('content')
  <div class="container container-custom-max-width">
    @include('components.page-heading', ['heading' => 'Nasze osiągnięcia', 'smaller' => true])
    <div class="our-achievements-search">
      <label for="searchInput" style="display: none"></label>
      <input type="text" id="searchInput" class="form-control our-achievements-search-input"
             placeholder="Znajdź osiągnięcie..." data-aos="zoom-out-left"/>
      <div class="our-achievements-search-buttons mt-3" data-aos="zoom-out-right">
        @foreach(get_field('buttons') as $button)
          <button class="filtering-button our-achievements-search-buttons-button mr-2"
                  value="{{ $button['text'] }}">{{ $button['text'] }}</button>
        @endforeach
      </div>
    </div>
    <div class="our-achievements-container" id="achievementsContainer">
      <div class="row">
        @foreach(get_field('achievements') as $achievement)
          <div class="col-12 col-lg-6 col-xxl-4" data-aos="fade-up"
               data-aos-anchor-placement="bottom-bottom" data-toggle="modal"
               data-target="#achievementModal-{{ $loop->index }}">
            <div class="our-achievements-container-item {{ $achievement['choice'] }}">
              <div class="our-achievements-container-item-position">
                @switch($achievement['position'])
                  @case('1')
                  @case('I')
                    <div class="gold">{{ $achievement['position'] }}</div>
                    @break

                  @case('2')
                  @case('II')
                    <div class="silver">{{ $achievement['position'] }}</div>
                    @break

                  @case('3')
                  @case('III')
                    <div class="bronze">{{ $achievement['position'] }}</div>
                    @break

                  @default
                    <div class="other">{{ $achievement['position'] }}</div>
                    @break
                @endswitch
              </div>
              <div class="our-achievements-container-item-info p-3">
                <h3 id="achievement-achievement">{{ $achievement['achievement'] }}</h3>
                <p id="achievement-place">{{ $achievement['place'] }}</p>
                <p id="achievement-date">{{ $achievement['date'] }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  @foreach(get_field('achievements') as $achievement)
    <!-- Modal -->
    <div class="modal fade" id="achievementModal-{{ $loop->index }}" tabindex="-1"
         aria-labelledby="achievementModalLabel-{{ $loop->index }}" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content achievement-modal">
          <button type="button" data-dismiss="modal" style="border: 0; padding: 0">
            <img class="achievement-modal-close" src="@asset('images/icons/modal-close.svg')" alt="">
          </button>
          @if($achievement['image'])
            <div class="achievement-modal-image">
              <img src="{{ $achievement['image']['url'] }}" alt="">
            </div>
          @endif
          <div class="achievement-modal-content">
            <div class="achievement-modal-content-name">
              <div class="achievement-modal-content-name-event">{{ $achievement['achievement'] }}</div>
              <div class="achievement-modal-content-name-position">
                @switch($achievement['position'])
                  @case('1')
                  @case('I')
                    <div class="gold">{{ $achievement['position'] }}</div>
                    @break

                  @case('2')
                  @case('II')
                    <div class="silver">{{ $achievement['position'] }}</div>
                    @break

                  @case('3')
                  @case('III')
                    <div class="bronze">{{ $achievement['position'] }}</div>
                    @break

                  @default
                    <div class="other">{{ $achievement['position'] }}</div>
                    @break
                @endswitch
              </div>
            </div>
            <div class="achievement-modal-content-description">
              <div class="description">{!! $achievement['description'] !!}</div>
              @if($achievement['place'] || $achievement['date'])
                @if($achievement['place'] && $achievement['date'])
                  <p class="place-and-date">{{ $achievement['place'] }}, {{ $achievement['date'] }}</p>
                @elseif($achievement['place'])
                  <p class="place-and-date">{{ $achievement['place'] }}</p>
                @elseif($achievement['date'])
                  <p class="place-and-date">{{ $achievement['date'] }}</p>
                @endif
              @endif
              @if($achievement['link'])
                <a href="{{ $achievement['link'] }}" class="btn yellow-black-button mt-2 mb-4"
                   target="_blank">
                  Czytaj więcej
                </a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->
  @endforeach
@endsection
