@extends('layouts.admin')

@section('title', 'Formularios | Academy Forms')

@section('content')

  <div class="uk-flex uk-flex-center">
    <a class="uk-button uk-button-default" href="/admin/form/create">Crear formulario</a>
  </div>

  <div class="uk-flex uk-flex-center uk-margin-top">
    <div>
      <table class="uk-table uk-table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Área</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($forms as $form)
            <tr>
              <td>{{ $form->name }}</td>
              <td>{{ $form->area->name}}</td>
              <td>
                <a class="uk-button uk-button-default" href="/form/{{ $form->slug}}">Ver</a>
                <a class="uk-button uk-button-primary" href="/admin/form/{{ $form->id }}/edit">Editar</a>
                <a class="uk-button uk-button-danger" href="/admin/form/{{ $form->id }}" data-confirm="¿Está seguro que desea eliminar <strong>{{ $form->name }}</strong>?" data-method="DELETE">Eliminar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
