export default class Tabs {
    constructor( tabBtnsContainer, tabBtnClass, activeTabBtnClass, activeTabContentClass ) {
        this.activeTabBtnClass = activeTabBtnClass
        this.tabBtnClass = tabBtnClass
        this.tabBtnsContainer = tabBtnsContainer
        this.activeTabContentClass = activeTabContentClass
    }

    // Check if clicked tab is active
    _checkIsTabActive = clickedTab => {
        return clickedTab.classList.contains(this.activeTabBtnClass) ? true : false
    }

    // Remove active class from active tab btn
    _removeActiveTabBtnClass = () => {
        document.querySelector(`.${this.activeTabBtnClass}`) && document.querySelector(`.${this.activeTabBtnClass}`).classList.remove(this.activeTabBtnClass)
    }

    // Remove active class from active tab content
    _removeActiveTabContentClass = () => {
        document.querySelector(`.${this.activeTabContentClass}`) && document.querySelector(`.${this.activeTabContentClass}`).classList.remove(this.activeTabContentClass)
    }

    // Add active class to tab button
    _addActiveTabBtnClass = tabBtn => {
        tabBtn.classList.add(this.activeTabBtnClass)
    }

    // Add active class to content tab
    _addActiveClassToContent = contentBlock => {
        contentBlock.classList.add(this.activeTabContentClass)
    }

    // Get content block to activate
    _activateContentTab = clickedTab => {
        const elToActivate = document.getElementById(clickedTab.dataset.tab)
        this._addActiveClassToContent(elToActivate)
    }

    _toggleAccountSettingsHeadingBtns = clickedTab => {
        const tabName = clickedTab.dataset.tab,
            headingButtons = document.getElementById('headingButtons')

        if ( tabName == 'myReports' ) headingButtons.classList.add('account-settings__btns--active')
        else if ( tabName !== 'myReports' && headingButtons.classList.contains('account-settings__btns--active') ) headingButtons.classList.remove('account-settings__btns--active')
    }

    _changeTabAction = clickedTab => {
         // disabeling prev
         this._removeActiveTabBtnClass()
         this._removeActiveTabContentClass()

         // activate current
         this._addActiveTabBtnClass(clickedTab)
         this._activateContentTab(clickedTab)
    }

    // Disable prev active tab
    changeTab = () => {
        this.tabBtnsContainer.addEventListener('click', e => {
            if ( e.target.closest(`.${this.tabBtnClass}`) ) {
                e.preventDefault()
                const clickedTab = e.target.closest(`.${this.tabBtnClass}`)
    
                !this._checkIsTabActive( clickedTab ) && this._changeTabAction(clickedTab)

                // Toggle account settings heading tab
                if ( clickedTab.classList.contains('nav-tabs-item--choose') ) this._toggleAccountSettingsHeadingBtns(clickedTab)
            }
        })
    }

    // Open tab from browser hash
    openTabFromHash = () => {
        if ( window.location.hash ) {
            const browserHash = window.location.hash.substring(1)

            Array.from( document.querySelectorAll(`.${this.tabBtnClass}`) ).map( tab => {
                if ( tab.dataset.tab == browserHash ) {
                    this._changeTabAction(tab)

                    // Toggle account settings heading tab
                    if ( tab.classList.contains('nav-tabs-item--choose') ) this._toggleAccountSettingsHeadingBtns(tab)
                }
            })
        }
    }
}