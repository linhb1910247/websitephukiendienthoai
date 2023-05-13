<footer class="site-footer custom-border-top">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promo</h3>
            <h5 class="block-6">
              <img src="<?php echo BASE_URL ?>/public/images/about_1.jpg" alt="Image placeholder" class="img-fluid rounded mb-4">
              
            </a>
          </div>
          <div class="col-lg-5 ml-auto mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Cooperate</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><h5>Fast ship</h5></li>
                  <li><h5>Sale ship</h5></li>
                  <li><h5>Ninja van</h5></li>
                  <li><h5>Best shipper</h5></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><h5>Momo</h5></li>
                  <li><h5>Zalo pay</h5></li>
                  <li><h5>Vn pay</h5></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><h5>Sacombank</h5></li>
                  <li><h5>Agribank</h5></li>
                  <li><h5>Vietinbank</h5></li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4" style="margin-left: 28px;">Contact Info</h3>
              <ul class="list-unstyled">
                <li><h5>58 To Huu - Thanh Xuan - Ha Noi</h5></li>
                <li><h5>092456789</h5></li>
                <li><h5>Khiem@gmail.com</h5></li>
              </ul>
            </div>
          </div>
        </div>
     
      </div>
    </footer>
  </div>

  <script src="<?php echo BASE_URL ?>/public/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo BASE_URL ?>/public/js/jquery-ui.js"></script>
  <script src="<?php echo BASE_URL ?>/public/js/popper.min.js"></script>
  <script src="<?php echo BASE_URL ?>/public/js/bootstrap.min.js"></script>
  <script src="<?php echo BASE_URL ?>/public/js/owl.carousel.min.js"></script>
  <script src="<?php echo BASE_URL ?>/public/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo BASE_URL ?>/public/js/aos.js"></script>
 <script src="<?php echo BASE_URL ?>/public/js/main.js"></script>
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "115707164838865");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v16.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>  </body>
</html>