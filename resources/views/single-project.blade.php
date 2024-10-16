{{--
  Template Name: Single project
  Template Post Type: post
--}}

@extends('layouts.app')

@php
  $projectContents = get_field('project_contents');
  $projectBottomImage = get_field('bottom_image');
  $projectId = get_the_ID();
@endphp

@section('content')
  @if(get_field('video_mp4'))
    <div class="video-container">
      <video id="video-player" class="video-js vjs-default-skin" controls crossorigin>
        <source src="{{ get_field('video_mp4') }}" type="video/mp4"/>
      </video>
    </div>
  @endif

  @php
    $categories = get_the_category();
    foreach ($categories as $category) {
      if ($category->parent !== 0) {
        $activeCategory = $category;
      }
    }
    $projectQuery = new WP_Query([
      'category_name' => 'projekty',
      'posts_per_page' => -1,
      'post_status' => 'publish',
    ]);
    $allProjectsArray = [];
  @endphp

  <div class="container container-projects-slider">
    @if ($projectQuery->have_posts())
      <div class="projects-slider">
        @while ($projectQuery->have_posts())
          @php
            $projectQuery->the_post();
            $projectArray = [
              'title' => get_field('project_name'),
              'image' => get_field('project_image')['url'],
              'link' => get_permalink(),
            ];
            if($projectId != get_the_ID()) {
                $allProjectsArray[] = $projectArray;
            }
          @endphp
          @if (has_category($activeCategory->cat_ID))
            <div class="projects-slider-slide" data-aos="zoom-in">
              <img src="{{ $projectArray['image'] }}" alt="">
              <div class="projects-slider-slide-content">
                <h3 class="projects-slider-slide-content-title">{{ $projectArray['title'] }}</h3>
                <div class="projects-slider-slide-content-button">
                  @if($projectId == get_the_ID())
                    <a href="#" class="yellow-transparent-button">Dowiedz się więcej</a>
                  @else
                    <a href="{{ $projectArray['link'] }}" class="yellow-black-button">Dowiedz się
                      więcej</a>
                  @endif
                </div>
              </div>
            </div>
          @endif
        @endwhile
      </div>
      @php wp_reset_postdata(); @endphp
    @endif
  </div>

  <div class="single-project container container-custom-max-width">
    @foreach($projectContents as $projectContent)
      @component('components.single-project-view', ['projectContent' => $projectContent, 'index' => $loop->index, 'showName' => $loop->first, 'showAchievements' => $loop->last])@endcomponent
    @endforeach

    @if($projectBottomImage)
      <div class="col-12 single-project-bottom-image" data-aos="flip-down">
        <img src="{{ $projectBottomImage['url'] }}" alt="">
      </div>
    @endif

    <div class="d-flex flex-column single-project-other-projects">
      <h3 class="col-12 mb-4">Odkryj inne projekty AGH Space Systems</h3>
      <div class="d-flex flex-row">
        @foreach(array_rand($allProjectsArray, 3) as $projectId)
          <a class="single-project-other-projects-project col-12 col-lg-6 col-xl-4"
             href="{{ $allProjectsArray[$projectId]['link'] }}" data-aos="flip-left">
            <img src="{{ $allProjectsArray[$projectId]['image'] }}" alt="">
            <div class="single-project-other-projects-project-content">
              <h4
                class="single-project-other-projects-project-content-title">{{ $allProjectsArray[$projectId]['title'] }}</h4>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </div>
@endsection
