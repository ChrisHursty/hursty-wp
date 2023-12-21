<!-- Testimonials Slide 12/19/23 -->
<div class="owl-carousel testimonial-carousel">
    <?php
    $testimonials = new WP_Query(array(
        'post_type'      => 'testimonial',
        'posts_per_page' => -1 // Retrieve all testimonials
    ));

    if ($testimonials->have_posts()) {
        while ($testimonials->have_posts()) {
            $testimonials->the_post();

            $company_name = get_post_meta(get_the_ID(), 'company_name', true); // Replace 'company_name' with your custom field key
    ?>

    <div class="item">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>
        <blockquote><?php the_content(); ?></blockquote>
        <p class="name"><?php the_title(); ?></p>
        <?php if (!empty($company_name)) : ?>
            <p class="company"><?php echo esc_html($company_name); ?></p>
        <?php endif; ?>
    </div>

    <?php
        }
    }
    wp_reset_postdata();
    ?>
</div>