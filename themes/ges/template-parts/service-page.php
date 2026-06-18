<?php

get_header();

$highlight = carbon_get_the_post_meta('ges_service_highlight');
$about     = carbon_get_the_post_meta('ges_service_about');

$products  = carbon_get_the_post_meta('ges_service_products');

$showroom  = carbon_get_the_post_meta('ges_service_showroom');

$specials  = carbon_get_the_post_meta('ges_service_specials');

$machinery = carbon_get_the_post_meta('ges_service_machinery');

$special_label = 'Acabados especiales';

if ( get_post_field( 'post_name', get_the_ID() ) === 'creative-touch' ) {
    $special_label = 'Materiales para soportes';
}

?>

    <main class="service-page">

        <section class="service-header">

            <div class="container">

                <h1 class="service-title">

                    <?php the_title(); ?>

                </h1>

                <div class="service-title-line"></div>

            </div>

        </section>



        <?php if ( $highlight ) : ?>

            <section class="service-highlight">

                <div class="container">

                    <div class="service-highlight__box">

                        <?php echo wpautop( esc_html( $highlight ) ); ?>

                    </div>

                </div>

            </section>

        <?php endif; ?>



        <nav class="service-nav">

            <div class="container">

                <ul>

                    <li>
                        <a href="#about">
                            ¿Qué es <?php the_title(); ?>?
                        </a>
                    </li>

                    <li>
                        <a href="#products">
                            Productos
                        </a>
                    </li>

                    <li>
                        <a href="#showroom">
                            Showroom Digital
                        </a>
                    </li>

                    <li>
                        <a href="#specials">
                            <?php echo esc_html( $special_label ); ?>
                        </a>
                    </li>

                    <li>
                        <a href="#machinery">
                            Nuestra Maquinaria
                        </a>
                    </li>

                </ul>

            </div>

        </nav>



        <?php if ( $about ) : ?>

            <section
                id="about"
                class="service-about"
            >

                <div class="container">

                    <h2>

                        ¿Qué es <?php the_title(); ?>?

                    </h2>

                    <div class="service-about__content">

                        <?php echo apply_filters( 'the_content', $about ); ?>

                    </div>

                </div>

            </section>

        <?php endif; ?>



        <?php if ( ! empty( $products ) ) : ?>

            <section
                id="products"
                class="service-products"
            >

                <div class="container">

                    <h2>

                        Productos

                    </h2>

                    <div class="service-products__grid">

                        <?php foreach ( $products as $product ) : ?>

                            <article class="product-card">

                                <h3>

                                    <?php echo esc_html( $product['title'] ); ?>

                                </h3>

                                <?php if ( ! empty( $product['description'] ) ) : ?>

                                    <p>

                                        <?php echo esc_html( $product['description'] ); ?>

                                    </p>

                                <?php endif; ?>

                            </article>

                        <?php endforeach; ?>

                    </div>


                </div>

            </section>

        <?php endif; ?>



        <?php if ( ! empty( $showroom ) ) : ?>

            <section
                id="showroom"
                class="service-showroom"
            >

                <div class="container">

                    <h2>

                        Showroom Digital

                    </h2>

                    <?php foreach ( $showroom as $category ) : ?>

                        <div class="showroom-category">

                            <h3>

                                <?php echo esc_html( $category['title'] ); ?>

                            </h3>

                            <div class="showroom-items">

                                <?php foreach ( $category['items'] as $item ) : ?>

                                    <article class="showroom-item">

                                        <?php if ( ! empty( $item['gallery'] ) ) : ?>

                                            <div class="showroom-item__gallery swiper">

                                                <div class="swiper-wrapper">

                                                    <?php foreach ( $item['gallery'] as $image_id ) : ?>

                                                        <div class="swiper-slide">

                                                            <?php
                                                            echo wp_get_attachment_image(
                                                                $image_id,
                                                                'large'
                                                            );
                                                            ?>

                                                        </div>

                                                    <?php endforeach; ?>

                                                </div>

                                            </div>

                                        <?php endif; ?>

                                        <h4>

                                            <?php echo esc_html( $item['title'] ); ?>

                                        </h4>

                                        <p>

                                            <?php echo esc_html( $item['description'] ); ?>

                                        </p>

                                        <?php if ( ! empty( $item['finishes'] ) ) : ?>

                                            <details>

                                                <summary>

                                                    Acabados disponibles

                                                </summary>

                                                <div>

                                                    <?php echo nl2br( esc_html( $item['finishes'] ) ); ?>

                                                </div>

                                            </details>

                                        <?php endif; ?>

                                        <?php if ( ! empty( $item['tiktok_url'] ) ) : ?>

                                            <a
                                                href="<?php echo esc_url( $item['tiktok_url'] ); ?>"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                            >

                                                Ver en TikTok

                                            </a>

                                        <?php endif; ?>

                                    </article>

                                <?php endforeach; ?>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </section>

        <?php endif; ?>



        <?php if ( ! empty( $specials ) ) : ?>

            <section
                id="specials"
                class="service-specials"
            >

                <div class="container">

                    <h2>

                        <?php echo esc_html( $special_label ); ?>

                    </h2>

                    <div class="service-specials__grid">

                        <?php foreach ( $specials as $special ) : ?>

                            <article class="special-card">

                                <?php if ( ! empty( $special['gallery'] ) ) : ?>

                                    <div class="special-card__gallery swiper">

                                        <div class="swiper-wrapper">

                                            <?php foreach ( $special['gallery'] as $image_id ) : ?>

                                                <div class="swiper-slide">

                                                    <?php
                                                    echo wp_get_attachment_image(
                                                        $image_id,
                                                        'large'
                                                    );
                                                    ?>

                                                </div>

                                            <?php endforeach; ?>

                                        </div>

                                    </div>

                                <?php endif; ?>

                                <h3>

                                    <?php echo esc_html( $special['title'] ); ?>

                                </h3>

                                <details>

                                    <summary>

                                        Ver más

                                    </summary>

                                    <div>

                                        <?php echo apply_filters(
                                            'the_content',
                                            $special['content']
                                        ); ?>

                                    </div>

                                </details>

                            </article>

                        <?php endforeach; ?>

                    </div>

                </div>

            </section>

        <?php endif; ?>



        <?php if ( ! empty( $machinery ) ) : ?>

            <section
                id="machinery"
                class="service-machinery"
            >

                <div class="container">

                    <h2>

                        Nuestra Maquinaria

                    </h2>

                    <div class="service-machinery__grid">

                        <?php foreach ( $machinery as $machine ) : ?>

                            <article class="machine-card">

                                <?php if ( ! empty( $machine['gallery'] ) ) : ?>

                                    <div class="machine-card__gallery swiper">

                                        <div class="swiper-wrapper">

                                            <?php foreach ( $machine['gallery'] as $image_id ) : ?>

                                                <div class="swiper-slide">

                                                    <?php
                                                    echo wp_get_attachment_image(
                                                        $image_id,
                                                        'large'
                                                    );
                                                    ?>

                                                </div>

                                            <?php endforeach; ?>

                                        </div>

                                    </div>

                                <?php endif; ?>

                                <h3>

                                    <?php echo esc_html( $machine['title'] ); ?>

                                </h3>

                                <p>

                                    <?php echo esc_html( $machine['description'] ); ?>

                                </p>

                            </article>

                        <?php endforeach; ?>

                    </div>

                </div>

            </section>

        <?php endif; ?>

    </main>

<?php get_footer(); ?>