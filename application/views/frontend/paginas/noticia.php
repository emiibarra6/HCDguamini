
<div class="py-5 bg-cover" data-dark-overlay="6" style="background: url('<?php echo base_url(); ?>assets/frontend/img/1920/edit1.jpg') no-repeat">
   <div class="container"><h2 class="text-white"><?php echo $datosNoticia->titulo; ?></h2><ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Inicio</a></li>
   <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>noticias">Noticias</a></li>
   <li class="breadcrumb-item"><?php echo $datosNoticia->titulo; ?></li></ol>
   </div>
</div>

<section class="bg-light-v2">
<div class="container">
   <div class="row">
   <div class="col-lg-9 mt-4">
  <h2 class="mt-4"><b><?php echo $datosNoticia->titulo; ?></b></h2>
   <div class="media align-items-center justify-content-between mb-5">
   <div class="media align-items-center">
   <p class="text-custom mb-1"><?php echo date('d/m/Y', strtotime($datosNoticia->fecha_publicacion)); ?> </p><p class="mb-1"> |  <?php echo $datosNoticia->subtitulo; ?></p>
 </div>
 <div class="">
    <p><b>Compartir noticia</b></p>
    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://hcdguamini.com/noticia/<?php echo $datosNoticia->slug_noticia;?>">
      <i class="fa fa-facebook" aria-hidden="true"></i></a>
 </div>
</div>
<img src="<?php echo base_url();?>assets/backend/images/noticias/<?php echo $datosNoticia->foto; ?>">
<br><br>
<?php echo $datosNoticia->descripcion; ?>
<br><br>

<?php if(!empty($datosNoticia->foto2)){ ?>
<img src="<?php echo base_url();?>assets/backend/images/noticias/<?php echo $datosNoticia->foto2; ?>">
<?php } ?>
<br><br>
<?php echo $datosNoticia->descripcion2; ?>
<br><br>

<?php if(!empty($datosNoticia->foto3)){ ?>
<img src="<?php echo base_url();?>assets/backend/images/noticias/<?php echo $datosNoticia->foto3; ?>">
<?php } ?>
<br><br>
<?php echo $datosNoticia->descripcion3; ?>
<br><br>

<?php if(!empty($datosNoticia->foto4)){ ?>
<img src="<?php echo base_url();?>assets/backend/images/noticias/<?php echo $datosNoticia->foto4; ?>">
<?php } ?>
<br><br>
<?php echo $datosNoticia->descripcion4; ?>
<br><br>

<?php if(!empty($datosNoticia->foto5)){ ?>
<img src="<?php echo base_url();?>assets/backend/images/noticias/<?php echo $datosNoticia->foto5; ?>">
<?php } ?>
<br><br>
<?php echo $datosNoticia->descripcion5; ?>

<?php if (!empty($archivosNoticia)): ?>
	<br><br>
    <p><b>Archivos del documento</b></p>

    <?php foreach ($archivosNoticia as $archivo): ?>
    	<a href="<?php echo base_url(); ?>assets/backend/images/noticias/<?php echo $archivo->archivo_noticia; ?>" download><i class="fa fa-download"></i> <?php echo $archivo->archivo_noticia; ?></a><br>
    <?php endforeach ?>
<?php endif ?>
<br><br>


</div>
</div>
</div>
<br><br>
</section>
