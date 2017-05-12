<div id="modal-{{ $action }}-area" uk-modal>
  <div class="uk-modal-dialog uk-modal-body">
    <h2 class="uk-modal-title">Crear área</h2>
    <p>
      <form class="uk-form-horizontal" action="/admin/area{{ isset($area) ? '/'.$area->id : '' }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="{{ $method }}">
        <div class="uk-margin">
          <label class="uk-form-label">Nombre</label>
          <div class="uk-form-controls">
            <input class="uk-input" name="name" type="text" required value="{{ isset($area) ? $area->name : '' }}">
          </div>
        </div>
        <div class="uk-margin">
          <label class="uk-form-label">Slug</label>
          <div class="uk-form-controls">
            <input class="uk-input" name="slug" type="text" required value="{{ isset($area) ? $area->slug : '' }}">
          </div>
        </div>
        <div class="uk-margin">
          <label class="uk-form-label">Descripción</label>
          <div class="uk-form-controls">
            <textarea class="uk-textarea" name="description" rows="3" cols="20">{{ isset($area) ? $area->description : '' }}</textarea>
          </div>
        </div>
        <div class="uk-margin">
          <div class="uk-form-controls">
            <input class="uk-button uk-button-primary" type="submit" value="Enviar">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cerrar</button>
          </div>
        </div>
      </form>
    </p>
  </div>
</div>
