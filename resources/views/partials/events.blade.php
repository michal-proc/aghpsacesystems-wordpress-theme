<div class="events">
  @foreach($events as $event)
    <div class="single-event">
      <div class="single-event-left"></div>
      <a class="single-event-content" href="{{ $event['url'] }}">
        <p class="bigger">{{ $event['text'] }}</p>
        <p class="smaller">{{ $event['description'] }}</p>
      </a>
    </div>
  @endforeach
</div>
