<form class="form-horizontal" name="crear-egreso" id="crear-egreso" method="POST" action="acciones/egresos/modelo_egresos.php">
  <div id="agregaregreso" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header box box-success">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title">AÑADIR Egreso</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-xs-4">
                      <label>Motivo</label>
                      <select name="motivo" id="motivo" class="form-control" required>
                        <option>Seleccionar Motivo</option>
                        <option value="Moto">Moto</option>
                        <option value="Alcancia">Alcancia</option>
                        <option value="Pago">Pago</option>
                      </select>
                    </div>
                    <div class="col-xs-4">
                      <label>Cantidad</label>
                      <input type="number" class="form-control" name="cantidad" placeholder="cantidad">
                    </div>
                    <div class="col-xs-4">
                      <label>Fecha</label>
                      <input type="date" class="form-control" name="fecha" placeholder="fecha">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
            </div>
            <input type="hidden" name="agregar_egreso" value="nuevo_egreso">
            <button type="submit" id="save_data" class="btn btn-flat btn-success text-center"><i class="fa fa-floppy-o"></i> Agregar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</form>

<!------------------ Fin Modal -------------------------------------->