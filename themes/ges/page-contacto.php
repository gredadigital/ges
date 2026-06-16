<?php
/**
 * Template Name: Contacto
 *
 * @package g*/

get_header();
?>

<main class="container mx-auto py-16">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();

            the_content();

        endwhile;
    endif;
    ?>
</main>

<?php
get_footer();
