<div class="py-5 bg-cover" data-dark-overlay="6" style="background: url('assets/img/1920/658_2.jpg') no-repeat">
   <div class="container"><h2 class="text-white">Autoridades HCD</h2><ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0"><li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Inicio</a></li><li class="breadcrumb-item">Autoridades</li></ol>
   </div>
</div>

<section class="mt-5 paddingBottom-150 bg-light-v2">
	<?php if (count($listadoAutoridades) > 0){ ?>

	<div class="container">

		<h2 class="widget-title">Autoridades</h2>

		<div class="row">

	    <?php foreach ($listadoAutoridades as $equipo){ ?>
        <?php if ($equipo->cargo == 'Presidente') { ?>
          <section class="pt-5 bg-light-v2">
          <div class="container">
             <div class="row">
             <div class="col-lg-6">
             <div class="card">
                  <img class="card-img-top" src="<?php echo base_url(); ?>assets/backend/images/personas/<?php echo $equipo->foto; ?>" alt="<?php echo $equipo->nombre . ' ' . $equipo->apellido; ?>">
          </div><!-- END card-->
          </div>

          <div class="col-lg-6">
          	<div class="card">
          		<div class="card-body">
                <h2 class="my-4"><?php echo $equipo->nombre . ' ' . $equipo->apellido; ?></h2>
             <div class="align-items-center justify-content-between mb-5">
             <div class="align-items-center">

             <div class="media-body mt-2"><b><i class="fa fa-user"></i> Cargo:</b> <?php echo $equipo->cargo; ?></div>
             <div class="media-body mt-2"><b><i class="fa fa-envelope"></i> E-mail:</b> <a href="mailto:<?php echo $equipo->email; ?>"><?php echo $equipo->email; ?></a></div>
             <div class="media-body mt-2"><b><i class="fa fa-map-marker "></i> Localidad:</b> <?php echo $equipo->localidad; ?></div>
          </div>

          </div>
          </div><!-- END card-body-->
          	</div>
          </div>

          </div>
          </div>
          </section>
      <?php } }   ?>
				<section class="mt-5 paddingBottom-150 bg-light-v2">
					<div class="container">
						<div class="row">
				<?php
				foreach ($listadoAutoridades as $equipo){ ?>
         <?php if ($equipo->cargo != 'Presidente') { ?>

					 <div class="col-lg-4">
	    		<div class="block">
	            	<img class="card-img-top" src="<?php echo base_url(); ?>assets/backend/images/personas/<?php echo $equipo->foto; ?>" alt="<?php echo $equipo->nombre . ' ' . $equipo->apellido; ?>">
	            	<p class="mt-4"><b><i class="fa fa-user"></i> Cargo:</b> <?php echo $equipo->cargo; ?></p>
	            	<p><b><i class="fa fa-envelope"></i> E-mail:</b> <a href="mailto:<?php echo $equipo->email; ?>"><?php echo $equipo->email; ?></a></p>
                <p><b><i class="fa fa-map-marker"></i> Localidad:</b> <?php echo $equipo->localidad; ?></p>
	            </div>
						</div>

      <?php } } ?>

		</div>

		</div>
				</section>
	</div>

	</div>

<?php } ?>
</section>
