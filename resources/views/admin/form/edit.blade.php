@extends('layouts.admin')

@section('title', 'Editar '.$form->name.' | Academy Forms')

@section('content')

  <div class="uk-child-width-1-1@s uk-flex-center" uk-grid>
    <div class="">
      @include('admin.form._form', ['method' => 'PUT']);
    </div>
  </div>

@endsection
