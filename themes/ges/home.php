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

                    <header class="section-header p-4">

                        <h2 class="
                           text-mobile-h2
                           text-center
                           uppercase
                           font-thin
                           px-8
                           leading-[100%]
                           tracking-[0.396px]
                           mb-1
                           relative
                           inline-block
                           after:content-['']
                           after:absolute
                           after:left-1/2
                           after:-translate-x-1/2
                           after:-bottom-4
                           after:h-[4px]
                           after:w-[60px]
                           after:rounded-full
                           after:bg-linear-to-r
                           after:from-azul-electrico
                           after:via-fucsia
                           after:to-fucsia-200
                        ">Nuestros servicios</h2>

                    </header>

                    <section
                            class="ges-slider ges-slider--services mb-[120px]"
                            data-renderer="translate"
                            data-pagination="false"
                            data-autoplay="0"
                            data-loop="false"
                            data-touch="true">

                        <div class="ges-slider__viewport">

                            <div class="ges-slider__track">

                                <?php foreach ( $servicios as $servicio ) : ?>

                                    <article class="ges-slider__item px-1">

                                        <article class="servicio-card">

                                            <div class="servicio-card__image pb-1">

                                                <?php
                                                echo wp_get_attachment_image(
                                                        $servicio['imagen'],
                                                        'large'
                                                );
                                                ?>

                                            </div>

                                            <div class="servicio-card__content">

                                                <h3 class="text-mobile-h3 mb-1 font-thin">

                                                    <?php echo esc_html( $servicio['titulo'] ); ?>

                                                </h3>

                                                <p class="text-mobile-p font-thin">

                                                    <?php echo esc_html( $servicio['texto'] ); ?>

                                                </p>

                                            </div>

                                        </article>

                                    </article>

                                <?php endforeach; ?>

                            </div>

                        </div>

                        <div class="ges-slider__pagination"></div>

                    </section>

                </div>

            </section>

        <?php endif; ?>

        <?php if ( ! empty( $pasos ) ) : ?>

            <section class="pasos">

                <div class="container">

                    <header class="section-header mb-4">

                        <h2 class="
                           text-mobile-h2
                           text-center
                           uppercase
                           font-thin
                           px-6
                           leading-[100%]
                           tracking-[0.396px]
                           mb-1
                           relative
                           inline-block
                           after:content-['']
                           after:absolute
                           after:left-1/2
                           after:-translate-x-1/2
                           after:-bottom-4
                           after:h-[4px]
                           after:w-[60px]
                           after:rounded-full
                           after:bg-linear-to-r
                           after:from-azul-electrico
                           after:via-fucsia
                           after:to-fucsia-200

">Pasos para trabajar con nosotros</h2>

                    </header>

                    <div class="pasos__slider bg-[linear-gradient(0deg,#005CFF_25.02%,#375EFF_32.07%,#8B61FF_43.82%,#C963FF_54%,#F065FF_61.04%,#F6F_64.96%,#F764FB_67.31%,#E45FF1_71.22%,#C356E1_75.92%,#964BCB_80.62%,#5C3CAF_86.88%,#162B8C_92.37%,#132A8B_93.15%)]">

                        <?php foreach ( $pasos as $paso ) : ?>

                            <article class="paso-card">

                                <div class="paso-card__numero">



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

                    <header class="section-header mb-4">

                        <h2 class="
 text-mobile-h2
                           text-center
                           uppercase
                           font-thin
                           px-6
                           leading-[100%]
                           tracking-[0.396px]
                           mb-1
                           relative
                           inline-block
                           after:content-['']
                           after:absolute
                           after:left-1/2
                           after:-translate-x-1/2
                           after:-bottom-4
                           after:h-[4px]
                           after:w-[60px]
                           after:rounded-full
                           after:bg-linear-to-r
                           after:from-azul-electrico
                           after:via-fucsia
                           after:to-fucsia-200
">Nuestra esencia</h2>

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