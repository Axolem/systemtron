//Nav bar JS
function toggleMobileMenu(menu) {
    menu.classList.toggle('open');
}

//Login JS
var loginBtn = document.getElementById('loginTab');
var registerBtn = document.getElementById('registerTab');
var z = document.getElementById('btn');

function register() {
    loginBtn.style.left = '-300px';
    registerBtn.style.left = '40px';
    z.style.left = '110px';
}

function login() {
    loginBtn.style.left = '60px';
    registerBtn.style.left = '500px';
    z.style.left = '0px';
}

//Pop up js
window.addEventListener("load", function () {
    setTimeout(
        function open(event) {
            document.querySelector("#pop-up").style.display = "block";
        },
        2000
    )
});

document.querySelector("#close").addEventListener(
    "click", function () {
        document.querySelector("#pop-up").style.display = "none";
    }
);

//Slider JS
var btn1 = document.getElementById('btn1');
var btn2 = document.getElementById('btn2');
var btn3 = document.getElementById('btn3');
var btn4 = document.getElementById('btn4');
var btn5 = document.getElementById('btn5');
var btn6 = document.getElementById('btn6');
var slider = document.querySelector('.slider');

btn1.onclick = function () {
    slider.style.marginLeft = "0";
    this.style.background = "aliceblue";
    btn2.style.background = "transparent";
    btn3.style.background = "transparent";
}

btn2.onclick = function () {
    slider.style.marginLeft = "-100%";
    this.style.background = "aliceblue";
    btn1.style.background = "transparent";
    btn3.style.background = "transparent";
}
btn3.onclick = function () {
    slider.style.marginLeft = "-200%";
    this.style.background = "aliceblue";
    btn1.style.background = "transparent";
    btn3.style.background = "transparent";
}
btn4.onclick = function () {
    slider.style.marginLeft = "-300%";
    this.style.background = "aliceblue";
    btn1.style.background = "transparent";
    btn3.style.background = "transparent";
}
btn5.onclick = function () {
    slider.style.marginLeft = "-400%";
    this.style.background = "aliceblue";
    btn1.style.background = "transparent";
    btn3.style.background = "transparent";
}
btn6.onclick = function () {
    slider.style.marginLeft = "-500%";
    this.style.background = "aliceblue";
    btn1.style.background = "transparent";
    btn3.style.background = "transparent";
}