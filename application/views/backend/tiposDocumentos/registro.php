<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Nuevo tipo de documento</h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>listado-tipos-documentos" class="btn btn-default btn-rounded">Volver</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title">Crear nuevo tipo de documento</h4>
                    </div>
                    <div class="card-block">
                        <div class="mrg-top-40">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <form method="post" action="<?php echo base_url(); ?>backend/tipoDocumento/registrarTipoDocumento" id="formulario-registro-tipo-documento">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre de tipo de documento</label>
                                                    <input type="text" placeholder="Nombre de tipo de documento" name="tipo" class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                        <hr>

                                        <div class="row mrg-top-40">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="text-right mrg-top-5">
                                                    <button type="submit" class="btn btn-warning btn-rounded" id="btn-registro-tipo-documento">Registrar tipo de documento</button>
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
