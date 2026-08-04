(function() {
    'use strict';
    var container = document.querySelector('.chitramaya-gallery-container');
    if (!container) return;
    
    if (container.dataset.noRightClick === '1') {
        container.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            return false;
        });
    }
    
    if (container.dataset.noDrag === '1') {
        container.querySelectorAll('img').forEach(function(img) {
            img.setAttribute('draggable', 'false');
            img.addEventListener('dragstart', function(e) {
                e.preventDefault();
            });
        });
        // Prevent selecting images
        container.style.webkitUserSelect = 'none';
        container.style.userSelect = 'none';
    }
})();
