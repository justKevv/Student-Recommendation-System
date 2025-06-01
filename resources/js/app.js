import './bootstrap';

// Topbar scroll shadow effect
document.addEventListener('DOMContentLoaded', function() {
    const topbar = document.getElementById('topbar');

    if (topbar) {
        function handleScroll() {
            if (window.scrollY > 10) {
                topbar.classList.add('shadow-sm');
            } else {
                topbar.classList.remove('shadow-sm');
            }
        }

        // Initial check
        handleScroll();

        // Listen for scroll events
        window.addEventListener('scroll', handleScroll);
    }
});
