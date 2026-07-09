GES.Slider.FadeRenderer = class extends GES.Slider.BaseRenderer {

    render() {

        this.slider.dom.items.forEach((item, index) => {

            item.classList.toggle(
                'is-active',
                index === this.slider.state.current
            );

        });

    }

};