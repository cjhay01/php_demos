const guideContainer = document.querySelector('.guide-container');
const guideToggle = document.querySelector('.guide-toggle');

guideToggle.addEventListener('click', () => {
    guideContainer.classList.toggle('collapsed');
});