if ( window.innerWidth <= 1999 ) {
    const openModalBtn = document.getElementById('openAddCarModal') ,
        carAddingModalWrapper = document.getElementById('carAddingWrapper'),
        // carAddingModal = document.getElementById('carAddingModal'),
        carAddingModalCloseBtn = document.getElementById('carEddingClose'),
        wrapperActiveClass = 'add-car__adding-wr--active'

    openModalBtn.addEventListener('click', () => carAddingModalOpening())

    carAddingModalCloseBtn.addEventListener('click', () => carAddingModalClosing())

    // Open car adding modal
    const carAddingModalOpening = () => {
        carAddingModalWrapper.classList.add(wrapperActiveClass)

        carAddingModalWrapper.addEventListener('click', e => {
            if ( !e.target.closest('.car-adding') ) carAddingModalClosing()
        })
    }

    // Close car adding modal
    const carAddingModalClosing = () => {
        carAddingModalWrapper.classList.remove(wrapperActiveClass)
    }
}