<?php get_header(); ?>
        
                <div id="container">    
                        <div id="content">
                                
                                <div id="post-0" class="post error404 not-found">
                                        <h1 class="entry-title"><?php _e( 'Bummer! Page Not Found', 'NMSU' ); ?></h1>
                                        <div class="entry-content">
                                                 <p>Apologies, we cannot seem to find what you were looking for. The page that you are looking for may have been moved or deleted.  Maybe we can still help you.</p>
                                                 <ol><li>Have you checked your address bar? There might be a typo in the URL.</li><li> Alternatively, you can go to you can visit <a href="<?php bloginfo('home'); ?>"</a> the homepage</a>.  Maybe you can find what you are looking for there.<li>No typos?  Homepage is not where you want to go? <?php _e( ' Perhaps searching will help.', 'NMSU' ); ?>
                                               
        <?php get_search_form(); ?></li></li></ol>
                                        </div><!-- .entry-content -->
                                </div><!-- #post-0 -->

                        </div><!-- #content -->         
                </div><!-- #container -->
                
<?php get_sidebar(); ?> 
<?php get_footer(); ?>