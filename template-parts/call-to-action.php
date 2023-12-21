<?php
// Access the customizer values
$heading                 = get_theme_mod('heading', '');
$text                    = get_theme_mod('text', '');
$button_text             = get_theme_mod('button_text', '');
$button_url              = get_theme_mod('button_url', '');
$background_color        = get_theme_mod('background_color', '#ffffff'); // Default white
$text_color              = get_theme_mod('text_color', '#000000'); // Default black
$button_background_color = get_theme_mod('button_background_color', '#000000'); // Default black
$button_text_color       = get_theme_mod('button_text_color', '#ffffff'); // Default white

if ($heading || $text || $button_text) : ?>
    <section class="call-to-action" style="background-color: #<?php echo esc_attr($background_color); ?>; color: <?php echo esc_attr($text_color); ?>;">
        <div class="cta-container">
            <?php if ($heading) : ?>
                <h2 class="cta-heading" style="color: <?php echo esc_attr($text_color); ?>;"><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>

            <?php if ($text) : ?>
                <p class="cta-text"><?php echo esc_html($text); ?></p>
            <?php endif; ?>

            <?php if ($button_text && $button_url) : ?>
                <a href="<?php echo esc_url($button_url); ?>" class="cta-button" style="background-color: <?php echo esc_attr($button_background_color); ?>; color: <?php echo esc_attr($button_text_color); ?>;">
                    <?php echo esc_html($button_text); ?>
                </a>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>