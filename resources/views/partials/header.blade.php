<header>
  @php
    $dropdownItems = [];
  @endphp

  <nav class="navbar navbar-expand-xl navbar-dark">
    <div class="container d-flex justify-content-between align-items-center" style="position: relative;">
      <a class="navbar-brand" href="{{ home_url('/') }}">
        <img src="@asset('images/logo.png')" alt="Logo">
      </a>

      <div class="justify-content-center header-screen-menu">
        <ul class="navbar-nav">
          @foreach (wp_get_nav_menu_items(get_nav_menu_locations()['primary_navigation']) as $menu_item)
            @if ($menu_item->menu_item_parent == 0)
              @php
                $children = array_filter(wp_get_nav_menu_items(get_nav_menu_locations()['primary_navigation']), function($sub_item) use ($menu_item) {
                    return $sub_item->menu_item_parent == $menu_item->ID;
                });
                if (!empty($children)) {
                  $dropdownItems[$menu_item->ID] = $children;
                }
              @endphp
              <li class="nav-item" id="navItem{{ $menu_item->ID }}">
                <a class="nav-link m-2" href="{{ $menu_item->url }}">
                  {{ $menu_item->title }}
                  @if(!empty($children))
                    <img src="@asset('images/icons/dropdown-icon.svg')" class="dropdown-icon p-2"
                         alt="" />
                  @endif
                </a>
              </li>
            @endif
          @endforeach
        </ul>
      </div>

      <div class="navbar-icons d-flex align-items-center header-screen-menu-icons">
        <a href="{{ get_field('social_media_facebook', 'option') }}" target="_blank">
          <img src="@asset('images/icons/facebook.svg')" alt="Facebook">
        </a>
        <a href="{{ get_field('social_media_instagram', 'option') }}" target="_blank">
          <img src="@asset('images/icons/instagram.svg')" alt="Instagram">
        </a>
        <a href="{{ get_field('social_media_linkedin', 'option') }}" target="_blank">
          <img src="@asset('images/icons/linkedin.svg')" alt="LinkedIn">
        </a>
        <a href="{{ get_field('social_media_x', 'option') }}" target="_blank">
          <img src="@asset('images/icons/x-twitter.svg')" alt="X (Twitter)">
        </a>
      </div>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"
              style="background-image: url('@asset('images/icons/hamburger-icon-open.svg')');"></span>
        <span class="navbar-toggler-icon-close"
              style="background-image: url('@asset('images/icons/hamburger-icon-close.svg')');"></span>
      </button>

      <div class="display-none-on-992 collapse navbar-collapse justify-content-center display-none-on-992"
           id="navbarNav">
        <div class="header-hamburger-menu">
          <ul class="navbar-nav navbar-nav-hamburger">
            @php
              $menu_items = wp_get_nav_menu_items(get_nav_menu_locations()['primary_navigation']);
              $menu_item_count = count($menu_items);
            @endphp
            @foreach ($menu_items as $index => $menu_item)
              <li class="nav-item  {{ $index === $menu_item_count - 1 ? 'nav-item-last' : '' }}">
                <a class="nav-link" href="{{ $menu_item->url }}">
                  {{ $menu_item->title }}
                </a>
              </li>
            @endforeach
            <div class="navbar-icons d-flex align-items-center header-hamburger-menu-icons">
              <a href="{{ get_field('social_media_facebook', 'option') }}" target="_blank">
                <img src="@asset('images/icons/facebook.svg')" alt="Facebook">
              </a>
              <a href="{{ get_field('social_media_instagram', 'option') }}" target="_blank">
                <img src="@asset('images/icons/instagram.svg')" alt="Instagram">
              </a>
              <a href="{{ get_field('social_media_linkedin', 'option') }}" target="_blank">
                <img src="@asset('images/icons/linkedin.svg')" alt="LinkedIn">
              </a>
              <a href="{{ get_field('social_media_x', 'option') }}" target="_blank">
                <img src="@asset('images/icons/x-twitter.svg')" alt="X (Twitter)">
              </a>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  @foreach($dropdownItems as $key => $children)
    <ul class="header-dropdown" id="headerDropdown{{ $key }}">
      @foreach ($children as $child)
        <li class="header-dropdown-item">
          <a class="header-dropdown-item-link" href="{{ $child->url }}">
            {{ $child->title }}
          </a>
        </li>
      @endforeach
    </ul>
  @endforeach

  @php
    $events = get_field('events', 'option');
  @endphp
  @if(count($events) > 0)
    @include('partials.events', ['events' => $events])
  @endif
</header>
