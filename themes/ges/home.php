<?php
/**
 * Template Name: Home
 */
ges_enqueue_component('slider');
get_header();

$slider = carbon_get_the_post_meta( 'ges_home_slider' );

$servicios = carbon_get_the_post_meta( 'ges_home_servicios' );

$pasos = carbon_get_the_post_meta( 'ges_home_pasos' );

$mision  = carbon_get_the_post_meta( 'ges_home_mision' );
$vision  = carbon_get_the_post_meta( 'ges_home_vision' );
$valores = carbon_get_the_post_meta( 'ges_home_valores' );
?>

    <main class="home">

        <?php if ( ! empty( $slider ) ) : ?>

            <section class="ges-slider ges-slider--hero" data-slider="fade">

                <div class="ges-slider__viewport">

                    <div class="ges-slider__track">

                        <?php foreach ($slider as $index => $slide) : ?>

                            <article class="ges-slider__item <?php echo $index === 0 ? 'is-active' : ''; ?>">

                                <?php
                                echo wp_get_attachment_image(
                                        $slide['imagen'],
                                        'full',
                                        false,
                                        [
                                                'class' => 'ges-slider__image',
                                                'alt' => $slide['alt'] ?? '',
                                                'loading' => $index === 0 ? 'eager' : 'lazy',
                                                'fetchpriority' => $index === 0 ? 'high' : 'auto',
                                        ]
                                );
                                ?>

                            </article>

                        <?php endforeach; ?>

                    </div>

                </div>

                <div class="ges-slider__pagination"></div>

            </section>

            <div class="flex justify-center mb-9">
                <span>
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/flecha_abajo.svg" alt="">
                </span>
            </div>
        <?php endif; ?>



        <?php if ( ! empty( $servicios ) ) : ?>

            <section class="servicios">

                <div class="container">

                    <header class="section-header">

                        <h2>Nuestros servicios</h2>

                    </header>

                    <div class="servicios__slider">

                        <?php foreach ( $servicios as $servicio ) : ?>

                            <article class="servicio-card">

                                <div class="servicio-card__image">

                                    <?php
                                    echo wp_get_attachment_image(
                                            $servicio['imagen'],
                                            'large'
                                    );
                                    ?>

                                </div>

                                <div class="servicio-card__content">

                                    <h3>

                                        <?php echo esc_html( $servicio['titulo'] ); ?>

                                    </h3>

                                    <p>

                                        <?php echo esc_html( $servicio['texto'] ); ?>

                                    </p>

                                </div>

                            </article>

                        <?php endforeach; ?>

                    </div>

                </div>

            </section>

        <?php endif; ?>



        <?php if ( ! empty( $pasos ) ) : ?>

            <section class="pasos">

                <div class="container">

                    <header class="section-header">

                        <h2>Pasos para trabajar con nosotros</h2>

                    </header>

                    <div class="pasos__slider">

                        <?php foreach ( $pasos as $paso ) : ?>

                            <article class="paso-card">

                                <div class="paso-card__numero">

                                    PASO

                                    <?php echo esc_html( $paso['numero'] ); ?>

                                </div>

                                <h3 class="paso-card__titulo">

                                    <?php echo esc_html( $paso['titulo'] ); ?>

                                </h3>

                                <div class="paso-card__texto">

                                    <p>

                                        <?php echo esc_html( $paso['texto'] ); ?>

                                    </p>

                                </div>

                            </article>

                        <?php endforeach; ?>

                    </div>

                    <div class="pasos__controls">

                        <button type="button" class="pasos-prev">

                            ←

                        </button>

                        <div class="pasos-pagination"></div>

                        <button type="button" class="pasos-next">

                            →

                        </button>

                    </div>

                    <div class="pasos__cta">

                        <a
                                href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"
                                class="button"
                        >

                            Contacto →

                        </a>

                    </div>

                </div>

            </section>

        <?php endif; ?>



        <?php if ( $mision || $vision || $valores ) : ?>

            <section class="esencia">

                <div class="container">

                    <header class="section-header">

                        <h2>Nuestra esencia</h2>

                    </header>

                    <div class="esencia__grid">

                        <?php if ( $mision ) : ?>

                            <article class="esencia-card">

                                <h3>

                                    Misión

                                </h3>

                                <p>

                                    <?php echo nl2br( esc_html( $mision ) ); ?>

                                </p>

                            </article>

                        <?php endif; ?>



                        <?php if ( $vision ) : ?>

                            <article class="esencia-card">

                                <h3>

                                    Visión

                                </h3>

                                <p>

                                    <?php echo nl2br( esc_html( $vision ) ); ?>

                                </p>

                            </article>

                        <?php endif; ?>



                        <?php if ( $valores ) : ?>

                            <article class="esencia-card">

                                <h3>

                                    Valores

                                </h3>

                                <p>

                                    <?php echo nl2br( esc_html( $valores ) ); ?>

                                </p>

                            </article>

                        <?php endif; ?>

                    </div>

                </div>

            </section>

        <?php endif; ?>

    </main>

<?php get_footer(); ?>