<?php
/**
 * Template Name: Contacto
 */

get_header();

$intro                    = carbon_get_the_post_meta( 'ges_contact_intro' );
$form_shortcode           = carbon_get_the_post_meta( 'ges_contact_form_shortcode' );

$map_embed                = carbon_get_the_post_meta( 'ges_contact_map_embed' );
$schedule                 = carbon_get_the_post_meta( 'ges_contact_schedule' );
$social                   = carbon_get_the_post_meta( 'ges_contact_social' );

$branches                 = carbon_get_the_post_meta( 'ges_contact_branches' );

$suggestions_intro        = carbon_get_the_post_meta( 'ges_contact_suggestions_intro' );
$suggestions_shortcode    = carbon_get_the_post_meta( 'ges_contact_suggestions_shortcode' );

?>

    <main class="contact-page">

        <section class="contact-header bg-negro text-blanco px-2 py-6">

            <div class="container flex flex-col items-center justify-between">

                <h2 class="
                    text-mobile-h1
                              uppercase
                              font-thin
                              leading-[100%] tracking-[0.396px]
                              inline-block
                              bg-[linear-gradient(90deg,#005CFF_-1.51%,#585FFF_17.49%,#F6F_52.49%,#FF70FF_58.49%,#FF8DFF_68.49%,#FFBDFF_82.49%,#FFF_98.49%)]
                              bg-clip-text
                              text-transparent
">DEMOS FORMA A TUS IDEAS</h2>


                <?php if ( ! empty( $intro ) ) : ?>


                    <div class="contact-header__intro [&_p]:font-thin [&_p]:text-mobile-p py-2 pr-4">

                        <?php echo wpautop( esc_html( $intro ) ); ?>

                    </div>

                <?php endif; ?>

            </div>

        </section>



        <section class="contact-form p-2">

            <div class="container">

              <?php get_template_part( 'template-parts/contact-form' ); ?>

            </div>

        </section>



        <section class="contact-location p-2">

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

">Ubicación principal</h2>


                <?php if ( ! empty( $map_embed ) ) : ?>


                      <div class="contact-map w-full h-[450px] mb-2">
                        <iframe
                          class="w-full h-full border-0"
                          src="https://maps.google.com/maps?hl=en&q=La%20Paz%20Bolivia%20av,%20zudañez%201431&t=&z=14&ie=UTF8&iwloc=B&output=embed"
                          loading="lazy"
                          allowfullscreen>
                        </iframe>
                      </div>


                <?php endif; ?>



                <div class="contact-location__info">

                    <?php if ( ! empty( $schedule ) ) : ?>
                        <div class="mb-2 rounded-2xl p-[2px] bg-[linear-gradient(270deg,#3E69FF_-6.25%,#4157FD_-1.75%,#4642FA_5%,#4935F9_11.75%,#4A31F9_17.37%,#4937F4_25.25%,#474BE9_35.37%,#436BD6_48.87%,#3F98BC_63.5%,#469CB9_69.13%,#59A7B3_77%,#7ABBAA_86%,#A6D59C_97.25%,#B0DB9A_98.38%)]">
                        <article class="contact-card flex items-center gap-2 p-2
                        bg-white rounded-[calc(theme(borderRadius.2xl)-2px)]
">



                          <span class="block"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/clock.svg" alt=""></span>

                            <div class="[&_p]:text-mobile-p [&_p]:font-thin">

                              <h3 class="text-mobile-h3 font-bold">Horario de atención</h3>
                                <?php echo apply_filters( 'the_content', $schedule ); ?>

                            </div>

                        </article>
                        </div>
                    <?php endif; ?>



                    <?php if ( ! empty( $social ) ) : ?>
                        <div class="mb-2 rounded-2xl p-[2px] bg-[linear-gradient(270deg,#3E69FF_-6.25%,#4157FD_-1.75%,#4642FA_5%,#4935F9_11.75%,#4A31F9_17.37%,#4937F4_25.25%,#474BE9_35.37%,#436BD6_48.87%,#3F98BC_63.5%,#469CB9_69.13%,#59A7B3_77%,#7ABBAA_86%,#A6D59C_97.25%,#B0DB9A_98.38%)]">
                        <article class="contact-card p-2
                        bg-white rounded-[calc(theme(borderRadius.2xl)-2px)]">

                            <h3 class="text-mobile-h3 font-bold">Redes sociales</h3>
                            <p class="text-mobile-p font-thin mb-2">Síguenos en nuestras redes sociales para estar al día con nuestras novedades</p>
                            <ul class="contact-social">

                                <?php foreach ( $social as $network ) : ?>

                                    <li class="mb-[8px]">

                                        <a
                                                href="<?php echo esc_url( $network['url'] ); ?>"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="block flex justify-between items-center"
                                        >
                                            <div class="flex gap-[8px] items-center">
                                              <span>

                                                  <?php
                                                  if ( ! empty( $network['icono'] ) ) {

                                                    echo wp_get_attachment_image(
                                                      $network['icono'],
                                                      'thumbnail',
                                                      false,
                                                      [
                                                        'class' => '',
                                                        'alt'   => esc_attr( $network['network'] ),
                                                      ]
                                                    );

                                                  }
                                                  ?>

                                              </span>


                                              <span class="text-mobile-p font-thin">

                                                <?php echo esc_html( $network['network'] ); ?>

                                            </span>
                                            </div>
                                           <div class="flex gap-[8px] items-center">

                                            <?php if ( ! empty( $network['username'] ) ) : ?>

                                                <span class="text-mobile-p font-thin">

                                                <?php echo esc_html( $network['username'] ); ?>

                                               </span>

                                            <?php endif; ?>
                                             <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/url_flecha.svg" alt=""></span>
                                           </div>
                                        </a>

                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </article>
                        </div>
                    <?php endif; ?>

                </div>

            </div>

        </section>



        <?php if ( ! empty( $branches ) ) : ?>

            <section class="contact-branches px-2">

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

                    ">Nuestras sucursales</h2>

                    <div class="section-header__line"></div>

                    <div class="branches-grid">

                        <?php foreach ( $branches as $branch ) : ?>
                            <div class="mb-2 rounded-2xl p-[2px] bg-[linear-gradient(90deg,#005CFF_0%,#585FFF_19%,#FF66FF_54%,#FF70FF_60%,#FF8DFF_70%,#FFBDFF_84%,#FFFFFF_100%)]">
                            <article class="branch-card p-2
                        bg-white rounded-[calc(theme(borderRadius.2xl)-2px)]">

                                <h3 class="text-mobile-h3 font-bold mb-5">

                                    <?php echo esc_html( $branch['city'] ); ?>

                                </h3>
                                <div class="flex justify-start gap-4 items-center mb-1">
                                <?php if ( ! empty( $branch['address'] ) ) : ?>
                                  <span class="w-[33px] h-[33px]"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/location.svg" alt=""></span>
                                    <p class="text-mobile-p font-thin">

                                        <?php echo nl2br( esc_html( $branch['address'] ) ); ?>

                                    </p>

                                <?php endif; ?>
                                </div>
                              <div class="flex justify-start gap-4 items-center mb-1">
                                <?php if ( ! empty( $branch['phone'] ) ) : ?>
                                  <span class="w-[33px] h-[33px]"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.svg" alt=""></span>
                                    <p class="text-mobile-p font-thin">

                                        <?php echo esc_html( $branch['phone'] ); ?>

                                    </p>

                                <?php endif; ?>
                              </div>
                              <div class="flex justify-start gap-4 items-center mb-1"

                                <?php if ( ! empty( $branch['email'] ) ) : ?>
                                  <span class="w-[33px] h-[33px]"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.svg" alt=""></span>
                                    <p class="text-mobile-p font-thin">

                                        <a href="mailto:<?php echo antispambot( esc_attr( $branch['email'] ) ); ?>">

                                            <?php echo esc_html( $branch['email'] ); ?>

                                        </a>

                                    </p>

                                <?php endif; ?>
                            </div>
                            </article>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>

            </section>

        <?php endif; ?>



        <section class="contact-suggestions bg-negro py-3 px-2 text-blanco">

            <div class="container">

                <h2 class=" text-mobile-h2
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
                                after:to-transparent">Buzón de sugerencias</h2>


                <?php if ( ! empty( $suggestions_intro ) ) : ?>

                    <div class="contact-suggestions__intro [&_p]:font-thin [&_p]:text-mobile-p [&_p]:mb-2 [&_p]:text-center">

                        <?php echo wpautop( esc_html( $suggestions_intro ) ); ?>

                    </div>

                <?php endif; ?>

                <?php

                if ( ! empty( $suggestions_shortcode ) ) {
                    echo do_shortcode( $suggestions_shortcode );
                }

                ?>

            </div>

        </section>



        <section class="contact-decoration">

            <div class="contact-decoration__circle contact-decoration__circle--1"></div>

            <div class="contact-decoration__circle contact-decoration__circle--2"></div>

        </section>

    </main>

<?php get_footer(); ?>