<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Tipos de documentos</h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>registro-tipo-documento" class="btn btn-warning btn-rounded">Nuevo tipo de documento</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-overflow">
                            <?php if (count($resultado) <= 0) { ?>
                                <h3 class="text-center">No se encontraron tipos de documentos</h3>
                            <?php } else { ?>
                            <table id="dt-opt" class="table table-lg table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha de registro</th>
                                        <th>Tipo de documento</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <?php foreach ($resultado as $tipoDocumento): ?>
                                        <tr>
                                            <td><?php echo date('d/m/Y', strtotime($tipoDocumento->fecha_registro)); ?></td>
                                            <td><?php echo $tipoDocumento->tipo_documento; ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>edicion-tipo-documento/<?php echo $tipoDocumento->id_tipo_documento; ?>"><i class="ei-edit"></i></a> |
                                                <a href="#" data-href="" data-toggle="modal" data-target="#eliminar-tipo-documento-<?php echo $tipoDocumento->id_tipo_documento; ?>"><i class="ei-garbage-2"></i></a>
                                                    <div class="modal fade" id="eliminar-tipo-documento-<?php echo $tipoDocumento->id_tipo_documento; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">Está seguro que desea eliminar este tipo de documento?</div>
                                                            <div class="modal-body">
                                                                Al eliminar este tipo de documento se deberá asignar manualmente un tipo de documento a los documentos actuales
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-id-tipo-documento="<?php echo $tipoDocumento->id_tipo_documento; ?>" class="btn btn-warning btn-eliminar-tipo-documento">Eliminar</button>
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
