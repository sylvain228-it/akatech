import "./bootstrap";
// script
// menu mobile
const menuOpen = document.getElementById("menu-open");
const menuClose = document.getElementById("menu-close");
const menuMobile = document.getElementById("menu-mobile");
const contentOverlay = document.getElementById("content-overlay");
menuOpen.addEventListener("click", function (event) {
    event.preventDefault();
    showMenu();
});

menuClose.addEventListener("click", function (event) {
    event.preventDefault();
    closeMenu();
});
contentOverlay.addEventListener("click", function (event) {
    event.preventDefault();
    closeMenu();
});
document.querySelectorAll("#menu-mobile ul li a").forEach(function (el) {
    el.addEventListener("click", function (event) {
        closeMenu();
    });
});

function showMenu() {
    menuMobile.classList.remove("translate-x-full");
    contentOverlay.classList.remove("-translate-x-full");
}
function closeMenu() {
    menuMobile.classList.add("translate-x-full");
    contentOverlay.classList.add("-translate-x-full");
}

let deviceWidth = window.innerWidth;
window.addEventListener("resize", function () {
    deviceWidth = window.innerWidth;
    if (deviceWidth < 1024) {
        closeMenu();
    }
});

window.addEventListener("scroll", () => {
    const navbar = document.getElementById("navbar");
    if (window.scrollY > 120) {
        navbar.classList.add("sticky", "top-0", "shadow-md");
        navbar.classList.remove("-translate-y-full");
    } else {
        navbar.classList.remove("sticky", "top-0", "shadow-md");
    }
});

document.getElementById("scrollTopBtn").addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});

window.addEventListener("scroll", () => {
    const btn = document.getElementById("scrollTopBtn");
    if (window.scrollY > 200) {
        btn.classList.remove("hidden");
    } else {
        btn.classList.add("hidden");
    }
});

// class détail
$(".class-detail-click").on("click", function (event) {
    event.preventDefault();
    $(this)
        .closest(".class-detail-div")
        .find(".class-hide-click")
        .removeClass("hidden");
    const id = $(this).data("id");
    $(`.cliked${id}`).removeClass("hidden");
    $(this).addClass("hidden");
});
$(".class-hide-click").on("click", function (event) {
    event.preventDefault();
    $(this)
        .closest(".class-detail-div")
        .find(".class-detail-click")
        .removeClass("hidden");
    const id = $(this).data("id");
    $(`.cliked${id}`).addClass("hidden");
    $(this).addClass("hidden");
});

// owl-carousel
$(".owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    items: 1,
    pagination: false,
    nav: false,
    dots: false,
    singleItem: true,
    responsive: {
        0: {
            items: 1,
        },
    },
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    checkVisibility: false,
});

$(".play").on("click", function () {
    owl.trigger("play.owl.autoplay", [1000]);
});
$(".stop").on("click", function () {
    owl.trigger("stop.owl.autoplay");
});

setTimeout(() => {
    $("#success-msg").fadeOut("slow");
    $("#error-msg").fadeOut("slow");
}, 4000);
