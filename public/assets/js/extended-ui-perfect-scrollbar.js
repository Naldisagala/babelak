/**
 * Perfect Scrollbar
 */
'use strict';

document.addEventListener('DOMContentLoaded', function () {
    (function () {
        const verticalExample = document.querySelector(".vertical-scroll"),
            horizontalExample = document.querySelector(".horizontal-scroll"),
            horizVertExample = document.querySelector(".both-scrollbars-scroll");

        // Vertical Example
        // --------------------------------------------------------------------
        if (verticalExample) {
            new PerfectScrollbar(verticalExample, {
                wheelPropagation: false
            });
        }

        // Horizontal Example
        // --------------------------------------------------------------------
        if (horizontalExample) {
            new PerfectScrollbar(horizontalExample, {
                wheelPropagation: false,
                suppressScrollY: true
            });
        }

        // Both vertical and Horizontal Example
        // --------------------------------------------------------------------
        if (horizVertExample) {
            new PerfectScrollbar(horizVertExample, {
                wheelPropagation: false
            });
        }
    })();
});
