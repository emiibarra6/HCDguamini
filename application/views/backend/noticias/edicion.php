<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Editar noticia: <?php echo $datosNoticia->titulo; ?></h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>listado-noticias" class="btn btn-default btn-rounded">Volver</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title">Editar noticia</h4>
                    </div>
                    <div class="card-block">
                        <div class="mrg-top-40">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <form method="post" action="<?php echo base_url(); ?>backend/noticia/editarNoticia/<?php echo $datosNoticia->id_noticia; ?>" id="formulario-edicion-noticia">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">a
                                                    <label>Título noticia</label>
                                                    <input type="text" placeholder="Título noticia" name="titulo" class="form-control" value="<?php echo $datosNoticia->titulo; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Sub-Titulo</label>
                                                    <input type="text" placeholder="Sub-Titulo" name="subtitulo" class="form-control" value="<?php echo $datosNoticia->subtitulo; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label>Fecha noticia</label>
                                                  <input type="date" name="fecha" class="form-control" value="<?php echo $datosNoticia->fecha_publicacion; ?>">
                                              </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label>Parrafo 1</label>
                                                  <textarea class="form-control" name="descripcion1"><?php echo $datosNoticia->descripcion; ?></textarea>
                                              </div>
                                          </div>
                                          </div>

                                            <div class="row">
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Foto noticia</label>
                                                  <div class="upload-wrap" style="width: 25%">
                                                    <div class="uploadpreview-noticia" style="width: 180px; background-size: 100% 100%; height: 180px;  border: 1px solid silver; background-image: url('<?php echo base_url(); ?>assets/backend/images/noticias/<?php echo $datosNoticia->foto; ?>')"></div>
                                                    <input name="file1" type="file" accept="image/*" id="00" style="width: 160px; display: block; margin: 10px auto; padding: 0 20px; color: transparent;" class="input-imagen-noticia">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label>Parrafo 2</label>
                                                      <textarea class="form-control" name="descripcion2"><?php echo $datosNoticia->descripcion2; ?></textarea>
                                                  </div>
                                              </div>
                                              </div>

                                                <div class="row">
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label>Foto parrafo 2</label>
                                                      <div class="upload-wrap" style="width: 25%">
                                                        <div class="uploadpreview-noticia2" style="width: 180px; background-size: 100% 100%; height: 180px;  border: 1px solid silver; background-image: url('<?php echo base_url(); ?>assets/backend/images/noticias/<?php echo $datosNoticia->foto2; ?>')"></div>
                                                        <input name="file2" type="file" accept="image/*" id="00" style="width: 160px; display: block; margin: 10px auto; padding: 0 20px; color: transparent;" class="input-imagen-noticia2">
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="row">
                                                  <div class="col-md-12">
                                                      <div class="form-group">
                                                          <label>Parrafo 3</label>
                                                          <textarea class="form-control" name="descripcion3"><?php echo $datosNoticia->descripcion3; ?></textarea>
                                                      </div>
                                                  </div>
                                                  </div>

                                                    <div class="row">
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label>Foto parrafo 3</label>
                                                          <div class="upload-wrap" style="width: 25%">
                                                            <div class="uploadpreview-noticia3" style="width: 180px; background-size: 100% 100%; height: 180px;  border: 1px solid silver; background-image: url('<?php echo base_url(); ?>assets/backend/images/noticias/<?php echo $datosNoticia->foto3; ?>')"></div>
                                                            <input name="file3" type="file" accept="image/*" id="00" style="width: 160px; display: block; margin: 10px auto; padding: 0 20px; color: transparent;" class="input-imagen-noticia3">
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <div class="row">
                                                      <div class="col-md-12">
                                                          <div class="form-group">
                                                              <label>Parrafo 4</label>
                                                              <textarea class="form-control" name="descripcion4"><?php echo $datosNoticia->descripcion4; ?></textarea>
                                                          </div>
                                                      </div>
                                                      </div>

                                                        <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label>Foto parrafo 4</label>
                                                              <div class="upload-wrap" style="width: 25%">
                                                                <div class="uploadpreview-noticia4" style="width: 180px; background-size: 100% 100%; height: 180px;  border: 1px solid silver; background-image: url('<?php echo base_url(); ?>assets/backend/images/noticias/<?php echo $datosNoticia->foto4; ?>')"></div>
                                                                <input name="file4" type="file" accept="image/*" id="00" style="width: 160px; display: block; margin: 10px auto; padding: 0 20px; color: transparent;" class="input-imagen-noticia4">
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>

                                                        <div class="row">
                                                          <div class="col-md-12">
                                                              <div class="form-group">
                                                                  <label>Parrafo 5</label>
                                                                  <textarea class="form-control" name="descripcion5"><?php echo $datosNoticia->descripcion5; ?></textarea>
                                                              </div>
                                                          </div>
                                                          </div>

                                                            <div class="row">
                                                              <div class="col-md-6">
                                                                <div class="form-group">
                                                                  <label>Foto parrafo 5</label>
                                                                  <div class="upload-wrap" style="width: 25%">
                                                                    <div class="uploadpreview-noticia5" style="width: 180px; background-size: 100% 100%; height: 180px;  border: 1px solid silver; background-image: url('<?php echo base_url(); ?>assets/backend/images/noticias/<?php echo $datosNoticia->foto5; ?>')"></div>
                                                                    <input name="file5" type="file" accept="image/*" id="00" style="width: 160px; display: block; margin: 10px auto; padding: 0 20px; color: transparent;" class="input-imagen-noticia5">
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>



                                            <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Archivo (PDF o word)</label>
                                                    <input type="file" name="archivo">
                                                </div>

                                                <?php if (isset($archivosNoticias) && !empty($archivosNoticias)): ?>
                                                    <span style="color: red">Se encontraron <?php echo count($archivosNoticias); ?> archivos</span><br>

                                                    <?php foreach ($archivosNoticias as $archivo): ?>
                                                        <a href="<?php echo base_url(); ?>assets/backend/images/noticias/<?php echo $archivo->archivo_noticia; ?>" download><?php echo $archivo->archivo_noticia; ?> (descargar)</a>

                                                        <span style="color: red; cursor: pointer; margin-left: 10px" data-id-archivo-noticia="<?php echo $archivo->id_archivo_noticia; ?>" class="btn-eliminar-archivo-noticia">X</span>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </div>
                                            </div>


                                        <hr>

                                        <div class="row mrg-top-40">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="text-right mrg-top-5">
                                                    <button type="submit" class="btn btn-warning btn-rounded" id="btn-edicion-noticia">Editar noticia</button>
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
