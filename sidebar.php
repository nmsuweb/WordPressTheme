<?php if ( has_nav_menu( 'extra-menu' ) ) {
	wp_nav_menu( array( 'theme_location' => 'extra-menu', 'container_id' => 'vertical', 'container' => 'nav' ) );
} ?>

<?php if ( is_sidebar_active('primary_widget_area') ) : ?>
                <aside id="sidebar1" class="widget-area">
                        <ul class="xoxo">
                                <?php dynamic_sidebar('primary_widget_area'); ?>
                        </ul>
                </aside>
<?php endif; ?>         
                
<?php if ( is_sidebar_active('secondary_widget_area') ) : ?>
                <aside id="sidebar2" class="widget-area">
                        <ul class="xoxo">
                                <?php dynamic_sidebar('secondary_widget_area'); ?>
                        </ul>
                </aside>
<?php endif; ?> 


                <!--<aside id="sidebar1" class="widget-area">
                        <ul class="xoxo">
                                <li>Sidebar 1</li>
                        </ul>
                </aside>
        
                
                <aside id="sidebar2" class="widget-area">
                        <ul class="xoxo">
                               <li>Sidebar 2</li> 
                        </ul>
                </aside>--> 