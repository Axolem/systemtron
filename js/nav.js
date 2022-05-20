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

//Blog JS
let toggles = document.getElementsByClassName('toggle');
let conentDiv = document.getElementsByClassName('blog-cards');

for (let i = 0; i < toggles.length; i++) {
    toggles[i].addEventListener('click', () => {
        if (parseInt(conentDiv[i].style.height) != conentDiv[i].scrollHeight) {
            conentDiv[i].style.height = conentDiv[i].scrollHeight + 'px';
        }
        else {
            conentDiv[i].style.height = "300px";
        }
        for (let j = 0; j < conentDiv.length; j++) {
            if (j !== i) {
                conentDiv[j].style.height = "300px";
            }
        }
    })
}

