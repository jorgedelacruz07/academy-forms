@extends('layouts.admin')

@section('title', 'Áreas | Academy Forms')

@section('content')

  <div class="uk-flex uk-flex-center">
    <a class="uk-button uk-button-default" href="#" uk-toggle="target: #modal-create-area">Crear área</a>
    @include('admin.area._modal', ['action' => 'create', 'method' => 'POST'])
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
          @foreach ($areas as $area)
            <tr>
              <td>{{ $area->name }}</td>
              <td>{{ $area->description}}</td>
              <td>
                <a class="uk-button uk-button-primary" href="#" uk-toggle="target: #modal-edit-area">Editar</a>
                @include('admin.area._modal', ['action' => 'edit', 'method' => 'PUT'])
                <a class="uk-button uk-button-danger" href="/admin/area/{{ $area->id }}" data-confirm="¿Está seguro que desea eliminar <strong>{{ $area->name }}</strong>?" data-method="DELETE">Eliminar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
