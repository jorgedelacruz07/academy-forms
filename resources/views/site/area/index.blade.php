@extends('layouts.site')

@section('title', 'Areas | Academy Forms')

@section('content')

  <div class="uk-article">
    <h1 class="uk-article-title uk-text-center uk-text-uppercase">Áreas</h1>
    <p>
      <div class="" uk-grid>
        @foreach ($areas as $area)
          <div class="uk-text-center uk-width-1-1@s uk-width-1-3@l">
            <div class="uk-card uk-card-default uk-card-body uk-background-muted uk-box-shadow-small uk-box-shadow-hover-large uk-padding">
              <h3 class="uk-card-title uk-text-uppercase">{{ $area->name }}</h3>
              <a class="uk-button uk-button-default" href="/area/{{ $area->slug }}">Ver area</a><br>
            </div>
          </div>
        @endforeach
      </div>
    </p>
  </div>

@endsection
