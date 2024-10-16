@if($projectContent['image'])
  <div
    class="project-view d-flex flex-column flex-lg-row align-items-center {{ $index % 2 ? '' : 'flex-lg-row-reverse' }}">

    <div class="project-view-image col-12 col-lg-6" data-aos="{{ $index % 2 ? 'fade-down-right' : 'fade-down-left' }}">
      <img src="{{ $projectContent['image']['url'] }}" alt="" class="img-fluid">
    </div>

    <div class="project-view-content col-12 col-lg-6 p-3" data-aos="{{ $index % 2 ? 'fade-down-left' : 'fade-down-right' }}">
      @if($showName)
        <h1 class="project-view-content-title mb-4">{{ get_field('project_name') }}</h1>
      @endif
      <div class="project-view-content-content">{!! $projectContent['content'] !!}</div>
      @if($showAchievements)
        <a href="{{ get_field('achievements_page', 'option') }}" class="yellow-transparent-button mt-3">Nasze osiągnięcia</a>
      @endif
    </div>
  </div>
@else
  <div class="project-view d-flex flex-column flex-lg-row align-items-center" style="margin-top: 0 !important;" data-aos="fade-down">
    <div class="project-view-content col-12 p-3">
      <div class="project-view-content-content">{!! $projectContent['content'] !!}</div>
      @if($showAchievements)
        <a href="{{ get_field('achievements_page', 'option') }}" class="yellow-transparent-button mt-3">Nasze osiągnięcia</a>
      @endif
    </div>
  </div>
@endif
