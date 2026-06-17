<?php
/**
 * Header del tema GES
 *
 * @package GES
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#ffffff">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="min-h-screen flex flex-col">
    <header class="w-full">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-6">
                <a
                    href="<?php echo esc_url(home_url('/')); ?>"
                    class="block"
                    aria-label="<?php bloginfo('name'); ?>"
                >
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <span class="text-xl font-bold">
                            <?php bloginfo('name'); ?>
                        </span>
                    <?php endif; ?>
                </a>
                <nav
                    aria-label="<?php esc_attr_e('Menú principal', 'ges'); ?>"
                >
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'header_menu',
                        'container'      => false,
                        'menu_class'     => 'flex items-center gap-8',
                        'fallback_cb'    => false,
                        'depth'          => 2,
                    ]);
                    ?>
                </nav>
            </div>
        </div>
    </header>
    <main id="primary" class="flex-1">