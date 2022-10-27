const faqTabsList = document.getElementById('faqTabs'),
    activeTabClass = 'faq__toggles-group--active',
    tabBtnClass = 'nav-tabs-item'

faqTabsList.addEventListener('click', e => {
    if ( e.target.closest(`.${tabBtnClass}`) ) {
        const toActiveTabId = e.target.closest(`.${tabBtnClass}`).dataset.tab
        
        disableActiveTab()
        activateTab(toActiveTabId)
    }
})

// disable active tab
const disableActiveTab = () => {
    document.querySelector(`.${activeTabClass}`).classList.remove(activeTabClass)
}

// Activate tab
const activateTab = tabId => {
    document.getElementById(tabId).classList.add(activeTabClass)
}