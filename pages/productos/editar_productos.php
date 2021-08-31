
<div class="modal fade" id="editarproducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header box box-success">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Student Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" name="editar-productos" id="editar-productos" method="POST" action="acciones/productos/modelo_productos.php">
        <div class="modal-body">
<div class="row">
<div class="col-md-12">
<div class="box box-success">
  <div class="box-body">
    <!-- Date dd/mm/yyyy -->
    <div class="form-group">
    <div class="row">
<div class="col-md-3">
  <label><b>CODIGO</b></label>
    <input type="text" class="form-control" id="codigo" name="codigo" readonly required>
  </div>
  <div class="col-md-3">
    <label><b>NOMBRES</b></label>
    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombre">
  </div>
  <div class="col-md-3">
    <label><b>APELLIDOS</b></label>
    <input type="text" class="form-control" id="apellidos" name="apellidos"  placeholder="Apellido">
  </div>
  <div class="col-md-3">
    <label><b>DIRECCION</b></label>
    <input type="text" class="form-control" id="direccion" name="direccion"  placeholder="Direccion">
  </div>
  </div>
</div>
<div class="form-group">
<div class="row">
  <div class="col-md-3">
    <label><b>ESTADO</b></label>
    <select class="form-control" id="estado" name="estado">
                      <option value="">SELECCIONAR</option>
                      <option value="Activo">Activo</option>
                      <option value="Inactivo">Inactivo</option>
                  </select>
  </div>
  <div class="col-md-3">
  <label><b>PRESTADO</b></label>
  <div class="input-group">
                              <span class="input-group-addon">$</span>
                              <input type="number" id="prestado" name="prestado"  class="form-control">
                          </div>
                          </div>
  <div class="col-md-3">
  <label><b>ACOBRAR</b></label>
  <div class="input-group">
                              <span class="input-group-addon">$</span>
                              <input type="number" id="acobrar" name="acobrar"  class="form-control">
                          </div>
                          </div>
  <div class="col-md-3">
  <label><b>RECIBIDO</b></label>
  <div class="input-group">
                              <span class="input-group-addon">$</span>
                              <input type="number" id="recibido" name="recibido"  class="form-control">
                          </div>
                          </div>

</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-sm-4">
    <label><b>FECHA ENTREGA</b></label>
    <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" placeholder="Fecha Entrega">
  </div>
  <div class="col-sm-4">
    <label><b>FECHA PRIMERA CUOTA</b></label>
    <input type="date" class="form-control" id="fechapc" name="fechapc"  placeholder="Fecha Primera Cuota">
  </div>
  <div class="col-sm-4">
    <label><b>FECHA ULTIMA CUOTA</b></label>
    <input type="date" class="form-control" id="fechauc" name="fechauc"placeholder="Fecha Ultima Cuota">
  </div>
</div>
</div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
  <!-- <input type="text" class="form-control" name="codigo" id="codigo"> -->
  <input type="hidden" name="registro" value="actualizar">
  <center>
    <button type="submit" id="save_data" class="btn btn-flat btn-success"><i class="fa fa-floppy-o"></i> Agregar</button>
    <a style="margin-left: 20px;" class="btn btn-flat btn-danger" href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Regresar</a>
  </center>
  <!-- /.col (right) -->
</div>
</div>
        </form>
    </div>
  </div>
</div>