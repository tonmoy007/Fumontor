</div>

<!-- Start FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner footerInLineCss">
        2015 &copy; Binary Craft. All Rights Reserved.
    </div>
    
        <span class="cd-top">
        </span>
    

<!-- End FOOTER -->
<!-- Start Javasceipt -->
<!-- Start Common Script For All System -->
</div>
    <script src="assets/js/jquery.confirm.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/ripples.min.js"></script>
    <script src="assets/js/material.min.js"></script>
    <script src="assets/js/backToTop.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script type="text/javascript" src="assets/js/addtoCart.js"></script>

    
    
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            
        $(window).scroll(function(){
          if ($(this).scrollTop() > 95) {
              $('#scrollFixNav').addClass('fixed');
              $('#right-nav').addClass('pull-upon');

              $('.component-container').css('margin-top', '75px');
              $('#cd-cart').css('margin-top','-25px');
          } else {
              $('#scrollFixNav').removeClass('fixed');
              $('#right-nav').removeClass('pull-upon');
              $('.component-container').css('margin-top', '0');
              $('#cd-cart').css('margin-top','0');
          }
        });

        });
    </script>
    <script>
//     jQuery(document).ready(function() {
// //here is auto reload after 1 second for time and date in the top
//         jQuery(setInterval(function() {
//             jQuery("#result").load("index.php/home/iceTime");
//         }, 1000));
//         });
//      </script>

</body>