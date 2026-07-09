class BaseRenderer {
    constructor(slider) {
        this.slider = slider;
    }

    render() {}
}

class FadeRenderer extends BaseRenderer {
    render() {
        this.slider.items.forEach((item, index) => {
            item.classList.toggle('is-active', index === this.slider.current);
        });
    }
}

class TranslateRenderer extends BaseRenderer {
    getGap() {
        const styles = window.getComputedStyle(this.slider.track);

        return (
            parseFloat(styles.columnGap) ||
            parseFloat(styles.gap) ||
            0
        );
    }

    getStep() {
        const item = this.slider.items[0];

        if (!item) {
            return 0;
        }

        return item.getBoundingClientRect().width + this.getGap();
    }

    getMaxOffset() {
        if (!this.slider.track || !this.slider.viewport) {
            return 0;
        }

        return Math.max(
            0,
            this.slider.track.scrollWidth - this.slider.viewport.clientWidth
        );
    }

    render() {
        const slider = this.slider;

        if (!slider.track || !slider.items.length) {
            return;
        }

        const offset = Math.min(
            this.getStep() * slider.current,
            this.getMaxOffset()
        );

        slider.track.style.transform = `translate3d(-${offset}px, 0, 0)`;
    }
}

class ContentRenderer extends BaseRenderer {
    render() {
        const slider = this.slider;
        const item = slider.items[slider.current];

        if (!item) {
            return;
        }

        slider.element.classList.add('is-changing');

        window.setTimeout(() => {
            Object.entries(slider.targets).forEach(([key, target]) => {
                const field = item.querySelector(`[data-slider-field="${key}"]`);

                if (!target) {
                    return;
                }

                target.innerHTML = field ? field.innerHTML : '';
            });

            slider.element.classList.remove('is-changing');
        }, slider.config.contentDelay);
    }
}

class RendererFactory {
    static create(type, slider) {
        switch (type) {
            case 'translate':
                return new TranslateRenderer(slider);

            case 'content':
                return new ContentRenderer(slider);

            case 'fade':
            default:
                return new FadeRenderer(slider);
        }
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
        this.prevButton = null;
        this.nextButton = null;

        this.current = 0;
        this.timer = null;

        this.config = {};
        this.renderer = null;
        this.dots = [];
        this.targets = {};

        this.pointer = {
            active: false,
            startX: 0,
            currentX: 0,
            deltaX: 0,
            pointerId: null,
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
        this.render();
        this.start();
    }

    build() {
        this.viewport = this.element.querySelector('.ges-slider__viewport');
        this.track = this.element.querySelector('.ges-slider__track');

        this.items = Array.from(
            this.element.querySelectorAll('.ges-slider__item')
        );

        this.pagination = this.element.querySelector('.ges-slider__pagination');

        this.prevButton =
            this.element.querySelector('.ges-slider__prev') ||
            this.element.querySelector('[data-slider-prev]');

        this.nextButton =
            this.element.querySelector('.ges-slider__next') ||
            this.element.querySelector('[data-slider-next]');

        this.targets = this.getTargets();

        this.current = this.items.findIndex((item) =>
            item.classList.contains('is-active')
        );

        if (this.current < 0) {
            this.current = 0;
        }

        this.config = {
            renderer: this.getOption('renderer', 'fade'),
            autoplay: Number(this.getOption('autoplay', 5000)),
            loop: this.getBooleanOption('loop', true),
            pagination: this.getBooleanOption('pagination', true),
            touch: this.getBooleanOption('touch', true),
            keyboard: this.getBooleanOption('keyboard', true),
            threshold: Number(this.getOption('threshold', 50)),
            contentDelay: Number(this.getOption('contentDelay', 160)),
        };

        this.renderer = RendererFactory.create(this.config.renderer, this);
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

    getTargets() {
        const targets = {};

        this.element
            .querySelectorAll('[data-slider-target]')
            .forEach((target) => {
                targets[target.dataset.sliderTarget] = target;
            });

        return targets;
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
            dot.setAttribute('aria-label', `Ir al slide ${index + 1}`);

            this.pagination.appendChild(dot);
            this.dots.push(dot);
        });

        this.updatePagination();
    }

    bindEvents() {
        this.dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                this.goTo(index);
                this.restart();
            });
        });

        if (this.prevButton) {
            this.prevButton.addEventListener('click', () => {
                this.previous();
                this.restart();
            });
        }

        if (this.nextButton) {
            this.nextButton.addEventListener('click', () => {
                this.next();
                this.restart();
            });
        }

        window.addEventListener('resize', () => {
            this.render();
        });

        if (this.config.keyboard) {
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
    }

    bindPointerEvents() {
        if (!this.config.touch || !this.viewport) {
            return;
        }

        this.viewport.addEventListener('pointerdown', this.onPointerDown.bind(this));
        this.viewport.addEventListener('pointermove', this.onPointerMove.bind(this));
        this.viewport.addEventListener('pointerup', this.onPointerUp.bind(this));
        this.viewport.addEventListener('pointercancel', this.onPointerCancel.bind(this));
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
        this.pointer.deltaX = this.pointer.currentX - this.pointer.startX;
    }

    onPointerUp() {
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
    }

    start() {
        if (!this.config.autoplay) {
            return;
        }

        this.timer = window.setInterval(() => {
            this.next();
        }, this.config.autoplay);
    }

    stop() {
        if (!this.timer) {
            return;
        }

        window.clearInterval(this.timer);
        this.timer = null;
    }

    restart() {
        this.stop();
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
        if (index === this.current || index < 0 || index >= this.items.length) {
            return;
        }

        this.current = index;
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
        this.dots.forEach((dot, index) => {
            const isActive = index === this.current;

            dot.classList.toggle('is-active', isActive);

            if (isActive) {
                dot.setAttribute('aria-current', 'true');
            } else {
                dot.removeAttribute('aria-current');
            }
        });
    }

    updateAria() {
        this.items.forEach((item, index) => {
            item.setAttribute(
                'aria-hidden',
                index === this.current ? 'false' : 'true'
            );
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.ges-slider').forEach((slider) => {
        new GESSlider(slider).init();
    });
});