let profile = document.querySelector('#profile');
let profileMenu = document.querySelector('#profile-menu');
let tableContainer =document.querySelector('#table-container');
let menuBtn = document.querySelector('#menu-btn');
let menuSidebar = document.querySelector('#menu');
let close = document.querySelector('#close');


profile.onclick = function(){
    profileMenu.classList.toggle('active');
    menuSidebar.classList.remove('active'); 
    menuSidebar.classList.remove('active');
}
menuBtn.onclick = function(){
    menuSidebar.classList.toggle('active');
    profileMenu.classList.remove('active');
}
close.onclick = function(){
    menuSidebar.classList.remove('active');
}

window.onscroll = function(){
    profileMenu.classList.remove('active');
}

