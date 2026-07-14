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

        <section class="impact-header bg-negro p-5 text-blanco min-h-screen">

            <div class="container h-full min-h-screen flex flex-col justify-between items-center">

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
                              after:from-verde-menta
                                after:via-azul-electrico
                                after:to-morado

"><?php the_title(); ?></h2>

<div class="flex flex-col justify-between items-center gap-2 ">
                <div class="impact-header__icon shrink-0">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon_leaf.png" alt="">
                </div>

                <?php if ( $claim ) : ?>

                    <h2 class="impact-header__claim
                              text-mobile-h2
                              uppercase
                              font-thin
                              leading-[100%] tracking-[0.396px]
                              text-center
                              inline-block
                              bg-[linear-gradient(90deg,#005CFF_-1.51%,#585FFF_17.49%,#F6F_52.49%,#FF70FF_58.49%,#FF8DFF_68.49%,#FFBDFF_82.49%,#FFF_98.49%)]
                              bg-clip-text
                              text-transparent
">

                        <?php echo esc_html( $claim ); ?>

                    </h2>
</div>
                <?php endif; ?>

                <?php if ( $subclaim ) : ?>

                    <p class="impact-header__subclaim
                              text-mobile-p
                              text-center
                              font-thin

">

                        <?php echo esc_html( $subclaim ); ?>

                    </p>

                <?php endif; ?>

            </div>

        </section>



        <section class="impact-intro p-2">

            <div class="container mb-9">

                <?php if ( $intro_img ) : ?>

                    <figure class="overflow-hidden aspect-[1/1]">

                        <?php
                        echo wp_get_attachment_image(
                                $intro_img,
                                'large',
                          false,
                          ['class' => 'w-full h-full object-cover', 'loading' => 'lazy']
                        );
                        ?>

                    </figure>

                <?php endif; ?>


                <?php if ( $intro_text ) : ?>

                    <div class="impact-intro__content
                    [&_p]:font-thin
                    [&_p]:text-mobile-p
">

                        <?php echo apply_filters(
                                'the_content',
                                $intro_text
                        ); ?>

                    </div>

                <?php endif; ?>

            </div>

        </section>



        <?php if ( ! empty( $innovacion_items ) ) : ?>

            <section class="impact-innovation p-2">

                <div class="container">

                    <h2 class="
                      text-mobile-h2
                                uppercase
                                text-center
                                font-thin
                                w-full
                                relative
                                inline-block
                                pb-6
                                leading-[100%] tracking-[0.396px]
                                after:content-['']
                                after:absolute
                                after:left-1/2
                                after:-translate-x-1/2
                                after:bottom-4
                                after:w-[60px]
                                after:h-[4px]
                                after:bg-linear-to-r
                              after:from-azul-electrico
                                after:via-fucsia
                                after:to-transparent
">

                        <?php echo esc_html( $innovacion_titulo ); ?>

                    </h2>

                    <p class="text-mobile-p text-center font-thin mb-2">

                        <?php echo esc_html( $innovacion_intro ); ?>

                    </p>
                  <div class="h-[1px] bg-[linear-gradient(270deg,#3E69FF_-6.25%,#4157FD_-1.75%,#4642FA_5%,#4935F9_11.75%,#4A31F9_17.37%,#4937F4_25.25%,#474BE9_35.37%,#436BD6_48.87%,#3F98BC_63.5%,#469CB9_69.13%,#59A7B3_77%,#7ABBAA_86%,#A6D59C_97.25%,#B0DB9A_98.38%)] mb-3"></div>

                    <div class="impact-grid">

                        <?php foreach ( $innovacion_items as $item ) : ?>

                            <article class="py-2 mb-2">

                                <?php
                                echo wp_get_attachment_image(
                                        $item['imagen'],
                                        'large',
                                  false,
                                  [
                                    'class' => 'w-full mb-1 block',
                                    'loading' => 'lazy',
                                  ]
                                );
                                ?>

                                <h3 class="text-mobile-h3 mb-[8px] font-thin leading-[100%] tracking-[-0.449px]">

                                    <?php echo esc_html( $item['titulo'] ); ?>

                                </h3>

                                <p class="text-mobile-p font-thin mb-2">

                                    <?php echo esc_html( $item['texto'] ); ?>

                                </p>
                              <div class="h-[1px] bg-[linear-gradient(270deg,#3E69FF_-6.25%,#4157FD_-1.75%,#4642FA_5%,#4935F9_11.75%,#4A31F9_17.37%,#4937F4_25.25%,#474BE9_35.37%,#436BD6_48.87%,#3F98BC_63.5%,#469CB9_69.13%,#59A7B3_77%,#7ABBAA_86%,#A6D59C_97.25%,#B0DB9A_98.38%)]"></div>

                            </article>

                        <?php endforeach; ?>

                    </div>

                </div>

            </section>

        <?php endif; ?>



        <?php if ( ! empty( $residuos_items ) ) : ?>

            <section class="impact-residuos p-2">

                <div class="container">

                    <h2 class="
                     text-mobile-h2
                                uppercase
                                text-center
                                font-thin
                                w-full
                                relative
                                inline-block
                                pb-6
                                leading-[100%] tracking-[0.396px]
                                after:content-['']
                                after:absolute
                                after:left-1/2
                                after:-translate-x-1/2
                                after:bottom-4
                                after:w-[60px]
                                after:h-[4px]
                                after:bg-linear-to-r
                              after:from-azul-electrico
                                after:via-fucsia
                                after:to-transparent
">

                        <?php echo esc_html( $residuos_titulo ); ?>

                    </h2>

                    <p class="text-mobile-p font-thin text-center mb-4">

                        <?php echo esc_html( $residuos_intro ); ?>

                    </p>

                    <div class="impact-grid">

                        <?php foreach ( $residuos_items as $item ) : ?>

                            <article class="impact-card
                              flex
                             flex-col
                             justify-end
                             items-center
                             self-stretch
                             bg-white
                              p-3
                               rounded-2xl
                             border-2
                             mb-3

                             py-2 mb-2">

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

                                <h3 class="text-mobile-h3 font-thin text-center">

                                    <?php echo esc_html( $item['titulo'] ); ?>

                                </h3>

                                <p class="text-mobile-p font-thin text-center">

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