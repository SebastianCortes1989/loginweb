<div id="dlgDelete" class="modal modal-fixed-footer">
  {{ Form::open(['action' => 'HumanResources\AdvanceController@destroy', 'method' => 'DELETE']) }}
    <div class="modal-content">
      <h4>¿Estás seguro de eliminar este registro?</h4>
    </div>
    <div class="modal-footer">
      {{ Form::submit('Si, Eliminar') }}
    </div>
  {{ Form::close() }}
</div>