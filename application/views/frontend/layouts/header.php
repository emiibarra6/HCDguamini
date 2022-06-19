<!DOCTYPE html>
    <html lang="es">
        <head>
        <meta charset="UTF-8">
        <title>HCD Guaminí</title>

        <!-- SEO Meta-->
        <meta name="description" content="Pagina oficial Honorable Concejo Delibernate Guaminí">

        <meta name="keywords" content="HCD, Guamini, Honorable, Concejo, Deliberante, Pagina, Oficial">
        <meta name="author" content="Emi & Lucas">
        <!-- viewport scale-->
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <!-- Favicon and Apple Icons-->

        <?php if(!empty($metaNoticia)){ ?>
        <meta property="og:title" content="<?php echo $metaNoticia->titulo;?>" />
        <meta property="og:description" content="<?php echo $metaNoticia->subtitulo;?>" />
        <meta property="og:type" content="article" >
        <meta property="og:image" content="/assets/backend/images/noticias/<?php echo $metaNoticia->foto;?>" />
        <?php } ?>

        <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/frontend/img/favicon/Escudo-Ejecutivo-PNG.ico">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/frontend/img/favicon/Escudo-Ejecutivo-PNG.ico">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/frontend/img/favicon/Escudo-Ejecutivo-PNG.ico">
        <!--Google fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700%7CWork+Sans:400,500">
        <!-- Icon fonts -->
        <script src="https://kit.fontawesome.com/690c596bf5.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/fonts/themify-icons/css/themify-icons.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/vendors.bundle.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css">

        <style type="text/css">
            .text-primary{ color: #3b64ac!important; }
            .btn-primary { background-color: #3b64ac!important;border-color: #3b64ac; }
            .bg-primary { background-color: #3b64ac !important; }
            .btn-outline-primary { color: #3b64ac; border-color: #3b64ac; }
            .btn-link { color: #3b64ac; }
            .btn-warning {
                background-color: ##f58634 !important;
            }
        </style>
    </head>
<body>
