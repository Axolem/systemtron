//Nav bar JS
function toggleMobileMenu(menu) {
    menu.classList.toggle('open');
}

//Blog JS
let toggles = document.getElementsByClassName('toggle');
let conentDiv = document.getElementsByClassName('blog-cards');

for (let i=0; i < toggles.length; i++) {
    toggles[i].addEventListener('click', ()=>{
        if(parseInt(conentDiv[i].style.height) != conentDiv[i].scrollHeight){conentDiv[i].style.height = conentDiv[i].scrollHeight + 'px';
        }
        else {
            conentDiv[i].style.height = "300px";
        }
        for(let j=0; j <conentDiv.length; j++){
            if(j!==i){
            conentDiv[j].style.height = "300px";
            }
        }
    })
}

