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
                <header class="section-header">
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
                        <article class="service-card">
                            <a
                                    href="<?php echo esc_url( get_permalink( $page_id ) ); ?>"
                                    class="service-card__link"
                            >
                                <?php if ( $imagen ) : ?>
                                    <figure class="service-card__image">
                                        <?php
                                        echo wp_get_attachment_image(
                                                $imagen,
                                                'large',
                                                false,
                                                [
                                                        'class' => 'service-card__img',
                                                        'alt'   => get_the_title( $page_id ),
                                                ]
                                        );
                                        ?>
                                    </figure>
                                <?php endif; ?>
                                <div class="service-card__overlay">
                                    <div class="service-card__content">
                                        <h2 class="service-card__title">
                                            <?php
                                            echo esc_html(
                                                    get_the_title( $page_id )
                                            );
                                            ?>
                                        </h2>
                                        <?php if ( $extracto ) : ?>
                                            <p class="service-card__excerpt">
                                                <?php
                                                echo esc_html(
                                                        $extracto
                                                );
                                                ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="service-card__arrow">
                                        →
                                    </div>
                                </div>
                            </a>
                            <?php if ( $tagline ) : ?>
                                <div class="service-card__footer">
                                <span>
                                    <?php
                                    echo esc_html(
                                            $tagline
                                    );
                                    ?>
                                </span>
                                </div>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
        <section class="services-decoration">
            <div class="services-decoration__circle services-decoration__circle--1"></div>
            <div class="services-decoration__circle services-decoration__circle--2"></div>
            <div class="services-decoration__circle services-decoration__circle--3"></div>
        </section>
    </main>

<?php get_footer(); ?>