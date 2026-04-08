// Add active-icon to filter icons on pages that use .filter or .blasting-filter
document.addEventListener('DOMContentLoaded', function () {
    const selectors = document.querySelectorAll('.filter ul li a, .blasting-filter ul li a');
    const current = (location.pathname.split('/').pop() || 'index.html').toLowerCase();
    selectors.forEach(a => {
        const href = a.getAttribute('href');
        if (!href || href === '#') return;
        const linkFile = href.split('/').pop().toLowerCase();
        if (linkFile === current) {
            const li = a.closest('li');
            if (li) {
                const icon = li.querySelector('i.fa');
                if (icon) {
                    icon.classList.add('active-icon');
                    if (icon.classList.contains('fa-circle-o')) {
                        icon.classList.remove('fa-circle-o');
                        icon.classList.add('fa-dot-circle-o');
                    }
                }
            }
        }
    });
});
