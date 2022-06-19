<div class="py-5 bg-cover" data-dark-overlay="6" style="background: url('<?php echo base_url(); ?>assets/frontend/img/1920/edit1.jpg') no-repeat">
   <div class="container"><h2 class="text-white"><?php echo $datosDocumento->titulo; ?></h2><ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Inicio</a></li>
   <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>documentos">Documentos</a></li>
   <li class="breadcrumb-item"><?php echo $datosDocumento->titulo; ?></li></ol>
   </div>
</div>

<section class="bg-light-v2">
<div class="container">
   <div class="row">
   <div class="col-lg-9 mt-4">

      <h2 class="mt-4"><?php echo $datosDocumento->titulo; ?></h2>
      <p><?php echo $datosDocumento->tipo_documento; ?></p>
   <div class="media align-items-center justify-content-between mb-5">
   <div class="media align-items-center">

   <div class="media-body"> <?php echo date('d/m/Y', strtotime($datosDocumento->fecha_documento)); ?>   </div>
</div>

</div>
<?php echo $datosDocumento->descripcion; ?>

<?php if (!empty($archivosDocumento)): ?>
	<br><br>
    <p><b>Archivos del documento</b></p>

    <?php foreach ($archivosDocumento as $archivo): ?>
    	<a href="<?php echo base_url(); ?>assets/backend/images/documentos/<?php echo $archivo->archivo; ?>" download><i class="fa fa-download"></i> <?php echo $archivo->archivo; ?></a><br>
    <?php endforeach ?>
<?php endif ?>


</div>
</div>


</div>
<br><br>
</section>
