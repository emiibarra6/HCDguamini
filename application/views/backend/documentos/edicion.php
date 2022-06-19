<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Editar documento: <?php echo $datosDocumento->titulo; ?></h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>listado-documentos" class="btn btn-default btn-rounded">Volver</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title">Editar documento</h4>
                    </div>
                    <div class="card-block">
                        <div class="mrg-top-40">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <form method="post" action="<?php echo base_url(); ?>backend/documento/editarDocumento/<?php echo $datosDocumento->id_documento; ?>" id="formulario-edicion-documento">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tipo de documento</label>
                                                    <select name="tipo_documento" class="form-control">
                                                        <option value="">Seleccionar...</option>
                                                        <?php foreach ($listadoTiposDocumentos as $tipoDocumento): ?>
                                                            <option value="<?php echo $tipoDocumento->id_tipo_documento; ?>" <?php if ($tipoDocumento->id_tipo_documento == $datosDocumento->id_tipo_documento) { ?> selected <?php } ?>><?php echo $tipoDocumento->tipo_documento; ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Título documento</label>
                                                    <input type="text" placeholder="Título documento" name="titulo" class="form-control" value="<?php echo $datosDocumento->titulo; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Número documento</label>
                                                    <input type="text" placeholder="Número documento" name="numero" class="form-control" value="<?php echo $datosDocumento->numero_documento; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Fecha documento</label>
                                                    <input type="date" name="fecha" class="form-control" value="<?php echo $datosDocumento->fecha_documento; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Archivo (PDF o word)</label>
                                                    <input type="file" name="archivo">
                                                </div>

                                                <?php if (isset($archivosDocumentos) && !empty($archivosDocumentos)): ?>
                                                    <span style="color: red">Se encontraron <?php echo count($archivosDocumentos); ?> archivos</span><br>

                                                    <?php foreach ($archivosDocumentos as $archivo): ?>
                                                        <a href="<?php echo base_url(); ?>assets/backend/images/documentos/<?php echo $archivo->archivo; ?>" download><?php echo $archivo->archivo; ?> (descargar)</a>

                                                        <span style="color: red; cursor: pointer; margin-left: 10px" data-id-archivo-documento="<?php echo $archivo->id_archivo_documento; ?>" class="btn-eliminar-archivo-documento">X</span>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Descripción documento</label>
                                                    <textarea class="form-control" name="descripcion"><?php echo $datosDocumento->descripcion; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row mrg-top-40">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="text-right mrg-top-5">
                                                    <button type="submit" class="btn btn-warning btn-rounded" id="btn-edicion-documento">Editar documento</button>
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
