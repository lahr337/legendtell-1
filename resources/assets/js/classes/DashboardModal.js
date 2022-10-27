export default class DashboardModal {
    // Toggle manual option
    toggleManualOption = (radioName, secondaryQuestionId) => {
        const radios = document.querySelectorAll(`input[name="${radioName}"]`),
            secondaryQuestionEl = document.getElementById(secondaryQuestionId)

        Array.from(radios).map(radio => {
            radio.addEventListener('change', e => {
                e.target.value == 0 ? secondaryQuestionEl.classList.add('modal-step__secondary--active') : secondaryQuestionEl.classList.remove('modal-step__secondary--active')
            })
        })
    }

    // To step action
    changeStep = () => {
        // const modal = document.getElementById('addCarModal')

        // modal.addEventListener('click', e => {
        //     this._stepBtnClick(e.target)
        // })
    }

    _stepBtnClick = clickedEl => {
        if ( clickedEl.closest('.modal-step__btn') ) {
            const toStep = clickedEl.closest('.modal-step__btn').dataset.step

            toStep == 'done' ? this._closeRegModal() : this._toStep(toStep)
        }
    }

    _closeRegModal = () => {
        document.getElementById('addCarModal').classList.remove('modal--active')
        this._disableCurrentStep()
        document.getElementById('addCarFirstStep').classList.add('modal-step--active')
    }

    _disableCurrentStep = () => {
        document.querySelector('.modal-step--active').classList.remove('modal-step--active')
    }

    _toStep = stepId => {
        // debugger
        this._disableCurrentStep()
        // document.getElementById(stepId).classList.add('modal-step--active')
    }
}