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

        <section class="service-specials py-6 md:py-12 px-2">

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
                                px-6
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
                        gap-1
                        md:gap-10
                    "
                >

                    <?php foreach ( $specials as $special_index => $special ) : ?>

                        <?php
                        $special_title   = $special['title'] ?? '';
                        $special_content = $special['content'] ?? '';

                        $gallery_ids = $get_gallery_ids(
                                $special['gallery'] ?? []
                        );

                        $description_id = 'special-description-' . $special_index;
                        ?>

                        <article
                                class="
            service-special
            relative
            pb-4
            md:pb-6
            after:content-['']
            after:absolute
            after:left-0
            after:bottom-0
            after:w-full
            after:h-px
            after:bg-[linear-gradient(90deg,#005CFF_0%,#6666FF_36%,#FF66FF_68%,rgba(255,102,255,0)_100%)]
        "
                        >

                            <?php if ( ! empty( $gallery_ids ) ) : ?>

                                <div
                                        class="
                    ges-slider
                    service-special__slider
                    relative
                    mb-0
                    md:mb-4
                "
                                        data-renderer="translate"
                                        data-autoplay="0"
                                        data-loop="true"
                                        data-pagination="false"
                                        data-touch="true"
                                        data-keyboard="true"
                                >

                                    <div
                                            class="
                        ges-slider__viewport
                        relative
                        overflow-hidden
                        touch-pan-y
                    "
                                    >

                                        <div
                                                class="
                            ges-slider__track
                            flex
                            transition-transform
                            duration-500
                            ease-out
                        "
                                        >

                                            <?php foreach ( $gallery_ids as $image_index => $image_id ) : ?>

                                                <figure
                                                        class="
                                    ges-slider__item
                                    service-special__image
                                    shrink-0
                                    w-full
                                    aspect-[4/3]
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
                                                                                    'block',
                                                                                    'w-full',
                                                                                    'h-full',
                                                                                    'object-cover',
                                                                            ]
                                                                    ),
                                                                    'loading' => $image_index === 0
                                                                            ? 'eager'
                                                                            : 'lazy',
                                                            ]
                                                    );
                                                    ?>
                                                </figure>

                                            <?php endforeach; ?>

                                        </div>

                                    </div>

                                    <?php if ( count( $gallery_ids ) > 1 ) : ?>

                                        <button
                                                type="button"
                                                class="
                            ges-slider__prev
                            absolute
                            left-1
                            md:left-2
                            top-1/2
                            -translate-y-1/2
                            z-10
                            flex
                            items-center
                            justify-center
                            w-[44px]
                            h-[44px]
                            rounded-full
                            bg-[#15162F]
                            text-white
                            transition-opacity
                            hover:opacity-80
                        " data-slider-prev
                                                aria-label="<?php esc_attr_e( 'Imagen anterior', 'ges' ); ?>"
                                        >
                                            <svg
                                                    class="w-2 h-2"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    aria-hidden="true"
                                            >
                                                <path
                                                        d="M15 4L7 12L15 20"
                                                        stroke="currentColor"
                                                        stroke-width="2.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                            </svg>
                                        </button>

                                        <button
                                                type="button"
                                                class="
                            ges-slider__next
                            absolute
                            right-1
                            md:right-2
                            top-1/2
                            -translate-y-1/2
                            z-10
                            flex
                            items-center
                            justify-center
                            w-[44px]
                            h-[44px]
                            rounded-full
                            bg-[#15162F]
                            text-white
                            transition-opacity
                            hover:opacity-80
                        " data-slider-next
                                                aria-label="<?php esc_attr_e( 'Imagen siguiente', 'ges' ); ?>"
                                        >
                                            <svg
                                                    class="w-2 h-2"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    aria-hidden="true"
                                            >
                                                <path
                                                        d="M9 4L17 12L9 20"
                                                        stroke="currentColor"
                                                        stroke-width="2.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                            </svg>
                                        </button>

                                    <?php endif; ?>

                                </div>

                            <?php endif; ?>

                            <div class="service-special__content">

                                <?php if ( ! empty( $special_title ) ) : ?>

                                    <h3
                                            class="
                        text-mobile-h3
                        md:text-desktop-h3
                        font-thin
                        leading-tight
                        mb-2
                    "
                                    >
                                        <?php echo esc_html( $special_title ); ?>
                                    </h3>

                                <?php endif; ?>

                                <?php if ( ! empty( $special_content ) ) : ?>

                                    <button
                                            type="button"
                                            class="
                        service-special__toggle
                        inline-flex
                        items-center
                        gap-1
                        text-mobile-p
                        md:text-desktop-p
                        font-thin
                        text-black/30
                        transition-colors
                        hover:text-black
                    "
                                            aria-expanded="false"
                                            aria-controls="<?php echo esc_attr( $description_id ); ?>"
                                            data-special-toggle
                                    >
                    <span data-special-toggle-label>
                        <?php esc_html_e( 'Ver más', 'ges' ); ?>
                    </span>

                                        <svg
                                                class="
                            w-2
                            h-2
                            transition-transform
                            duration-300
                        "
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                aria-hidden="true"
                                                data-special-toggle-icon
                                        >
                                            <path
                                                    d="M4 8L12 16L20 8"
                                                    stroke="currentColor"
                                                    stroke-width="2.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                            />
                                        </svg>
                                    </button>

                                    <div
                                            id="<?php echo esc_attr( $description_id ); ?>"
                                            class="
                        service-special__description
                        grid
                        grid-rows-[0fr]
                        opacity-0
                        transition-[grid-template-rows,opacity]
                        duration-500
                        ease-out
                    "
                                            aria-hidden="true"
                                            data-special-description
                                    >
                                        <div class="overflow-hidden">

                                            <div
                                                    class="
                                wysiwyg
                                pt-2
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

                                        </div>
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
                bg-negro
                text-blanco
                py-8
                md:py-14
                px-2
            "
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
                                px-6
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

                    <?php foreach ( $machinery as $machine ) : ?>

                        <?php
                        $machine_title       = $machine['title'] ?? '';
                        $machine_description = $machine['description'] ?? '';

                        $gallery_ids = $get_gallery_ids(
                                $machine['gallery'] ?? []
                        );
                        ?>

                        <article
                                class="
            machine-card
            relative


            after:content-['']
            after:absolute
            after:bottom-0
            after:h-px
            after:w-[100%]
            after:bg-[linear-gradient(90deg,#F6EA00_21%,#EEE802_24%,#DBE209_28%,#BBDA14_33%,#8FCE24_39%,#56BE38_46%,#24B14B_51%,#23A949_56%,#229645_64%,#1F753E_73%,#1C4935_84%,#19192B_94%)]
        "
                        >

                            <?php if ( ! empty( $gallery_ids ) ) : ?>

                                <div
                                        class="
                    ges-slider
                    relative
                    
                "
                                        data-renderer="translate"
                                        data-autoplay="0"
                                        data-loop="true"
                                        data-pagination="false"
                                        data-touch="true"
                                        data-keyboard="true"
                                >

                                    <div
                                            class="
                        ges-slider__viewport
                        overflow-hidden
                    "
                                    >

                                        <div
                                                class="
                            ges-slider__track
                            flex
                        "
                                        >

                                            <?php foreach ( $gallery_ids as $image_id ) : ?>

                                                <figure
                                                        class="
                                    ges-slider__item
                                    shrink-0
                                    w-full
                                    h-[220px]
                                    md:h-[320px]
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
                                                                                    'block',
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

                                    <?php if ( count( $gallery_ids ) > 1 ) : ?>

                                        <button
                                                type="button"
                                                class="
                            ges-slider__prev
                            absolute
                            left-2
                            top-1/2
                            -translate-y-1/2
                            z-10
                            flex
                            items-center
                            justify-center
                            w-10
                            h-10
                            rounded-full
                            bg-white
                            text-black
                        "
                                                data-slider-prev
                                                aria-label="Anterior"
                                        >

                                            <svg
                                                    class="w-3 h-3"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                            >
                                                <path
                                                        d="M15 4L7 12L15 20"
                                                        stroke="currentColor"
                                                        stroke-width="2.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                            </svg>

                                        </button>

                                        <button
                                                type="button"
                                                class="
                            ges-slider__next
                            absolute
                            right-2
                            top-1/2
                            -translate-y-1/2
                            z-10
                            flex
                            items-center
                            justify-center
                            w-10
                            h-10
                            rounded-full
                            bg-white
                            text-black
                        "
                                                data-slider-next
                                                aria-label="Siguiente"
                                        >

                                            <svg
                                                    class="w-3 h-3"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                            >
                                                <path
                                                        d="M9 4L17 12L9 20"
                                                        stroke="currentColor"
                                                        stroke-width="2.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                />
                                            </svg>

                                        </button>

                                    <?php endif; ?>

                                </div>

                            <?php endif; ?>

                            <?php if ( ! empty( $machine_title ) ) : ?>

                                <h3
                                        class="
                    text-mobile-h3
                    md:text-desktop-h3
                    font-thin
                    text-white
                    leading-tight
                    mb-2
                "
                                >
                                    <?php echo esc_html( $machine_title ); ?>
                                </h3>

                            <?php endif; ?>

                            <?php if ( ! empty( $machine_description ) ) : ?>

                                <p
                                        class="
                    text-mobile-p
                    md:text-desktop-p
                    font-thin
                    text-white
                    leading-relaxed
                    mb-2
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

                        </article>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>

    <?php endif; ?>
    <section>
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/ges_verderaro.png" alt="">
    </section>
</main>