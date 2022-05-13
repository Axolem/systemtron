// dashboard JS
function openPage(pageName, elmnt, color) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    // Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.backgroundColor = "";
    }
  
    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";
  
    // Add the specific color to the button used to open the tab content
    elmnt.style.backgroundColor = color;
  }
  
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();

  let toggles = document.getElementsByClassName('toggler');
  let conentDivs = document.getElementsByClassName('home-options');
  let icons = document.getElementsByClassName('dash-option-icon');
  
  for (let i=0; i < toggles.length; i++) {
    toggles[i].addEventListener('click', ()=>{
        if(parseInt(conentDivs[i].style.height) != conentDivs[i].scrollHeight){conentDivs[i].style.height = conentDivs[i].scrollHeight + 'px'; 
        toggles[i].style.color = "#d40083"; 
        icons[i].classList.remove('bi-plus'); 
        icons[i].classList.add('bi-dash');
        }
        else {
            conentDivs[i].style.height = "0px";
            toggles[i].style.color ="#fff";
            icons[i].classList.remove('bi-dash');
            icons[i].classList.add('bi-plus');
        }
        for(let j=0; j <conentDivs.length; j++){
            if(j!==i){
            conentDivs[j].style.height = "0px";
            toggles[j].style.color ="#fff";
            icons[j].classList.remove('bi-dash');
            icons[j].classList.add('bi-plus');
            }
        }
    })
  }