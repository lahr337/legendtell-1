export default class Input {
    static showHidePasswor = (button, field) => {
        button.addEventListener('click', () => {
            field.type == 'password' ? field.type = 'text' : field.type = 'password'
        })
    }
}