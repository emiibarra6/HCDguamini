<style media="screen">
#a:hover {
color: white !important;
}
</style>

<header class="site-header text-white-0_5">
   <div class="container">
      <div class="row align-items-center justify-content-between mx-0">
         <ul class="list-inline d-none d-lg-block mb-0">
            <li class="list-inline-item mr-3">
               <div class="d-flex align-items-center"><i class="ti-email mr-2"></i> <a id="a" href="#">secretaria@hcdguamini.com</a>
               </div>
            </li>
            <li class="list-inline-item mr-3">
               <div class="d-flex align-items-center"><i class="ti-headphone mr-2"></i> <a id="a" href="tel:02929432006">02929-432006</a>
               </div>
            </li>
         </ul>
      </div><!-- END END row-->
   </div><!-- END container-->
</header>

<nav class="ec-nav sticky-top bg-white">
   <div class="container">
      <div class="navbar p-0 navbar-expand-lg">
         <div class="navbar-brand"><a class="logo-default" href="<?php echo base_url(); ?>"><img alt="" src="<?php echo base_url(); ?>assets/frontend/img/escudo2.png" style="width: 100px; "></a>
         </div>

         <span aria-expanded="false" class="navbar-toggler ml-auto collapsed" data-target="#ec-nav__collapsible" data-toggle="collapse">
            <div class="hamburger hamburger--spin js-hamburger">
               <div class="hamburger-box">
                  <div class="hamburger-inner"></div>
               </div>
            </div>
         </span>

         <div class="collapse navbar-collapse when-collapsed" id="ec-nav__collapsible">
            <ul class="nav navbar-nav ec-nav__navbar ml-auto">
            <li class="nav-item"><a class="nav-link <?php if (isset($menu) && $menu == 'Inicio') { echo 'custom-active-menu'; } ?>" href="<?php echo base_url(); ?>">Inicio</a>
            </li>

            <li class="nav-item"><a class="nav-link <?php if (isset($menu) && $menu == 'Salamone') { echo 'custom-active-menu'; } ?>" href="<?php echo base_url(); ?>salamone">Salamone</a>
            </li>

   <li class="nav-item nav-item__has-dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Institucional</a>
      <ul class="dropdown-menu">
      <li><a href="<?php echo base_url(); ?>institucional" class="nav-link__list <?php if (isset($menu) && $menu == 'Institucional') { echo 'custom-active-menu'; } ?>">Institucional</a></li>
      <li><a href="<?php echo base_url(); ?>autoridades" class="nav-link__list <?php if (isset($menu) && $menu == 'Autoridades') { echo 'custom-active-menu'; } ?>">Autoridades</a></li>
      <li><a href="<?php echo base_url(); ?>comisiones" class="nav-link__list <?php if (isset($menu) && $menu == 'Comisiones internas HCD') { echo 'custom-active-menu'; } ?>">Comisiones internas</a></li>
      <li class="nav-item__has-dropdown"><a class="nav-link__list dropdown-toggle" href="#" data-toggle="dropdown">Bloques</a>
         <div class="dropdown-menu">
            <ul class="list-unstyled">
                <?php foreach ($listadoBloques as $bloque) { ?>
                   <li><a class="nav-link__list" href="<?php echo base_url(); ?>bloque/<?php echo $bloque->slug_bloque; ?>"><?php echo $bloque->nombre_bloque; ?></a></li>
                <?php  } ?>
            </ul>
         </div></li>


      <li><a href="<?php echo base_url(); ?>assets/backend/images/static_documents/reglamento.pdf" target="_blank" class="nav-link__list">Reglamento interno</a></li>
      <li><a href="<?php echo base_url(); ?>assets/backend/images/static_documents/ley-organica.pdf" class="nav-link__list" target="_blank">Ley orgánica de las Municipalidades</a></li>
      </ul></li>

   <li class="nav-item nav-item__has-dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Sesiones</a>
      <div class="dropdown-menu">
         <ul class="list-unstyled">
            <li><a class="nav-link__list" href="<?php echo base_url(); ?>ordenes-del-dia">Orden del día</a></li>
   </ul>
   </div></li>

   <li class="nav-item"><a class="nav-link <?php if (isset($menu) && $menu == 'Documentos') { echo 'custom-active-menu'; } ?>" href="<?php echo base_url(); ?>documentos">Documentos</a>
    </li>

      <li class="nav-item nav-item__has-megamenu"><a class="nav-link <?php if (isset($menu) && $menu == 'Contacto') { echo 'custom-active-menu'; } ?>" href="<?php echo base_url(); ?>contacto" >Contacto</a>
      </li>

      <li class="nav-item nav-item__has-megamenu"><a class="nav-link <?php if (isset($menu) && $menu == 'Contacto') { echo 'custom-active-menu'; } ?>" href="https://www.youtube.com/channel/UC4Hg2j7EkQSF59dOlYJlZug" target="_blank" ><i class="fa fa-youtube-play" aria-hidden="true">¡Visita nuestro canal de YouTube!</i></a>
      </li>

   </ul>
   </div>

      </div>
      </div><!-- END container--></nav>
