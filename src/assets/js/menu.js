function navbar(){
    let listmenu = document.getElementById('listMenu');
    
    if(listmenu.style.transform == 'translateX(0px)'){
        listmenu.style.transform = 'translateX(-100%)';
    } else {
        listmenu.style.transform = 'translateX(0px)';
    }
}

window.addEventListener('scroll', function() {
    let navbarFixa = document.getElementById('navbar-fixed');
    if (window.scrollY > 10) {
        navbarFixa.classList.add('fixed');
    } else {
        navbarFixa.classList.remove('fixed');
    }
});