@extends('layouts.admin')

@section('title', $form->name.' | Academy Forms')

@section('content')

  @php
  $data = json_decode($form->data);
  @endphp

  <div class="" uk-grid>
    <div class="uk-width-1-2 uk-align-center">
      <form class="uk-form-horizontal uk-margin-large" method="POST" action="/form/{{ $slug }}/validate">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="POST">
        @foreach($data as $section_key => $section)
          @php
          $number = $loop->index+1;
          @endphp
          <div class="uk-background-muted uk-margin">
            <div class="uk-padding">
              <div class="uk-margin">
                <p class="uk-h5 uk-text-uppercase uk-text-bold">{{ $section->value }}</p>
              </div>
              @if ($section->type == 'multiple')
                <div class="uk-margin">
                  @foreach($section->answers->values as $values)
                    <label><input class="uk-checkbox" type="checkbox" name="answer{{ $number }}[]"> {{ $values->answer }}</label><br>
                  @endforeach
                </div>
              @else
                <div class="uk-margin">
                  @foreach($section->answers->values as $values)
                    <label><input class="uk-radio" type="radio" name="answer{{ $number }}"> {{ $values->answer }}</label><br>
                  @endforeach
                </div>
              @endif
            </div>
          </div>
        @endforeach
        <div class="uk-margin">
          <div class="uk-text-center">
            <input type="submit" class="uk-button uk-button-primary" value="Enviar">
          </div>
        </div>
      </form>
    </div>
  </div>


@endsection
