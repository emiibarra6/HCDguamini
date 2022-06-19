<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Editar bloque politico: <?php echo $datosBloque->nombre_bloque; ?></h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>listado-bloques" class="btn btn-default btn-rounded">Volver</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title">Editar bloque</h4>
                    </div>
                    <div class="card-block">
                        <div class="mrg-top-40">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <form method="post" action="<?php echo base_url(); ?>backend/bloque/editarBloque/<?php echo $datosBloque->id_bloque_politico; ?>" id="formulario-edicion-bloque">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre de bloque</label>
                                                    <input type="text" placeholder="Nombre de bloque" name="nombre" class="form-control" value="<?php echo $datosBloque->nombre_bloque; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Color representativo del bloque</label>
                                                    <input type="text" placeholder="Nombre de bloque" name="color_representativo" class="form-control jscolor" value="<?php echo $datosBloque->color_representativo; ?>">
                                                </div>
                                            </div>

                                        </div>

                                        <hr>

                                        <div class="row mrg-top-40">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="text-right mrg-top-5">
                                                    <button type="submit" class="btn btn-warning btn-rounded" id="btn-edicion-bloque">Editar bloque politico</button>
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
