<?php
/**
 * Template Name: Quiénes Somos
 */

get_header();

$historia_imagen = carbon_get_the_post_meta( 'ges_quienes_historia_imagen' );
$historia_texto  = carbon_get_the_post_meta( 'ges_quienes_historia_texto' );

$elegirnos = carbon_get_the_post_meta( 'ges_quienes_elegirnos' );

$mensaje = carbon_get_the_post_meta( 'ges_quienes_presidencia_mensaje' );
$nombre  = carbon_get_the_post_meta( 'ges_quienes_presidencia_nombre' );
$cargo   = carbon_get_the_post_meta( 'ges_quienes_presidencia_cargo' );
$foto    = carbon_get_the_post_meta( 'ges_quienes_presidencia_foto' );
?>

    <main class="quienes-somo">
        <?php if ( $historia_imagen || $historia_texto ) : ?>
            <section class="historia mt-7 mb-8 px-2">
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

">Nuestra historia</h2>
                    </header>
                    <div class="historia__content">
                        <?php if ( $historia_imagen ) : ?>
                            <figure class="historia__image">
                                <?php
                                echo wp_get_attachment_image(
                                        $historia_imagen,
                                        'large'
                                );
                                ?>
                            </figure>

                        <?php endif; ?>
                        <?php if ( $historia_texto ) : ?>

                            <div class="historia__text
                            [&_p]:text-mobile-p
                            [&_p]:font-thin

                                ">
                                <?php echo apply_filters( 'the_content', $historia_texto ); ?>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php if ( ! empty( $elegirnos ) ) : ?>
            <section class="elegirnos px-2">
                <div class="container">
                    <header class="section-header">
                        <h2 class="
                            text-mobile-h2
                           text-center
                           uppercase
                           font-thin
                           px-8
                           leading-[100%]
                           tracking-[0.396px]
                           mb-6
                           w-full
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
                        ">¿Por qué elegirnos?</h2>
                    </header>
                    <div class="elegirnos__grid">
                        <?php foreach ( $elegirnos as $index => $item ) : ?>
                            <article class="elegirnos-card
                             flex
                             flex-col
                             justify-end
                             items-start
                             self-stretch
                             bg-white
                              p-3
                               rounded-2xl
                             border-2
                             mb-3">
                                <div class="elegirnos-card__icon">

                                </div>
                                <h3 class="
text-mobile-h3 font-thin">
                                    <?php echo esc_html( $item['titulo'] ); ?>
                                </h3>
                                <div class="elegirnos-card__text">
                                    <p class="text-mobile-p font-thin">
                                        <?php echo esc_html( $item['texto'] ); ?>
                                    </p>
                                </div>
                            </article>

                        <?php endforeach; ?>

                    </div>
                </div>
            </section>

        <?php endif; ?>

        <section class="compromiso-visual">
            <div class="container flex justify-center">
                <div class="compromiso-visual__graphic">

                </div>
            </div>
        </section>

        <?php if ( $mensaje || $nombre || $cargo || $foto ) : ?>
            <section class="presidencia p-2">
                <div class="container">
                    <header class="section-header">
                        <h2 class="
                            leading-[100%]
                            tracking-[0.396px]
                            font-thin
                            text-mobile-h2
                            text-center
                            uppercase
                            pt-[200px]
                            pb-[260px]
                            px-8
                            bg-[linear-gradient(90deg,#005CFF_0%,#585FFF_17.49%,#F6F_52.49%,#FF70FF_58.49%,#FF8DFF_68.49%,#FFBDFF_82.49%,#FFF_98.49%)]
                            bg-clip-text
                            text-transparent
                        ">
                            Un compromiso desde la presidencia
                        </h2>
                    </header>
                    <div class="presidencia__content">
                        <article class="presidencia-card bg-white p-3 rounded-2xl shadow-[0_4px_8px_0_rgba(0,0,0,0.16)] flex flex-col gap-4">
                            <img class="w-[100px]" src="<?php echo get_template_directory_uri(); ?>/assets/images/quotes.png" alt="">
                            <?php if ( $mensaje ) : ?>
                                <div class="presidencia-card__quote [&_p]:text-mobile-p [&_p]:font-thin mb-4">
                                    <?php echo apply_filters( 'the_content', $mensaje ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( $nombre || $cargo || $foto ) : ?>
                                <footer class="presidencia-card__author flex justify-end w-full gap-[10px]">
                                    <?php if ( $foto ) : ?>
                                        <figure class="presidencia-card__photo order-2 rounded-full overflow-hidden shrink-0 [&_img]:w-[57px] [&_img]:h-[57px]">
                                            <?php
                                            echo wp_get_attachment_image(
                                                    $foto,
                                                    'thumbnail'
                                            );
                                            ?>
                                        </figure>

                                    <?php endif; ?>

                                    <div class="presidencia-card__info order-1">
                                        <?php if ( $nombre ) : ?>
                                            <h3 class="text-mobile-p2 font-thin text-right w-[113px] leading-[120%]">
                                                <?php echo esc_html( $nombre ); ?>
                                            </h3>

                                        <?php endif; ?>

                                        <?php if ( $cargo ) : ?>
                                            <p class="text-mobile-p font-regular uppercase text-right">
                                                <?php echo esc_html( $cargo ); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </footer>
                            <?php endif; ?>
                        </article>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </main>

<?php get_footer(); ?>