GES.Slider.RendererFactory = class {

    static get(type, slider) {

        const renderers = {

            fade:
            GES.Slider.FadeRenderer,

            translate:
            GES.Slider.TranslateRenderer,

            content:
            GES.Slider.ContentRenderer

        };

        const Renderer =
            renderers[type] ??
            renderers.fade;

        return new Renderer(slider);

    }

};