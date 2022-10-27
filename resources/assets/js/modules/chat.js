const openChatBtn = document.getElementById('openChatBtn'),
    chat = document.getElementById('chat'),
    closeChatBtn = document.getElementById('closeChat'),
    activeChatClass = 'chat--active'

openChatBtn.addEventListener('click', e => {
    e.stopPropagation()
    openChat()
})
closeChatBtn.addEventListener('click', () => closeChat())

// Open chat func
const openChat = () => {
    chat.classList.add(activeChatClass)
    clickOutsideChat()
}

// Close chat func
const closeChat = () => {
    chat.classList.remove(activeChatClass)
}

const clickOutsideChat = () => {
    document.addEventListener('click', e => {
        if ( !e.target.closest('.chat') ) closeChat()
    })
}