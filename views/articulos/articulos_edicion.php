<div class="modal" id="modal_articulos" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lbl_titulo"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			  <div id="lbl_alert_modal"></div>
        <input type="hidden" id="id" name="id"/>	
        <div class="form-group">
          <label for="nombre_articulo">Nombre del Artículo*</label>
          <input type="text" class="form-control" id="nombre_articulo" name="nombre_articulo" />
        </div>
      
        <div class="form-group">
          <label for="notas">Notas</label>
          <input type="text" class="form-control" id="notas" name="notas" />
        </div>
      
        <div class="form-group">
          <label for="precio">Precio*</label>
          <input type="number" class="form-control" id="precio" name="precio" />
        </div>	
      </div>
      <div class="modal-footer">
	  	  <button id="btn_guardar" name="guardar" type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>