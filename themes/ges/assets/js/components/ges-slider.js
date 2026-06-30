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

class TranslateRenderer {

    constructor(slider) {
        this.slider = slider;
    }

    getGap() {
        const styles = window.getComputedStyle(this.slider.track);

        const gap =
            parseFloat(styles.columnGap) ||
            parseFloat(styles.gap) ||
            0;

        return gap;
    }

    getStep() {
        const item = this.slider.items[0];

        if (!item) {
            return 0;
        }

        return item.getBoundingClientRect().width + this.getGap();
    }

    getMaxOffset() {
        const trackWidth = this.slider.track.scrollWidth;
        const viewportWidth = this.slider.viewport.clientWidth;

        return Math.max(0, trackWidth - viewportWidth);
    }

    render() {
        const slider = this.slider;

        if (!slider.track || !slider.items.length) {
            return;
        }

        const step = this.getStep();
        const maxOffset = this.getMaxOffset();

        const offset = Math.min(
            step * slider.current,
            maxOffset
        );

        slider.track.style.transform = `translate3d(-${offset}px, 0, 0)`;
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

        this.pointer = {
            active: false,
            startX: 0,
            currentX: 0,
            deltaX: 0,
            pointerId: null
        };

    }

    init() {
        this.build();

        if (!this.items.length) {
            return;
        }

        this.createPagination();
        this.bindEvents();
        this.bindPointerEvents();
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
        }

        this.config = {
            renderer: this.element.dataset.renderer ?? 'fade',
            autoplay: Number(this.element.dataset.autoplay ?? 5000),
            loop: this.element.dataset.loop !== 'false',
            pagination: this.element.dataset.pagination !== 'false',
            touch: this.element.dataset.touch !== 'false',
            keyboard: this.element.dataset.keyboard !== 'false',
            threshold: Number(this.element.dataset.threshold ?? 50),
        };

        switch (this.config.renderer) {

            case 'translate':
                this.renderer = new TranslateRenderer(this);
                break;

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
        this.dots = [];

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
                dot.setAttribute('aria-current', 'true');
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

        window.addEventListener('resize', () => {
            this.renderer.render();
        });

    }

    bindPointerEvents() {

        if (!this.config.touch || !this.viewport) {
            return;
        }

        this.viewport.addEventListener(
            'pointerdown',
            this.onPointerDown.bind(this)
        );

        this.viewport.addEventListener(
            'pointermove',
            this.onPointerMove.bind(this)
        );

        this.viewport.addEventListener(
            'pointerup',
            this.onPointerUp.bind(this)
        );

        this.viewport.addEventListener(
            'pointercancel',
            this.onPointerCancel.bind(this)
        );

    }

    onPointerDown(event) {

        this.pointer.active = true;
        this.pointer.pointerId = event.pointerId;
        this.pointer.startX = event.clientX;
        this.pointer.currentX = event.clientX;
        this.pointer.deltaX = 0;

        if (this.viewport.setPointerCapture) {
            this.viewport.setPointerCapture(event.pointerId);
        }

    }

    onPointerMove(event) {

        if (!this.pointer.active) {
            return;
        }

        this.pointer.currentX = event.clientX;
        this.pointer.deltaX =
            this.pointer.currentX - this.pointer.startX;

    }

    onPointerUp(event) {

        if (!this.pointer.active) {
            return;
        }

        if (
            this.viewport.releasePointerCapture &&
            this.pointer.pointerId !== null
        ) {
            this.viewport.releasePointerCapture(this.pointer.pointerId);
        }

        this.pointer.active = false;

        if (this.pointer.deltaX <= -this.config.threshold) {
            this.next();
        }

        else if (this.pointer.deltaX >= this.config.threshold) {
            this.previous();
        }

        this.pointer.pointerId = null;

    }

    onPointerCancel() {

        this.pointer.active = false;
        this.pointer.pointerId = null;
        this.pointer.deltaX = 0;

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
            this.dots[this.current].setAttribute('aria-current', 'true');
        }

    }

}

document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.ges-slider').forEach(slider => {
        new GESSlider(slider).init();
    });

});