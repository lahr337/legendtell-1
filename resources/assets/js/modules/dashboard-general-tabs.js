const tabsWrapper = document.getElementById('dashboardGeneralTabs'),
    activeTabClass = 'dashboard-asside-tab__item--active',
    tabClass = 'dashboard-asside-tab__item',
    tabLinkClass = 'dashboard-asside-tab__link',
    tabContentClass = 'dashboard-tab__general',
    activeTabContentClass = 'dashboard-tab__general--active'

// Tab event listener
tabsWrapper.addEventListener('click', e => {
    e.preventDefault()

    const clickedTab = e.target.closest(`.${tabClass}`)

    if ( clickedTab && !clickedTab.classList.contains(`.${activeTabClass}`) ) {
        disablePrevActiveTab()
        disablePrevTabContent()
        activateTab( clickedTab )
        activateTabContent( getTabId(clickedTab) )
    }
})

// Get tabId
const getTabId = clickedElement => {
    return clickedElement.children[0].dataset.tab
    // return tabId
}

// Activate clicked tab
const activateTab = tabToActivate => {
    tabToActivate.classList.add(activeTabClass)
}

// Disable prev active tab
const disablePrevActiveTab = () => {
    document.querySelector(`.${activeTabClass}`).classList.remove(activeTabClass)
}

// Activate tab content
const activateTabContent = tabId => {
    document.getElementById(tabId).classList.add(activeTabContentClass)
}

// Disable prev tab content
const disablePrevTabContent = () => {
    document.querySelector(`.${activeTabContentClass}`).classList.remove(activeTabContentClass)
}