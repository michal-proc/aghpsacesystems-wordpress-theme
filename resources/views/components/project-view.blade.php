<div
  class="project-view d-flex flex-column flex-lg-row align-items-center {{ $index % 2 ? 'flex-lg-row-reverse' : '' }}">

  <div class="project-view-image col-12 col-lg-6" data-aos="{{ $index % 2 ? 'fade-down-left' : 'fade-down-right' }}">
    <img src="{{ $project['image']['url'] }}" alt="" class="img-fluid">
  </div>

  <div class="project-view-content col-12 col-lg-6 p-3" data-aos="{{ $index % 2 ? 'fade-down-right' : 'fade-down-left' }}">
    <h1 class="project-view-content-title mb-4">{{ $project['title'] }}</h1>
    <div class="project-view-content-content">{!! $project['content'] !!}</div>
    <a href="{{ $project['link'] }}"
       class="yellow-black-button mt-3">{{ $project['link_text'] }}</a>
  </div>
</div>
