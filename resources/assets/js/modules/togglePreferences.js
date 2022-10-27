const preferencesActiveClass = 'preferences-block--open',
    preferencesBlock = document.getElementById('preferencesBlock'),
    toggleBtn = document.getElementById('togglePreferences')

toggleBtn.addEventListener('click', () => {
    preferencesBlock.classList.toggle(preferencesActiveClass)
})