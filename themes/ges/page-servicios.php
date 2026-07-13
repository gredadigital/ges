<?php
/**
 * Template Name: Servicios
 */

get_header();

$servicios = carbon_get_the_post_meta( 'ges_servicios_paginas' );

?>

    <main class="services-page">
        <section class="services-page__header px-2">
            <div class="container">
                <header class="section-header py-7">
                    <h2 class="
                                text-mobile-h2
                                uppercase
                                text-center
                                font-thin
                                w-full
                                relative
                                inline-block
                                pb-6
                                after:content-['']
                                after:absolute
                                after:left-1/2
                                after:-translate-x-1/2
                                after:bottom-4
                                after:w-[100px]
                                after:h-[8px]
                                after:bg-linear-to-r
                              after:from-azul-electrico
                                after:via-fucsia
                                after:to-transparent
">Servicios</h2>
                </header>
            </div>
        </section>
        <?php if ( ! empty( $servicios ) ) : ?>
            <section class="services-list">
                <div class="container">
                    <?php foreach ( $servicios as $servicio ) : ?>
                        <?php
                        $page_id = $servicio['id'];
                        $imagen = carbon_get_post_meta(
                                $page_id,
                                'ges_service_cover'
                        );
                        $extracto = carbon_get_post_meta(
                                $page_id,
                                'ges_service_excerpt'
                        );
                        $tagline = carbon_get_post_meta(
                                $page_id,
                                'ges_service_tagline'
                        );
                        ?>
                        <article class="service-card mb-2 overflow-hidden transition-all p-2">

                            <a
                                    href="<?php echo esc_url( get_permalink( $page_id ) ); ?>"
                                    class="service-card__link block"
                            >

                                <?php if ( $imagen ) : ?>

                                    <figure class="service-card__image relative overflow-hidden aspect-[1/1]">

                                        <?php
                                        echo wp_get_attachment_image(
                                                $imagen,
                                                'large',
                                                false,
                                                [
                                                        'class' => 'service-card__img w-full h-full object-cover',
                                                        'alt'   => get_the_title( $page_id ),
                                                ]
                                        );
                                        ?>

                                        <div class="service-card__overlay absolute inset-0 flex items-end bg-gradient-to-t from-black/90 via-black/20 to-transparent">

                                            <div class="service-card__content flex-1 p-2">

                                                <h2 class="service-card__title text-mobile-h2 font-thin uppercase text-blanco mb-[8px]">
                                                    <?php echo esc_html( get_the_title( $page_id ) ); ?>
                                                </h2>

                                                <?php if ( $extracto ) : ?>
                                                    <p class="service-card__excerpt text-mobile-p text-blanco leading-tight font-thin">
                                                        <?php echo esc_html( $extracto ); ?>
                                                    </p>
                                                <?php endif; ?>

                                            </div>

                                            <div class="service-card__arrow absolute top-2 right-2 text-blanco text-mobile-h2 font-bold">
                                                →
                                            </div>

                                        </div>

                                    </figure>

                                <?php endif; ?>

                            </a>

                            <?php if ( $tagline ) : ?>

                                <div class="service-card__footer px-[8px] py-1 relative">

            <span class="block text-right uppercase font-bold text-[12px] tracking-wide">

                <?php echo esc_html( $tagline ); ?>

            </span>

                                </div>

                            <?php endif; ?>

                        </article>

                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
        <section class="services-decoration">
            <div class="services-decoration__circle services-decoration__circle--1">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/servicios_circle1.svg ?>" alt="">
            </div>
            <div class="services-decoration__circle services-decoration__circle--2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/servicios_circle2.svg ?>" alt="">
            </div>
            <div class="services-decoration__circle services-decoration__circle--3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/servicios_circle3.svg ?>" alt="">
            </div>
        </section>
    </main>

<?php get_footer(); ?>