/* =========================================================
   PWA APP SHELL v3.0.0
========================================================= */

(() => {
    'use strict';

    const body = document.body;

    const searchPanel =
        document.querySelector(
            '[data-ya-app-search]'
        );

    const morePanel =
        document.querySelector(
            '[data-ya-app-more]'
        );

    const searchInput =
        document.querySelector(
            '#ya-app-search-input'
        );


    /* =========================================================
       PANEL HELPERS
    ========================================================= */

    function hasOpenOverlay() {

        return Boolean(
            document.querySelector(
                '.ya-mobile.open,' +
                '.ya-location-modal.open,' +
                '.ya-app-search.open,' +
                '.ya-app-more.open'
            )
        );
    }


    function updateBodyLock() {

        body.classList.toggle(
            'ya-lock',
            hasOpenOverlay()
        );
    }


    function openPanel(
        panel,
        focusTarget = null
    ) {

        if (!panel) {
            return;
        }

        closePanel(
            panel === searchPanel
                ? morePanel
                : searchPanel,
            false
        );

        panel.classList.add(
            'open'
        );

        panel.setAttribute(
            'aria-hidden',
            'false'
        );

        updateBodyLock();

        window.setTimeout(
            () => {

                const target =
                    focusTarget ||
                    panel.querySelector(
                        'button, input, a'
                    );

                target?.focus();

            },
            220
        );
    }


    function closePanel(
        panel,
        restoreLock = true
    ) {

        if (!panel) {
            return;
        }

        panel.classList.remove(
            'open'
        );

        panel.setAttribute(
            'aria-hidden',
            'true'
        );

        if (restoreLock) {
            updateBodyLock();
        }
    }


    function closeAppPanels() {

        closePanel(
            searchPanel,
            false
        );

        closePanel(
            morePanel,
            false
        );

        updateBodyLock();
    }


    /* =========================================================
       SEARCH PANEL
    ========================================================= */

    document
        .querySelectorAll(
            '[data-ya-app-search-open]'
        )
        .forEach(
            (button) => {

                button.addEventListener(
                    'click',
                    () => {

                        openPanel(
                            searchPanel,
                            searchInput
                        );

                    }
                );

            }
        );


    document
        .querySelectorAll(
            '[data-ya-app-search-close]'
        )
        .forEach(
            (button) => {

                button.addEventListener(
                    'click',
                    () => {

                        closePanel(
                            searchPanel
                        );

                    }
                );

            }
        );


    /* =========================================================
       MORE PANEL
    ========================================================= */

    document
        .querySelectorAll(
            '[data-ya-app-more-open]'
        )
        .forEach(
            (button) => {

                button.addEventListener(
                    'click',
                    () => {

                        openPanel(
                            morePanel
                        );

                    }
                );

            }
        );


    document
        .querySelectorAll(
            '[data-ya-app-more-close]'
        )
        .forEach(
            (button) => {

                button.addEventListener(
                    'click',
                    () => {

                        closePanel(
                            morePanel
                        );

                    }
                );

            }
        );


    /* =========================================================
       CLOSE AFTER NAVIGATION
    ========================================================= */

    document
        .querySelectorAll(
            '.ya-app-search a,' +
            '.ya-app-more a'
        )
        .forEach(
            (link) => {

                link.addEventListener(
                    'click',
                    closeAppPanels
                );

            }
        );


    /* =========================================================
       KEYBOARD CONTROL
    ========================================================= */

    document.addEventListener(
        'keydown',
        (event) => {

            if (
                event.key !== 'Escape'
            ) {
                return;
            }

            closeAppPanels();

        }
    );


    /* =========================================================
       STANDALONE PWA DETECTION
    ========================================================= */

    const standaloneQuery =
        window.matchMedia(
            '(display-mode: standalone)'
        );


    function updateDisplayMode() {

        const isStandalone =
            standaloneQuery.matches ||
            window.navigator
                .standalone === true;

        document.documentElement
            .classList
            .toggle(
                'ya-standalone',
                isStandalone
            );

        body.classList.toggle(
            'ya-pwa-installed',
            isStandalone
        );
    }


    updateDisplayMode();


    if (
        typeof standaloneQuery
            .addEventListener ===
        'function'
    ) {

        standaloneQuery
            .addEventListener(
                'change',
                updateDisplayMode
            );

    } else if (
        typeof standaloneQuery
            .addListener ===
        'function'
    ) {

        standaloneQuery
            .addListener(
                updateDisplayMode
            );
    }


    /* =========================================================
       VIDEO HERO PERFORMANCE
    ========================================================= */

    const heroVideo =
        document.querySelector(
            '.ya-hero-video'
        );


    if (heroVideo) {

        const saveData =
            navigator.connection
                ?.saveData === true;

        const reducedMotion =
            window.matchMedia(
                '(prefers-reduced-motion: reduce)'
            ).matches;

        const smallScreen =
            window.innerWidth <= 820;


        if (
            saveData ||
            reducedMotion ||
            smallScreen
        ) {

            heroVideo.pause();

            heroVideo.removeAttribute(
                'autoplay'
            );

            heroVideo.style.display =
                'none';

        } else {

            const playPromise =
                heroVideo.play();

            if (
                playPromise &&
                typeof playPromise
                    .catch ===
                'function'
            ) {

                playPromise.catch(
                    () => {

                        heroVideo.style
                            .display =
                            'none';

                    }
                );
            }
        }
    }


    /* =========================================================
       SEARCH INPUT SHORTCUT
    ========================================================= */

    document.addEventListener(
        'keydown',
        (event) => {

            const target =
                event.target;

            const typing =
                target instanceof
                    HTMLInputElement ||
                target instanceof
                    HTMLTextAreaElement ||
                target?.isContentEditable;


            if (typing) {
                return;
            }


            if (
                event.key === '/' &&
                searchPanel
            ) {

                event.preventDefault();

                openPanel(
                    searchPanel,
                    searchInput
                );
            }

        }
    );


    /* =========================================================
       ACTIVE APP NAVIGATION
    ========================================================= */

    const currentUrl =
        new URL(
            window.location.href
        );

    const currentPath =
        currentUrl.pathname
            .replace(
                /\/+$/,
                ''
            ) || '/';


    document
        .querySelectorAll(
            '.ya-app-bottom-nav a'
        )
        .forEach(
            (link) => {

                try {

                    const linkUrl =
                        new URL(
                            link.href,
                            window.location.origin
                        );

                    const linkPath =
                        linkUrl.pathname
                            .replace(
                                /\/+$/,
                                ''
                            ) || '/';


                    if (
                        currentPath ===
                        linkPath
                    ) {

                        link.classList.add(
                            'active'
                        );

                        link.setAttribute(
                            'aria-current',
                            'page'
                        );
                    }

                } catch (error) {

                    console.warn(
                        'Unable to compare app navigation URL:',
                        error
                    );
                }

            }
        );


    /* =========================================================
       INITIALIZE
    ========================================================= */

    document.documentElement
        .classList
        .add(
            'ya-app-shell-ready'
        );

})();