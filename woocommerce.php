<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
        <meta name="description" content="Healthy Essentials is a complete nutrition store with a premium beverage bar and healthy cafe.">
        <meta name="viewport" content="width=device-width" initial-scale="1">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
         <?php if (is_page('contact') ) { ?>
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVKzFdbNwJPjjGwDTxFqOjvdvEGCelazQ&sensor=true"></script>
             <script type="text/javascript">
              function initialize() {
                var myLatLon = new google.maps.LatLng(33.520306,-101.924951);
                var mapOptions = {
                  center: myLatLon,
                  zoom: 16,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("he_map"),
                    mapOptions);
                var marker = new google.maps.Marker({
                    position: myLatLon,
                    map: map,
                    title: 'Healthy Essentials'
                });
              }
            </script>
        <?php } else {} ?>
        <?php wp_enqueue_script("jquery"); ?>
        <?php wp_head(); ?>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
        <script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <?php if ( is_page('contact') ) { ?>
    <body onload="initialize()" <?php body_class($class); ?>>
    <?php } else { ?>
    <body <?php body_class($class); ?>> <?php } ?>
        <div class="page-wrap clearfix">
            <div class="header">
                <!--[if lt IE 7]>
                <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
            <![endif]-->
                    <div class="grid clearfix">
                        <div class="col col-2-3">
                            <div class="module">
                                <h1><span class="visuallyhidden">Healthy Essentials</span><a href="<?php bloginfo('siteurl'); ?>" title="Healthy Essentials"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" /></a></h1>
                            </div>
                        </div>
                        <div class="col col-1-3">
                            <div class="module header_search">
                                <?php dynamic_sidebar( 'header_search_sidebar' ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="grid clearfix nav">
                        <div class="col col-4-4">
                            <div class="module no-padding">
                                <div class="nav">
                                <?php wp_nav_menu( array('menu' => 'dig')); ?>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
<div class="main clearfix">
    <div class="grid">
        <div class="col col-2-3 border-right">
            <div class="module">
          <?php woocommerce_content(); ?>
            </div>
        </div>
        <div class="col col-1-3">
            <div class="module aside">
                <?php dynamic_sidebar( 'default_sidebar' ); ?>
            </div>
        </div>
    </div>
</div><!--close .content -->
<div class="footer clearfix">
   <div class="grid">
        <div class="col col-1-4">
            <div class="module">
                <h4>About</h4>
                <p>Healthy Essentials is a complete nutrition store with a premium beverage bar and healthy cafe.</p>
                <p>We are located at 8008 Abbeville Ave in Lubbock, TX. (Just North of 82nd St. 1 block West of Slide Ave.)</p>
            </div>
        </div>
    </div>
    <div class="grid">
        <div class="col col-1-4">
            <div class="module">
                <h4>Hours</h4>
                        <table>
                            <tr>
                                <td>Monday</td>
                                <td>6:30am-6:30pm</td>
                            </tr>
                            <tr>
                                <td>Tuesday</td>
                                <td>6:30am-6:30pm</td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td>6:30am-6:30pm</td>
                            </tr>
                            <tr>
                                <td>Thursday</td>
                                <td>6:30am-6:30pm</td>
                            </tr>
                            <tr>
                                <td>Friday</td>
                                <td>6:30am-6:30pm</td>
                            </tr>
                            <tr>
                                <td>Saturday</td>
                                <td>7:30am-6:30pm</td>
                            </tr>
                            <tr>
                                <td>Sunday</td>
                                <td>Closed</td>
                            </tr>
                        </table>
            </div>
        </div>
    </div>
    <div class="grid">
        <div class="col col-1-4">
            <div class="module">
               <h4>Menu</h4>
               <?php $footer_menu_args = array(
                                        'menu' => 'footer-menu',
                                        'container_class' => 'menu-footer-container',
                                        'menu_id' => 'footer-menu'
                            ); ?>
                            <?php wp_nav_menu( $footer_menu_args ); ?>
            </div>
        </div>
    </div>
    <div class="grid">
        <div class="col col-1-4">
            <div class="module">
                <h4>Contact</h4>
                <div class="contact-info-content">
                          <p>Phone: (806) 771-5959</p>
                          <p>Email: <a href="mailto:info@hesmoothies.com">info@hesmoothies.com</a></p>
                        </div> 
            </div>
        </div>
    </div>
</div>
 <p class="copy">Healthy Essentials &copy;2011 to current. All rights reserved.</p>
<?php wp_footer(); ?>
        <script src="<?php bloginfo('template_url'); ?>/js/main-ck.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </div>
    </body>
    </html>