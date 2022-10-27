if (document.getElementById('userInfo')) {
    const userInfo = document.getElementById('userInfo'),
        userNav = document.getElementById('userNav')

    const userInfoActiveClass = 'user-info--active',
        userNavActiveClass = 'user-nav--active'

    userInfo.addEventListener('click', () => showUserMenu())

    // Outside el click listener
    const clickOutside = () => {
        document.addEventListener('click', e => {
            if ( !e.target.closest('.user') ) hideUserMenu()
        })
    }

    // Hide/show functions
    const showUserMenu = () => {
        if ( !userInfo.classList.contains(userInfoActiveClass) ) {
            userInfo.classList.add(userInfoActiveClass)
            userNav.classList.add(userNavActiveClass)

            clickOutside()
        } else hideUserMenu()
    }
    
    const hideUserMenu = () => {
        userInfo.classList.remove(userInfoActiveClass)
        userNav.classList.remove(userNavActiveClass)
    }
}