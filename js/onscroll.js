window.onscroll = function() { myFunction() };

var header = document.getElementsByClassName("dashboard");
var right_products = document.getElementById("right_products");
var sticky = header[0].offsetTop;

function myFunction() {
    if (window.pageYOffset > sticky) {
        header[0].classList.add("sticky");
        console.log(right_products);
        right_products.classList.add("sticky_right_products")
    } else {
        header[0].classList.remove("sticky");
        right_products.classList.remove("sticky_right_products")
    }
}