<?php  
              $query_id = mysqli_query($conn, "SELECT RIGHT(codigo,4) as codigo FROM db_usuarios_cobrar
                                                ORDER BY codigo DESC LIMIT 1")
                                                or die('error '.mysqli_error($conn));

              $contar = mysqli_num_rows($query_id);
              if ($contar <> 0) {
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo    = $data_id['codigo']+1;
              } else {
                  $codigo = 1;
              }
              $asignar_codigo   = str_pad($codigo, 4, "0", STR_PAD_LEFT);
              $codigo = "COBRO$asignar_codigo";
              ?>

<form class="form-horizontal" name="crear-productos" id="crear-productos" method="POST" action="acciones/productos/modelo_productos.php">
  <!-- Modal -->
  <div id="agregarproductos" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header box box-success">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title">AGREGAR PRODUCTO</h4>
        </div>
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
                  <input type="text" class="form-control" id="" name="codigo" value="<?php echo $codigo; ?>" readonly required>
                </div>
                <div class="col-md-3">
                  <label><b>NOMBRES</b></label>
                  <input type="text" class="form-control" id="" name="nombres"placeholder="Nombre" required>
                </div>
                <div class="col-md-3">
                  <label><b>APELLIDOS</b></label>
                  <input type="text" class="form-control" id="" name="apellidos"  placeholder="Apellido" required>
                </div>
                <div class="col-md-3">
                  <label><b>DIRECCION</b></label>
                  <input type="text" class="form-control" id="" name="direccion"  placeholder="Direccion" required>
                </div>
                </div>
              </div>
              <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label><b>ESTADO</b></label>
                  <input type="text" id="estado" name="estado"  class="form-control" value="Activo">
                </div>
                <div class="col-md-3">
                <label><b>PRESTADO</b></label>
                <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="number" id="prestado" name="prestado"  class="form-control" required >
                                            <input type="hidden"  id="valor" >
                                        </div>
                                        </div>
                                        <div class="col-md-3">
                <label><b>INTERES</b></label>
                <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <select name="interes" id="interes" class="form-control" required>
                                            <option>Seleccionar interes</option>
  <option value="20">20 %</option>
  <option value="15">15 %</option>
  <option value="10">10 %</option>
</select>
                                        </div>
                                        </div>
                <div class="col-md-3">
                <label><b>ACOBRAR</b></label>
                <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="number" id="acobrar" name="acobrar"  class="form-control" readonly>
                                        </div>
                                        </div>     
<br>
<br>
<span id="ganancia"></span>
<br>

              
              </div>
              </div>
              <div class="form-group">
              <div class="row">
              <div class="col-sm-3">
                <label><b>RECIBIDO</b></label>
                <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="number" name="recibido" value="0" class="form-control">
                                        </div>
                                        </div>
              <div class="col-sm-3">
                  <label><b>FECHA ENTREGA</b></label>
                  <input type="date" class="form-control" id="" name="fecha_entrega" placeholder="Fecha Entrega">
                </div>
                <div class="col-sm-3">
                  <label><b>FECHA PRIMERA CUOTA</b></label>
                  <input type="date" class="form-control" id="" name="fechapc"  placeholder="Fecha Primera Cuota">
                </div>
                <div class="col-sm-3">
                  <label><b>FECHA ULTIMA CUOTA</b></label>
                  <input type="date" class="form-control" id="" name="fechauc"placeholder="Fecha Ultima Cuota">
                </div>
              </div>
              </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->


            </div>

            <input type="hidden" name="registro" value="nuevo">
            <center>
              <button type="submit" id="save_data" class="btn btn-flat btn-success"><i class="fa fa-floppy-o"></i> Agregar</button>
              <a style="margin-left: 20px;" class="btn btn-flat btn-danger" href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Regresar</a>
            </center>
            <!-- /.col (right) -->
          </div>
        </div>

      </div>

    </div>
  </div>
</form>
<!------------------ Fin Modal -------------------------------------->