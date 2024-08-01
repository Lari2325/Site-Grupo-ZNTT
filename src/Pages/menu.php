<header id="navbar-fixed">
    <nav>
        <div class="logo">
            <a href="./">
                <img src="./src/assets/img/logo-white.webp" alt="">
            </a>
        </div>
        <ul id="listMenu">
            <li><a href="./" <?php echo $page == 1 ? 'class="active"' : ''; ?>>Início</a></li>
            <li><a href="quem-somos" <?php echo $page == 2 ? 'class="active"' : ''; ?>>Quem somos</a></li>
            <li><a href="franquias" <?php echo $page == 3 ? 'class="active"' : ''; ?>>Franquias</a></li>
            <li><a href="na-midia" <?php echo $page == 4 ? 'class="active"' : ''; ?>>Na midía</a></li>
            <li><button onclick="location.href='contato'">Contato <i class="fa-regular fa-arrow-right"></i></button></li>
        </ul>
        <button class="toggle" onclick="navbar()"><i class="fa-light fa-bars"></i></button>
    </nav>
</header>

<script>
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
</script>