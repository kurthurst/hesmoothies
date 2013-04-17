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
         <?php if (is_page('about') ) { ?>
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
    <?php if ( is_page('about') ) { ?>
    <body onload="initialize()" <?php body_class($class); ?>>
    <?php } else { ?>
    <body <?php body_class($class); ?>> <?php } ?>
        <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=600032113344214";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
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
                            <div class="module no-padding nav">
                                <?php $header_menu_args = array(
                                                            'theme_location' => 'header_menu'
                                                            ); ?>
                                <?php wp_nav_menu( $header_menu_args ); ?>
                            </div>
                        </div>
                    </div>
                </div>
<div class="main clearfix">
    <div class="grid">
        <div class="col col-2-3 border-right">
            <div class="module">
           <?php if ( is_front_page() ){ ?>
           <?php echo do_shortcode( '[responsive_slider]' ); ?>
           <span class="recent_posts_banner">Recent Posts from the Blog</span>
            <?php $latestPost = new WP_Query();
                $latestPost->query('showposts=4');
                while ($latestPost->have_posts()) : $latestPost->the_post(); ?>
                    <article>
                    <h2><a href="<?php the_permalink(); ?>" title="Permalink for <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <span class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-width="auto" data-show-faces="false"></span>
                        <?php if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('thumbnail');
                        } ?> 
                        <?php the_content(); ?>
                    </article>
                    <?php endwhile; ?>
            <?php wp_reset_query(); ?>
            <?php } elseif ( is_page('menu') ){?>
           <div class="grid clearfix">
            <h2>Smoothies</h2>
            <?php $smoothies = new WP_Query();
            $args = array( post_type => smoothies, showposts => 6, orderby => title, order => ASC);
            $smoothies->query($args);
            while ($smoothies->have_posts()) : $smoothies->the_post(); ?>
            <div class="col col-1-3">
                <div class="module menu-item">
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    <?php if (has_post_thumbnail() ) {
                        the_post_thumbnail('thumbnail');
                    } ?>
                    <div class="info">
                    <ul class="col col-1-2">
                        <li><h5>Calories</h5></li>
                        <li><span>12oz</span><?php echo get_post_meta($post->ID, 'calories_12oz', true); ?></li>
                        <li><span>16oz</span><?php echo get_post_meta($post->ID, 'calories_16oz', true); ?></li>
                        <li><span>20oz</span><?php echo get_post_meta($post->ID, 'calories_20oz', true); ?></li>
                        <li><span>32oz</span><?php echo get_post_meta($post->ID, 'calories_32oz', true); ?></li>
                    </ul>
                    <ul "col col-1-2">
                        <li><h5>Ingredients</h5></li>
                        <li><?php echo get_post_meta($post->ID, 'ingredients', true); ?></li>
                    </ul>
                    </div>

                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
        <a class="menu-more" href="<?php bloginfo('siteurl') ?>/menu/smoothies/" title="See more smoothies">See more smoothies &raquo;</a>
    </div>
     <div class="grid clearfix">
            <h2>Food</h2>
            <?php $food = new WP_Query();
            $args = array( post_type => food, showposts => 6, orderby => title, order => ASC);
            $food->query($args);
            while ($food->have_posts()) : $food->the_post(); ?>
            <div class="col col-1-3">
                <div class="module menu-item">
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    <?php if (has_post_thumbnail() ) {
                        the_post_thumbnail('thumbnail');
                    } ?>
                    <div class="info">
                    <ul class="col col-1-2">
                        <li><h5>Calories</h5></li>
                        <li><span>12oz</span><?php echo get_post_meta($post->ID, 'calories_12oz', true); ?></li>
                        <li><span>16oz</span><?php echo get_post_meta($post->ID, 'calories_16oz', true); ?></li>
                        <li><span>20oz</span><?php echo get_post_meta($post->ID, 'calories_20oz', true); ?></li>
                        <li><span>32oz</span><?php echo get_post_meta($post->ID, 'calories_32oz', true); ?></li>
                    </ul>
                    <ul "col col-1-2">
                        <li><h5>Ingredients</h5></li>
                        <li><?php echo get_post_meta($post->ID, 'ingredients', true); ?></li>
                    <ul>

                    </div>

                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
        <p>Sorry, we haven't built the interactive menu for this section yet. We are working on it. In the meantime you can always check out the <a href="#">PDF</a> version.</p>
        <a class="menu-more" href="<?php bloginfo('siteurl') ?>/menu/food-items/" title="See more food items">See more food items &raquo;</a>
    </div>
     <div class="grid clearfix">
            <h2>Coffees</h2>
            <?php $coffees = new WP_Query();
            $args = array( post_type => coffees, showposts => 6, orderby => title, order => ASC);
            $coffees->query($args);
            while ($coffees->have_posts()) : $coffees->the_post(); ?>
            <div class="col col-1-3">
                <div class="module menu-item">
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    <?php if (has_post_thumbnail() ) {
                        the_post_thumbnail('thumbnail');
                    } ?>
                    <div class="info">
                    <ul class="col col-1-2">
                        <li><h5>Calories</h5></li>
                        <li><span>12oz</span><?php echo get_post_meta($post->ID, 'calories_12oz', true); ?></li>
                        <li><span>16oz</span><?php echo get_post_meta($post->ID, 'calories_16oz', true); ?></li>
                        <li><span>20oz</span><?php echo get_post_meta($post->ID, 'calories_20oz', true); ?></li>
                        <li><span>32oz</span><?php echo get_post_meta($post->ID, 'calories_32oz', true); ?></li>
                    </ul>
                    <ul "col col-1-2">
                        <li><h5>Ingredients</h5></li>
                        <li><?php echo get_post_meta($post->ID, 'ingredients', true); ?></li>
                    <ul>

                    </div>

                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
        <p>Sorry, we haven't built the interactive menu for this section yet. We are working on it. In the meantime you can always check out the <a href="#">PDF</a> version.</p>
        <a class="menu-more" href="<?php bloginfo('siteurl') ?>/menu/coffees/" title="See more coffees">See more coffees &raquo;</a>
    </div>
     <div class="grid clearfix">
            <h2>Teas</h2>
            <?php $teas = new WP_Query();
            $args = array( post_type => teas, showposts => 6, orderby => title, order => ASC);
            $teas->query($args);
            while ( $teas->have_posts() ) : $teas->the_post(); ?>
            <div class="col col-1-3">
                <div class="module menu-item">
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    <?php if (has_post_thumbnail() ) {
                        the_post_thumbnail('thumbnail');
                    } ?>
                    <div class="info">
                    <ul class="col col-1-2">
                        <li><h5>Calories</h5></li>
                        <li><span>12oz</span><?php echo get_post_meta($post->ID, 'calories_12oz', true); ?></li>
                        <li><span>16oz</span><?php echo get_post_meta($post->ID, 'calories_16oz', true); ?></li>
                        <li><span>20oz</span><?php echo get_post_meta($post->ID, 'calories_20oz', true); ?></li>
                        <li><span>32oz</span><?php echo get_post_meta($post->ID, 'calories_32oz', true); ?></li>
                    </ul>
                    <ul "col col-1-2">
                        <li><h5>Ingredients</h5></li>
                        <li><?php echo get_post_meta($post->ID, 'ingredients', true); ?></li>
                    <ul>

                    </div>

                </div>
            </div>
            
        <?php endwhile;?>
    <p>Sorry, we haven't built the interactive menu for this section yet. We are working on it. In the meantime you can always check out the <a href="#">PDF</a> version.</p>
    <?php wp_reset_postdata(); ?>
     <a class="menu-more" href="<?php bloginfo('siteurl') ?>/menu/teas/" title="See more teas">See more teas &raquo;</a>   
    </div>
    <div class="grid clearfix">
        <?php $menuPage = new WP_Query();
        $args = array( page_id => 15);
        $menuPage->query('page_id=15');
        while ($menuPage->have_posts()) : $menuPage->the_post(); ?>
        <div class="col col-1-1">
            <div class="module">
            <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; ?>
        <?php wp_reset_query(); ?>
           </div>
           <?php } elseif ( is_page('smoothies') ){?>
           <div class="grid clearfix">
            <?php $smoothies = new WP_Query();
            $args = array( post_type => smoothies, nopaging => true, orderby => title, order => ASC);
            $smoothies->query($args);
            while ($smoothies->have_posts()) : $smoothies->the_post(); ?>
            <div class="col col-1-3">
                <div class="module menu-item">
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    <?php if (has_post_thumbnail() ) {
                        the_post_thumbnail('thumbnail');
                    } ?>
                    <div class="info">
                    <ul class="col col-1-2">
                        <li><h5>Calories</h5></li>
                        <li><span>12oz</span><?php echo get_post_meta($post->ID, 'calories_12oz', true); ?></li>
                        <li><span>16oz</span><?php echo get_post_meta($post->ID, 'calories_16oz', true); ?></li>
                        <li><span>20oz</span><?php echo get_post_meta($post->ID, 'calories_20oz', true); ?></li>
                        <li><span>32oz</span><?php echo get_post_meta($post->ID, 'calories_32oz', true); ?></li>
                    </ul>
                    <ul "col col-1-2">
                        <li><h5>Ingredients</h5></li>
                        <li><?php echo get_post_meta($post->ID, 'ingredients', true); ?></li>
                    <ul>

                    </div>

                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <div class="grid clearfix">
        <?php $menuPage = new WP_Query();
        $args = array( page_id => 15);
        $menuPage->query('page_id=15');
        while ($menuPage->have_posts()) : $menuPage->the_post(); ?>
        <div class="col col-1-1">
            <div class="module">
            <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; ?>
        <?php wp_reset_query(); ?>
           </div>
            <?php } elseif ( is_page('food-items') ){?>
           <div class="grid clearfix">
            <?php $food = new WP_Query();
            $args = array( post_type => food, nopaging => true, orderby => title, order => ASC);
            $food->query($args);
            while ($food->have_posts()) : $food->the_post(); ?>
            <div class="col col-1-3">
                <div class="module menu-item">
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    <?php if (has_post_thumbnail() ) {
                        the_post_thumbnail('thumbnail');
                    } ?>
                    <div class="info">
                    <ul class="col col-1-2">
                        <li><h5>Calories</h5></li>
                        <li><span>12oz</span><?php echo get_post_meta($post->ID, 'calories_12oz', true); ?></li>
                        <li><span>16oz</span><?php echo get_post_meta($post->ID, 'calories_16oz', true); ?></li>
                        <li><span>20oz</span><?php echo get_post_meta($post->ID, 'calories_20oz', true); ?></li>
                        <li><span>32oz</span><?php echo get_post_meta($post->ID, 'calories_32oz', true); ?></li>
                    </ul>
                    <ul "col col-1-2">
                        <li><h5>Ingredients</h5></li>
                        <li><?php echo get_post_meta($post->ID, 'ingredients', true); ?></li>
                    <ul>

                    </div>

                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <div class="grid clearfix">
        <?php $menuPage = new WP_Query();
        $args = array( page_id => 15);
        $menuPage->query('page_id=15');
        while ($menuPage->have_posts()) : $menuPage->the_post(); ?>
        <div class="col col-1-1">
            <div class="module">
            <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; ?>
        <?php wp_reset_query(); ?>
           </div>
           <?php } elseif ( is_page('coffees') ){?>
           <div class="grid clearfix">
            <?php $coffees = new WP_Query();
            $args = array( post_type => coffees, nopaging => true, orderby => title, order => ASC);
            $coffees->query($args);
            while ($coffees->have_posts()) : $coffees->the_post(); ?>
            <div class="col col-1-3">
                <div class="module menu-item">
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    <?php if (has_post_thumbnail() ) {
                        the_post_thumbnail('thumbnail');
                    } ?>
                    <div class="info">
                    <ul class="col col-1-2">
                        <li><h5>Calories</h5></li>
                        <li><span>12oz</span><?php echo get_post_meta($post->ID, 'calories_12oz', true); ?></li>
                        <li><span>16oz</span><?php echo get_post_meta($post->ID, 'calories_16oz', true); ?></li>
                        <li><span>20oz</span><?php echo get_post_meta($post->ID, 'calories_20oz', true); ?></li>
                        <li><span>32oz</span><?php echo get_post_meta($post->ID, 'calories_32oz', true); ?></li>
                    </ul>
                    <ul "col col-1-2">
                        <li><h5>Ingredients</h5></li>
                        <li><?php echo get_post_meta($post->ID, 'ingredients', true); ?></li>
                    <ul>

                    </div>

                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <div class="grid clearfix">
        <?php $menuPage = new WP_Query();
        $args = array( page_id => 15);
        $menuPage->query('page_id=15');
        while ($menuPage->have_posts()) : $menuPage->the_post(); ?>
        <div class="col col-1-1">
            <div class="module">
            <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; ?>
        <?php wp_reset_query(); ?>
           </div>
           <?php } elseif ( is_page('teas') ){?>
           <div class="grid clearfix">
            <?php $teas = new WP_Query();
            $args = array( post_type => teas, nopaging => true, orderby => title, order => ASC);
            $teas->query($args);
            while ($teas->have_posts()) : $teas->the_post(); ?>
            <div class="col col-1-3">
                <div class="module menu-item">
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    <?php if (has_post_thumbnail() ) {
                        the_post_thumbnail('thumbnail');
                    } ?>
                    <div class="info">
                    <ul class="col col-1-2">
                        <li><h5>Calories</h5></li>
                        <li><span>12oz</span><?php echo get_post_meta($post->ID, 'calories_12oz', true); ?></li>
                        <li><span>16oz</span><?php echo get_post_meta($post->ID, 'calories_16oz', true); ?></li>
                        <li><span>20oz</span><?php echo get_post_meta($post->ID, 'calories_20oz', true); ?></li>
                        <li><span>32oz</span><?php echo get_post_meta($post->ID, 'calories_32oz', true); ?></li>
                    </ul>
                    <ul "col col-1-2">
                        <li><h5>Ingredients</h5></li>
                        <li><?php echo get_post_meta($post->ID, 'ingredients', true); ?></li>
                    <ul>

                    </div>

                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <div class="grid clearfix">
        <?php $menuPage = new WP_Query();
        $args = array( page_id => 15);
        $menuPage->query('page_id=15');
        while ($menuPage->have_posts()) : $menuPage->the_post(); ?>
        <div class="col col-1-1">
            <div class="module">
            <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; ?>
        <?php wp_reset_query(); ?>
           </div>

           <?php } elseif ( is_archive() || is_page() ){ ?>
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                   
                    <article>
                        <?php the_content(); ?>
                    </article>
                     <?php if ( is_page('about') ) { ?>
                <div class="map-wrap"><div id="he_map" style="width:100%; height:315px;"></div>
                </div>
            <?php } else {} ?>
             <?php endwhile; else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
           <?php } elseif ( is_home() ){ ?>
           <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
           <article>
           <h2><a href="<?php the_permalink(); ?>" title="Permalink for <?php the_title(); ?>"><?php the_title(); ?></a></h2>
           <span class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-width="auto" data-show-faces="false"></span>
           <?php if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('thumbnail');
                        } ?>

           <?php the_content(); ?>
            </article>
       <?php endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; wp_reset_query(); ?>
           <?php } elseif ( is_single() ){ ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article>
                <h2><?php the_title(); ?></h2>
                <span class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-width="auto" data-show-faces="false"></span>
                <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail('medium');
                } ?>
                <?php the_content(); ?>
                <div class="post_navigation clearfix">
                    <span class="left"><?php previous_post_link(); ?></span>
                    <span class="right"><?php next_post_link(); ?></span>
                </div>
            </article>
            <?php endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; wp_reset_query(); ?>
          <?php } elseif ( is_search() ){ ?>
            <?php if ( have_posts() ) : ?>
                <h1><?php printf( __( 'Search Results for: %s', 'twentyten' ), '' . get_search_query() . '' ); ?></h1>
                <?php while ( have_posts() ) : the_post(); ?>
                <h2><a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
<?php endwhile; ?>
<?php else : ?>
                    <h2><?php _e( 'Nothing Found', 'twentyten' ); ?></h2>
                    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
                    <?php get_search_form(); 
                    endif;  }?>
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
               <?php $footer_menu_args = array('theme_location' => 'footer_menu'); ?>
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
 <p class="copy">Healthy Essentials &copy; <?php echo date('Y'); ?>. All rights reserved.</p>
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