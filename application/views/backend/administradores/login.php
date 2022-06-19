<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <title>Administración Consejo Guamini</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">

    <!-- plugins css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendors/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendors/PACE/themes/blue/pace-theme-minimal.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendors/perfect-scrollbar/css/perfect-scrollbar.min.css" />

    <!-- core css -->
    <link href="<?php echo base_url(); ?>assets/backend/css/ei-icon.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/themify-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css">
</head>

<body>
    <div class="app">
        <div class="authentication">
            <div class="sign-in">
                <div class="row no-mrg-horizon">
                    <div class="col-md-8 no-pdd-horizon d-none d-md-block">
                        <div class="full-height bg" style="background-image: url('<?php echo base_url(); ?>assets/backend/images/bk-login.jpg');">
                           
                        </div>
                    </div>
                    <div class="col-md-4 no-pdd-horizon">
                        <div class="full-height bg-white height-100">
                            <div class="vertical-align full-height pdd-horizon-70">
                                <div class="table-cell">
                                    <div class="pdd-horizon-15">
                                        <h2>Iniciar Sesión</h2>
                                        <p class="mrg-btm-15 font-size-13">Por favor, ingrese su usuario y contraseña</p>
                                        <form method="post" action="<?php echo base_url(); ?>backend/administrador/loginAdministrador" id="formulario-login-administrador">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" placeholder="E-mail">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="clave" placeholder="Clave">
                                            </div>
                                            <button class="btn btn-info" id="btn-login-administrador">Ingresar</button>
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

    <script src="<?php echo base_url(); ?>assets/backend/js/vendor.js"></script>
    <script type="text/javascript">
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/funciones/administradores.js"></script>

    <script src="<?php echo base_url(); ?>assets/backend/js/app.min.js"></script>

    <!-- page js -->

</body>

</html>