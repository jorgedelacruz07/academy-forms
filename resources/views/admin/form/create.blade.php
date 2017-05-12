@extends('layouts.admin')

@section('title', 'Crear formulario | Academy Forms')

@section('content')

  <div class="uk-child-width-3-4@l uk-child-width-1-1@s uk-flex-center" uk-grid>
    <div class="">
      @include('admin.form._form', ['method' => 'POST']);
    </div>
  </div>

@endsection
