<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Nueva documento</h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>listado-documentos" class="btn btn-default btn-rounded">Volver</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title">Crear nuevo documento</h4>
                    </div>
                    <div class="card-block">
                        <div class="mrg-top-40">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <form method="post" action="<?php echo base_url(); ?>backend/documento/registrarDocumento" id="formulario-registro-documento">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tipo de documento</label>
                                                    <select name="tipo_documento" class="form-control">
                                                        <option value="">Seleccionar...</option>
                                                        <?php foreach ($listadoTiposDocumentos as $tipoDocumento): ?>
                                                            <option value="<?php echo $tipoDocumento->id_tipo_documento; ?>"><?php echo $tipoDocumento->tipo_documento; ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Título documento</label>
                                                    <input type="text" placeholder="Título documento" name="titulo" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Número documento</label>
                                                    <input type="text" placeholder="Número documento" name="numero" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Fecha documento</label>
                                                    <input type="date" name="fecha" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Archivo (PDF o word)</label>
                                                    <input type="file" name="archivo">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Descripción documento</label>
                                                    <textarea class="form-control" name="descripcion"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row mrg-top-40">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="text-right mrg-top-5">
                                                    <button type="submit" class="btn btn-warning btn-rounded" id="btn-registro-documento">Registrar documento</button>
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
