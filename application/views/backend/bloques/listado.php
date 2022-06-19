<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Bloques políticos</h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>registro-bloque" class="btn btn-warning btn-rounded">Nuevo bloque</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-overflow">
                            <?php if (count($resultado) <= 0) { ?>
                                <h3 class="text-center">No se encontraron bloques políticos</h3>
                            <?php } else { ?>
                            <table id="dt-opt" class="table table-lg table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha de registro</th>
                                        <th>Bloque</th>
                                        <th>Color representativo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <?php foreach ($resultado as $bloque): ?>
                                        <tr>
                                            <td><?php echo date('d/m/Y', strtotime($bloque->fecha_registro)); ?></td>
                                            <td><?php echo $bloque->nombre_bloque; ?></td>
                                            <td><span style="background: #<?php echo $bloque->color_representativo; ?>; width: 30px; height: 30px; display: block; margin-left: 55px"></span></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>edicion-bloque/<?php echo $bloque->id_bloque_politico; ?>"><i class="ei-edit"></i></a> |
                                                <a href="#" data-href="" data-toggle="modal" data-target="#eliminar-bloque-<?php echo $bloque->id_bloque_politico; ?>"><i class="ei-garbage-2"></i></a>
                                                    <div class="modal fade" id="eliminar-bloque-<?php echo $bloque->id_bloque_politico; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">Está seguro que desea eliminar este bloque político?</div>
                                                            <div class="modal-body">
                                                                Al eliminar a este bloque político se deberá asignar manualmente un bloque político a los registros de políticos
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-id-bloque="<?php echo $bloque->id_bloque_politico; ?>" class="btn btn-warning btn-eliminar-bloque">Eliminar</button>
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
