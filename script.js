

// code to slide images in product details page
const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage() {
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);


//  ***** for navigation menu bar small screen *****
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

const navLink = document.querySelectorAll(".nav-link");

navLink.forEach(n => n.addEventListener("click", closeMenu));

function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}

// ****** For filter menu bar small screen *****
const filterBar = document.querySelector(".filter-bar");
const filterNavMenu = document.querySelector(".filter-nav-menu");

filterBar.addEventListener("click", filterMobileMenu);

console.log(filterBar);
console.log(filterNavMenu);
function filterMobileMenu() {
    filterBar.classList.toggle("active");
    filterNavMenu.classList.toggle("active");
}

const filterNavLink = document.querySelectorAll(".filter-nav-link");

filterNavLink.forEach(n => n.addEventListener("click", filterCloseMenu));

function filterCloseMenu() {
    filterBar.classList.remove("active");
    filterNavMenu.classList.remove("active");
}