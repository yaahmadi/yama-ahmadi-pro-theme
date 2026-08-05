(() => {
    'use strict';

    const d = document;

    const $ = (
        selector,
        context = d
    ) => context.querySelector(selector);

    const $$ = (
        selector,
        context = d
    ) => [
        ...context.querySelectorAll(selector)
    ];

    const reducedMotion =
        window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;

    let deferredPrompt = null;


    /* =========================================================
       PWA INSTALL
    ========================================================= */

    window.addEventListener(
        'beforeinstallprompt',
        (event) => {
            event.preventDefault();
            deferredPrompt = event;
        }
    );


    window.addEventListener(
        'appinstalled',
        () => {
            deferredPrompt = null;

            localStorage.setItem(
                'ya_app_installed',
                '1'
            );
        }
    );


    async function installPWA() {

        if (deferredPrompt) {

            try {

                deferredPrompt.prompt();

                await deferredPrompt.userChoice;

                deferredPrompt = null;

            } catch (error) {

                console.warn(
                    'PWA install prompt failed:',
                    error
                );

            }

            return;
        }


        const ua =
            navigator.userAgent || '';

        const isiOS =
            /iphone|ipad|ipod/i.test(ua);


        if (isiOS) {

            alert(
                'Sur iPhone/iPad : ouvrez le site dans Safari, touchez Partager puis « Sur l’écran d’accueil ».'
            );

            return;
        }


        alert(
            'Ouvrez le menu de votre navigateur puis choisissez « Installer l’application » ou « Ajouter à l’écran d’accueil ».'
        );
    }


    $$('[data-ya-install]').forEach(
        (button) => {

            button.addEventListener(
                'click',
                installPWA
            );

        }
    );


    /* =========================================================
       SERVICE WORKER
    ========================================================= */

    if ('serviceWorker' in navigator) {

        window.addEventListener(
            'load',
            async () => {

                try {

                    await navigator
                        .serviceWorker
                        .register(
                            '/service-worker.js',
                            {
                                scope: '/'
                            }
                        );

                } catch (error) {

                    console.warn(
                        'Service worker registration failed:',
                        error
                    );

                }

            }
        );

    }


    /* =========================================================
       MOBILE MENU
    ========================================================= */

    const menuButton =
        $('.ya-menu');

    const mobileMenu =
        $('.ya-mobile');

    const mobileOverlay =
        $('.ya-mobile-overlay');

    const mobileClose =
        $('.ya-mobile-close');


    function openMenu() {

        if (!mobileMenu) {
            return;
        }

        mobileMenu.classList.add(
            'open'
        );

        mobileMenu.setAttribute(
            'aria-hidden',
            'false'
        );

        menuButton?.setAttribute(
            'aria-expanded',
            'true'
        );

        d.body.classList.add(
            'ya-lock'
        );


        setTimeout(
            () => {
                mobileClose?.focus();
            },
            200
        );
    }


    function closeMenu() {

        if (!mobileMenu) {
            return;
        }

        mobileMenu.classList.remove(
            'open'
        );

        mobileMenu.setAttribute(
            'aria-hidden',
            'true'
        );

        menuButton?.setAttribute(
            'aria-expanded',
            'false'
        );

        d.body.classList.remove(
            'ya-lock'
        );
    }


    menuButton?.addEventListener(
        'click',
        openMenu
    );


    mobileClose?.addEventListener(
        'click',
        closeMenu
    );


    mobileOverlay?.addEventListener(
        'click',
        closeMenu
    );


    $$('.ya-mobile-nav a').forEach(
        (link) => {

            link.addEventListener(
                'click',
                closeMenu
            );

        }
    );


    /* =========================================================
       LOCATION MODAL
    ========================================================= */

    function locationModal() {

        return $(
            '[data-ya-location-modal]'
        );

    }


    function openLocationModal() {

        const modal =
            locationModal();

        if (!modal) {
            return;
        }

        modal.classList.add(
            'open'
        );

        modal.setAttribute(
            'aria-hidden',
            'false'
        );

        d.body.classList.add(
            'ya-lock'
        );
    }


    function closeLocationModal() {

        const modal =
            locationModal();

        if (!modal) {
            return;
        }

        modal.classList.remove(
            'open'
        );

        modal.setAttribute(
            'aria-hidden',
            'true'
        );

        d.body.classList.remove(
            'ya-lock'
        );
    }


    $$('[data-ya-location]').forEach(
        (button) => {

            button.addEventListener(
                'click',
                openLocationModal
            );

        }
    );


    $$(
        '[data-ya-location-close]'
    ).forEach(
        (button) => {

            button.addEventListener(
                'click',
                closeLocationModal
            );

        }
    );


    /* =========================================================
       ESC KEY
    ========================================================= */

    d.addEventListener(
        'keydown',
        (event) => {

            if (
                event.key !== 'Escape'
            ) {
                return;
            }

            closeMenu();
            closeLocationModal();

        }
    );


    /* =========================================================
       HEADER + SCROLL PROGRESS
    ========================================================= */

    const header =
        $('#ya-header');

    const progress =
        $('.ya-progress');

    let ticking = false;


    function updateScrollUI() {

        const scrollTop =
            window.scrollY ||
            d.documentElement.scrollTop;


        header?.classList.toggle(
            'scrolled',
            scrollTop > 16
        );


        const maxScroll =
            d.documentElement.scrollHeight -
            window.innerHeight;


        if (progress) {

            const percent =
                maxScroll > 0
                    ? Math.min(
                        100,
                        (
                            scrollTop /
                            maxScroll
                        ) * 100
                    )
                    : 0;


            progress.style.width =
                `${percent}%`;
        }


        ticking = false;
    }


    window.addEventListener(
        'scroll',
        () => {

            if (!ticking) {

                window.requestAnimationFrame(
                    updateScrollUI
                );

                ticking = true;
            }

        },
        {
            passive: true
        }
    );


    updateScrollUI();


    /* =========================================================
       REVEAL ANIMATIONS
    ========================================================= */

    if (
        !reducedMotion &&
        'IntersectionObserver' in window
    ) {

        const observer =
            new IntersectionObserver(
                (entries) => {

                    entries.forEach(
                        (entry) => {

                            if (
                                !entry.isIntersecting
                            ) {
                                return;
                            }


                            entry.target
                                .classList
                                .add('in');


                            observer.unobserve(
                                entry.target
                            );

                        }
                    );

                },
                {
                    threshold: 0.1,

                    rootMargin:
                        '0px 0px -35px 0px'
                }
            );


        $$('.reveal').forEach(
            (
                element,
                index
            ) => {

                if (
                    !element.style
                        .getPropertyValue(
                            '--delay'
                        )
                ) {

                    element.style
                        .setProperty(
                            '--delay',
                            `${
                                (index % 6) * 45
                            }ms`
                        );

                }


                observer.observe(
                    element
                );

            }
        );

    } else {

        $$('.reveal').forEach(
            (element) => {

                element.classList.add(
                    'in'
                );

            }
        );

    }


    /* =========================================================
       HERO PARALLAX
    ========================================================= */

    if (!reducedMotion) {

        $$(
            '[data-ya-parallax]'
        ).forEach(
            (visual) => {

                visual.addEventListener(
                    'pointermove',
                    (event) => {

                        if (
                            window.innerWidth <
                            900
                        ) {
                            return;
                        }


                        const rect =
                            visual
                                .getBoundingClientRect();


                        const x =
                            (
                                event.clientX -
                                rect.left
                            ) /
                                rect.width -
                            0.5;


                        const y =
                            (
                                event.clientY -
                                rect.top
                            ) /
                                rect.height -
                            0.5;


                        visual.style.transform =
                            `perspective(1000px)
                             rotateY(${x * 4}deg)
                             rotateX(${-y * 3}deg)
                             translate3d(
                                ${x * 5}px,
                                ${y * 4}px,
                                0
                             )`;

                    }
                );


                visual.addEventListener(
                    'pointerleave',
                    () => {

                        visual.style.transform =
                            '';

                    }
                );

            }
        );

    }


    /* =========================================================
       LOCATION LABEL
    ========================================================= */

    function setLocationLabel(
        value
    ) {

        $$(
            '[data-ya-location-label]'
        ).forEach(
            (element) => {

                element.textContent =
                    value;

            }
        );


        localStorage.setItem(
            'ya_location_label',
            value
        );
    }


    const savedLocation =
        localStorage.getItem(
            'ya_location_label'
        );


    if (savedLocation) {

        setLocationLabel(
            savedLocation
        );

    } else {

        const locale =
            navigator.language ||
            navigator.userLanguage ||
            'fr-FR';


        const region =
            locale.includes('-')
                ? locale.split('-')[1]
                : '';


        const regionMap = {

            FR: 'France',
            DE: 'Allemagne',
            AT: 'Autriche',
            CH: 'Suisse',
            BE: 'Belgique',
            LU: 'Luxembourg',
            GB: 'Royaume-Uni',
            IE: 'Irlande',
            NL: 'Pays-Bas',
            ES: 'Espagne',
            IT: 'Italie',
            PT: 'Portugal',
            US: 'International',
            CA: 'International'

        };


        setLocationLabel(
            regionMap[region] ||
            'France'
        );

    }


    /* =========================================================
       GEOLOCATION
    ========================================================= */

    $('[data-ya-geolocate]')
        ?.addEventListener(
            'click',
            () => {

                if (
                    !navigator.geolocation
                ) {

                    alert(
                        'La géolocalisation n’est pas disponible dans ce navigateur.'
                    );

                    return;
                }


                const button =
                    $(
                        '[data-ya-geolocate]'
                    );


                const originalText =
                    button?.textContent;


                if (button) {

                    button.disabled =
                        true;

                    button.textContent =
                        'Détection…';

                }


                navigator
                    .geolocation
                    .getCurrentPosition(

                        () => {

                            setLocationLabel(
                                'Position détectée'
                            );

                            closeLocationModal();


                            if (button) {

                                button.disabled =
                                    false;

                                button.textContent =
                                    originalText;

                            }

                        },


                        () => {

                            alert(
                                'La localisation n’a pas été autorisée.'
                            );


                            if (button) {

                                button.disabled =
                                    false;

                                button.textContent =
                                    originalText;

                            }

                        },


                        {
                            enableHighAccuracy:
                                false,

                            timeout:
                                8000,

                            maximumAge:
                                600000
                        }

                    );

            }
        );


    /* =========================================================
       EXTERNAL LINKS
    ========================================================= */

    $$(
        'a[target="_blank"]'
    ).forEach(
        (link) => {

            const rel =
                link.getAttribute(
                    'rel'
                ) || '';


            if (
                !rel.includes(
                    'noopener'
                )
            ) {

                link.setAttribute(
                    'rel',
                    `${rel} noopener noreferrer`
                        .trim()
                );

            }

        }
    );


    /* =========================================================
       FORM UX
    ========================================================= */

    d.addEventListener(
        'focusin',
        (event) => {

            const group =
                event.target.closest(
                    '.ff-el-group'
                );


            group?.classList.add(
                'ya-field-active'
            );

        }
    );


    d.addEventListener(
        'focusout',
        (event) => {

            const group =
                event.target.closest(
                    '.ff-el-group'
                );


            group?.classList.remove(
                'ya-field-active'
            );

        }
    );


    /* =========================================================
       ANCHOR SCROLL
    ========================================================= */

    $$(
        'a[href^="#"]'
    ).forEach(
        (link) => {

            link.addEventListener(
                'click',
                (event) => {

                    const href =
                        link.getAttribute(
                            'href'
                        );


                    if (
                        !href ||
                        href === '#'
                    ) {
                        return;
                    }


                    const target =
                        $(href);


                    if (!target) {
                        return;
                    }


                    event.preventDefault();


                    const headerOffset =
                        header?.offsetHeight ||
                        70;


                    const top =
                        target
                            .getBoundingClientRect()
                            .top +
                        window.scrollY -
                        headerOffset -
                        18;


                    window.scrollTo(
                        {
                            top,

                            behavior:
                                reducedMotion
                                    ? 'auto'
                                    : 'smooth'
                        }
                    );

                }
            );

        }
    );


    /* =========================================================
       BACK TO TOP
    ========================================================= */

    const backTop =
        $('[data-ya-back-top]');


    function updateBackTop() {

        if (!backTop) {
            return;
        }


        backTop.classList.toggle(
            'show',
            window.scrollY > 500
        );

    }


    window.addEventListener(
        'scroll',
        updateBackTop,
        {
            passive: true
        }
    );


    backTop?.addEventListener(
        'click',
        () => {

            window.scrollTo(
                {
                    top: 0,

                    behavior:
                        reducedMotion
                            ? 'auto'
                            : 'smooth'
                }
            );

        }
    );


    updateBackTop();


    /* =========================================================
       RESIZE SAFETY
    ========================================================= */

    window.addEventListener(
        'resize',
        () => {

            if (
                window.innerWidth >
                1120
            ) {

                closeMenu();

            }

        }
    );


    /* =========================================================
       INITIALIZE
    ========================================================= */

    d.documentElement
        .classList
        .add(
            'ya-js-ready'
        );

})();