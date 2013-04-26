<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>   <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>   <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>   <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither -->
<head profile="http://gmpg.org/xfn/11">
    <?php $settings=get_option('nmsu_theme_options'); ?>

     <title><?php
        if ( is_single() ) { single_post_title(); }       
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | New Mexico State University'; get_page_number(); }
        elseif ( is_page() || is_single() ) { single_post_title(''); print ' | '; bloginfo('name'); print ' | New Mexico State University'; }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for "' . esc_html($s) . '"'; get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>
     
   
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<style type="text/css">
	<?php echo $settings['custom_css']; ?>
	</style>
    <!--[if lt IE 9]>
   	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="/css/ie.css">
    <![endif]-->

		<?php $assignCSS=get_bloginfo('template_directory'); ?>
		<?php if ( is_page_template('1col-page.php')) { 
			print "<link rel='stylesheet' type='text/css' href='$assignCSS/css/1-column-sidebars-below.css' />";
			 } 
		elseif ( is_page_template('2colsbLeft-page.php')) { 
			print "<link rel='stylesheet' type='text/css' href='$assignCSS/css/2-columns-sidebars-left.css' />";
			} 
		elseif ( is_page_template('3colsbBoth-page.php')) { 
			print "<link rel='stylesheet' type='text/css' href='$assignCSS/css/3-columns-sidebars-both.css' />";
			} 
		elseif ( is_page_template('3colsbLeft-page.php')) { 
			print "<link rel='stylesheet' type='text/css' href='$assignCSS/css/3-columns-sidebars-left.css' />";
			} 
		elseif ( is_page_template('3colsbRight-page.php')) { 
			print "<link rel='stylesheet' type='text/css' href='$assignCSS/css/3-columns-sidebars-right.css' />";
			} 
		else { 
			print "<link rel='stylesheet' type='text/css' href='$assignCSS/css/2-columns-sidebars-right.css' />"; 
			 } ?>
    

     
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
     
    <?php wp_head(); ?>
     
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'NMSU' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'NMSU' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />   
</head>
<body>
<div id="wrapper" class="hfeed">
  <div class="mobile">
    <header><img id="branding" src="<?php bloginfo('template_directory'); ?>/img/nmsu-branding.png" width="640" height="54" alt="NMSU branding"> <a href="http://www.nmsu.edu/"><img id="logo" src="<?php bloginfo('template_directory'); ?>/img/nmsu-logo.png" width="99" height="110" alt="NMSU logo" title="NMSU Home"></a>
      <div id="masthead"><img src="<?php bloginfo('template_directory'); ?>/img/masthead3.png" width="425" height="30" alt="New Mexico State University">
        <div class="visually-hidden">New Mexico State University</div>
        <div id="blog-title"><span><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a></span></div>
<?php if ( is_home() || is_front_page() ) { ?>
                    <p id="blog-description"><?php bloginfo( 'description' ) ?></p>
<?php } else { ?>
                    <p id="blog-description"><?php bloginfo( 'description' ) ?></p>
<?php } ?>
          
      </div>
      
      <!-- #masthead -->
<!-- #header_widget --><!--
<?php if ( is_sidebar_active('header_widget') ) : ?>
	<?php dynamic_sidebar('header_widget'); ?>
	<?php endif; ?>
-->
      <div id="search-wrapper">
     <form id="search" action="<?php bloginfo('url') . '/'?>" method="GET">
        <fieldset>
          <input type="hidden" name="domains" value="nmsu.edu" />
          <input type="hidden" name="sitesearch" value="nmsu.edu" />
          <?php if ($settings['search_method'] == 'google'): ?>
          <input type="hidden" name="search_method" value="google" />
          <?php elseif ($settings['search_method'] == 'google_custom'): ?>
          <input type="hidden" name="search_method" value="google_custom" />
        <?php endif; ?>
          <input type="text" name="s" id="s" value="" placeholder="Search <?php bloginfo('name'); ?>" />
          <a onClick="document.getElementById('search').submit()"></a>
        </fieldset>
      </form>
      </div>
    </header>
    <nav id="horizontal"> 
    <div class="visually-hidden"><a href="#content" title="<?php _e( 'Skip to content', 'NMSU' ) ?>"><?php _e( 'Skip to content', 'NMSU' ) ?></a></div>
      <ul id="horizontal-menu">
      <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
      <?php // wp_page_menu( 'sort_column=menu_order' ); ?>
      </ul>
      <!-- For wrapround effect on bottom of menu bar. -->
      <div id="left-wraparound"></div>
      <div id="right-wraparound"></div>
    </nav>
    <div id="main">
    <?php
        /*
          Leave swim.jpg as a default that can be later improved into a better default image.
          If a custom image was set we will need the path to the image.
        */
      ?>
      <!--<div id="feature"> <img src="<?php bloginfo('template_directory'); ?>/img/swim.jpg" width="960" height="480"> </div>-->
      <?php if ( is_page_template('header-page.php')): ?>
      <div id="feature"> 
      <?php
        //Display selected header type
        echo nmsu_theme_header ();
      ?>
      </div>
    <!-- #feature -->
 <?php endif; ?>
 <?php if ( is_404()): ?><div id="feature"> <img src="<?php bloginfo('template_directory'); ?>/img/404-page.jpg" width="960" height="480"> </div>
 <?php endif; ?>
	     <?php if ( !is_home() && !is_front_page() && !is_404()): ?>
       <div id="breadcrumbs"> 
          <div id="breadcrumb-trail-contents">
             
              <div id="breadcrumb-link-list"> 
                  <ul>
                      <li><a href="http://www.nmsu.edu">NMSU</a></li>
                      <li class="site-breadcrumb"><a href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a></li>
                      
                      <?php display_breadcrumbs(); ?>
                      

                        <li><a href="<?php the_permalink() ?>"><?php print $post->post_title; ?></a></li>
                  </ul> 
              </div> <!-- breadcrumb-link-list --> 
              <div id="breadcrumb-utility"><span></span></div>
          </div> <!-- breadcrumb-trail-contents -->
      </div> <!-- breadcrumb-trail-container --> 
      <!-- END BREADCRUMB TRAIL -->
    <?php endif; ?>
