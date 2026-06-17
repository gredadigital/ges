<?php
/**
 * Footer del tema GES
 *
 * @package GES
 */
?>

</main>

<footer class="w-full">

    <div class="container mx-auto px-4">

        <div class="py-16">

            <nav
                aria-label="<?php esc_attr_e('Menú del pie de página', 'ges'); ?>"
            >

                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_menu',
                    'container'      => false,
                    'menu_class'     => 'flex flex-wrap items-center gap-x-8 gap-y-4',
                    'fallback_cb'    => false,
                    'depth'          => 1,
                ]);
                ?>

            </nav>

        </div>

    </div>

</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>