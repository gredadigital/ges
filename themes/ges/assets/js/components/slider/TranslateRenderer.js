GES.Slider.TranslateRenderer = class extends GES.Slider.BaseRenderer {

    getGap() {

        const styles = window.getComputedStyle(
            this.slider.dom.track
        );

        return (
            parseFloat(styles.columnGap) ||
            parseFloat(styles.gap) ||
            0
        );

    }

    getStep() {

        const item = this.slider.dom.items[0];

        if (!item) {
            return 0;
        }

        return (
            item.getBoundingClientRect().width +
            this.getGap()
        );

    }

    getMaxOffset() {

        const track = this.slider.dom.track;
        const viewport = this.slider.dom.viewport;

        if (!track || !viewport) {
            return 0;
        }

        return Math.max(
            0,
            track.scrollWidth -
            viewport.clientWidth
        );

    }

    render() {

        const slider = this.slider;

        if (
            !slider.dom.track ||
            !slider.dom.items.length
        ) {
            return;
        }

        const offset = Math.min(

            slider.state.current *
            this.getStep(),

            this.getMaxOffset()

        );

        slider.dom.track.style.transform =
            `translate3d(-${offset}px,0,0)`;

    }

};