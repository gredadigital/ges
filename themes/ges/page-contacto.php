<?php
/**
 * Template Name: Contacto
 */

get_header();

$intro = carbon_get_the_post_meta('ges_contact_intro');

$form_shortcode = carbon_get_the_post_meta('ges_contact_form_shortcode');

$map_embed = carbon_get_the_post_meta('ges_contact_map_embed');

$schedule = carbon_get_the_post_meta('ges_contact_schedule');

$social = carbon_get_the_post_meta('ges_contact_social');

$branches = carbon_get_the_post_meta('ges_contact_branches');

$suggestions_intro = carbon_get_the_post_meta('ges_contact_suggestions_intro');

$suggestions_shortcode = carbon_get_the_post_meta('ges_contact_suggestions_shortcode');

?>

    <main class="contact-page">

        <section class="contact-header">

            <div class="container">

                <h1><?php the_title(); ?></h1>

                <div class="section-header__line"></div>

                <?php if ($intro) : ?>

                    <div class="contact-header__intro">

                        <?php echo wpautop(esc_html($intro)); ?>

                    </div>

                <?php endif; ?>

            </div>

        </section>



        <section class="contact-form">

            <div class="container">

                <?php

                if (!empty($form_shortcode)) {

                    echo do_shortcode($form_shortcode);

                }

                ?>

            </div>

        </section>



        <section class="contact-location">

            <div class="container">

                <h2>Ubicación principal</h2>

                <div class="section-header__line"></div>

                <?php if ($map_embed) : ?>

                    <div class="contact-map">

                        <?php echo $map_embed; ?>

                    </div>

                <?php endif; ?>



                <div class="contact-location__info">

                    <?php if ($schedule) : ?>

                        <article class="contact-card">

                            <h3>

                                Horario de atención

                            </h3>

                            <div>

                                <?php echo apply_filters('the_content', $schedule); ?>

                            </div>

                        </article>

                    <?php endif; ?>



                    <?php if (!empty($social)) : ?>

                        <article class="contact-card">

                            <h3>

                                Redes sociales

                            </h3>

                            <ul>

                                <?php foreach ($social as $network) : ?>

                                    <li>

                                        <a
                                                href="<?php echo esc_url($network['url']); ?>"
                                                target="_blank"
                                                rel="noopener"
                                        >

                                            <strong>

                                                <?php echo esc_html($network['network']); ?>

                                            </strong>

                                            <span>

                                            <?php echo esc_html($network['username']); ?>

                                        </span>

                                        </a>

                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </article>

                    <?php endif; ?>

                </div>

            </div>

        </section>



        <?php if (!empty($branches)) : ?>

            <section class="contact-branches">

                <div class="container">

                    <h2>

                        Nuestras sucursales

                    </h2>

                    <div class="section-header__line"></div>

                    <div class="branches-grid">

                        <?php foreach ($branches as $branch) : ?>

                            <article class="branch-card">

                                <h3>

                                    <?php echo esc_html($branch['city']); ?>

                                </h3>

                                <p>

                                    <?php echo nl2br(esc_html($branch['address'])); ?>

                                </p>

                                <p>

                                    <?php echo esc_html($branch['phone']); ?>

                                </p>

                                <p>

                                    <a href="mailto:<?php echo esc_attr($branch['email']); ?>">

                                        <?php echo esc_html($branch['email']); ?>

                                    </a>

                                </p>

                            </article>

                        <?php endforeach; ?>

                    </div>

                </div>

            </section>

        <?php endif; ?>



        <section class="contact-suggestions">

            <div class="container">

                <h2>

                    Buzón de sugerencias

                </h2>

                <div class="section-header__line"></div>

                <?php if ($suggestions_intro) : ?>

                    <div class="contact-suggestions__intro">

                        <?php echo wpautop(esc_html($suggestions_intro)); ?>

                    </div>

                <?php endif; ?>

                <?php

                if (!empty($suggestions_shortcode)) {

                    echo do_shortcode($suggestions_shortcode);

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