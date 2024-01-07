<?php
// listing_blog.php
var_dump('Hello from header!');
// WP_Query pour récupérer les articles de type 'post' avec la catégorie 'review_category'
$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1, // Afficher tous les articles
    'tax_query' => array(
        array(
            'taxonomy' => 'Review Categories',
            'field' => 'slug',
            'terms' => 'review-category', // Remplacez par le slug de votre catégorie de revues
        ),
    ),
);

$query = new WP_Query($args);

// Boucle pour afficher les articles dans le grid
if ($query->have_posts()) :
    ?>
    <div class="reviews-grid">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="review-item">
                <h1>criss</h1>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="review-thumbnail">
                        <?php the_post_thumbnail('medium'); // Utilisez la taille d'image appropriée ?>
                    </div>
                <?php endif; ?>
                <div class="review-content">
                    <h2 class="review-title"><?php the_title(); ?></h2>
                    <p class="review-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
    wp_reset_postdata();
else :
    echo 'Aucune revue trouvée.';
endif;
?>
