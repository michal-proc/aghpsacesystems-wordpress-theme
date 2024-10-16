<div
  class="section-view d-flex flex-column flex-lg-row align-items-center {{ $index % 2 ? 'flex-lg-row-reverse' : '' }}">

  <div class="section-view-image col-12 col-lg-5 mb-4" data-aos="{{ $index % 2 ? 'flip-left' : 'flip-right' }}">
    <div class="shadow-circle about-us-section-circle">
      <div
        class="shadow-circle-inside about-us-section-circle-inside text-center d-flex justify-content-center align-items-center">
        <h1>{!! $isMarketingContent ? "Marketing i&nbsp;Logistyka" : $section['team'] !!}</h1>
      </div>
    </div>
  </div>

  <div class="section-view-content col-12 col-lg-7 p-3" data-aos="zoom-in-up">
    <div
      class="section-view-content-content d-flex {{ $index % 2 ? 'justify-content-end' : 'justify-content-start' }}">{!! $isMarketingContent ? get_field('marketing_description') : $section['description'] !!}</div>
    <div class="section-view-buttons d-flex {{ $index % 2 ? 'justify-content-end' : 'justify-content-start' }} mt-3">
      @if($isMarketingContent)
        <a href="{{ get_field('marketing_site') }}" class="yellow-black-button mr-5">Zostań sponsorem</a>
        <a class="section-view-icon mr-4" href="{{ get_field('social_media_facebook', 'option') }}" target="_blank">
          <img src="@asset('images/icons/facebook-yellow.svg')" alt="Facebook">
        </a>
        <a class="section-view-icon mr-4" href="{{ get_field('social_media_instagram', 'option') }}" target="_blank">
          <img src="@asset('images/icons/instagram-yellow.svg')" alt="Instagram">
        </a>
        <a class="section-view-icon mr-4" href="{{ get_field('social_media_linkedin', 'option') }}" target="_blank">
          <img src="@asset('images/icons/linkedin-yellow.svg')" alt="LinkedIn">
        </a>
        <a class="section-view-icon" href="{{ get_field('social_media_x', 'option') }}" target="_blank">
          <img src="@asset('images/icons/x-twitter-yellow.svg')" alt="X (Twitter)">
        </a>
      @else
        <a href="{{ $section['page'] }}" class="yellow-black-button mr-5">Zobacz projekty</a>
        <a href="{{ $section['achievements'] }}" class="yellow-transparent-button">Nasze osiągnięcia</a>
      @endif
    </div>
  </div>
</div>
