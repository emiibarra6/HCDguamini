<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <title><?php echo $titulo; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/backend/images/logo/favicon.png">

    <!-- plugins css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendors/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendors/PACE/themes/blue/pace-theme-minimal.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendors/perfect-scrollbar/css/perfect-scrollbar.min.css" />

    <!-- page plugins css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendors/selectize/dist/css/selectize.default.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendors/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/vendors/summernote/dist/summernote.css" />

    <!-- core css -->
    <link href="<?php echo base_url(); ?>assets/backend/css/ei-icon.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/themify-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/croppie.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/bootstrap-tagsinput.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css">
</head>
<body>
<div class="app">
        <div class="layout">

           <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <div class="side-nav-logo">
                        <a href="<?php echo base_url(); ?>listado-documentos">
                            <div class="logo logo-dark" style="background-image: url('assets/images/logo/logo.png')"></div>
                            <div class="logo logo-white" style="background-image: url('assets/images/logo/logo-white.png')"></div>
                        </a>
                        <div class="mobile-toggle side-nav-toggle">
                            <a href="">
                                <i class="ti-arrow-circle-left"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="side-nav-menu scrollable">

                        <li class="nav-item">
                            <a class="mrg-top-30" href="<?php echo base_url(); ?>listado-documentos">
                                <span class="icon-holder">
                                    <i class="ei-book"></i>
                                </span>
                                <span class="title">Documentos</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="mrg-top-30" href="<?php echo base_url(); ?>listado-autoridades">
                                <span class="icon-holder">
                                    <i class="fa fa-user-o"></i>
                                </span>
                                <span class="title">Autoridades</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="mrg-top-30" href="<?php echo base_url(); ?>listado-noticias">
                                <span class="icon-holder">
                                    <i class="fa fa-sitemap"></i>
                                </span>
                                <span class="title">Noticias</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="mrg-top-30" href="<?php echo base_url(); ?>listado-personas">
                                <span class="icon-holder">
                                    <i class="fa fa-user"></i>
                                </span>
                                <span class="title">Personas</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="mrg-top-30" href="<?php echo base_url(); ?>listado-bloques">
                                <span class="icon-holder">
                                    <i class="fa fa-address-book"></i>
                                </span>
                                <span class="title">Bloque Políticos</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="mrg-top-30" href="<?php echo base_url(); ?>listado-cargos">
                                <span class="icon-holder">
                                    <i class="fa fa-user-o"></i>
                                </span>
                                <span class="title">Cargos</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="mrg-top-30" href="<?php echo base_url(); ?>listado-tipos-documentos">
                                <span class="icon-holder">
                                    <i class="fa fa-file"></i>
                                </span>
                                <span class="title">Tipos de Documentos</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="mrg-top-30" href="<?php echo base_url(); ?>listado-administradores">
                                <span class="icon-holder">
                                        <i class="ei-users-1"></i>
                                    </span>
                                <span class="title">Administradores</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Side Nav END -->
            <!-- Page Container START -->
            <div class="page-container">
                <!-- Header START -->
               <div class="header navbar">
                    <div class="header-container">
                         <ul class="nav-left">
                            <li>
                                <a class="side-nav-toggle" href="javascript:void(0);">
                                    <i class="ti-view-grid"></i>
                                </a>
                            </li>
                            <?php if (isset($busqueda)) { ?>
                            <li class="search-box">
                                <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                                    <i class="search-icon ti-search pdd-right-10"></i>
                                    <i class="search-icon-close ti-close pdd-right-10"></i>
                                </a>
                            </li>

                            <li class="search-input">
                                <form method="get" action="<?php echo base_url() . $busqueda['action']; ?>">
                                    <input class="form-control" name="src" autocomplete="off" type="text" placeholder="Search...">
                                </form>
                            </li>
                            <?php } ?>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                    <div class="user-info">
                                        <span class="name pdd-right-5">Administrador</span>
                                        <i class="ti-angle-down font-size-10"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo base_url(); ?>perfil-administrador">
                                            <i class="ti-user pdd-right-10"></i>
                                            <span>Perfil</span>
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>backend/administrador/cerrarSesion">
                                            <i class="ti-power-off pdd-right-10"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Header END -->
