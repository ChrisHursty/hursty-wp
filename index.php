<?php
/**
 * The main template file for Hursty WP
 */

get_header(); ?>

    <main id="primary" class="site-main">
        <h1>I am the eggman</h1>
        <?php
        if ( have_posts() ) :

            while ( have_posts() ) :
                the_post();

                // Include the template for the content.
                get_template_part( 'template-parts/content', get_post_type() );

            endwhile;

            the_posts_navigation();

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>

    </main><!-- #main -->

<?php
get_sidebar();
get_footer();
