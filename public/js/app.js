
const darkModeToggle = document.querySelector('#dark-mode-toggle');
const html = document.querySelector('html');

darkModeToggle.addEventListener('click', () => {
    html.classList.toggle('dark');
});
