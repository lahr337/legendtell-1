const tabsContentWrapper = document.getElementById('dashboardTabs'),
    activeContentTabClass = 'btn--tab-active',
    contentTabClass = 'btn--tab',
    contentGeneralContentClass = 'content-tab',
    contentGeneralContentActiveClass = 'content-tab--active'

// // Tab event listener
tabsContentWrapper.addEventListener('click', e => {
    e.preventDefault()

    const clickedContentTab = e.target.closest(`.${contentTabClass}`)

    if ( clickedContentTab && !clickedContentTab.classList.contains(`.${activeContentTabClass}`) ) {
        disablePrevContentActiveTab()
        disableContentPrevTabContent()
        activateContentTab( clickedContentTab )
        activateContentTabContent( getContentTabId(clickedContentTab) )
    }
})

// Get tabId
const getContentTabId = clickedElement => {
    return clickedElement.dataset.tab
    // return tabId
}

// Activate clicked tab
const activateContentTab = tabToActivate => {
    tabToActivate.classList.add(activeContentTabClass)
}

// Disable prev active tab
const disablePrevContentActiveTab = () => {
    document.querySelector(`.${activeContentTabClass}`).classList.remove(activeContentTabClass)
}

// Activate tab content
const activateContentTabContent = tabId => {
    document.getElementById(tabId).classList.add(contentGeneralContentActiveClass)
}

// Disable prev tab content
const disableContentPrevTabContent = () => {
    document.querySelector(`.${contentGeneralContentActiveClass}`).classList.remove(contentGeneralContentActiveClass)
}