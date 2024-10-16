{{--
  Template Name: Projects
--}}

@extends('layouts.app')

@section('content')
  <div class="video-container">
    <video id="video-player" class="video-js vjs-default-skin" controls crossorigin>
      <source src="{{ get_field('video_mp4') }}" type="video/mp4"/>
    </video>
  </div>

  <div class="container container-custom-max-width" data-aos="zoom-in">
    @foreach(get_field('projects_list') as $project)
      @component('components.project-view', ['project' => $project, 'index' => $loop->index])@endcomponent
    @endforeach
  </div>

  <div class="explore-section mt-5 text-center" data-aos="fade-up">
    <h2>Eksploruj Naszą Stronę!</h2>
    <div class="explore-buttons">
      @foreach(get_field('links') as $project)
        <a href="{{ $project['url'] }}" class="btn yellow-black-button">
          {{ $project['text'] }}
        </a>
      @endforeach
    </div>
  </div>
@endsection
