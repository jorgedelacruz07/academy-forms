@extends('layouts.site')

@section('title', $area->name.' | Academy Forms')

@section('content')

  <div class="uk-article">
    <h1 class="uk-article-title uk-text-center uk-text-uppercase">{{ $area->name }}</h1>
    <p>
      @if (count($area->forms))
        <div class="" uk-grid>
          @foreach ($area->forms as $form)
            <div class="uk-text-center uk-width-1-3">
              <div class="uk-card uk-card-default uk-card-body uk-background-muted uk-box-shadow-small uk-box-shadow-hover-large uk-padding">
                <h3 class="uk-card-title uk-text-uppercase">{{ $form->name }}</h3>
                <a class="uk-button uk-button-default" href="/form/{{ $form->slug }}">Ver formulario</a><br>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="uk-text-center uk-padding">
          <span class="uk-h4">No se encontraron formularios</span>
        </div>
      @endif
    </p>
  </div>

@endsection
