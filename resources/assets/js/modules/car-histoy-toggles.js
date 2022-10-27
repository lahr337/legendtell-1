const toggleItems = document.querySelectorAll('.toggle')

// Vatiables for answer blocks (DOM elements, elements heights)
const contentBlocks = document.querySelectorAll('.toggle__content')
const contentHeights = []

// Acitve faq class
const activeToggleClass = 'toggle--active'

// Get answer blocks height whtn document is loaded
document.addEventListener('DOMContentLoaded', () => {
    Array.from(contentBlocks).map((contentBlock, key) => {
        const height = contentBlock.clientHeight
        
        // Push height of block to array
        contentHeights.push(height)
        
        // Adding max-height to answer block
        contentBlock.style.maxHeight = 0
        
        // Close answer block
        closeToggleBlock(contentBlock.parentElement)
    })
})

// Close answer block if parent not contain .faq-item--active class
const closeToggleBlock = parentEl => {
    if ( parentEl.classList.contains(activeToggleClass) ) {
        parentEl.querySelector('.toggle__content').style.maxHeight = 0
        parentEl.classList.remove(activeToggleClass)
    }
}

// Open answer block if parent contain .faq-item--acitve class
const showToggleBlock = (parentEl, key) => {
    if ( !parentEl.parentElement.classList.contains(activeToggleClass) ) {
        parentEl.querySelector('.toggle__content').style.maxHeight = `${contentHeights[key]}px`
        parentEl.classList.add(activeToggleClass)
    }
}

// Toggle answers on faq heading click
Array.from(toggleItems).map( (toggleItem, key) => {
    toggleItem.querySelector('.toggle__header').addEventListener('click', () => {
        toggleItem.classList.contains(activeToggleClass) ? closeToggleBlock(toggleItem) : showToggleBlock(toggleItem, key)
    })
})