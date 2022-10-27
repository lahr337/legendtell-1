const allChecksCheck = document.getElementById('turnAll'),
    allChecks = document.getElementsByClassName('notifications')

// click on allChecks
allChecksCheck.addEventListener('change', () => {
    allChecksCheck.checked ? checkUncheckAll(true) :checkUncheckAll(false)
})

// Check/uncheck all
const checkUncheckAll = checkState => {
    Array.from(allChecks).map(check => {
        check.checked = checkState
    })
}