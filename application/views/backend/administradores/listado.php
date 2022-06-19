<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Administradores</h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>registro-administrador" class="btn btn-warning btn-rounded">Nuevo administrador</a> 
        </div> 
    </div> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-overflow">
                            <?php if (count($resultado) <= 0) { ?>
                                <h3 class="text-center">No se encontraron administradores</h3>
                            <?php } else { ?>
                            <table id="dt-opt" class="table table-lg table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha de registro</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>E-mail</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <?php foreach ($resultado as $administrador): ?>
                                        <tr>
                                            <td><?php echo date('d/m/Y', strtotime($administrador->fecha_registro)); ?></td>
                                            <td><?php echo $administrador->nombre; ?></td>
                                            <td><?php echo $administrador->apellido; ?></td>
                                            <td><?php echo $administrador->email; ?></td>
                                            <td>
                                                <a href="#" data-href="" data-toggle="modal" data-target="#eliminar-administrador-<?php echo $administrador->id_administrador; ?>"><i class="ei-garbage-2"></i></a>
                                                    <div class="modal fade" id="eliminar-administrador-<?php echo $administrador->id_administrador; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">Está seguro que desea eliminar a este administrador?</div>
                                                            <div class="modal-body">
                                                                Al eliminar a este administrador no será posible recuperar sus datos
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data="<?php echo $administrador->id_administrador; ?>" class="btn btn-warning btn-eliminar-administrador">Eliminar</button>
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