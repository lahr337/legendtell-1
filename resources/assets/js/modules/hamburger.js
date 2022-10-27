if ( window.innerWidth <= 767 ) {
    const hamburgerBtn = document.getElementById('hamburger'),
        mobileMenu = document.getElementById('mobileMenu'),
        mobileMenuActiveCalss = 'mobile-menu--active'

    hamburgerBtn.addEventListener('click', () => {
        if ( hamburgerBtn.classList.contains('is-active') ) disableMobileNav()
        else activateMobileNav()
    })

    // Activate hamburger and mobile nav
    const activateMobileNav = () => {
        hamburgerBtn.classList.add('is-active')
        mobileMenu.classList.add(mobileMenuActiveCalss)
    }

    // Disable hamburger and mobile nav
    const disableMobileNav = () => {
        hamburgerBtn.classList.remove('is-active')
        mobileMenu.classList.remove(mobileMenuActiveCalss)
    }
}