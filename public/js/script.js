//loader
window.addEventListener("load", () => {
    const loader = document.querySelector(".loader");

    if (loader) {
        loader.classList.add("loader-hidden");

        loader.addEventListener("transitionend", () => {
            console.log("Transition Ended");
            document.body.removeChild(loader);
        });
    }
});

function onScroll() {
    const header = document.querySelector("header");
    const toTop = document.querySelector("#to-top");

    // Check if elements exist
    if (!header || !toTop) return;

    const fixedNav = header.offsetTop;

    if (window.pageYOffset > fixedNav) {
        header.classList.add("navbar-fixed");
        toTop.classList.remove("hidden");
        toTop.classList.add("flex");
    } else {
        header.classList.remove("navbar-fixed");
        toTop.classList.remove("flex");
        toTop.classList.add("hidden");
    }
}

// hamburger
const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");

hamburger.addEventListener("click", function () {
    hamburger.classList.toggle("hamburger-active");
    navMenu.classList.toggle("hidden");
});

// close when click outside hamburger
window.addEventListener("click", function (e) {
    if (
        e.target != hamburger &&
        e.target != navMenu &&
        !navMenu.contains(e.target)
    ) {
        hamburger.classList.remove("hamburger-active");
        navMenu.classList.add("hidden");
    }
});

// dropdown
// Ambil elemen "Tentang Kami" yang memiliki submenu
const dropdownToggles = document.querySelectorAll(".group.relative");

// Tambahkan event listener ke setiap elemen dropdown
dropdownToggles.forEach((toggle) => {
    const dropdownMenu = toggle.querySelector(".dropdown-menu");
    toggle.addEventListener("click", function () {
        // Toggle (tampilkan atau sembunyikan) dropdown-menu
        dropdownMenu.classList.toggle("hidden");
    });

    // Sembunyikan dropdown saat mengklik di luar dropdown-menu
    document.addEventListener("click", function (e) {
        if (!toggle.contains(e.target)) {
            dropdownMenu.classList.add("hidden");
        }
    });
});

// slider struktur kepengerusan
const slider = document.querySelector(".slider");
const leftArrow = document.querySelector(".prev-button");
const rightArrow = document.querySelector(".next-button");
const indicatorParents = document.querySelector(".control ul");

var sectionIndex = 0;
var autoSlideInterval;

function setIndex(index) {
    document.querySelector(".control .selected").classList.remove("selected");
    slider.style.transform = "translate(" + index * -33.33 + "%)";
    indicatorParents.children[sectionIndex].classList.add("selected");
}

function moveNext() {
    sectionIndex = sectionIndex < 2 ? sectionIndex + 1 : 0;
    setIndex(sectionIndex);
}

function startSlide() {
    autoSlideInterval = setInterval(moveNext, 5000);
}

function stopSlide() {
    clearInterval(autoSlideInterval);
}

document.querySelectorAll(".control li").forEach(function (indicator, ind) {
    indicator.addEventListener("click", function () {
        sectionIndex = ind;
        setIndex(sectionIndex);
    });
});

rightArrow.addEventListener("click", function () {
    moveNext();
});

leftArrow.addEventListener("click", function () {
    sectionIndex = sectionIndex > 0 ? sectionIndex - 1 : 2;
    setIndex(sectionIndex);
});

startSlide();
