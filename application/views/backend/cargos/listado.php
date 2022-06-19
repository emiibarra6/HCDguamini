<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Cargos</h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>registro-cargo" class="btn btn-warning btn-rounded">Nuevo cargo</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-overflow">
                            <?php if (count($resultado) <= 0) { ?>
                                <h3 class="text-center">No se encontraron cargos</h3>
                            <?php } else { ?>
                            <table id="dt-opt" class="table table-lg table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha de registro</th>
                                        <th>Cargo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <?php foreach ($resultado as $cargo): ?>
                                        <tr>
                                            <td><?php echo date('d/m/Y', strtotime($cargo->fecha_registro)); ?></td>
                                            <td><?php echo $cargo->cargo; ?></td>
                                            <td>

                                                <?php if ($cargo->id_cargo != 8): ?>

                                                    <a href="<?php echo base_url(); ?>edicion-cargo/<?php echo $cargo->id_cargo; ?>"><i class="ei-edit"></i></a> |
                                                    <a href="#" data-href="" data-toggle="modal" data-target="#eliminar-cargo-<?php echo $cargo->id_cargo; ?>"><i class="ei-garbage-2"></i></a>
                                                        <div class="modal fade" id="eliminar-cargo-<?php echo $cargo->id_cargo; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">Está seguro que desea eliminar este cargo?</div>
                                                                <div class="modal-body">
                                                                    Al eliminar a este cargo se deberá asignar manualmente un cargo a los registros de políticos
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button data-id-cargo="<?php echo $cargo->id_cargo; ?>" class="btn btn-warning btn-eliminar-cargo">Eliminar</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                <?php endif ?>
                                                
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
