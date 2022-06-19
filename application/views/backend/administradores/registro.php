<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
        <div class="page-title col-md-6">
            <h4>Nuevo administrador</h4>
        </div>
        <div class="text-right col-md-6">
            <a href="<?php echo base_url(); ?>listado-administradores" class="btn btn-default btn-rounded">Volver</a>
        </div> 
    </div> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title">Crear nuevo administrador</h4>
                    </div>
                    <div class="card-block">
                        <div class="mrg-top-40">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <form method="post" action="<?php echo base_url(); ?>backend/administrador/registrarAdministrador" id="formulario-registro-administrador">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre administrador</label>
                                                    <input type="text" placeholder="Nombre administrador" name="nombre" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Apellido administrador</label>
                                                    <input type="text" placeholder="Apellido administrador" name="apellido" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>E-mail administrador</label>
                                                    <input type="text" placeholder="E-mail administrador" name="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Clave</label>
                                                    <input type="password" placeholder="Clave" name="clave" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Repetir clave</label>
                                                    <input type="password" placeholder="Repetir clave" name="repetirClave" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mrg-top-40">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="text-right mrg-top-5">
                                                    <button type="submit" class="btn btn-warning btn-rounded" id="btn-registro-administrador">Registrar administrador</button>
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