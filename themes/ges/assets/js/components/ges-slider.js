class FadeRenderer {

    constructor(slider) {

        this.slider = slider;

    }

    render() {

        this.slider.items.forEach((item, index) => {

            item.classList.toggle(
                'is-active',
                index === this.slider.current
            );

        });

    }

}

class GESSlider {

    constructor(element, options = {}) {

        this.element = element;
        this.options = options;

        this.viewport = null;
        this.track = null;
        this.items = [];
        this.pagination = null;

        this.current = 0;
        this.timer = null;

        this.config = {};

        this.renderer = null;

        this.dots = [];

    }

    init() {

        this.build();

        if (!this.items.length) {
            return;
        }

        this.createPagination();

        this.bindEvents();

        this.start();

    }

    build() {

        this.viewport = this.element.querySelector('.ges-slider__viewport');

        this.track = this.element.querySelector('.ges-slider__track');

        this.items = Array.from(
            this.element.querySelectorAll('.ges-slider__item')
        );

        this.pagination = this.element.querySelector('.ges-slider__pagination');

        this.current = this.items.findIndex(item =>
            item.classList.contains('is-active')
        );

        if (this.current < 0) {

            this.current = 0;

            this.items[0].classList.add('is-active');

        }

        this.config = {

            renderer: this.element.dataset.renderer ?? 'fade',

            autoplay: Number(this.element.dataset.autoplay ?? 5000),

            loop: this.element.dataset.loop !== 'false',

            pagination: this.element.dataset.pagination !== 'false',

            touch: this.element.dataset.touch !== 'false',

            keyboard: this.element.dataset.keyboard !== 'false',

        };

        switch (this.config.renderer) {

            case 'fade':
            default:

                this.renderer = new FadeRenderer(this);

                break;

        }

        this.renderer.render();

    }

    createPagination() {

        if (!this.pagination || !this.config.pagination) {
            return;
        }

        this.pagination.innerHTML = '';

        this.items.forEach((item, index) => {

            const dot = document.createElement('button');

            dot.type = 'button';

            dot.className = 'ges-slider__dot';

            dot.setAttribute(
                'aria-label',
                `Ir al slide ${index + 1}`
            );

            if (index === this.current) {

                dot.classList.add('is-active');

                dot.setAttribute(
                    'aria-current',
                    'true'
                );

            }

            this.pagination.appendChild(dot);

            this.dots.push(dot);

        });

    }

    bindEvents() {

        this.dots.forEach((dot, index) => {

            dot.addEventListener('click', () => {

                this.goTo(index);

                this.restart();

            });

        });

    }

    start() {

        if (!this.config.autoplay) {
            return;
        }

        this.timer = setInterval(() => {

            this.next();

        }, this.config.autoplay);

    }

    restart() {

        clearInterval(this.timer);

        this.start();

    }

    next() {

        let next = this.current + 1;

        if (next >= this.items.length) {

            if (!this.config.loop) {
                return;
            }

            next = 0;

        }

        this.goTo(next);

    }

    previous() {

        let previous = this.current - 1;

        if (previous < 0) {

            if (!this.config.loop) {
                return;
            }

            previous = this.items.length - 1;

        }

        this.goTo(previous);

    }

    goTo(index) {

        if (index === this.current) {
            return;
        }

        if (this.dots[this.current]) {

            this.dots[this.current].classList.remove('is-active');

            this.dots[this.current].removeAttribute('aria-current');

        }

        this.current = index;

        this.renderer.render();

        if (this.dots[this.current]) {

            this.dots[this.current].classList.add('is-active');

            this.dots[this.current].setAttribute(
                'aria-current',
                'true'
            );

        }

    }

}

document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.ges-slider').forEach(slider => {

        new GESSlider(slider).init();

    });

});