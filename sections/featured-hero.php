<div class="featured-hero">
    <h2 class="featured-hero__title_h2"></h2>

    <div class="orgnc-SingleImage-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/src/images/flyfishingcrop2.jpg">
    </div>
</div>

<div class="products_fishing">
    <?php
    // Début de la boucle de publication
    if (have_posts()) :
        while (have_posts()) : the_post();
            // Récupérer l'URL de la featured image
            $featured_image_url = get_the_post_thumbnail_url();
            echo '<div class="product_card">';
            // Contenu de chaque article
            if ($featured_image_url) {
                echo '<img src="' . esc_url($featured_image_url) . '" alt="' . get_the_title() . '">';
            }
            echo '<h2><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h2>';
            the_content();
            echo '</div>';
        endwhile;
    else :
        // Aucun article trouvé
        echo 'Aucun article trouvé.';
    endif;
    ?>
</div>