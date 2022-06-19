<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Nueva noticia</h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>listado-noticias" class="btn btn-default btn-rounded">Volver</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title">Crear nuevo noticia</h4>
                    </div>
                    <div class="card-block">
                        <div class="mrg-top-40">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <form method="post" action="<?php echo base_url(); ?>backend/noticia/registrarNoticia" id="formulario-registro-noticia" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Título noticia</label>
                                                    <input type="text" placeholder="Título noticia" name="titulo" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Sub-Titulo</label>
                                                    <input type="text" placeholder="Sub-Titulo" name="subtitulo" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Fecha noticia</label>
                                                <input type="date" name="fecha" class="form-control">
                                            </div>
                                        </div>
                                      </div>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Parrafo 1</label>
                                                    <textarea type="text" name="descripcion1" class="form-control"></textarea>
                                                </div>
                                            </div>
                                          </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Foto Parrafo 1</label>
                                                        <div class="upload-wrap" style="width: 25%">
                                                            <div class="uploadpreview-noticia" style="width: 180px; background-size: 100% 100%; height: 180px;  border: 1px solid silver"></div>
                                                            <input name="file1" type="file" accept="image/*" id="00" style="width: 160px; display: block; margin: 10px auto; padding: 0 20px; color: transparent;" class="input-imagen-noticia">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label>Parrafo 2</label>
                                                        <textarea type="text" name="descripcion2" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                              </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Foto Parrafo 2</label>
                                                            <div class="upload-wrap" style="width: 25%">
                                                                <div class="uploadpreview-noticia2" style="width: 180px; background-size: 100% 100%; height: 180px;  border: 1px solid silver"></div>
                                                                <input name="file2" type="file" accept="image/*" id="00" style="width: 160px; display: block; margin: 10px auto; padding: 0 20px; color: transparent;" class="input-imagen-noticia2">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label>Parrafo 3</label>
                                                            <textarea type="text" name="descripcion3" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                  </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Foto Parrafo 3</label>
                                                                <div class="upload-wrap" style="width: 25%">
                                                                    <div class="uploadpreview-noticia3" style="width: 180px; background-size: 100% 100%; height: 180px;  border: 1px solid silver"></div>
                                                                    <input name="file3" type="file" accept="image/*" id="00" style="width: 160px; display: block; margin: 10px auto; padding: 0 20px; color: transparent;" class="input-imagen-noticia3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label>Parrafo 4</label>
                                                                <textarea type="text" name="descripcion4" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                      </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Foto Parrafo 4</label>
                                                                    <div class="upload-wrap" style="width: 25%">
                                                                        <div class="uploadpreview-noticia4" style="width: 180px; background-size: 100% 100%; height: 180px;  border: 1px solid silver"></div>
                                                                        <input name="file4" type="file" accept="image/*" id="00" style="width: 160px; display: block; margin: 10px auto; padding: 0 20px; color: transparent;" class="input-imagen-noticia4">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <div class="form-group">
                                                                    <label>Parrafo 5</label>
                                                                    <textarea type="text" name="descripcion5" class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                          </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Foto Parrafo 5</label>
                                                                        <div class="upload-wrap" style="width: 25%">
                                                                            <div class="uploadpreview-noticia5" style="width: 180px; background-size: 100% 100%; height: 180px;  border: 1px solid silver"></div>
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
                                            </div>
                                            </div>


                                        <hr>

                                        <div class="row mrg-top-40">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="text-right mrg-top-5">
                                                    <button type="submit" class="btn btn-warning btn-rounded" id="btn-registro-noticia">Registrar noticia</button>
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
