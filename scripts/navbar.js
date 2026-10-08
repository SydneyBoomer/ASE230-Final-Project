const themeButton = document.getElementById('theme-toggle');
const themeIcon = document.getElementById('theme-icon');
const themeText = document.getElementById('theme-text');


// =========================================================
// DARK MODE
// =========================================================

// Load saved theme
if (localStorage.getItem('theme') === 'dark') {
    document.body.classList.add('dark-mode');

    themeIcon.textContent = '☀';
    themeText.textContent = 'Light Mode';
}


// Toggle theme
themeButton.addEventListener('click', function () {

    document.body.classList.toggle('dark-mode');

    if (document.body.classList.contains('dark-mode')) {

        localStorage.setItem('theme', 'dark');

        themeIcon.textContent = '☀';
        themeText.textContent = 'Light Mode';

    } else {

        localStorage.setItem('theme', 'light');

        themeIcon.textContent = '☾';
        themeText.textContent = 'Dark Mode';

    }
});


// =========================================================
// HIDE NAVBAR WHEN SCROLLING DOWN
// =========================================================

const navbar = document.querySelector('.navbar');

let lastScrollPosition = window.scrollY;
let scrollDistance = 0;

window.addEventListener('scroll', function () {

    const currentScrollPosition = window.scrollY;

    // Scrolling down
    if (currentScrollPosition > lastScrollPosition) {

        scrollDistance += currentScrollPosition - lastScrollPosition;

        // Only hide after scrolling down 50px
        if (scrollDistance >= 50) {
            navbar.classList.add('navbar-hidden');
        }

    }

    // Scrolling up
    else if (currentScrollPosition < lastScrollPosition) {

        // Show the navbar immediately
        navbar.classList.remove('navbar-hidden');

        // Reset the downward scroll distance
        scrollDistance = 0;
    }

    // Always show navbar near the top
    if (currentScrollPosition <= 30) {
        navbar.classList.remove('navbar-hidden');
        scrollDistance = 0;
    }

    lastScrollPosition = currentScrollPosition;
});