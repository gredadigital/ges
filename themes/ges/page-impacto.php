<?php
/**
 * Template Name: Impacto
 */

get_header();

$claim      = carbon_get_the_post_meta( 'ges_impacto_claim' );
$subclaim   = carbon_get_the_post_meta( 'ges_impacto_subclaim' );

$intro_img  = carbon_get_the_post_meta( 'ges_impacto_intro_imagen' );
$intro_text = carbon_get_the_post_meta( 'ges_impacto_intro_texto' );

$innovacion_titulo = carbon_get_the_post_meta( 'ges_impacto_innovacion_titulo' );
$innovacion_intro  = carbon_get_the_post_meta( 'ges_impacto_innovacion_intro' );
$innovacion_items  = carbon_get_the_post_meta( 'ges_impacto_innovacion_items' );

$residuos_titulo = carbon_get_the_post_meta( 'ges_impacto_residuos_titulo' );
$residuos_intro  = carbon_get_the_post_meta( 'ges_impacto_residuos_intro' );
$residuos_items  = carbon_get_the_post_meta( 'ges_impacto_residuos_items' );

?>

    <main class="impact-page">

        <section class="impact-header">

            <div class="container">

                <h1><?php the_title(); ?></h1>

                <div class="section-header__line"></div>

                <div class="impact-header__icon">
                    <!-- Ícono decorativo fijo -->
                </div>

                <?php if ( $claim ) : ?>

                    <h2 class="impact-header__claim">

                        <?php echo esc_html( $claim ); ?>

                    </h2>

                <?php endif; ?>

                <?php if ( $subclaim ) : ?>

                    <p class="impact-header__subclaim">

                        <?php echo esc_html( $subclaim ); ?>

                    </p>

                <?php endif; ?>

            </div>

        </section>



        <section class="impact-intro">

            <div class="container">

                <?php if ( $intro_img ) : ?>

                    <figure>

                        <?php
                        echo wp_get_attachment_image(
                                $intro_img,
                                'large'
                        );
                        ?>

                    </figure>

                <?php endif; ?>


                <?php if ( $intro_text ) : ?>

                    <div class="impact-intro__content">

                        <?php echo apply_filters(
                                'the_content',
                                $intro_text
                        ); ?>

                    </div>

                <?php endif; ?>

            </div>

        </section>



        <?php if ( ! empty( $innovacion_items ) ) : ?>

            <section class="impact-innovation">

                <div class="container">

                    <h2>

                        <?php echo esc_html( $innovacion_titulo ); ?>

                    </h2>

                    <p>

                        <?php echo esc_html( $innovacion_intro ); ?>

                    </p>

                    <div class="impact-grid">

                        <?php foreach ( $innovacion_items as $item ) : ?>

                            <article>

                                <?php
                                echo wp_get_attachment_image(
                                        $item['imagen'],
                                        'large'
                                );
                                ?>

                                <h3>

                                    <?php echo esc_html( $item['titulo'] ); ?>

                                </h3>

                                <p>

                                    <?php echo esc_html( $item['texto'] ); ?>

                                </p>

                            </article>

                        <?php endforeach; ?>

                    </div>

                </div>

            </section>

        <?php endif; ?>



        <?php if ( ! empty( $residuos_items ) ) : ?>

            <section class="impact-residuos">

                <div class="container">

                    <h2>

                        <?php echo esc_html( $residuos_titulo ); ?>

                    </h2>

                    <p>

                        <?php echo esc_html( $residuos_intro ); ?>

                    </p>

                    <div class="impact-grid">

                        <?php foreach ( $residuos_items as $item ) : ?>

                            <article class="impact-card">

                                <?php if ( ! empty( $item['icono'] ) ) : ?>

                                    <figure>

                                        <?php
                                        echo wp_get_attachment_image(
                                                $item['icono'],
                                                'thumbnail'
                                        );
                                        ?>

                                    </figure>

                                <?php endif; ?>

                                <h3>

                                    <?php echo esc_html( $item['titulo'] ); ?>

                                </h3>

                                <p>

                                    <?php echo esc_html( $item['texto'] ); ?>

                                </p>

                            </article>

                        <?php endforeach; ?>

                    </div>

                </div>

            </section>

        <?php endif; ?>



        <section class="impact-decoration">

            <div class="impact-decoration__circle impact-decoration__circle--1"></div>

            <div class="impact-decoration__circle impact-decoration__circle--2"></div>

        </section>

    </main>

<?php get_footer(); ?>