<footer class="footer">
  <div class="container container-custom-max-width">
    <div class="row">
      <a class="col-12 footer-brand" href="{{ home_url('/') }}">
        <img src="@asset('images/logo.png')" alt="Logo">
      </a>
    </div>
    <div class="row">
      <div class="col-12 col-lg-4 mb-3 pr-4">
        <p class="gray-text">{{ get_field('footer_description', 'option') }}</p>
      </div>
      <div class="col-6 col-lg-3 mb-3">
        <ul class="list-unstyled">
          @foreach(get_field('links_1', 'option') as $footer_link)
            <li class="additional-padding-footer-links"><a href="{{ $footer_link['url'] }}" class="text-white">{{ $footer_link['name'] }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="col-6 col-lg-3 mb-3">
        <ul class="list-unstyled">
          @foreach(get_field('links_2', 'option') as $footer_link)
            <li><a href="{{ $footer_link['url'] }}" class="text-white">{{ $footer_link['name'] }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="col-12 col-lg-2 mb-3">
        <p class="gray-text">Śledź AGH Space Systems</p>
        <div class="d-flex">
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
      </div>
    </div>
  </div>
</footer>
