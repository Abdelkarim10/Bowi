const hamburger_menu = document.querySelector(".hamburger-menu");
const navbar = document.querySelector("header nav");
const links = document.querySelectorAll(".links a");

function closeMenu() {
    navbar.classList.remove("open");
    document.body.classList.remove("stop-scrolling");
}

hamburger_menu.addEventListener("click", () => {
    if (!navbar.classList.contains("open")) {
        navbar.classList.add("open");
        document.body.classList.add("stop-scrolling");
    } else {
        closeMenu();
    }
});

if (window.innerWidth >= 1200){
    $(document).ready(function(){
        $('.slide-track').slick({
        slidesToShow:8,
        slidesToScroll:1,
        autoplay:true,
        autoplaySpeed:1500,
        arrows:false,
        dots:false,
        pauseOnHover:false,
        responsive: [{
            breakpoint:768,
            setting:{
            slidesToShow:4
            }
        }, {
            breakpoint:520,
            setting:{
            slidesToShow:3
            }
        }]
        });
    });
}

else if (window.innerWidth >= 650 && window.innerWidth < 1200 ){
    $(document).ready(function(){
        $('.slide-track').slick({
        slidesToShow:6,
        slidesToScroll:1,
        autoplay:true,
        autoplaySpeed:1500,
        arrows:false,
        dots:false,
        pauseOnHover:false,
        responsive: [{
            breakpoint:768,
            setting:{
            slidesToShow:4
            }
        }, {
            breakpoint:520,
            setting:{
            slidesToShow:3
            }
        }]
        });
    });
}
else if (window.innerWidth >= 300 && window.innerWidth < 650 ){
    $(document).ready(function(){
        $('.slide-track').slick({
        slidesToShow:3,
        slidesToScroll:1,
        autoplay:true,
        autoplaySpeed:1500,
        arrows:false,
        dots:false,
        pauseOnHover:false,
        responsive: [{
            breakpoint:768,
            setting:{
            slidesToShow:4
            }
        }, {
            breakpoint:520,
            setting:{
            slidesToShow:3
            }
        }]
        });
    });
}
else if (window.innerWidth < 300 ){
    $(document).ready(function(){
        $('.slide-track').slick({
        slidesToShow:3,
        slidesToScroll:1,
        autoplay:true,
        autoplaySpeed:1500,
        arrows:false,
        dots:false,
        pauseOnHover:false,
        responsive: [{
            breakpoint:768,
            setting:{
            slidesToShow:4
            }
        }, {
            breakpoint:520,
            setting:{
            slidesToShow:3
            }
        }]
        });
    });
}


/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }   
    }
}

// FAQ page

var acc = document.getElementsByClassName("accordion");
var i;
var len = acc.length;
for(i=0; i<len; i++){
    acc[i].addEventListener("click", function(){
        this.classList.toggle("activeFAQ");
        var panel = this.nextElementSibling;
        if(panel.style.maxHeight){
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}