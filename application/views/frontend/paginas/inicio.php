<style media="screen">
.title-1 {
  padding: 3rem 1.5rem;
  text-align: center;
}
.starter-template {
  padding: 3rem 1.5rem;
  text-align: center;
}
/*
-------------------------------------------------- */
@media (min-width: 768px) and (max-width: 991px) {
    /* Show 4th slide on md if col-md-4*/
    #carousel-example-1 .carousel-inner .active.col-md-4.carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -33.3333%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }
}
@media (min-width: 576px) and (max-width: 768px) {
    /* Show 3rd slide on sm if col-sm-6*/
    #carousel-example-1 .carousel-inner .active.col-sm-6.carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -50%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }
}
@media (min-width: 576px) {
    #carousel-example-1 .carousel-item {
        margin-right: 0;
    }
    /* show 2 items */
    #carousel-example-1 .carousel-inner .active + .carousel-item {
        display: block;
    }
    #carousel-example-1 .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
    #carousel-example-1 .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item {
        transition: none;
    }
    #carousel-example-1 .carousel-inner .carousel-item-next {
        position: relative;
        transform: translate3d(0, 0, 0);
    }
    /* left or forward direction */
    #carousel-example-1 .active.carousel-item-left + .carousel-item-next.carousel-item-left,
    #carousel-example-1 .carousel-item-next.carousel-item-left + .carousel-item,
    #carousel-example-1 .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    /* farthest right hidden item must be also positioned for animations */
    #carousel-example-1 .carousel-inner .carousel-item-prev.carousel-item-right {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    /* right or prev direction */
    #carousel-example-1 .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
    #carousel-example-1 .carousel-item-prev.carousel-item-right + .carousel-item,
    #carousel-example-1 .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }
}
/* MD */
@media (min-width: 768px) {
    /* show 3rd of 3 item slide */
    #carousel-example-1 .carousel-inner .active + .carousel-item + .carousel-item {
        display: block;
    }
    #carousel-example-1 .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item {
        transition: none;
    }
    #carousel-example-1 .carousel-inner .carousel-item-next {
        position: relative;
        transform: translate3d(0, 0, 0);
    }
    /* left or forward direction */
    #carousel-example-1 .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    /* right or prev direction */
    #carousel-example-1 .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }
}
/* LG */
@media (min-width: 991px) {
    /* show 4th item */
    #carousel-example-1 .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item {
        display: block;
    }
    #carousel-example-1 .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
        transition: none;
    }
    /* Show 5th slide on lg if col-lg-3 */
    #carousel-example-1 .carousel-inner .active.col-lg-3.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -25%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }
    /* left or forward direction */
    #carousel-example-1 .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    /* right or prev direction //t - previous slide direction last item animation fix */
    #carousel-example-1 .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }
}
</style>

<section class="height-90vh py-5 flex-center jarallax" data-dark-overlay="4" style="background: url('<?php echo base_url(); ?>assets/frontend/img/banner.jpg') no-repeat; background-size: cover; background-position: bottom">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 text-white">
        <h1 class="display-lg-3 font-weight-bold text-white wow slideInUp">HCD Guaminí</h1>
        <p class="lead wow slideInUp">Pagina oficial</p>
        <a href="<?php echo base_url(); ?>contacto" class="btn-contacto-home btn btn-lg mt-3 wow slideInUp">Contactanos</a>
      </div>
    </div>
  </div>
</section>

<section>
<main role="main" class="container">
     <div class="title-1">
       <h1>Nuestros representantes</h1>
     </div>
     <!-- Multiple Images -->
       <div class="images-content">
         <div class="container-fluid">
           <div id="carousel-example-1" class="carousel slide" data-ride="carousel">
             <div class="carousel-inner row w-100 mx-auto" role="listbox">
          <?php $i=0;
             foreach ($concejales as $c): ?>
                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 <?php if($i === 0): ?> active  <?php endif; ?> ">
                   <img src="<?php echo base_url(); ?>assets/backend/images/personas/<?php echo $c->foto; ?>" class="img-fluid mx-auto d-block" alt="img1">
                 </div>
                 <?php $i++;
                 endforeach; ?>
             </div>
             <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
         </a>
           </div>
         </div>
       </div>
       <!-- /Multiple Images -->
</section>
<hr>
<div class="title-1">
  <h1>Noticias</h1>
</div>

<!--<section class="section d-flex align-items-center">
  <div class="container">
    <div class="row news-block">
      <?php $i=0; foreach ($noticias as $noti) {
        $i++;
        if($i == 1){ ?>
          <div class="col-md-5">
            <div class="card h-100 text-center pt-3 card-simple">
              <a href="#GO" class="click-overlay"></a>
              <img class="card-img-top w-75 mx-auto" src="<?php echo base_url();?>assets/backend/images/noticias/<?php echo $noti->foto;?>" alt="">
              <div class="card-body">
                <h4 class="card-title"><?php echo $noti->titulo; ?></h4>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="row">
          <?php
        }else{ ?>
              <div class="col-md-4">
                <div class="card text-center pt-3 card-simple">
                  <img class="card-img-top w-75 mx-auto" src="<?php echo base_url();?>assets/backend/images/noticias/<?php echo $noti->foto;?>" alt="">
                  <div class="card-body">
                    <h4 class="card-title">
                      <?php
                        $titulo = strlen($noti->titulo) > 45 ? substr($noti->titulo, 0, 45) . '...' : $noti->titulo;
                       ?>
                       <a href="<?php echo base_url();?>noticia/<?php echo $noti->slug_noticia;?>"> <?php echo $titulo; ?></a>
                    </h4>
                  </div>
                </div>
              </div>
          <?php
        }
      }?>
      </div>
    </div>
    <div class="p-4">

    </div>
    <div class="card shadow-v2 z-index-5">
      <div class="card-header text-white border-bottom-0 bloque-orden-del-dia"><span class="lead font-semiBold text-uppercase"><a href="<?php echo base_url(); ?>noticias">Ver todas las noticias</a></span>
      </div>
    </div>
  </div>
</section> -->



<section class="news-box">
        <div class="container">
            <div class="row">
                  <?php foreach ($noticias as $noti) { ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="thumbnail thumbnail4">
                            <img src="<?php echo base_url();?>assets/backend/images/noticias/<?php echo $noti->foto;?>" alt="">

                            <div class="caption">
                                <h4>
                                      <?php
                                        $titulo = strlen($noti->titulo) > 45 ? substr($noti->titulo, 0, 45) . '...' : $noti->titulo;
                                       ?>
                                       <a href="<?php echo base_url();?>noticia/<?php echo $noti->slug_noticia;?>"> <?php echo $titulo; ?></a>
                                </h4>

                                <p>
                                  <?php
                                    $des = strlen($noti->descripcion) > 65 ? substr($noti->descripcion, 0, 65) . '...' : $noti->descripcion;
                                    echo $des; ?>
                                </p>
                                <a href="<?php echo base_url();?>noticia/<?php echo $noti->slug_noticia;?>" data-title="Read More" class="btn-link"><span>Leer más</span></a>
                            </div>
                        </div>
                    </div>

                    <?php
                  }
                ?>

            </div>
        </div>

    </section>




<section class="padding-y-100">
  <div class="container">
    <div class="card shadow-v2 z-index-5">
      <div class="card-header text-white border-bottom-0 text-center bloque-orden-del-dia"><span class="lead font-semiBold text-uppercase text-center"><a href="<?php echo base_url(); ?>noticias">Ver todas las noticias</a></span>
      </div>
    </div>
    <hr>
    <div class="row">

      <div class="col-lg-8">
        <div class="row align-items-center">
          <div class="col-md-9">
              <h2><small class="d-block text-gray">Buscador de archivos </small> <!--<span class="text-primary">Título</span> nº Dos--></h2>
              <p>Complete los campos necesarios para aplicar los filtros </p>

              <form method="get" action="<?php echo base_url(); ?>documentos">
                  <div class="form-outline">
                    <label for="tipo_documento" class="mt-4">Tipo de documento</label>
                    <select class="form-control" id="tipo_documento" name="tipo_documento">
                        <option value="">Seleccionar...</option>
                        <?php foreach ($tiposDocumentos as $tipoDocumento): ?>
                            <option value="<?php echo $tipoDocumento->id_tipo_documento; ?>"><?php echo $tipoDocumento->tipo_documento; ?></option>
                        <?php endforeach ?>
                    </select>

                    <label for="nro_documento" class="mt-4">Número de documento</label>
                    <input id="nro_documento" name="nro_documento" type="search" class="form-control" />

                    <label for="src" class="mt-4">Buscar por palabra</label>
                    <input id="src" name="src" type="search" class="form-control" />

                    <div class="row">
                        <div class="col-md-6">
                            <label for="f_desde" class="mt-4">Fecha desde (documento)</label>
                            <input id="f_desde" name="f_desde" type="date" class="form-control" />
                        </div>

                        <div class="col-md-6">
                            <label for="f_hasta" class="mt-4">Fecha hasta (documento)</label>
                            <input id="f_hasta" name="f_hasta" type="date" class="form-control" />
                        </div>
                    </div>

                    <button id="search-button" type="submit" class="btn btn-lg btn-block mt-4 btn-contacto-home">
                      <i class="fas fa-search"></i> Buscar
                    </button>
                  </div>
              </form>

            </div>


          </div>
        </div>


        <div class="col-lg-4 mt-5 mt-md-0">


          <div class="card shadow-v2 z-index-5">
            <div class="card-header text-white border-bottom-0 bloque-orden-del-dia"><span class="lead font-semiBold text-uppercase">Orden del día</span>
            </div>

            <?php foreach ($ultimosDocumentosSesionDeldia as $documento): ?>
              <div class="p-4 border-bottom wow fadeInUp">
                <p class="text-custom mb-1"><?php echo date('d/m/Y', strtotime($documento->fecha_documento)); ?></p><a href="<?php echo base_url(); ?>documento/<?php echo $documento->slug_documento; ?>"><?php echo $documento->titulo; ?></a>
                <br><br>

                <p><?php

                $descripcion = strlen($documento->descripcion) > 50 ? substr($documento->descripcion, 0, 50) . '...' : $documento->descripcion;

                echo $descripcion;

                ?></p>
              </div>
            <?php endforeach ?>

            <div class="p-4"><a href="<?php echo base_url(); ?>ordenes-del-dia" class="btn text-custom pl-0">Ver todo</a>
            </div>

          </div>
        </div>
      </div>
      <!-- END row--></div><!-- END container-->

    </section>

    <section style="padding-bottom: 80px">
      <div class="container">
        <div>
          El Concejo Deliberante se compone de doce (12) concejales – esto se calcula por la cantidad de habitantes del partido según (Capítulo I – Art. 2º de la Ley Orgánica de las Municipalidades), elegidos por el voto popular, por un período de cuatro (4) años, y se renueva por mitades cada dos años y podrán ser reelectos..
          Estos concejales eligen entre sus pares sus autoridades (Presidente, Vicepresidente 1° y Vicepresidente 2°), y a propuesta de los distintos Bloque Políticos el Secretario.
        </div><br><br>

        <div class="row">
            <?php foreach ($listadoBloques as $bloque) { ?>

                <?php if ($bloque->cantidadConcejales != 0): ?>

                    <?php if ($bloque->cantidadConcejales > 11) { ?>
                        <?php $porcentaje = 100; ?>
                    <?php } else { ?>
                        <?php $porcentaje = number_format(($bloque->cantidadConcejales * 100) / 12, 2); ?>
                    <?php } ?>

                    <div class="col-lg-6">
                        <label><b><?php echo $bloque->nombre_bloque; ?></b></label>
                            <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: <?php echo $porcentaje; ?>%; background-color: #<?php echo $bloque->color_representativo; ?>" aria-valuenow="<?php echo $porcentaje; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $porcentaje; ?>%</div>
                        </div>
                    </div>

                <?php endif ?>

            <?php } ?>
        </div>

    </div>
  </section>


<script>

/*
    Carousel Images
*/
$('#carousel-example-1').on('slide.bs.carousel', function (e) {
    /*
        CC 2.0 License Iatek LLC 2018 - Attribution required
    */
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 5;
    var totalItems = $('#carousel-example-1 .carousel-item').length;

    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('#carousel-example-1 .carousel-item').eq(i).appendTo('#carousel-example-1 .carousel-inner');
            }
            else {
                $('#carousel-example-1 .carousel-item').eq(0).appendTo('#carousel-example-1 .carousel-inner');
            }
        }
    }
});



</script>
