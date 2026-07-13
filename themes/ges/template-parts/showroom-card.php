<?php

defined('ABSPATH') || exit;

$item = $args['item'] ?? [];

if (empty($item)) {
    return;
}

$title       = $item['title'] ?? '';
$description = $item['description'] ?? '';
$tiktok      = $item['tiktok_url'] ?? '';
$finishes    = $item['finishes'] ?? '';

$gallery = [];

if (!empty($item['gallery']) && is_array($item['gallery'])) {
    $gallery = array_values(
        array_filter(
            array_map('absint', $item['gallery'])
        )
    );
}

$finish_list = [];

if (!empty($finishes)) {
    $finish_list = array_filter(
        array_map(
            'trim',
            preg_split('/\r\n|\r|\n/', $finishes)
        )
    );
}

?>

<article class="showroom-card flex flex-col">

    <?php if ( ! empty( $gallery ) ) : ?>

        <div
            class="
        ges-slider
        showroom-slider
        relative
        mb-1
    "
            data-renderer="translate"
            data-pagination="false"
            data-autoplay="false"
            data-touch="true"
            data-loop="true"
        >

            <div
                class="
            ges-slider__viewport
            overflow-hidden
            aspect-[16/9]
        "
            >

                <div
                    class="
                ges-slider__track
                flex
                h-full
                will-change-transform
            "
                >

                    <?php foreach ( $gallery as $image_id ) : ?>

                        <figure
                            class="
                        ges-slider__item
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
                                    'class' => 'w-full h-full object-cover',
                                    'loading' => 'lazy',
                                ]
                            );
                            ?>

                        </figure>

                    <?php endforeach; ?>

                </div>

            </div>

            <button
                type="button"
                class="
            ges-slider__prev
            absolute
            left-1
            top-1/2
            -translate-y-1/2
            z-20
            w-3
            h-3
            rounded-full
            bg-black/70
            text-white
            flex
            items-center
            justify-center
            transition-opacity
            hover:opacity-80
        "
                aria-label="Imagen anterior"
            >
                &#8592;
            </button>

            <button
                type="button"
                class="
            ges-slider__next
            absolute
            right-1
            top-1/2
            -translate-y-1/2
            z-20
            w-3
            h-3
            rounded-full
            bg-black/70
            text-white
            flex
            items-center
            justify-center
            transition-opacity
            hover:opacity-80
        "
                aria-label="Imagen siguiente"
            >
                &#8594;
            </button>

        </div>

    <?php endif; ?>


    <div class="flex flex-col grow">

        <?php if ($title) : ?>

            <h3
                class="
                    text-mobile-h3
                    font-thin
                    mb-[8px]
                    leading-[100%]
                    tracking-[-0.449px]
                "
            >
                <?php echo esc_html($title); ?>
            </h3>

        <?php endif; ?>


        <?php if ($description) : ?>

            <p
                class="
                    text-mobile-p
                    font-thin
                    leading-tight
                    mb-[8px]
                "
            >
                <?php echo nl2br(esc_html($description)); ?>
            </p>

        <?php endif; ?>


        <?php if ( $finish_list ) : ?>

            <button
                    type="button"
                    class="
        showroom-card__toggle
        flex
        items-center
        justify-start
        w-full
        py-[8px]
        font-thin
        text-mobile-p2
        text-[#B1B1B1]
        gap-[8px]

    "
                    data-showroom-toggle aria-expanded="false"
            >

    <span>

        Acabados disponibles

    </span>

                <span class="transition-transform duration-300">

        ▼

    </span>

            </button>

            <ul
                    class="
        showroom-card__finishes
        hidden
        py-[8px]
        space-y-[8px]
        text-mobile-p
        font-thin
    "
            >

                <?php foreach ( $finish_list as $finish ) : ?>

                    <li>

                        <?php echo esc_html( $finish ); ?>

                    </li>

                <?php endforeach; ?>

            </ul>

        <?php endif; ?>


        <?php if ( $tiktok ) : ?>

            <a
                    href="<?php echo esc_url( $tiktok ); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="
        inline-flex
        self-end
        items-center
        gap-2
        mt-4
        bg-negro
        text-blanco
        font-bold
        uppercase
        p-[8px]
        rounded-[8px]
        text-mobile-button
        uppercase
        font-thin

    "
            >

                Ver en TikTok

                →

            </a>

        <?php endif; ?>

    </div>

    <div
            class="
        mt-4
        h-[3px]
        bg-[linear-gradient(90deg,#005CFF_-1.51%,#585FFF_17.49%,#FF66FF_52.49%,#FF70FF_58.49%,#FF8DFF_68.49%,#FFBDFF_82.49%,#FFFFFF_98.49%)]
    "
    ></div>

</article>