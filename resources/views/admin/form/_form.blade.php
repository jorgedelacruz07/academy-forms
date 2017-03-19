<form class="uk-form-horizontal uk-margin-large" action="/admin/form{{ isset($form) ? '/'.$form->id : '' }}" method="POST">
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="{{ $method }}">
  <div class="uk-margin">
    <label class="uk-form-label">Nombre</label>
    <div class="uk-form-controls">
      <input class="uk-input" name="name" type="text" value="{{ isset($form) ? $form->name : '' }}" required>
    </div>
  </div>
  <div class="uk-margin">
    <label class="uk-form-label">Slug</label>
    <div class="uk-form-controls">
      <input class="uk-input" name="slug" type="text" value="{{ isset($form) ? $form->slug : '' }}" required>
    </div>
  </div>
  <div class="uk-margin">
    <label class="uk-form-label">Descripción</label>
    <div class="uk-form-controls">
      <textarea class="uk-textarea" name="description" rows="2" cols="40" required>{{ isset($form) ? $form->description : '' }}</textarea>
    </div>
  </div>
  <div class="uk-margin">
    <label class="uk-form-label">Área</label>
    <div class="uk-form-controls">
      <select name="area_id" class="uk-select" required>
        @if(isset($form))
          @foreach ($areas as $area)
            <option value="{{ $area->id }}" @if($area->id == $form->area_id) 'selected' @else '' @endif>{{ $area->name }}</option>
          @endforeach
        @else
          <option value="" selected disabled>Seleccionar área</option>
          @foreach ($areas as $area)
            <option value="{{ $area->id }}">{{ $area->name }}</option>
          @endforeach
        @endif
        {{ isset($form) ? '<option value="" selected disabled>Seleccionar área</option>' : '' }}
      </select>
    </div>
  </div>
  <div class="uk-margin">
    <label class="uk-form-label">Data</label>
    <div class="uk-form-controls">
      <textarea class="uk-textarea" name="data" rows="12" cols="40" required>{{ isset($form) ? $form->data : '' }}</textarea>
    </div>
  </div>
  <div class="uk-margin">
    <div class="uk-form-controls">
      <input class="uk-button uk-button-primary" type="submit" value="Guardar">
      <a class="uk-button uk-button-default" href="/admin/form">Volver</a>
    </div>
  </div>
</form>
