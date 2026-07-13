document.addEventListener('DOMContentLoaded', () => {

    document
        .querySelectorAll('[data-showroom-toggle]')
        .forEach((button) => {

            const list = button.nextElementSibling;

            const arrow = button.querySelector('span:last-child');

            if (!list) {
                return;
            }

            button.addEventListener('click', () => {

                const hidden = list.classList.contains('hidden');

                list.classList.toggle('hidden');

                button.setAttribute(
                    'aria-expanded',
                    hidden ? 'true' : 'false'
                );

                if (arrow) {
                    arrow.style.transform = hidden
                        ? 'rotate(180deg)'
                        : 'rotate(0deg)';
                }

            });

        });

});