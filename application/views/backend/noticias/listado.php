<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Noticias</h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>registro-noticia" class="btn btn-warning btn-rounded">Nuevo noticia</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-overflow">
                            <?php if (count($resultado) <= 0) { ?>
                                <h3 class="text-center">No se encontraron noticias</h3>
                            <?php } else { ?>
                            <table id="dt-opt" class="table table-lg table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha de noticia</th>
                                        <th>Título</th>
                                        <th>Descripción</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <?php foreach ($resultado as $noticia): ?>
                                        <tr>
                                            <td><?php echo date('d/m/Y', strtotime($noticia->fecha_publicacion)); ?></td>
                                            <td><?php echo $noticia->titulo; ?></td>
                                            <td>

                                                <a href="#" data-href="" data-toggle="modal" data-target="#descripcion-noticia-<?php echo $noticia->id_noticia; ?>">Ver descripción</a>

                                                <div class="modal fade" id="descripcion-noticia-<?php echo $noticia->id_noticia; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">Descripción del noticia: <?php echo $noticia->titulo; ?></div>
                                                            <div class="modal-body">
                                                                <?php echo $noticia->descripcion; ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>


                                            <td>
                                                <?php if (isset($archivosNoticias[$noticia->id_noticia]) && !empty($archivosNoticias[$noticia->id_noticia])) { ?>
                                                    <?php foreach ($archivosNoticias[$noticia->id_noticia] as $archivo): ?>
                                                        <a href="<?php echo base_url(); ?>assets/backend/images/noticias/<?php echo $archivo->archivo_noticia; ?>" download><?php echo $archivo->archivo_noticia; ?></a> <br>
                                                    <?php endforeach ?>
                                                <?php } else { ?>
                                                    No se encontraron archivos
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>edicion-noticia/<?php echo $noticia->id_noticia; ?>"><i class="ei-edit"></i></a> |

                                                <a href="#" data-href="" data-toggle="modal" data-target="#eliminar-noticia-<?php echo $noticia->id_noticia; ?>"><i class="ei-garbage-2"></i></a>
                                                    <div class="modal fade" id="eliminar-noticia-<?php echo $noticia->id_noticia; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">Está seguro que desea eliminar este noticia?</div>
                                                            <div class="modal-body">
                                                                Al eliminar este noticia no será posible recuperar sus datos
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-id-noticia="<?php echo $noticia->id_noticia; ?>" class="btn btn-warning btn-eliminar-noticia">Eliminar</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php if (count($resultado) > 0) {
                                    echo $pagination;
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
