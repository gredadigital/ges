window.GES = window.GES || {};
GES.Slider = GES.Slider || {};

GES.Slider.GESSlider = class {

    constructor(element, options = {}) {

        this.element = element;
        this.options = options;

        this.dom = {
            viewport: null,
            track: null,
            items: [],
            pagination: null,
            prev: null,
            next: null,
            targets: {}
        };

        this.state = {
            current: 0,
            timer: null,
            dots: []
        };

        this.pointer = {
            active: false,
            pointerId: null,
            startX: 0,
            currentX: 0,
            deltaX: 0
        };

        this.config = {};
        this.renderer = null;

    }

    init() {

        this.buildDOM();

        if (!this.dom.items.length) {
            return;
        }

        this.resolveCurrent();
        this.resolveConfig();

        this.renderer = GES.Slider.RendererFactory.get(
            this.config.renderer,
            this
        );

        this.createPagination();
        this.bindNavigation();
        this.bindDots();
        this.bindKeyboard();
        this.bindResize();
        this.bindPointer();

        this.render();
        this.start();

        this.element.classList.add('is-ready');

    }

    buildDOM() {

        this.dom.viewport = this.element.querySelector('.ges-slider__viewport');
        this.dom.track = this.element.querySelector('.ges-slider__track');

        this.dom.items = Array.from(
            this.element.querySelectorAll('.ges-slider__item')
        );

        this.dom.pagination = this.element.querySelector('.ges-slider__pagination');

        this.dom.prev =
            this.element.querySelector('.ges-slider__prev') ||
            this.element.querySelector('[data-slider-prev]');

        this.dom.next =
            this.element.querySelector('.ges-slider__next') ||
            this.element.querySelector('[data-slider-next]');

        this.dom.targets = {};

        this.element
            .querySelectorAll('[data-slider-target]')
            .forEach((target) => {
                this.dom.targets[target.dataset.sliderTarget] = target;
            });

    }

    resolveCurrent() {

        const index = this.dom.items.findIndex((item) =>
            item.classList.contains('is-active')
        );

        this.state.current = index >= 0 ? index : 0;

    }

    resolveConfig() {

        this.config = {
            renderer: this.getOption('renderer', 'fade'),
            autoplay: Number(this.getOption('autoplay', 5000)),
            loop: this.getBooleanOption('loop', true),
            pagination: this.getBooleanOption('pagination', true),
            touch: this.getBooleanOption('touch', true),
            keyboard: this.getBooleanOption('keyboard', true),
            threshold: Number(this.getOption('threshold', 50)),
            contentDelay: Number(this.getOption('contentDelay', 180))
        };

    }

    getOption(name, fallback) {

        if (this.options[name] !== undefined) {
            return this.options[name];
        }

        if (this.element.dataset[name] !== undefined) {
            return this.element.dataset[name];
        }

        return fallback;

    }

    getBooleanOption(name, fallback) {

        if (this.options[name] !== undefined) {
            return Boolean(this.options[name]);
        }

        if (this.element.dataset[name] !== undefined) {
            return this.element.dataset[name] !== 'false';
        }

        return fallback;

    }

    createPagination() {

        if (!this.dom.pagination || !this.config.pagination) {
            return;
        }

        this.dom.pagination.innerHTML = '';
        this.state.dots = [];

        this.dom.items.forEach((item, index) => {

            const dot = document.createElement('button');

            dot.type = 'button';
            dot.className = 'ges-slider__dot';
            dot.setAttribute('aria-label', `Ir al slide ${index + 1}`);

            this.dom.pagination.appendChild(dot);
            this.state.dots.push(dot);

        });

    }

    bindNavigation() {

        if (this.dom.prev) {
            this.dom.prev.addEventListener('click', () => {
                this.previous();
                this.restart();
            });
        }

        if (this.dom.next) {
            this.dom.next.addEventListener('click', () => {
                this.next();
                this.restart();
            });
        }

    }

    bindDots() {

        this.state.dots.forEach((dot, index) => {

            dot.addEventListener('click', () => {
                this.goTo(index);
                this.restart();
            });

        });

    }

    bindKeyboard() {

        if (!this.config.keyboard) {
            return;
        }

        this.element.setAttribute('tabindex', '0');

        this.element.addEventListener('keydown', (event) => {

            if (event.key === 'ArrowLeft') {
                this.previous();
                this.restart();
            }

            if (event.key === 'ArrowRight') {
                this.next();
                this.restart();
            }

        });

    }

    bindResize() {

        window.addEventListener('resize', () => {
            this.render();
        });

    }

    bindPointer() {

        if (!this.config.touch || !this.dom.viewport) {
            return;
        }

        this.dom.viewport.addEventListener(
            'pointerdown',
            this.onPointerDown.bind(this)
        );

        this.dom.viewport.addEventListener(
            'pointermove',
            this.onPointerMove.bind(this)
        );

        this.dom.viewport.addEventListener(
            'pointerup',
            this.onPointerUp.bind(this)
        );

        this.dom.viewport.addEventListener(
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

        this.element.classList.add('is-dragging');

        if (this.dom.viewport.setPointerCapture) {
            this.dom.viewport.setPointerCapture(event.pointerId);
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

    onPointerUp() {

        if (!this.pointer.active) {
            return;
        }

        if (
            this.dom.viewport.releasePointerCapture &&
            this.pointer.pointerId !== null
        ) {
            this.dom.viewport.releasePointerCapture(this.pointer.pointerId);
        }

        this.pointer.active = false;
        this.element.classList.remove('is-dragging');

        if (this.pointer.deltaX <= -this.config.threshold) {
            this.next();
            this.restart();
        } else if (this.pointer.deltaX >= this.config.threshold) {
            this.previous();
            this.restart();
        }

        this.pointer.pointerId = null;
        this.pointer.deltaX = 0;

    }

    onPointerCancel() {

        this.pointer.active = false;
        this.pointer.pointerId = null;
        this.pointer.deltaX = 0;

        this.element.classList.remove('is-dragging');

    }

    next() {

        let next = this.state.current + 1;

        if (next >= this.dom.items.length) {

            if (!this.config.loop) {
                return;
            }

            next = 0;

        }

        this.goTo(next);

    }

    previous() {

        let previous = this.state.current - 1;

        if (previous < 0) {

            if (!this.config.loop) {
                return;
            }

            previous = this.dom.items.length - 1;

        }

        this.goTo(previous);

    }

    goTo(index) {

        if (
            index === this.state.current ||
            index < 0 ||
            index >= this.dom.items.length
        ) {
            return;
        }

        this.state.current = index;
        this.render();

    }

    render() {

        if (!this.renderer) {
            return;
        }

        this.renderer.render();
        this.updatePagination();
        this.updateAria();

    }

    updatePagination() {

        this.state.dots.forEach((dot, index) => {

            const isActive = index === this.state.current;

            dot.classList.toggle('is-active', isActive);

            if (isActive) {
                dot.setAttribute('aria-current', 'true');
            } else {
                dot.removeAttribute('aria-current');
            }

        });

    }

    updateAria() {

        this.dom.items.forEach((item, index) => {

            item.setAttribute(
                'aria-hidden',
                index === this.state.current ? 'false' : 'true'
            );

        });

    }

    start() {

        if (!this.config.autoplay) {
            return;
        }

        this.state.timer = window.setInterval(() => {
            this.next();
        }, this.config.autoplay);

    }

    stop() {

        if (!this.state.timer) {
            return;
        }

        window.clearInterval(this.state.timer);
        this.state.timer = null;

    }

    restart() {

        this.stop();
        this.start();

    }

};