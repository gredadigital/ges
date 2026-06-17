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

    <main class="quienes-somos">
        <?php if ( $historia_imagen || $historia_texto ) : ?>
            <section class="historia">
                <div class="container">
                    <header class="section-header">
                        <h2>Nuestra historia</h2>
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

                            <div class="historia__text">
                                <?php echo apply_filters( 'the_content', $historia_texto ); ?>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php if ( ! empty( $elegirnos ) ) : ?>
            <section class="elegirnos">
                <div class="container">
                    <header class="section-header">
                        <h2>¿Por qué elegirnos?</h2>
                    </header>
                    <div class="elegirnos__grid">
                        <?php foreach ( $elegirnos as $index => $item ) : ?>
                            <article class="elegirnos-card">
                                <div class="elegirnos-card__icon">
                                    <?php
                                    /*
                                     * Aquí irán los íconos fijos definidos
                                     * en el template según la posición.
                                     */
                                    ?>
                                </div>
                                <h3>
                                    <?php echo esc_html( $item['titulo'] ); ?>
                                </h3>
                                <div class="elegirnos-card__text">
                                    <p>
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
            <div class="container">
                <div class="compromiso-visual__graphic">
                    <?php
                    /*
                     * Elemento circular fijo del diseño.
                     * Puede implementarse posteriormente
                     * mediante SVG, CSS o imagen del tema.
                     */
                    ?>
                </div>
            </div>
        </section>

        <?php if ( $mensaje || $nombre || $cargo || $foto ) : ?>
            <section class="presidencia">
                <div class="container">
                    <header class="section-header">
                        <h2>Un compromiso desde la presidencia</h2>
                    </header>
                    <div class="presidencia__content">
                        <article class="presidencia-card">
                            <?php if ( $mensaje ) : ?>
                                <div class="presidencia-card__quote">
                                    <?php echo apply_filters( 'the_content', $mensaje ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( $nombre || $cargo || $foto ) : ?>
                                <footer class="presidencia-card__author">
                                    <?php if ( $foto ) : ?>
                                        <figure class="presidencia-card__photo">
                                            <?php
                                            echo wp_get_attachment_image(
                                                    $foto,
                                                    'thumbnail'
                                            );
                                            ?>
                                        </figure>

                                    <?php endif; ?>

                                    <div class="presidencia-card__info">
                                        <?php if ( $nombre ) : ?>
                                            <h3>
                                                <?php echo esc_html( $nombre ); ?>
                                            </h3>

                                        <?php endif; ?>

                                        <?php if ( $cargo ) : ?>
                                            <p>
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