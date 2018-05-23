<?php
if(!isset($_SESSION['page']))
{
    $_SESSION['page']='home';
}

if(isset($_GET['page']))
{
    $_SESSION['page']=$_GET['page'];
}

switch($_SESSION['page'])
{
  case 'home':
  ?>
      <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
  <!-- password-script -->
  <script type="text/javascript">
    window.onload = function () {
      document.getElementById("password1").onchange = validatePassword;
      document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
      var pass2 = document.getElementById("password2").value;
      var pass1 = document.getElementById("password1").value;
      if (pass1 != pass2)
        document.getElementById("password2").setCustomValidity("Passwords Don't Match");
      else
        document.getElementById("password2").setCustomValidity('');
      //empty string means no validation error
    }
  </script>
  <!-- //password-script -->

  <!-- //js -->
  <script src="js/bars.js"></script>

  <script type="text/javascript" src="js/jquery.slicebox.js"></script>
  <script type="text/javascript">
    $(function () {

      var Page = (function () {

        var $navArrows = $('#nav-arrows').hide(),
          $navDots = $('#nav-dots').hide(),
          $nav = $navDots.children('span'),
          $shadow = $('#shadow').hide(),
          slicebox = $('#sb-slider').slicebox({
            onReady: function () {

              $navArrows.show();
              $navDots.show();
              $shadow.show();

            },
            onBeforeChange: function (pos) {

              $nav.removeClass('nav-dot-current');
              $nav.eq(pos).addClass('nav-dot-current');

            }
          }),

          init = function () {

            initEvents();

          },
          initEvents = function () {

            // add navigation events
            $navArrows.children(':first').on('click', function () {

              slicebox.next();
              return false;

            });

            $navArrows.children(':last').on('click', function () {

              slicebox.previous();
              return false;

            });

            $nav.each(function (i) {

              $(this).on('click', function (event) {

                var $dot = $(this);

                if (!slicebox.isActive()) {

                  $nav.removeClass('nav-dot-current');
                  $dot.addClass('nav-dot-current');

                }

                slicebox.jump(i + 1);
                return false;

              });

            });

          };

        return {
          init: init
        };

      })();

      Page.init();

    });
  </script>
  <!-- Stats -->
  <script src="js/waypoints.min.js"></script>
  <script src="js/counterup.min.js"></script>
  <script>
    jQuery(document).ready(function ($) {
      $('.counter').counterUp({
        delay: 10,
        time: 2000
      });
    });
  </script>
  <!-- //Stats -->

  <script type="text/javascript" src="js/jquery.flexisel.js"></script>
  <!-- flexisel -->
  <script type="text/javascript">
    $(window).load(function () {
      $("#flexiselDemo1").flexisel({
        visibleItems: 4,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
          portrait: {
            changePoint: 480,
            visibleItems: 1
          },
          landscape: {
            changePoint: 640,
            visibleItems: 2
          },
          tablet: {
            changePoint: 768,
            visibleItems: 2
          }
        }
      });

    });
  </script>
  <!-- //flexisel -->
  <!-- //flexisel -->
  <!-- js for portfolio lightbox -->
  <script src="js/jquery.chocolat.js "></script>
  <!-- //menu -->
  <!-- for bootstrap working -->
  <script src="js/bootstrap.js"></script>
  <!-- //for bootstrap working -->
  <!-- start-smoth-scrolling -->
  <script type="text/javascript" src="js/move-top.js"></script>
  <script type="text/javascript" src="js/easing.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({
          scrollTop: $(this.hash).offset().top
        }, 1000);
      });
    });
  </script>
  <!-- start-smoth-scrolling -->
  <!-- here stars scrolling icon -->
  <script type="text/javascript">
    $(document).ready(function () {
      /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
      */

      $().UItoTop({
        easingType: 'easeOutQuart'
      });

    });
  </script>
  <?php
    break;
  case 'interior_port':
  ?>
      <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
  <!-- password-script -->
  <script type="text/javascript">
    window.onload = function () {
      document.getElementById("password1").onchange = validatePassword;
      document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
      var pass2 = document.getElementById("password2").value;
      var pass1 = document.getElementById("password1").value;
      if (pass1 != pass2)
        document.getElementById("password2").setCustomValidity("Passwords Don't Match");
      else
        document.getElementById("password2").setCustomValidity('');
      //empty string means no validation error
    }
  </script>
  <!-- //password-script -->

  <!-- //js -->
  <script src="js/bars.js"></script>

  <script type="text/javascript" src="js/jquery.slicebox.js"></script>
  <script type="text/javascript">
    $(function () {

      var Page = (function () {

        var $navArrows = $('#nav-arrows').hide(),
          $navDots = $('#nav-dots').hide(),
          $nav = $navDots.children('span'),
          $shadow = $('#shadow').hide(),
          slicebox = $('#sb-slider').slicebox({
            onReady: function () {

              $navArrows.show();
              $navDots.show();
              $shadow.show();

            },
            onBeforeChange: function (pos) {

              $nav.removeClass('nav-dot-current');
              $nav.eq(pos).addClass('nav-dot-current');

            }
          }),

          init = function () {

            initEvents();

          },
          initEvents = function () {

            // add navigation events
            $navArrows.children(':first').on('click', function () {

              slicebox.next();
              return false;

            });

            $navArrows.children(':last').on('click', function () {

              slicebox.previous();
              return false;

            });

            $nav.each(function (i) {

              $(this).on('click', function (event) {

                var $dot = $(this);

                if (!slicebox.isActive()) {

                  $nav.removeClass('nav-dot-current');
                  $dot.addClass('nav-dot-current');

                }

                slicebox.jump(i + 1);
                return false;

              });

            });

          };

        return {
          init: init
        };

      })();

      Page.init();

    });
  </script>
  <!-- Stats -->
  <script src="js/waypoints.min.js"></script>
  <script src="js/counterup.min.js"></script>
  <script>
    jQuery(document).ready(function ($) {
      $('.counter').counterUp({
        delay: 10,
        time: 2000
      });
    });
  </script>
  <!-- //Stats -->

  <script type="text/javascript" src="js/jquery.flexisel.js"></script>
  <!-- flexisel -->
  <script type="text/javascript">
    $(window).load(function () {
      $("#flexiselDemo1").flexisel({
        visibleItems: 4,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
          portrait: {
            changePoint: 480,
            visibleItems: 1
          },
          landscape: {
            changePoint: 640,
            visibleItems: 2
          },
          tablet: {
            changePoint: 768,
            visibleItems: 2
          }
        }
      });

    });
  </script>
  <!-- //flexisel -->
  <!-- //flexisel -->
  <!-- js for portfolio lightbox -->
  <script src="js/jquery.chocolat.js "></script>
  <!-- //menu -->
  <!-- for bootstrap working -->
  <script src="js/bootstrap.js"></script>
  <!-- //for bootstrap working -->
  <!-- start-smoth-scrolling -->
  <script type="text/javascript" src="js/move-top.js"></script>
  <script type="text/javascript" src="js/easing.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({
          scrollTop: $(this.hash).offset().top
        }, 1000);
      });
    });
  </script>
  <!-- start-smoth-scrolling -->
  <!-- here stars scrolling icon -->
  <script type="text/javascript">
    $(document).ready(function () {
      /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
      */

      $().UItoTop({
        easingType: 'easeOutQuart'
      });

    });
  </script>
  <?php
    break;
  case 'homes':
  ?>
      <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="json/jquery-1.11.0.js"></script>
      <script src="json/jquery-1.11.3.min.js"></script>
      <script src="json/gentel.js"></script>
      
  <?php
    break;
    case 'rooms':
    ?>
       <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
        <!-- //js -->
          

        <script src="js/bars.js"></script>
        <!-- pop-up-box -->    
          <link href="css/popuo-box.css" rel="stylesheet" type="text/css" property="" media="all" />
          <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
        <!--//pop-up-box -->
        <div id="small-dialog" class="mfp-hide">
          <iframe src="https://player.vimeo.com/video/67001156"></iframe>
        </div>
        <script>
          $(document).ready(function() {
          $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
          });
                                          
          });
        </script>

        <!-- for bootstrap working -->
          <script src="js/bootstrap.js"></script>
        <!-- //for bootstrap working -->
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
          jQuery(document).ready(function($) {
            $(".scroll").click(function(event){   
              event.preventDefault();
              $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
          });
        </script>
        <!-- start-smoth-scrolling -->
        <!-- here stars scrolling icon -->
          <script type="text/javascript">
            $(document).ready(function() {
              /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
              */
                        
              $().UItoTop({ easingType: 'easeOutQuart' });
                        
              });
          </script>       
    <?php
    break;
    case 'interiorDesignPage':
    ?>
       <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
        <!-- //js -->
          

        <script src="js/bars.js"></script>
        <!-- pop-up-box -->    
          <link href="css/popuo-box.css" rel="stylesheet" type="text/css" property="" media="all" />
          <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
        <!--//pop-up-box -->
        <div id="small-dialog" class="mfp-hide">
          <iframe src="https://player.vimeo.com/video/67001156"></iframe>
        </div>
        <script>
          $(document).ready(function() {
          $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
          });
                                          
          });
        </script>

        <!-- for bootstrap working -->
          <script src="js/bootstrap.js"></script>
        <!-- //for bootstrap working -->
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
          jQuery(document).ready(function($) {
            $(".scroll").click(function(event){   
              event.preventDefault();
              $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
          });
        </script>
        <!-- start-smoth-scrolling -->
        <!-- here stars scrolling icon -->
          <script type="text/javascript">
            $(document).ready(function() {
              /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
              */
                        
              $().UItoTop({ easingType: 'easeOutQuart' });
                        
              });
          </script>       
    <?php
    break;
    case 'architecture':
    ?>
       <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
        <!-- //js -->
          <script src="json/jquery-1.11.0.js"></script>
          <script src="json/jquery-1.11.3.min.js"></script>
          <script src="json/gentel.js"></script>

        <script src="js/bars.js"></script>
        <!-- pop-up-box -->    
          <link href="css/popuo-box.css" rel="stylesheet" type="text/css" property="" media="all" />
          <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
        <!--//pop-up-box -->
        <div id="small-dialog" class="mfp-hide">
          <iframe src="https://player.vimeo.com/video/67001156"></iframe>
        </div>
        <script>
          $(document).ready(function() {
          $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
          });
                                          
          });
        </script>

        <!-- for bootstrap working -->
          <script src="js/bootstrap.js"></script>
        <!-- //for bootstrap working -->
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
          jQuery(document).ready(function($) {
            $(".scroll").click(function(event){   
              event.preventDefault();
              $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
          });
        </script>
        <!-- start-smoth-scrolling -->
        <!-- here stars scrolling icon -->
          <script type="text/javascript">
            $(document).ready(function() {
              /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
              */
                        
              $().UItoTop({ easingType: 'easeOutQuart' });
                        
              });
          </script>       
    <?php
    break;
    case 'architectAccomplishedProject':
  ?>
  <!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
<!-- //js -->
  <!-- password-script -->
  <script type="text/javascript">
    window.onload = function () {
      document.getElementById("password1").onchange = validatePassword;
      document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
      var pass2 = document.getElementById("password2").value;
      var pass1 = document.getElementById("password1").value;
      if (pass1 != pass2)
        document.getElementById("password2").setCustomValidity("Passwords Don't Match");
      else
        document.getElementById("password2").setCustomValidity('');
      //empty string means no validation error
    }
  </script>
  <!-- //password-script -->

<!-- //flexisel -->
  <!-- js for portfolio lightbox -->
  <script src="js/jquery.chocolat.js "></script>
  <link rel="stylesheet " href="css/chocolat.css " type="text/css " media="screen ">
  <!--light-box-files -->
  <script type="text/javascript ">
    $(function () {
      $('.w3_agileits_evets_text_img a').Chocolat();
    });
  </script>
  <!-- /js for portfolio lightbox -->
<!-- //menu -->
<!-- for bootstrap working -->
  <script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
  });
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
  <script type="text/javascript">
    $(document).ready(function() {
      /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
      */
                
      $().UItoTop({ easingType: 'easeOutQuart' });
                
      });
  </script>
<!-- //here ends scrolling icon -->

  <?php
    break;
  case 'allArchitects':
  ?>
  <!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
<!-- //js -->
  <!-- password-script -->
  <script type="text/javascript">
    window.onload = function () {
      document.getElementById("password1").onchange = validatePassword;
      document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
      var pass2 = document.getElementById("password2").value;
      var pass1 = document.getElementById("password1").value;
      if (pass1 != pass2)
        document.getElementById("password2").setCustomValidity("Passwords Don't Match");
      else
        document.getElementById("password2").setCustomValidity('');
      //empty string means no validation error
    }
  </script>
  <!-- //password-script -->

<!-- //flexisel -->
  <!-- js for portfolio lightbox -->
  <script src="js/jquery.chocolat.js "></script>
  <link rel="stylesheet " href="css/chocolat.css " type="text/css " media="screen ">
  <!--light-box-files -->
  <script type="text/javascript ">
    $(function () {
      $('.w3_agileits_evets_text_img a').Chocolat();
    });
  </script>
  <!-- /js for portfolio lightbox -->
<!-- //menu -->
<!-- for bootstrap working -->
  <script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
  });
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
  <script type="text/javascript">
    $(document).ready(function() {
      /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
      */
                
      $().UItoTop({ easingType: 'easeOutQuart' });
                
      });
  </script>
<!-- //here ends scrolling icon -->
<?php
    break;
  case 'allInteriorDesigners':
  ?>
  <!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
<!-- //js -->
  <!-- password-script -->
  <script type="text/javascript">
    window.onload = function () {
      document.getElementById("password1").onchange = validatePassword;
      document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
      var pass2 = document.getElementById("password2").value;
      var pass1 = document.getElementById("password1").value;
      if (pass1 != pass2)
        document.getElementById("password2").setCustomValidity("Passwords Don't Match");
      else
        document.getElementById("password2").setCustomValidity('');
      //empty string means no validation error
    }
  </script>
  <!-- //password-script -->

<!-- //flexisel -->
  <!-- js for portfolio lightbox -->
  <script src="js/jquery.chocolat.js "></script>
  <link rel="stylesheet " href="css/chocolat.css " type="text/css " media="screen ">
  <!--light-box-files -->
  <script type="text/javascript ">
    $(function () {
      $('.w3_agileits_evets_text_img a').Chocolat();
    });
  </script>
  <!-- /js for portfolio lightbox -->
<!-- //menu -->
<!-- for bootstrap working -->
  <script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
  });
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
  <script type="text/javascript">
    $(document).ready(function() {
      /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
      */
                
      $().UItoTop({ easingType: 'easeOutQuart' });
                
      });
  </script>
  <?php
    break;
  case 'top_rated_builders':
  ?>
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
<!-- //js -->
  <!-- password-script -->
  <script type="text/javascript">
    window.onload = function () {
      document.getElementById("password1").onchange = validatePassword;
      document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
      var pass2 = document.getElementById("password2").value;
      var pass1 = document.getElementById("password1").value;
      if (pass1 != pass2)
        document.getElementById("password2").setCustomValidity("Passwords Don't Match");
      else
        document.getElementById("password2").setCustomValidity('');
      //empty string means no validation error
    }
  </script>
  <!-- //password-script -->

<script src="js/bars.js"></script>
<!-- pop-up-box -->    
  <link href="css/popuo-box.css" rel="stylesheet" type="text/css" property="" media="all" />
  <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<!--//pop-up-box -->
<div id="small-dialog" class="mfp-hide">
  <iframe src="https://player.vimeo.com/video/67001156"></iframe>
</div>
<script>
  $(document).ready(function() {
  $('.popup-with-zoom-anim').magnificPopup({
    type: 'inline',
    fixedContentPos: false,
    fixedBgPos: true,
    overflowY: 'auto',
    closeBtnInside: true,
    preloader: false,
    midClick: true,
    removalDelay: 300,
    mainClass: 'my-mfp-zoom-in'
  });
                                  
  });
</script>

<!-- for bootstrap working -->
  <script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
  });
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
  <script type="text/javascript">
    $(document).ready(function() {
      /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
      */
                
      $().UItoTop({ easingType: 'easeOutQuart' });
                
      });
  </script>
  <?php
    break;
    case 'postProject':
  ?>
    <script src="json/jquery-1.11.0.js"></script>
    <script src="json/jquery-1.11.3.min.js"></script>
    <script src="json/gentel.js"></script>

    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
   
      <script src="js/bootstrap.js"></script>

  <?php
  break;
  case 'projectDetails':
  ?>
   <script src="js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript"></script>

  <?php
  break;
  case 'archi_page':
  ?>
   <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <!--//pop-up-box -->
    <div id="small-dialog" class="mfp-hide">
      <!--iframe src="https://player.vimeo.com/video/67001156"></iframe-->
    </div>
    <script>
      $(document).ready(function() {
      $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
      });
                                      
      });
    </script>

    <!-- for bootstrap working -->
      <script src="js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>

  <?php
  break;
  case 'interior_page':
  ?>
   <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <!--//pop-up-box -->
    <div id="small-dialog" class="mfp-hide">
      <!--iframe src="https://player.vimeo.com/video/67001156"></iframe-->
    </div>
    <script>
      $(document).ready(function() {
      $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
      });
                                      
      });
    </script>

    <!-- for bootstrap working -->
      <script src="js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>

  <?php
  break;
  case 'signup':
  ?>
    <script src="js/bootstrap.js"></script>
  <?php
    break; 
    case 'findArchitect':
  ?>
    <script src="js/bootstrap.js"></script>
  <?php
    break; 
    case 'budget':
  ?>
    <script src="js/bootstrap.js"></script>
  <?php
    break;
    case 'findInterior':
  ?>
    <script src="js/bootstrap.js"></script>


  <?php
    break; 
    case 'viewOnMapArchitect':
  ?>
    <script src="js/bootstrap.js"></script>

  <?php
    break; 
    case 'viewOnMapInterior':
  ?>
    <script src="js/bootstrap.js"></script>

  <?php
    break; 
    case 'architect_signup':
  ?>
    <script src="js/bootstrap.js"></script>

    <script src="json/jquery-1.11.0.js"></script>
    <script src="json/jquery-1.11.3.min.js"></script>
    <script src="json/gentel.js"></script>

    
  <?php
    break; 
    case 'signup_contractor':
  ?>
    <script src="js/bootstrap.js"></script>

  <?php
    break; 
  case 'carp_signup':
  ?>
    <script src="js/bootstrap.js"></script>
  <?php
    break;   
  case 'projectgallery':
  ?>

  <?php
    break;  
  case 'archi_services':
  ?>
      <script src="json/jquery-1.11.0.js"></script>
      <script src="json/jquery-1.11.3.min.js"></script>
      <script src="json/gentel.js"></script>


      <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
      <script type="text/javascript" src="js/modernizr.custom.46884.js"></script>
      <!-- //js -->
        <!-- password-script -->
        <script type="text/javascript">
          window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
          }

          function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
              document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
              document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
          }
        </script>
        <!-- //password-script -->

      <script src="js/bars.js"></script>
      <!-- pop-up-box -->    
        <link href="css/popuo-box.css" rel="stylesheet" type="text/css" property="" media="all" />
        <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
      <!--//pop-up-box -->
      <div id="small-dialog" class="mfp-hide">
        <iframe src="https://player.vimeo.com/video/67001156"></iframe>
      </div>
      <script>
        $(document).ready(function() {
        $('.popup-with-zoom-anim').magnificPopup({
          type: 'inline',
          fixedContentPos: false,
          fixedBgPos: true,
          overflowY: 'auto',
          closeBtnInside: true,
          preloader: false,
          midClick: true,
          removalDelay: 300,
          mainClass: 'my-mfp-zoom-in'
        });
                                        
        });
      </script>

      <!-- for bootstrap working -->
        <script src="js/bootstrap.js"></script>
      <!-- //for bootstrap working -->
      <!-- start-smoth-scrolling -->
      <script type="text/javascript" src="js/move-top.js"></script>
      <script type="text/javascript" src="js/easing.js"></script>
      <script type="text/javascript">
        jQuery(document).ready(function($) {
          $(".scroll").click(function(event){   
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
          });
        });
      </script>
      <!-- start-smoth-scrolling -->
      <!-- here stars scrolling icon -->
        <script type="text/javascript">
          $(document).ready(function() {
            /*
              var defaults = {
              containerID: 'toTop', // fading element id
              containerHoverID: 'toTopHover', // fading element hover id
              scrollSpeed: 1200,
              easingType: 'linear' 
              };
            */
                      
            $().UItoTop({ easingType: 'easeOutQuart' });
                      
            });
        </script>
      <!-- //here ends scrolling icon -->
  <?php
    break; 
  
}
