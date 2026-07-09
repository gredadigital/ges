// assets/js/components/slider/index.js

document.addEventListener('DOMContentLoaded', () => {

    if (!window.GES || !GES.Slider || !GES.Slider.GESSlider) {
        console.error('GES Slider: GESSlider no está disponible.');
        return;
    }

    document.querySelectorAll('.ges-slider').forEach((element) => {
        new GES.Slider.GESSlider(element).init();
    });

});