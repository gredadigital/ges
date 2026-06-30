document.addEventListener('DOMContentLoaded', () => {

    const menu = document.getElementById('site-navigation');
    const openButton = document.getElementById('menu-toggle');
    const closeButton = document.getElementById('menu-close');

    if (!menu || !openButton || !closeButton) {
        return;
    }

    const openMenu = () => {

        menu.classList.add('is-open');

        document.body.classList.add('overflow-hidden');

        openButton.setAttribute('aria-expanded', 'true');
        menu.setAttribute('aria-hidden', 'false');

    };

    const closeMenu = () => {

        menu.classList.remove('is-open');

        document.body.classList.remove('overflow-hidden');

        openButton.setAttribute('aria-expanded', 'false');
        menu.setAttribute('aria-hidden', 'true');

    };

    openButton.addEventListener('click', openMenu);

    closeButton.addEventListener('click', closeMenu);

    document.addEventListener('keydown', (event) => {

        if (event.key === 'Escape') {
            closeMenu();
        }

    });

});