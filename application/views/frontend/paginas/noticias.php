<div class="py-5 bg-cover" data-dark-overlay="6" style="background: url('assets/frontend/img/1920/edit1.jpg') no-repeat">
   <div class="container"><h2 class="text-white">Noticias</h2><ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0"><li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Inicio</a></li><li class="breadcrumb-item">Noticias</li></ol>
   </div>
</div>

<section class="mt-5 paddingBottom-150 bg-light-v2">

	<div class="container">



			<?php if (empty($listadoNoticias)) { ?>
                <h3 class="text-center w-100">No se encontraron noticias</h3>
			<?php } else { ?>

                <?php foreach ($listadoNoticias as $noticia): ?>
                  <div class="row">
                		<div class="col-md-2">
                		<img src="<?php echo base_url();?>assets/backend/images/noticias/<?php echo $noticia->foto; ?>" alt="" width="100%">
                		</div>
                			<div class="col-md-8">
                				<div><h1><span><?php $ti = strlen($noticia->titulo) > 70 ? substr($noticia->titulo, 0, 70) . '...' : $noticia->titulo;

                          echo $ti;
                          ?>
                          </span></h1>
                          <p><?php echo date('d/m/Y', strtotime($noticia->fecha_publicacion)); ?></p>
                        <span class="clear spacer_responsive_hide_mobile " style="height:13px;display:block;"></span>
                          <p>  <?php $descripcion = strlen($noticia->descripcion) > 100 ? substr($noticia->descripcion, 0, 100) . '...' : $noticia->descripcion;

                            echo $descripcion; ?>
                				</p>
                				</div>
                        <a href="<?php echo base_url(); ?>noticia/<?php echo $noticia->slug_noticia; ?>" class="btn-ver-mas">Leer más</a>
                			</div>
                		</div>
                    <hr>
                <?php endforeach ?>

          <?php } ?>

                <!--  <div class="col-lg-5 border border-warning rounded ml-4 mb-1">
			    		      <div class="block">

			            	<h3 class="mt-4"><?php echo $noticia->titulo; ?></h3>
			            	<p class="mnh-40">
			            		<?php

		                            $descripcion = strlen($noticia->descripcion) > 50 ? substr($noticia->descripcion, 0, 50) . '...' : $noticia->descripcion;

		                             echo $descripcion;

		                        ?>
			            	</p>

			            	<br>
			            	<p><?php echo date('d/m/Y', strtotime($noticia->fecha_publicacion)); ?></p>

			            	<a href="<?php echo base_url(); ?>noticia/<?php echo $noticia->slug_noticia; ?>" class="btn-ver-mas">Ver más</a>

			            </div>
			    	</div> -->


	    <?php if (count($listadoNoticias) > 0) { ?>
            <div class="nav-pagination mt-5">
            	<?php echo $pagination; ?>
            </div>
        <?php } ?>

	</div>

</section>
