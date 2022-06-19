<div class="py-5 bg-cover" data-dark-overlay="6" style="background: url('assets/img/1920/658_2.jpg') no-repeat">
   <div class="container"><h2 class="text-white"><?php echo $datosBloque->nombre_bloque; ?></h2><ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0"><li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Inicio</a></li><li class="breadcrumb-item"><?php echo $datosBloque->nombre_bloque; ?></li></ol>
   </div>
</div>

<section class="pt-5 bg-light-v2">
<div class="container">
   <div class="row">
   <div class="col-lg-6">
   <div class="card">
        <img class="card-img-top" src="<?php echo base_url(); ?>assets/backend/images/personas/<?php echo $datosPersona->foto; ?>" alt="<?php echo $datosPersona->nombre . ' ' . $datosPersona->apellido; ?>">
</div><!-- END card-->
</div>

<div class="col-lg-6">
	<div class="card">
		<div class="card-body">
      <h2 class="my-4"><?php echo $datosPersona->nombre . ' ' . $datosPersona->apellido; ?></h2>
   <div class="align-items-center justify-content-between mb-5">
   <div class="align-items-center">

   <div class="media-body mt-2"><b><i class="fa fa-user"></i> Cargo:</b> <?php echo $datosPersona->cargo; ?></div>
   <div class="media-body mt-2"><b><i class="fa fa-clock"></i> Período de mandato:</b> <?php echo date('d/m/Y', strtotime($datosPersona->periodo_desde)) . ' - ' . date('d/m/Y', strtotime($datosPersona->periodo_hasta)); ?></div>
   <div class="media-body mt-2"><b><i class="fa fa-envelope"></i> E-mail:</b> <a href="mailto:<?php echo $datosPersona->email; ?>"><?php echo $datosPersona->email; ?></a></div>
   <div class="media-body mt-2"><b><i class="fa fa-phone"></i> Celular:</b> <a href="tel:<?php echo $datosPersona->celular; ?>"><?php echo $datosPersona->celular; ?></a></div>
   <div class="media-body mt-2"><b><i class="fa fa-map-marker "></i> Localidad:</b> <?php echo $datosPersona->localidad; ?></div>
</div>

</div>
</div><!-- END card-body-->
	</div>
</div>

</div>
</div>
</section>

<section class="mt-5 paddingBottom-150 bg-light-v2">
	<?php if (count($equipoBloque) > 0): ?>

	<div class="container">

		<h2 class="widget-title">Equipo</h2>

		<div class="row">

	    <?php foreach ($equipoBloque as $key => $equipo): ?>
	    	<div class="col-lg-4">
	    		<div class="block">
	            	<img class="card-img-top" src="<?php echo base_url(); ?>assets/backend/images/personas/<?php echo $equipo->foto; ?>" alt="<?php echo $equipo->nombre . ' ' . $equipo->apellido; ?>">
                <p class="mt-4"><b><i class="fa fa-user-o"></i> Apellido y Nombre: </b><?php echo $equipo->apellido . ', ' . $equipo->nombre; ?></p>
	            	<p class=""><b><i class="fa fa-user"></i> Cargo:</b> <?php echo $equipo->cargo; ?></p>
	            	<p><b><i class="fa fa-clock"></i> Período de mandato:</b> <?php echo date('d/m/Y', strtotime($equipo->periodo_desde)) . ' - ' . date('d/m/Y', strtotime($equipo->periodo_hasta)); ?></p>
	            	<p><b><i class="fa fa-envelope"></i> E-mail:</b> <a href="mailto:<?php echo $equipo->email; ?>"><?php echo $equipo->email; ?></a></p>
	            	<p><b><i class="fa fa-phone"></i> Celular:</b> <a href="tel:<?php echo $equipo->celular; ?>"><?php echo $equipo->celular; ?></a></p>
                <p><b><i class="fa fa-map-marker"></i> Localidad:</b> <?php echo $equipo->localidad; ?></p>
	            </div>
	    	</div>

	    <?php endforeach ?>

	</div>

	</div>

<?php endif ?>
</section>