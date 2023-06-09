<?php
$theme = get_bloginfo("template_url");
?>

<footer>
  <div class="bg-blue-2 py-awe-32"></div>
  <div class="bg-blue-3 d-flex justify-content-center py-awe-16" id="footer">
    <a href="https://agenciaweb.ifrn.edu.br/" target="_blank">
      <img src="<?= $theme; ?>/dist/img/svg/logo-awe.svg" alt="logo da awe">
    </a>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="<?= $theme; ?>/dist/js/plugins/swiper-bundle.min.js"></script>
<script src="<?= $theme; ?>/dist/js/plugins/owl.carousel.min.js"></script>
<script src="<?= $theme; ?>/dist/js/plugins/bootstrap.bundle.min.js"></script>
<script src="<?= $theme; ?>/dist/js/index.js"></script>
<?php wp_footer(); ?>

</body>

</html>