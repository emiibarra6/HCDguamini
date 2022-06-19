<div class="py-5 bg-cover" data-dark-overlay="6" style="background: url('assets/img/1920/658_2.jpg') no-repeat">
   <div class="container"><h2 class="text-white">Contacto</h2><ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0"><li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Inicio</a></li><li class="breadcrumb-item">Contacto</li></ol>
   </div>
</div>
<div class="py-5 shadow-v2 position-relative">
   <div class="container">
   <div class="row">
   <div class="col-lg-4 col-md-6 mt-4">
   <div class="media"><span class="iconbox iconbox-md bg-custom text-white"><i class="ti-mobile"></i></span>
   <div class="media-body ml-3"><h5 class="mb-0">02929-432006</h5><p>Horario de atención (07AM-13PM)</p>
   </div>
</div>
</div>
<div class="col-lg-4 col-md-6 mt-4">
   <div class="media"><span class="iconbox iconbox-md bg-custom text-white"><i class="ti-email"></i></span>
   <div class="media-body ml-3"><a href="mailto:secretaria@hcdguamini.com" class="h5">secretaria@hcdguamini.com</a><p>Horario de atención (07AM-13PM)</p>
   </div>
</div>
</div>
<div class="col-lg-4 col-md-6 mt-4">
   <div class="media"><span class="iconbox iconbox-md bg-custom text-white"><i class="ti-location-pin"></i></span>
   <div class="media-body ml-3"><h5 class="mb-0">Plaza alsina s/n - Guaminí</h5><p>Provincia de Buenos Aires</p>
   </div>
</div>
</div>
</div>
</div>
</div>

<section class="padding-y-100 bg-light-v2">
   <div class="container">
   <div class="row">
   <div class="col-12 text-center mb-5"><h2>Formulario de Contacto</h2>
   <div class="width-4rem height-4 bg-custom my-2 mx-auto rounded">
   </div>
</div>
<div class="col-12 text-center">
   <form action="<?php echo base_url(); ?>frontend/pagina/enviarConsulta" id="formulario-envio-mensaje" method="POST" class="card p-4 p-md-5 shadow-v1">
      <!--<p class="lead mt-2">Investig tiones demons travge wunt ectores legere lkurus quod legunt saepiu clear<br>tasest consectetur adipi sicing elitsed eusmod tempor cididunt.</p>-->
   <div class="row mt-5 mx-0">
   <div class="col-md-4 mb-4"><input type="text" class="form-control" name="nombre" placeholder="Nombre">
   </div>
<div class="col-md-4 mb-4"><input type="email" class="form-control" name="email" placeholder="Email">
</div>
<div class="col-md-4 mb-4"><input type="text" class="form-control" name="telefono" placeholder="Teléfono">
</div>

<div class="col-12">
   <textarea class="form-control" name="consulta" placeholder="Mensaje" rows="7"></textarea>



</div>
<button type="submit" id="btn-envio-mensaje" class="btn btn-contacto-home mt-4">Enviar Mensaje</button>
</div>
</form>
</div>
</div><!-- END row-->
</div><!-- END container-->
</section>