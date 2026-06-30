<?php
/**
 * Footer
 */

$phone      = carbon_get_theme_option('ges_footer_phone');
$email      = carbon_get_theme_option('ges_footer_email');
$address    = carbon_get_theme_option('ges_footer_address');
$city       = carbon_get_theme_option('ges_footer_city');
$description = carbon_get_theme_option('ges_footer_description');
$logo       = carbon_get_theme_option('ges_footer_logo');
$copyright  = carbon_get_theme_option('ges_footer_copyright');

?>

<footer class="bg-negro text-blanco font-thin px-2 py-5">

    <div class="mb-5">

        <?php
        wp_nav_menu([
                'theme_location' => 'footer_menu',
                'container'      => false,
                'fallback_cb'    => false,
        ]);
        ?>

    </div>

    <div class="mb-8">

        <?php if ($phone): ?>
            <p><?php echo esc_html($phone); ?></p>
        <?php endif; ?>

        <?php if ($email): ?>
            <p>
                <a href="mailto:<?php echo esc_attr($email); ?>">
                    <?php echo esc_html($email); ?>
                </a>
            </p>
        <?php endif; ?>

        <?php if ($address): ?>
            <p><?php echo esc_html($address); ?></p>
        <?php endif; ?>

        <?php if ($city): ?>
            <p><?php echo esc_html($city); ?></p>
        <?php endif; ?>

    </div>

    <div class="mb-7">

        <?php if ($description): ?>
            <p class="text-right pl-6"><?php echo nl2br(esc_html($description)); ?></p>
        <?php endif; ?>

    </div>

    <div class="mb-1 flex justify-center">


        <?php
        if ($logo) {
            echo wp_get_attachment_image($logo, 'full');
        }
        ?>

    </div>

    <div>

        <?php if ($copyright): ?>
            <p class="text-center font-mobile-p3"><?php echo esc_html($copyright); ?></p>
        <?php endif; ?>

    </div>

</footer>

<?php wp_footer(); ?>

</body>
</html>