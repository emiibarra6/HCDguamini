<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Documentos</h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>registro-documento" class="btn btn-warning btn-rounded">Nuevo documento</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-overflow">
                            <?php if (count($resultado) <= 0) { ?>
                                <h3 class="text-center">No se encontraron documentos</h3>
                            <?php } else { ?>
                            <table id="dt-opt" class="table table-lg table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha de registro</th>
                                        <th>Título</th>
                                        <th>Descripción</th>
                                        <th>N° documento</th>
                                        <th>Fecha documento</th>
                                        <th>Descripción</th>
                                        <th>Archivo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <?php foreach ($resultado as $documento): ?>
                                        <tr>
                                            <td><?php echo date('d/m/Y', strtotime($documento->fecha_registro)); ?></td>
                                            <td><?php echo $documento->titulo; ?></td>
                                            <td>

                                                <a href="#" data-href="" data-toggle="modal" data-target="#descripcion-documento-<?php echo $documento->id_documento; ?>">Ver descripción</a>

                                                <div class="modal fade" id="descripcion-documento-<?php echo $documento->id_documento; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">Descripción del documento: <?php echo $documento->titulo; ?></div>
                                                            <div class="modal-body">
                                                                <?php echo $documento->descripcion; ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $documento->numero_documento; ?></td>
                                            <td><?php echo $documento->fecha_documento; ?></td>
                                            <td>
                                                <?php if (isset($archivosDocumentos[$documento->id_documento]) && !empty($archivosDocumentos[$documento->id_documento])) { ?>
                                                    <?php foreach ($archivosDocumentos[$documento->id_documento] as $archivo): ?>
                                                        <a href="<?php echo base_url(); ?>assets/backend/images/documentos/<?php echo $archivo->archivo; ?>" download><?php echo $archivo->archivo; ?></a> <br>
                                                    <?php endforeach ?>
                                                <?php } else { ?>
                                                    No se encontraron archivos
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>edicion-documento/<?php echo $documento->id_documento; ?>"><i class="ei-edit"></i></a> |
                                                <a href="#" data-href="" data-toggle="modal" data-target="#eliminar-documento-<?php echo $documento->id_documento; ?>"><i class="ei-garbage-2"></i></a>
                                                    <div class="modal fade" id="eliminar-documento-<?php echo $documento->id_documento; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">Está seguro que desea eliminar este documento?</div>
                                                            <div class="modal-body">
                                                                Al eliminar este documento no será posible recuperar sus datos
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-id-documento="<?php echo $documento->id_documento; ?>" class="btn btn-warning btn-eliminar-documento">Eliminar</button>
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