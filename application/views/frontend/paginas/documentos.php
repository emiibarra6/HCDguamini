<div class="py-5 bg-cover" data-dark-overlay="6" style="background: url('assets/frontend/img/1920/edit1.jpg') no-repeat">
   <div class="container"><h2 class="text-white">Documentos</h2><ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0"><li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Inicio</a></li><li class="breadcrumb-item">Documentos</li></ol>
   </div>
</div>

<section class="mt-5 paddingBottom-150 bg-light-v2">

	<div class="container">

		<h2 class="widget-title">Documentos</h2>

		<div class="row">

			<?php if (empty($listadoDocumentos)) { ?>
                <h3 class="text-center w-100">No se encontraron documentos</h3>
			<?php } else { ?>

                <?php foreach ($listadoDocumentos as $documento): ?>
                	<div class="col-lg-5 border border-warning rounded ml-4 mb-1">
			    		<div class="block">

			            	<h3 class="mt-4"><?php echo $documento->titulo; ?></h3>
			            	<p class="mnh-40">
			            		<?php

		                            $descripcion = strlen($documento->descripcion) > 50 ? substr($documento->descripcion, 0, 50) . '...' : $documento->descripcion;

		                             echo $descripcion;

		                        ?>
			            	</p>

			            	<br>
			            	<p><?php echo date('d/m/Y', strtotime($documento->fecha_documento)); ?></p>

			            	<a href="<?php echo base_url(); ?>documento/<?php echo $documento->slug_documento; ?>" class="btn-ver-mas">Ver más</a>

			            </div>
			    	</div>
                <?php endforeach ?>

			<?php } ?>
	    </div>

	    <?php if (count($listadoDocumentos) > 0) { ?>
            <div class="nav-pagination mt-5">
            	<?php echo $pagination; ?>
            </div>
        <?php } ?>

	</div>

</section>