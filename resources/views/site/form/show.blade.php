@extends('layouts.site')

@section('title', $form->name.' | Academy Forms')

@section('content')

  @php
  $data = json_decode($form->data);
  @endphp

  <div class="uk-article">
    <h1 class="uk-article-title uk-text-center uk-text-uppercase">{{ $form->name }}</h1>
    <p>
      <div class="" uk-grid>
        <div class="uk-width-1-1@s uk-width-1-2@l uk-align-center">
          <form class="uk-form-horizontal uk-margin-large" method="POST" action="/admin/form/{{ $slug }}/validate">
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
                    <div class="uk-margin academy-checkbox">
                      @foreach($section->answers->values as $values)
                        <label><input class="uk-checkbox academy-checkbox-input-{{ $loop->index }}" type="checkbox" name="answer{{ $number }}[]" value="{{ $values->answer }}"> {{ $values->answer }}</label><br>
                      @endforeach
                    </div>
                  @else
                    <div class="uk-margin academy-radio">
                      @foreach($section->answers->values as $values)
                        <label><input class="uk-radio" type="radio" name="answer{{ $number }}" value="{{ $values->answer }}"> {{ $values->answer }}</label><br>
                      @endforeach
                    </div>
                  @endif
                </div>
              </div>
            @endforeach
            <div class="uk-margin academy-submit">
              <div class="uk-text-center">
                <input type="submit" class="uk-button uk-button-primary" value="Enviar">
              </div>
            </div>
          </form>
        </div>
      </div>
    </p>
  </div>

  <script>

    // function verify(){
    //   var checks = $('.academy-checkbox');
    //   var verify = 0;
    //   for (var i = 1; i <= checks.length; i++) {
    //     var inputs = $('.academy-checkbox-input-'+i);
    //     for (var j = 0; j < inputs.length; j++) {
    //       if(inputs.is(':checked')){
    //         verify++;
    //       }
    //     }
    //   }
    //   console.log(verify);
    //   if(checks <= verify){
    //     $('.academy-submit').removeClass('uk-hidden');
    //   }
    // }

    // function verify(){
    //   var checks = $('.academy-checkbox');
    //   for (var i = 0; i < checks.length; i++) {
    //     $('.academy-checkbox-input-'.i).change(function(){
    //       var checks = $('.academy-checkbox');
    //       var verify = 0;
    //       for (var i = 1; i <= checks.length; i++) {
    //         var inputs = $('.academy-checkbox-input-'+i);
    //         for (var j = 0; j < inputs.length; j++) {
    //           if(inputs.is(':checked')){
    //             verify++;
    //           }
    //         }
    //       }
    //       console.log(verify);
    //       if(checks != verify){
    //         $('.academy-submit').removeClass('uk-hidden');
    //       }
    //     }).change();
    //   }
    // };

  </script>

@endsection
