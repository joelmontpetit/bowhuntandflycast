        </main>
        
        <footer id="footer">
    <div class="container-fluid">
        <div class="footer__master">
            <div class="logo">
                <a class="logo-name" href="<?php echo home_url();?>">
                    <p><span>.</span></p>
                </a>
                <div class="links">
                    <ul>
                        <li><a href="<?php echo home_url();?>/blog/">Blog</a></li>
                        <li><a href="<?php echo home_url();?>/contact/">Contact</a></li>
                        <li><a href="<?php echo home_url();?>/partnership/"></a></li>
                        <li><a href="<?php echo home_url();?>/make-money/"></a></li>
                        <li><a href="<?php echo home_url();?>/jerkmate-affiliate/"></a></li>
                    </ul>
                </div>
                <div class="legal">
                    <a href="<?php echo home_url();?>/page-privacy-policy/" rel="noindex" rel="nofollow">Privacy Policy</a>
                </div>
                
            </div>  
            <div class="links">
                <p></p>
                <nav role="navigation">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'footer-menu',
                        'menu_class' => 'menu'
                    ) ); ?>
                </nav>
            </div>
            <div class="links-inner">
                <p></p>
                <?php
                $args = array('post_type' => 'reviews', 'posts_per_page' => -1);
                $query = new WP_Query( $args );

                if ( $query->have_posts()) : ?> 

                <ul>
                    <?php while ($query->have_posts() ) : $query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink();?>" title="<?php the_title();?> girls"><?php the_title();?></a>
                        </li>
                    <?php endwhile ;?>
                </ul>
            <?php endif ;?>
            </div>
            <div class="links">
                <p></p>
                <?php
                $args = array('post_type' => 'post', 'posts_per_page' => 8);
                $query = new WP_Query( $args );

                if ( $query->have_posts()) : ?> 
                <ul>
                    <?php while ($query->have_posts() ) : $query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink();?>" title="<?php the_title();?> girls"><?php the_title();?></a>
                        </li>
                    <?php endwhile ;?>
                </ul>
                <?php endif ;?>
            </div>
        </div>
        
        <div class="footer__copyright">
            <div class="copyright-img">
            </div>
            <div class="copyright-details">
                <p>Copyright © <?php echo date('Y'); ?>FishingBlog</p>
            </div>
        </div>

    </div>
     
        </footer>
        <?php wp_footer(); ?>
        </body>
    </div>
</html>