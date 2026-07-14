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

    document
        .querySelectorAll('[data-special-toggle]')
        .forEach((button) => {

            button.addEventListener('click', () => {

                const descriptionId =
                    button.getAttribute('aria-controls');

                const description =
                    document.getElementById(descriptionId);

                if (!description) {
                    return;
                }

                const label = button.querySelector(
                    '[data-special-toggle-label]'
                );

                const icon = button.querySelector(
                    '[data-special-toggle-icon]'
                );

                const isExpanded =
                    button.getAttribute('aria-expanded') === 'true';

                button.setAttribute(
                    'aria-expanded',
                    String(!isExpanded)
                );

                description.setAttribute(
                    'aria-hidden',
                    String(isExpanded)
                );

                description.classList.toggle(
                    'grid-rows-[0fr]',
                    isExpanded
                );

                description.classList.toggle(
                    'grid-rows-[1fr]',
                    !isExpanded
                );

                description.classList.toggle(
                    'opacity-0',
                    isExpanded
                );

                description.classList.toggle(
                    'opacity-100',
                    !isExpanded
                );

                icon?.classList.toggle(
                    'rotate-180',
                    !isExpanded
                );

                if (label) {
                    label.textContent = isExpanded
                        ? 'Ver más'
                        : 'Ver menos';
                }

            });

        });

});