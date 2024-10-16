<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    @include('partials.header')

    <div class="background-absolute"></div>
    <div id="scrollToUp" class="scroll-to-up">
      <div class="scroll-to-up-inside">
        <img src="@asset('images/icons/arrow-icon.svg')" alt="">
      </div>
    </div>
    @yield('content')
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
