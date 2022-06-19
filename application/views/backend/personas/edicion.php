<!-- Content Wrapper START -->
<div class="main-content">
  <div class="container-fluid">
    <div class="row">
      <div class="page-title col-md-6">
        <h4>Editar persona: <?php echo $datosPersona->nombre . ' ' . $datosPersona->apellido; ?></h4>
      </div>
      <div class="text-right col-md-6">
        <a href="<?php echo base_url(); ?>listado-personas" class="btn btn-default btn-rounded">Volver</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-heading border bottom">
            <h4 class="card-title">Editar persona</h4>
          </div>
          <div class="card-block">
            <div class="mrg-top-40">
              <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                  <form method="post" action="<?php echo base_url(); ?>backend/persona/editarPersona/<?php echo $datosPersona->id_persona; ?>" id="formulario-edicion-persona">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nombre persona</label>
                          <input type="text" placeholder="Nombre persona" name="nombre" class="form-control" value="<?php echo $datosPersona->nombre; ?>">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Apellido persona</label>
                          <input type="text" placeholder="Apellido persona" name="apellido" class="form-control" value="<?php echo $datosPersona->apellido; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Periodo desde</label>
                          <input type="date" name="periodo_desde" class="form-control" value="<?php echo $datosPersona->periodo_desde; ?>">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Periodo hasta</label>
                          <input type="date" name="periodo_hasta" class="form-control" value="<?php echo $datosPersona->periodo_hasta; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Celular</label>
                          <input type="text" placeholder="Celular" name="celular" class="form-control" value="<?php echo $datosPersona->celular; ?>">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>E-mail</label>
                          <input type="text" placeholder="E-mail" name="email" class="form-control" value="<?php echo $datosPersona->email; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Bloque politico</label>
                          <select name="bloque_politico" class="form-control">
                            <option value="">Seleccionar...</option>
                            <?php foreach ($listadoBloques as $bloque) {?>
                              <option value="<?php echo $bloque->id_bloque_politico;?>"  <?php if ($datosPersona->id_bloque_politico == $bloque->id_bloque_politico){?> selected <?php }?> > <?php echo $bloque->nombre_bloque;?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Cargo</label>
                          <select name="cargo" class="form-control">
                              <option value="">Seleccionar...</option>
                              <?php foreach ($listadoCargos as $cargo): ?>
                                  <option value="<?php echo $cargo->id_cargo; ?>" <?php if ($cargo->id_cargo == $datosPersona->id_cargo) { ?> selected <?php } ?>><?php echo $cargo->cargo; ?></option>
                              <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Localidad</label>
                              <input type="text" placeholder="Localidad" name="localidad" class="form-control" value="<?php echo $datosPersona->localidad; ?>">
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Foto persona</label>
                          <div class="upload-wrap" style="width: 25%">
                            <div class="uploadpreview-persona" style="width: 180px; background-size: 100% 100%; height: 180px;  border: 1px solid silver; background-image: url('<?php echo base_url(); ?>assets/backend/images/personas/<?php echo $datosPersona->foto; ?>')"></div>
                            <input name="file" type="file" accept="image/*" id="00" style="width: 160px; display: block; margin: 10px auto; padding: 0 20px; color: transparent;" class="input-imagen-persona">
                          </div>
                        </div>
                      </div>
                    </div>

                    <hr>

                    <div class="row mrg-top-40">
                      <div class="col-md-12 col-xs-12">
                        <div class="text-right mrg-top-5">
                          <button type="submit" class="btn btn-warning btn-rounded" id="btn-edicion-persona">Editar persona</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Content Wrapper END -->
