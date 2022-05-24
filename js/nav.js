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

