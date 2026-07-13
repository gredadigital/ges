<?php
/**
 * Contenido compartido para páginas de servicio:
 * - Sagitario
 * - Flexo Print
 * - Creative Touch
 */

defined('ABSPATH') || exit;

$page_id = get_the_ID();

$highlight = carbon_get_post_meta(
    $page_id,
    'ges_service_highlight'
);

$about = carbon_get_post_meta(
    $page_id,
    'ges_service_about'
);

$products = carbon_get_post_meta(
    $page_id,
    'ges_service_products'
);

$showroom = carbon_get_post_meta(
    $page_id,
    'ges_service_showroom'
);

$specials = carbon_get_post_meta(
    $page_id,
    'ges_service_specials'
);

$machinery = carbon_get_post_meta(
    $page_id,
    'ges_service_machinery'
);

$page_slug = get_post_field(
    'post_name',
    $page_id
);

/*
 * Creative Touch utiliza materiales.
 * Sagitario y Flexo Print utilizan acabados especiales.
 */
$specials_title = (
    'creative-touch' === $page_slug ||
    'creative-toucb' === $page_slug
)
    ? 'Materiales'
    : 'Acabados especiales';

/**
 * Normaliza una galería de Carbon Fields.
 *
 * @param mixed $gallery Galería recibida desde Carbon Fields.
 *
 * @return int[]
 */
$get_gallery_ids = static function ($gallery): array {

    if (!is_array($gallery)) {
        return [];
    }

    return array_values(
        array_filter(
            array_map(
                'absint',
                $gallery
            )
        )
    );
};

?>

<main
    id="primary"
    class="
        service-page
        service-page--<?php echo esc_attr($page_slug); ?>
        overflow-hidden
    "
>

    <!-- ======================================================
         CABECERA DEL SERVICIO
    ======================================================= -->

    <header class="service-page__header">

        <div class="container py-6 md:py-8">

            <h2
                class="
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
                                after:to-transparent                "
            >
                <?php the_title(); ?>
            </h2>

        </div>

    </header>


    <!-- ======================================================
         TEXTO DESTACADO
    ======================================================= -->

    <?php if (!empty($highlight)) : ?>

        <section class="service-highlight px-2">

            <div class="container bg-negro rounded-[16px]">

                <div
                    class="
                        service-highlight__inner
                        bg-azul-oscuro
                        text-blanco
                        rounded-[8px]

                        px-5 py-[140px]
                        md:px-6
                        md:py-8
                    "
                >

                    <p
                        class="
                            service-highlight__text
                            text-mobile-h3
                            self-stretch
                            leading-[100%]
                            tracking-[-0.449px]
                            md:text-desktop-h2
                            font-thin
                            text-center
                            [background-image:linear-gradient(90deg,#005CFF_-1.51%,#585FFF_17.49%,#F6F_52.49%,#FF70FF_58.49%,#FF8DFF_68.49%,#FFBDFF_82.49%,#FFF_98.49%)]
                            bg-clip-text
                            text-transparent

                        "
                    >



                        <?php echo nl2br(esc_html($highlight)); ?>
                    </p>

                </div>

            </div>

        </section>

    <?php endif; ?>

    <?php
    $page_id       = get_the_ID();
    $page_template = get_page_template_slug($page_id);
    $page_title    = get_the_title($page_id);

    $is_creative_touch = in_array(
        $page_template,
        [
            'page-creative-touch.php',
            'page-creative-toucb.php',
        ],
        true
    );

    $service_menu = [
        [
            'label' => sprintf(
                '¿Qué es %s?',
                $page_title
            ),
            'target' => 'que-es',
        ],
        [
            'label'  => 'Showroom digital',
            'target' => 'showroom-digital',
        ],
        [
            'label' => $is_creative_touch
                ? 'Materiales para soportes'
                : 'Acabados especiales',
            'target' => $is_creative_touch
                ? 'materiales-para-soportes'
                : 'acabados-especiales',
        ],
        [
            'label'  => 'Maquinaria',
            'target' => 'maquinaria',
        ],
    ];
    ?>

    <nav
        class="service-menu py-3 md:py-4 px-2"
        aria-label="Secciones de <?php echo esc_attr($page_title); ?>"
    >
        <div class="container">

            <ul
                class="
                service-menu__list
                grid
                grid-cols-1
                gap-[6px]
                md:grid-cols-2
                lg:grid-cols-4
                md:gap-1
            "
            >

                <?php foreach ($service_menu as $menu_item) : ?>

                    <li class="service-menu__item">

                        <a
                            href="#<?php echo esc_attr($menu_item['target']); ?>"
                            class="
                            service-menu__link
                            flex
                            min-h-[34px]
                            w-full
                            items-center
                            justify-center
                            gap-1
                            rounded-[8px]
                            bg-negro
                            px-1
                            py-[7px]
                            text-blanco

                            transition-opacity
                            hover:opacity-80
                            focus-visible:outline-2
                            focus-visible:outline-offset-2
                            focus-visible:outline-azul-electrico
                        "
                        >

                        <span
                            class="
                                text-center
                                text-mobile-button
                                font-thin
                                uppercase
                                leading-[100%]
                            "
                        >
                            <?php echo esc_html($menu_item['label']); ?>
                        </span>

                        </a>

                    </li>

                <?php endforeach; ?>

            </ul>

        </div>
    </nav>


    <!-- ======================================================
         ¿QUÉ ES?
    ======================================================= -->

    <?php if (!empty($about)) : ?>

        <section id="que-es" class="service-about py-6 md:py-12 px-2">

            <div class="container">

                <header class="section-header mb-4 md:mb-6">

                    <h2
                        class="
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
                                after:w-[60px]
                                after:h-[4px]
                                after:bg-linear-to-r
                              after:from-azul-electrico
                                after:via-fucsia
                                after:to-transparent
                        "
                    >
                        ¿Qué es <?php the_title(); ?>?
                    </h2>

                </header>

                <div
                    class="
                        service-about__content
                        wysiwyg
                        max-w-[960px]
                        mx-auto
                        text-mobile-p
                        md:text-desktop-p
                        font-thin
                        leading-relaxed
                    "
                >
                    <?php
                    echo apply_filters(
                        'the_content',
                        $about
                    );
                    ?>
                </div>

            </div>

        </section>

    <?php endif; ?>

    <!-- ======================================================
     PRODUCTOS
======================================================= -->

    <?php if ( ! empty( $products ) ) : ?>

        <section
            id="productos"
            class="service-products py-6 md:py-10 px-2"
        >

            <div class="container">

                <header class="section-header mb-5">

                    <h2
                        class="
                    text-mobile-h2
                    md:text-desktop-h2
                    uppercase
                    font-thin
                "
                    >
                        Productos
                    </h2>

                </header>

                <div class="service-products__table">

                    <?php foreach ( $products as $product ) : ?>

                        <div
                            class="
                        service-products__row
                        grid
                        grid-cols-[110px_1fr]
                        md:grid-cols-[220px_1fr]
                        gap-x-3
                        md:gap-x-8
                        py-3
                    "
                        >

                            <div
                                class="
                            service-products__title
                            text-mobile-p
                            md:text-desktop-p
                            font-bold
                            leading-tight
                        "
                            >
                                <?php echo esc_html( $product['title'] ); ?>
                            </div>

                            <div
                                class="
                            service-products__description
                            text-mobile-p
                            md:text-desktop-p
                            font-thin
                            leading-relaxed
                        "
                            >
                                <?php
                                echo nl2br(
                                    esc_html(
                                        $product['description']
                                    )
                                );
                                ?>
                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>

    <?php endif; ?>


    <!-- ======================================================
         SHOWROOM DIGITAL
    ======================================================= -->

    <?php if ( ! empty( $showroom ) && is_array( $showroom ) ) : ?>

        <section
            id="showroom-digital"
            class="service-showroom py-6 md:py-12 scroll-mt-[100px] px-2"
        >

            <div class="container">

                <header class="section-header mb-5 md:mb-8">

                    <h2
                        class="
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
                                after:w-[60px]
                                after:h-[4px]
                                after:bg-linear-to-r
                              after:from-azul-electrico
                                after:via-fucsia
                                after:to-transparent
                    "
                    >
                        Showroom digital
                    </h2>

                </header>

                <?php foreach ( $showroom as $category ) : ?>

                    <?php
                    $category_title = $category['title'] ?? '';
                    $category_items = $category['items'] ?? [];

                    if (
                        empty( $category_items ) ||
                        ! is_array( $category_items )
                    ) {
                        continue;
                    }
                    ?>

                    <div class="service-showroom__category mb-8 md:mb-12 last:mb-0">

                        <?php if ( ! empty( $category_title ) ) : ?>

                            <h3
                                class="
                                service-showroom__category-title
                                text-mobile-h3
                                text-center
                                font-thin
                                w-full
                                relative
                                inline-block
                                pb-6
                                px-9
                                leading-[100%] tracking-[-0.449px]
                                after:content-['']
                                after:absolute
                                after:left-1/2
                                after:-translate-x-1/2
                                after:bottom-4
                                after:w-[100%]
                                after:h-[1px]
                                after:bg-linear-to-r
                              after:from-azul-electrico
                                after:via-fucsia
                                after:to-transparent
                            "
                            >
                                <?php echo esc_html( $category_title ); ?>
                            </h3>

                        <?php endif; ?>

                        <div
                            class="
                            service-showroom__list
                            grid
                            grid-cols-1
                            md:grid-cols-2
                            lg:grid-cols-3
                            gap-5
                            md:gap-6
                        "
                        >

                            <?php foreach ( $category_items as $item ) : ?>

                                <?php
                                get_template_part(
                                    'template-parts/showroom-card',
                                    null,
                                    [
                                        'item' => $item,
                                    ]
                                );
                                ?>

                            <?php endforeach; ?>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </section>

    <?php endif; ?>


    <!-- ======================================================
         ACABADOS ESPECIALES / MATERIALES
    ======================================================= -->

    <?php if (!empty($specials) && is_array($specials)) : ?>

        <section class="service-specials py-6 md:py-12">

            <div class="container">

                <header class="section-header mb-5 md:mb-8">

                    <h2
                        class="
                            text-mobile-h2
                                uppercase
                                text-center
                                font-thin
                                w-full
                                relative
                                inline-block
                                pb-6
                                px-9
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
                                 leading-[100%] tracking-[0.396px]
                        "
                    >
                        <?php echo esc_html($specials_title); ?>
                    </h2>

                </header>

                <div
                    class="
                        service-specials__list
                        flex
                        flex-col
                        gap-6
                        md:gap-10
                    "
                >

                    <?php foreach ($specials as $special_index => $special) : ?>

                        <?php
                        $special_title = $special['title'] ?? '';
                        $special_content = $special['content'] ?? '';

                        $gallery_ids = $get_gallery_ids(
                            $special['gallery'] ?? []
                        );
                        ?>

                        <article
                            class="
                                service-special
                                grid
                                grid-cols-1
                                md:grid-cols-2
                                gap-3
                                md:gap-6
                                items-center
                            "
                        >

                            <?php if (!empty($gallery_ids)) : ?>

                                <div
                                    class="
                                        service-special__gallery
                                        relative
                                        overflow-hidden
                                    "
                                >

                                    <div
                                        class="
                                            service-special__track
                                            flex
                                            overflow-x-auto
                                            snap-x
                                            snap-mandatory
                                        "
                                    >

                                        <?php foreach ($gallery_ids as $image_id) : ?>

                                            <figure
                                                class="
                                                    service-special__image
                                                    shrink-0
                                                    w-full
                                                    aspect-[4/3]
                                                    snap-start
                                                    overflow-hidden
                                                "
                                            >
                                                <?php
                                                echo wp_get_attachment_image(
                                                    $image_id,
                                                    'large',
                                                    false,
                                                    [
                                                        'class' => implode(
                                                            ' ',
                                                            [
                                                                'w-full',
                                                                'h-full',
                                                                'object-cover',
                                                            ]
                                                        ),
                                                        'loading' => 'lazy',
                                                    ]
                                                );
                                                ?>
                                            </figure>

                                        <?php endforeach; ?>

                                    </div>

                                </div>

                            <?php endif; ?>


                            <div class="service-special__content">

                                <?php if (!empty($special_title)) : ?>

                                    <h3
                                        class="
                                            text-mobile-h3
                                            md:text-desktop-h3
                                            uppercase
                                            font-thin
                                            leading-tight
                                            mb-2
                                        "
                                    >
                                        <?php echo esc_html($special_title); ?>
                                    </h3>

                                <?php endif; ?>

                                <?php if (!empty($special_content)) : ?>

                                    <div
                                        class="
                                            wysiwyg
                                            text-mobile-p
                                            md:text-desktop-p
                                            font-thin
                                            leading-relaxed
                                        "
                                    >
                                        <?php
                                        echo apply_filters(
                                            'the_content',
                                            $special_content
                                        );
                                        ?>
                                    </div>

                                <?php endif; ?>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>

    <?php endif; ?>


    <!-- ======================================================
         NUESTRA MAQUINARIA
    ======================================================= -->

    <?php if (!empty($machinery) && is_array($machinery)) : ?>

        <section
            class="
                service-machinery
                bg-azul-oscuro
                text-blanco
                py-8
                md:py-14
            "
        >

            <div class="container">

                <header class="section-header mb-5 md:mb-8">

                    <h2
                        class="
                            text-mobile-h2
                            md:text-desktop-h2
                            text-center
                            uppercase
                            font-thin
                        "
                    >
                        Nuestra maquinaria
                    </h2>

                </header>

                <div
                    class="
                        service-machinery__list
                        flex
                        flex-col
                        gap-8
                        md:gap-12
                    "
                >

                    <?php foreach ($machinery as $machine_index => $machine) : ?>

                        <?php
                        $machine_title = $machine['title'] ?? '';
                        $machine_description = $machine['description'] ?? '';

                        $gallery_ids = $get_gallery_ids(
                            $machine['gallery'] ?? []
                        );
                        ?>

                        <article
                            class="
                                machine-card
                                grid
                                grid-cols-1
                                md:grid-cols-2
                                gap-4
                                md:gap-8
                                items-start
                            "
                        >

                            <?php if (!empty($gallery_ids)) : ?>

                                <div
                                    class="
                                        machine-card__gallery
                                        relative
                                        overflow-hidden
                                    "
                                >

                                    <div
                                        class="
                                            machine-card__track
                                            flex
                                            overflow-x-auto
                                            snap-x
                                            snap-mandatory
                                        "
                                    >

                                        <?php foreach ($gallery_ids as $image_id) : ?>

                                            <figure
                                                class="
                                                    machine-card__image
                                                    shrink-0
                                                    w-full
                                                    aspect-[4/3]
                                                    snap-start
                                                    overflow-hidden
                                                "
                                            >
                                                <?php
                                                echo wp_get_attachment_image(
                                                    $image_id,
                                                    'large',
                                                    false,
                                                    [
                                                        'class' => implode(
                                                            ' ',
                                                            [
                                                                'w-full',
                                                                'h-full',
                                                                'object-cover',
                                                            ]
                                                        ),
                                                        'loading' => 'lazy',
                                                    ]
                                                );
                                                ?>
                                            </figure>

                                        <?php endforeach; ?>

                                    </div>

                                </div>

                            <?php endif; ?>


                            <div class="machine-card__content">

                                <?php if (!empty($machine_title)) : ?>

                                    <h3
                                        class="
                                            machine-card__title
                                            text-mobile-h3
                                            md:text-desktop-h3
                                            uppercase
                                            font-thin
                                            leading-tight
                                            mb-2
                                        "
                                    >
                                        <?php echo esc_html($machine_title); ?>
                                    </h3>

                                <?php endif; ?>


                                <?php if (!empty($machine_description)) : ?>

                                    <p
                                        class="
                                            machine-card__description
                                            text-mobile-p
                                            md:text-desktop-p
                                            font-thin
                                            leading-relaxed
                                        "
                                    >
                                        <?php
                                        echo nl2br(
                                            esc_html(
                                                $machine_description
                                            )
                                        );
                                        ?>
                                    </p>

                                <?php endif; ?>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>

    <?php endif; ?>

</main>