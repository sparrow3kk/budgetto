'use strict';

const images = document.querySelectorAll('img[data-src]');
const loadImg = function (entries, observer) {
    const [entry] = entries;
    if (!entry.isIntersecting) return;
    const defaultSRC = entry.target.dataset.src;
    entry.target.src = defaultSRC;
    entry.target.addEventListener('load', function () {
        entry.target.classList.remove('lazy-img');
    })
    observer.unobserve(entry.target);
}

const imgObserver = new IntersectionObserver(loadImg, {
    root: null,
    threshold: [0],
    rootMargin: `-200px`,
})

images.forEach(img => imgObserver.observe(img));