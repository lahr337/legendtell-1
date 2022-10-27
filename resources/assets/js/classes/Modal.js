export default class Modal {
    closeModal = modalId => {
        const modal = document.getElementById(modalId)

        modal.addEventListener('click', e => {
            ( !e.target.closest('.modal__inner') || e.target.closest('.modal__close') ) && ( this.removeActiveModalClass(modal) )

        })
    }

    removeActiveModalClass = modal => {
        modal.classList.remove('modal--active')
    }
}