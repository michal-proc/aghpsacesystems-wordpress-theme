{{--
  Template Name: About us
--}}

@extends('layouts.app')

@section('content')
  <div class="container container-custom-max-width">
    <div data-aos="fade-down">
      <div class="shadow-circle about-us-header-circle">
        <div
          class="shadow-circle-inside about-us-header-circle-inside text-center d-flex justify-content-center align-items-center">
          <h1>O nas</h1>
        </div>
      </div>
    </div>

    <div class="about-us-description text-center d-flex justify-content-center align-items-center" data-aos="fade-up">
      {!! get_field('description') !!}
    </div>
    <canvas width="900" height="900" data-aos="fade-down-left"></canvas>

    <div class="mb-5">
      @foreach(get_field('teams') as $section)
        @component('components.section-view', ['section' => $section, 'index' => $loop->index])@endcomponent
        @php
          $lastSectionIndex = $loop->index;
        @endphp
      @endforeach
      @component('components.section-view', ['index' => $lastSectionIndex + 1, 'isMarketingContent' => true])@endcomponent
    </div>
  </div>

  {{-- Need to put JavaScript here to handle ACF fields --}}
  <script>
    const canvas = document.querySelector('canvas');
    const ctx = canvas.getContext('2d');
    const peopleList = {!! json_encode(get_field('people_list')) !!};
    const font = new FontFace('Bai Jamjuree', `url('@asset("fonts/BaiJamjuree-Regular.ttf")')`, {weight: 'bold'});
    const positions = [
      {x: 415, y: 72},
      {x: 847, y: 75},
      {x: 621, y: 222},
      {x: 1059, y: 320},
      {x: 680, y: 428},
      {x: 741, y: 642},
      {x: 354, y: 570},
      {x: 183, y: 777},
    ];

    if (canvas && ctx) {
      const webImage = new Image();
      webImage.src = '@asset('images/pages/about-us-web.png')';
      webImage.onload = function () {
        canvas.width = webImage.width + 300;
        canvas.height = webImage.height + 60;

        ctx.drawImage(webImage, 150, 20);

        font.load().then(function (loadedFont) {
          // Add the loaded font to the document
          document.fonts.add(loadedFont);

          peopleList.forEach((person, index) => {
            const personPosition = positions[index];

            // Global for writings
            ctx.fillStyle = 'white';
            ctx.shadowColor = 'rgba(0, 0, 0, 1)';
            ctx.textAlign = 'center';

            ctx.font = '17px "Bai Jamjuree"';
            ctx.shadowBlur = 2;
            ctx.shadowOffsetX = 2;
            ctx.shadowOffsetY = 2;
            ctx.fillText(person.position, personPosition.x, personPosition.y);

            ctx.font = '29px "Bai Jamjuree"';
            ctx.shadowBlur = 4;
            ctx.shadowOffsetX = 5;
            ctx.shadowOffsetY = 5;
            ctx.fillText(person.name, personPosition.x, personPosition.y + 95);
          });
        });
      };
    }
  </script>
@endsection
