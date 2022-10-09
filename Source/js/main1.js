let icon = document.querySelector("#mode .icon i");
icon.addEventListener('click', function() {

    let data = document.body.classList.toggle("dark-mode") ? 1 : 0;

    if (document.body.hasChildNodes('header')) {
        let header = document.querySelector('#header');
        let dropdown = document.querySelector('.dropdown-menu');
        let dropdown_toggle = document.querySelector('.dropdown .dropdown-toggle');
        let footer = document.querySelector('footer');
        document.body.classList.contains("dark-mode") ? (header.classList.replace('navbar-light', 'navbar-dark') && header.classList.replace('bg-light', 'bg-dark') && footer.classList.replace('bg-light', 'bg-dark') && dropdown.classList.add('dropdown-menu-dark')) : (header.classList.replace('bg-dark', 'bg-light') && footer.classList.replace('bg-dark', 'bg-light') && header.classList.replace('navbar-dark', 'navbar-light') && dropdown.classList.remove('dropdown-menu-dark'));
    }
    mode_active();
    //document.body.classList.contains("dark-mode") ? icon.classList.replace("bi-brightness-high-fill", "bi-moon-stars-fill", ) : icon.classList.replace("bi-moon-stars-fill", "bi-brightness-high-fill");
    $.ajax({
        method: 'Post',
        url: "../Source/php/Tools/dark-mode.php",
        data: {
            mode: data,
        },
        success: function(data) {}
    });
});
//events body
window.addEventListener('load', mode_active);
//function load body
function mode_active() {
    /* window.scrollTo({
         top: 0,
         behavior: 'smooth'
     });*/
    document.body.classList.contains("dark-mode") ? icon.classList.replace("bi-brightness-high-fill", "bi-moon-stars-fill", ) : icon.classList.replace("bi-moon-stars-fill", "bi-brightness-high-fill");
}
//vanila tilt
setTimeout(() => {


    VanillaTilt.init(document.querySelectorAll(".sci li a"), {
        reverse: true,
        max: 20,
        transition: true,
        reset: true,
        scale: 0.9,
        glare: true,
        "max-glare": 1,
        speed: 400
    });
}, 500);

let btn_navbar = document.querySelector('.navbar-toggler');
let icon_nav = document.querySelector('.navbar-toggler i');
//nav icon
btn_navbar.addEventListener('click', nav_icon);
let i = 0;

function nav_icon() {
    if (i % 2 == 0) {
        icon_nav.classList.replace('fa-bars', 'fa-xmark');
    } else {
        icon_nav.classList.replace('fa-xmark', 'fa-bars');
    }
    i++;
}