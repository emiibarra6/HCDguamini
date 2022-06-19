<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Autoridades</h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>registro-autoridades" class="btn btn-warning btn-rounded">Nueva autoridad</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-overflow">
                            <?php if (count($resultado) <= 0) { ?>
                                <h3 class="text-center">No se encontraron autoridades</h3>
                            <?php } else { ?>
                            <table id="dt-opt" class="table table-lg table-hover">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Cargo</th>
                                        <th>Localidad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <?php foreach ($resultado as $persona): ?>
                                        <tr>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/backend/images/personas/<?php echo $persona->foto; ?>" width="80">
                                            </td>
                                            <td><?php echo $persona->nombre; ?></td>
                                            <td><?php echo $persona->apellido; ?></td>
                                            <td><?php echo $persona->email; ?></td>
                                            <td><?php echo $persona->cargo; ?></td>
                                            <td><?php echo $persona->localidad; ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>edicion-autoridades/<?php echo $persona->id; ?>"><i class="ei-edit"></i></a> |
                                                <a href="#" data-href="" data-toggle="modal" data-target="#eliminar-persona-<?php echo $persona->id; ?>"><i class="ei-garbage-2"></i></a>
                                                    <div class="modal fade" id="eliminar-persona-<?php echo $persona->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">Está seguro que desea eliminar a esta autoridad?</div>
                                                            <div class="modal-body">
                                                                Al eliminar a esta autoridad no será posible recuperar sus datos
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-id-persona="<?php echo $persona->id; ?>" class="btn btn-warning btn-eliminar-persona">Eliminar</button>
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
