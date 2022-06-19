<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Editar cargo: <?php echo $datosCargo->cargo; ?></h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>listado-cargos" class="btn btn-default btn-rounded">Volver</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title">Editar cargo</h4>
                    </div>
                    <div class="card-block">
                        <div class="mrg-top-40">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <form method="post" action="<?php echo base_url(); ?>backend/cargo/editarCargo/<?php echo $datosCargo->id_cargo; ?>" id="formulario-edicion-cargo">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre de cargo</label>
                                                    <input type="text" placeholder="Nombre de cargo" name="cargo" class="form-control" value="<?php echo $datosCargo->cargo; ?>">
                                                </div>
                                            </div>

                                        </div>

                                        <hr>

                                        <div class="row mrg-top-40">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="text-right mrg-top-5">
                                                    <button type="submit" class="btn btn-warning btn-rounded" id="btn-edicion-cargo">Editar cargo</button>
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
