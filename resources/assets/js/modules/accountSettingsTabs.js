import Tabs from '../classes/Tabs'

// Tabs
const settingsTabs = document.getElementById('settingsTabs')

document.addEventListener('DOMContentLoaded', () => {
    const TabsClass = new Tabs(settingsTabs, 'nav-tabs-item--choose', 'nav-tabs-item--active', 'account-settings__content--active')

    TabsClass.openTabFromHash()
    TabsClass.changeTab()
})