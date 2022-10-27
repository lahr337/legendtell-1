const video = document.getElementById('venhicleVideo'),
    playBtn = document.getElementById('playVenhicleVideo'),
    dataLogBtn = document.getElementById('openDataLog'),
    venhicleModal = document.getElementById('venhicleModal')

playBtn.addEventListener('click', () => {
    video.play()
    playBtn.classList.add('play-video--disabled')
})

dataLogBtn.addEventListener('click', () => {
    venhicleModal.classList.add('modal--active')
})

venhicleModal.addEventListener('click', e => {
    if ( !e.target.closest('.modal__inner') ) {
        video.pause()
        venhicleModal.classList.remove('modal--active')
        playBtn.classList.remove('play-video--disabled')
    }
})