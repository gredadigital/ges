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

            <section class="pasos py-10 md:py-16">

                <div class="container">

                    <header class="section-header text-center mb-8 md:mb-12">

                        <h2 class="
                text-mobile-h2
                md:text-desktop-h2
                text-center
                uppercase
                font-thin
                px-6
                leading-[100%]
                tracking-[0.396px]
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
            ">
                            Pasos para trabajar con nosotros
                        </h2>

                    </header>

                    <div
                            class="
                ges-slider
                pasos__slider
                relative
                w-full
                min-h-[684px]
                md:min-h-[493px]
                lg:min-h-[680px]
                overflow-hidden
                bg-[linear-gradient(0deg,#005CFF_25.02%,#375EFF_32.07%,#8B61FF_43.82%,#C963FF_54%,#F065FF_61.04%,#F6F_64.96%,#F764FB_67.31%,#E45FF1_71.22%,#C356E1_75.92%,#964BCB_80.62%,#5C3CAF_86.88%,#162B8C_92.37%,#132A8B_93.15%)]
                [&_.ges-slider__item]:opacity-0
                [&_.ges-slider__item]:pointer-events-none
                [&_.ges-slider__item]:transition-opacity
                [&_.ges-slider__item]:duration-300
                [&_.ges-slider__item.is-active]:opacity-100
                [&_.ges-slider__item.is-active]:pointer-events-auto
                [&_.ges-slider__dot]:w-[35px]
                [&_.ges-slider__dot]:h-[4px]
                [&_.ges-slider__dot]:bg-white/60
                [&_.ges-slider__dot.is-active]:bg-azul-electrico
            "
                            data-renderer="fade"
                            data-autoplay="0"
                            data-loop="true"
                    >

                        <div
                                class="
                    pasos__panel
                    absolute
                    inset-0
                    z-10
                    bg-[#181827]
                    [clip-path:polygon(100%_0%,82%_76%,0%_100%,18%_16%)]
                "
                        ></div>

                        <div
                                class="
                    absolute
                    z-20
                    left-[25%]
                    top-[22%]
                    w-[50%]
                    h-[42%]
                    md:left-[22%]
                    md:top-[23%]
                    md:w-[58%]
                    md:h-[35%]
                    lg:left-[22%]
                    lg:top-[28%]
                    lg:w-[60%]
                    lg:h-[30%]
                "
                        >

                            <div class="ges-slider__viewport relative h-full overflow-hidden">

                                <div class="ges-slider__track relative h-full">

                                    <?php foreach ( $pasos as $index => $paso ) : ?>

                                        <article
                                                class="ges-slider__item absolute inset-0 <?php echo $index === 0 ? 'is-active' : ''; ?>"
                                        >

                                            <div class="paso-card max-w-[360px] md:max-w-[620px] lg:max-w-[900px]">

                                                <div class="
                                        paso-card__numero
                                        text-blanco
                                        text-[12px]
                                        font-bold
                                        uppercase
                                        leading-[100%]

                                    ">
                                                    <?php echo esc_html( $paso['numero'] ); ?>
                                                </div>

                                                <h3 class="
                                        paso-card__titulo
                                        text-white
                                        text-mobile-h3
                                        md:text-[26px]
                                        lg:text-[32px]
                                        font-thin
                                        leading-[105%]
                                        mb-1
                                    ">
                                                    <?php echo esc_html( $paso['titulo'] ); ?>
                                                </h3>

                                                <div class="
                                        paso-card__texto
                                        text-white
                                        text-1
                                        md:text-[20px]
                                        lg:text-[28px]
                                        font-thin
                                        leading-[124%]
                                    ">
                                                    <?php echo wpautop( esc_html( $paso['texto'] ) ); ?>
                                                </div>

                                            </div>

                                        </article>

                                    <?php endforeach; ?>

                                </div>

                            </div>

                        </div>

                        <div class="
                pasos__controls
                absolute
                z-30
                left-1/2
                bottom-[25%]
                -translate-x-1/2
                inline-flex
                items-center
                justify-center
                gap-[16px]
                md:bottom-[25%]
                lg:bottom-[33%]
                w-fit
            ">

                            <button type="button" class="ges-slider__prev text-white text-1 leading-none" aria-label="Paso anterior">
                                ←
                            </button>

                            <div class="ges-slider__pagination inline-flex items-center gap-[8px] w-fit shrink-0"></div>

                            <button type="button" class="ges-slider__next text-white text-1 leading-none" aria-label="Paso siguiente">
                                →
                            </button>

                        </div>

                        <div class="
                pasos__cta
                absolute
                z-30
                right-[8%]
                bottom-[6%]
                md:right-[5%]
                md:bottom-[12%]
                lg:right-[6%]
                lg:bottom-[10%]
            ">

                            <a
                                    href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"
                                    class="
                        inline-flex
                        items-center
                        justify-center
                        gap-3
                        py-[8px]
                        px-[10px]
                        rounded-[8px]
                        bg-blanco
                        text-negro
                        text-mobile-button
                        md:text-[18px]
                        lg:text-[22px]
                        font-thin
                        uppercase
                        leading-none
                    "
                            >
                                Contacto →
                            </a>

                        </div>

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