<footer class="site-footer">
   <div class="footer-top bg-dark text-white-0_6 pt-5 paddingBottom-100">
      <div class="container">
        </div><!-- END container-->
         </div><!-- END footer-top--><div class="footer-bottom bg-black-0_9 py-5 text-center">
            <div class="container"><p class="text-white-0_5 mb-0">&copy; 2021 Honorable Concejo Deliberante. </p>
         </div>
         </div>
</footer>

<div class="scroll-top"><i class="ti-angle-up"></i></div>

<script src="<?php echo base_url(); ?>assets/frontend/js/vendors.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/app.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

<?php if (isset($scripts) && !empty($scripts)): ?>
    <?php foreach ($scripts as $script): ?>
        <script src="<?php echo base_url(); ?>assets/frontend/js/funciones/<?php echo $script; ?>"></script>
    <?php endforeach ?>
<?php endif ?>

</body>
</html>
