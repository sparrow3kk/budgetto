'use strict';

const header = document.querySelector('.header');
const headerHomeContent = document.querySelector('.header--home-content');
const navHeight = header.getBoundingClientRect();

const stickyNav = function (entries) {
    const [entry] = entries;
    if (!entry.isIntersecting) {
        header.classList.add('sticky');
    } else {
        header.classList.remove('sticky');
    }
}


const headerObserver = new IntersectionObserver(stickyNav, {
    root: null,
    threshold: [0],
    rootMargin: `-${navHeight.height}px`,
});

headerObserver.observe(headerHomeContent);