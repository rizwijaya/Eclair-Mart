<footer class="bg-dark text-white">
  <div class="container py-4">
    <div class="row py-5">
      <div class="col-md-4 mb-3 mb-md-0">
        <h6 class="text-uppercase mb-3">Eclair - Mart</h6>
        <ul class="list-unstyled mb-0">
          <li><a class="footer-link" href="<?= base_url() ?>home/aboutredir">About Us</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-3 mb-md-0">
        <h6 class="text-uppercase mb-3">Contact Us</h6>
        <ul class="list-unstyled mb-0">
          <li><a class="footer-link" href="#">Jl. Keputih</a></li>
          <li><a class="footer-link" href="#">Surabaya, SBY 61243</a></li>
          <li><a class="footer-link" href="#">Indonesia</a></li>
          <li><a class="footer-link" href="#"><strong>Phone :</strong> +62 5589 55488 55</a></li>
          <li><a class="footer-link" href="#"><strong>Email :</strong> eclairmart@gmail.com</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h6 class="text-uppercase mb-3">Social media</h6>
        <ul class="list-unstyled mb-0">
          <li><a class="footer-link" href="#">Twitter</a></li>
          <li><a class="footer-link" href="#">Instagram</a></li>
          <li><a class="footer-link" href="#">Tumblr</a></li>
          <li><a class="footer-link" href="#">Pinterest</a></li>
        </ul>
      </div>
    </div>
    <div class="border-top pt-4" style="border-color: #1d1d1d !important">
      <div class="row">
      </div>
    </div>
  </div>
</footer>
<!-- JavaScript files-->
<script src="<?php echo base_url(); ?>/assets/assets_home/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/assets_home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/assets_home/vendor/lightbox2/js/lightbox.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/assets_home/vendor/nouislider/nouislider.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/assets_home/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/assets_home/vendor/owl.carousel2/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/assets_home/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/assets_home/js/front.js"></script>
<script>
  // ------------------------------------------------------- //
  //   Inject SVG Sprite - 
  //   see more here 
  //   https://css-tricks.com/ajaxing-svg-sprite/
  // ------------------------------------------------------ //
  function injectSvgSprite(path) {

    var ajax = new XMLHttpRequest();
    ajax.open("GET", path, true);
    ajax.send();
    ajax.onload = function(e) {
      var div = document.createElement("div");
      div.className = 'd-none';
      div.innerHTML = ajax.responseText;
      document.body.insertBefore(div, document.body.childNodes[0]);
    }
  }
  // this is set to BootstrapTemple website as you cannot 
  // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
  // while using file:// protocol
  // pls don't forget to change to your domain :)
  injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
</script>
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</div>
</body>

</html>