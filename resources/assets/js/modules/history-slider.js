import Swiper, { Navigation, FreeMode } from 'swiper'

Swiper.use([Navigation, FreeMode])

new Swiper('#carHistorySlider', {
    slidesPerView: 1,
    spaceBetween: 20,

    navigation: {
        prevEl: '#carHistorySliderPrev',
        nextEl: '#carHistorySliderNext',
    },
    breakpoints: {
        576: {
            slidesPerView: 2, 
            spaceBetween: 0,
        },
        // 768: {
        //     slidesPerView: 2,
        // },
        992: {
            slidesPerView: 4,
        },
        1200: {
            slidesPerView: 5,
        }
    }
})