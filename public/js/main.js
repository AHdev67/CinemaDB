//----------------------SWIPER SCRIPT----------------------
const swiper = new Swiper('.swiper', {
    // Optional parameters
    loop: true,
    // If we need pagination
    pagination: {
    el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

//----------------------BURGER MENU SCRIPT----------------------
const menu = document.querySelector("#menu");
const menuItems = document.querySelectorAll(".menuItem");
const hamburger= document.querySelector("#burger");
const closeIcon= document.querySelector("#closeIcon");
const menuIcon = document.querySelector("#menuIcon");

function toggleMenu() {
    if (menu.classList.contains("hideMenu")) {
        menu.classList.remove("hideMenu");
        closeIcon.style.display = "block";
        menuIcon.style.display = "none";
    } else {
        menu.classList.add("hideMenu");
        closeIcon.style.display = "none";
        menuIcon.style.display = "block";
    }
}

hamburger.addEventListener("click", toggleMenu);

//----------------------DELETE BUTTON SCRIPT----------------------
const deleteButton = document.querySelector(".delete");

deleteButton.addEventListener("click", function(){
    confirm("Are you sure you want to delete this element ?")
})