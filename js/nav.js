let subMenu=document.getElementById("subMenu");
function toggleMenu(){
    subMenu.classList.toggle("open-menu");
}

const Icon=document.querySelector('.Icon');
const search=document.querySelector('.search');
Icon.onclick=function(){
    search.classList.toggle('active')
}
