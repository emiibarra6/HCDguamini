<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Personas</h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>registro-persona" class="btn btn-warning btn-rounded">Nueva persona</a>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-overflow">
                            <?php if (count($resultado) <= 0) { ?>
                                <h3 class="text-center">No se encontraron personas</h3>
                            <?php } else { ?>
                            <table id="dt-opt" class="table table-lg table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha de registro</th>
                                        <th>Foto</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Celular</th>
                                        <th>Email</th>
                                        <th>Cargo</th>
                                        <th>Bloque político</th>
                                        <th>Localidad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <?php foreach ($resultado as $persona): ?>
                                        <tr>
                                            <td><?php echo date('d/m/Y', strtotime($persona->fecha_registro)); ?></td>
                                            <td>
                                                <img src="<?php echo base_url(); ?>assets/backend/images/personas/<?php echo $persona->foto; ?>" width="80">
                                            </td>
                                            <td><?php echo $persona->nombre; ?></td>
                                            <td><?php echo $persona->apellido; ?></td>
                                            <td><?php echo $persona->celular; ?></td>
                                            <td><?php echo $persona->email; ?></td>
                                            <td><?php echo $persona->cargo; ?></td>
                                            <td><?php echo $persona->nombre_bloque; ?></td>
                                            <td><?php echo $persona->localidad; ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>edicion-persona/<?php echo $persona->id_persona; ?>"><i class="ei-edit"></i></a> |
                                                <a href="#" data-href="" data-toggle="modal" data-target="#eliminar-persona-<?php echo $persona->id_persona; ?>"><i class="ei-garbage-2"></i></a>
                                                    <div class="modal fade" id="eliminar-persona-<?php echo $persona->id_persona; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">Está seguro que desea eliminar a esta persona?</div>
                                                            <div class="modal-body">
                                                                Al eliminar a esta persona no será posible recuperar sus datos
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-id-persona="<?php echo $persona->id_persona; ?>" class="btn btn-warning btn-eliminar-persona">Eliminar</button>
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
