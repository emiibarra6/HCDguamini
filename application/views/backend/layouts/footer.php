<!-- Footer START -->
     <footer class="content-footer">
        <div class="footer">
            <div class="copyright">
                <span>Copyright © 2021 <b class="text-dark">Consejo Guamini</b>. Todos los derechos reservados.</span>
            </div>
        </div>
    </footer>
    <!-- Footer END -->
</div>
<!-- Page Container END -->
</div>
</div>

<script>
    var base_url = '<?php echo base_url(); ?>';
</script>
<script src="<?php echo base_url(); ?>assets/backend/js/vendor.js"></script>

    <!-- page plugins js -->
    <script src="<?php echo base_url(); ?>assets/backend/vendors/bower-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/maps/jquery-jvectormap-us-aea.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/vendors/d3/d3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/vendors/nvd3/build/nv.d3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/vendors/jquery.sparkline/index.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/vendors/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/fileUpload.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/jscolor.js"></script>

    <!-- funciones -->
    <?php if (isset($scripts) && !empty($scripts)): ?>
        <?php foreach ($scripts as $key => $script): ?>
            <script src="<?php echo base_url(); ?>assets/backend/js/funciones/<?php echo $script; ?>"></script>
        <?php endforeach ?>
    <?php endif ?>

    <!-- page js -->
    <script src="<?php echo base_url(); ?>assets/backend/js/dashboard/dashboard.js"></script>
</body>
</html>