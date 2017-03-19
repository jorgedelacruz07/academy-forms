@extends('layouts.site')

@section('title', 'Formularios | Academy Forms')

@section('content')

  <div class="uk-article">
    <h1 class="uk-article-title uk-text-center uk-text-uppercase">Formularios</h1>
    <p>
      <div class="" uk-grid>
        @foreach ($forms as $form)
          <div class="uk-text-center uk-width-1-1@s uk-width-1-3@l">
            <div class="uk-card uk-card-default uk-card-body uk-background-muted uk-box-shadow-small uk-box-shadow-hover-large uk-padding">
              <h3 class="uk-card-title uk-text-uppercase">{{ $form->name }}</h3>
              <a class="uk-button uk-button-default" href="/form/{{ $form->slug }}">Ver formulario</a><br>
            </div>
          </div>
        @endforeach
      </div>
    </p>
  </div>

@endsection
