function sidebar() {
    let sidebar = document.getElementById('menu');
    let conteudo = document.getElementById('conteudo');
    let containerfull = document.getElementById('container-full');
    let butonNavbar = document.getElementById('butonNavbar');
    
    if (sidebar.style.transform === 'translateX(0%)') {
        sidebar.style.transform = 'translateX(-100%)';
        conteudo.style.width = '90%';
        conteudo.style.transform = 'translateX(0%)';
        containerfull.style.justifyContent = 'center';
        butonNavbar.style.transform = 'translateX(0%)';
        butonNavbar.classList.remove('ativo');
        butonNavbar.style.top = '30px';
    } else {
        sidebar.style.transform = 'translateX(0%)';
        conteudo.style.width = '70%';
        conteudo.style.transform = 'translateX(-5%)';
        containerfull.style.justifyContent = 'flex-end';
        butonNavbar.style.transform = 'translateX(calc(-100% - 10px))';
        butonNavbar.style.top = '10px';
        butonNavbar.classList.add('ativo');
    }
}