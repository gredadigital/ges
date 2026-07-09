GES.Slider.ContentRenderer = class extends GES.Slider.BaseRenderer {

    constructor(slider) {

        super(slider);

        this.initialized = false;

    }

    render() {

        if (!this.initialized) {

            this.updateContent();

            this.initialized = true;

            return;

        }

        this.animate();

    }

    animate() {

        const slider = this.slider;

        slider.element.classList.add('is-changing');

        window.setTimeout(() => {

            this.updateContent();

            slider.element.classList.remove('is-changing');

        }, slider.config.contentDelay);

    }

    updateContent() {

        const slider = this.slider;

        const item = slider.dom.items[
            slider.state.current
            ];

        if (!item) {
            return;
        }

        Object.entries(
            slider.dom.targets
        ).forEach(([key, target]) => {

            const field = item.querySelector(
                `[data-slider-field="${key}"]`
            );

            target.innerHTML = field
                ? field.innerHTML
                : '';

        });

    }

};