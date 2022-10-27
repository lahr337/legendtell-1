const serviceSelect = document.getElementById('serviceSelect'),
    serviceSelectHeading = document.getElementById('serviceSelectHeading'),
    serviceSelectList = document.getElementById('serviceSelectList'),
    modal = document.getElementById('addServiceRecordModal')

// serviceSelectHeading.addEventListener('click', () => {
//     serviceSelect.classList.toggle('service-select--active')
// })

modal.addEventListener('click', e => {
    if ( !e.target.closest('.service-select') ) serviceSelect.classList.remove('service-select--active')
})