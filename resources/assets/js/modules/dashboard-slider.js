import { Swiper, Navigation } from 'swiper'

Swiper.use([Navigation])

new Swiper('#dashboardTabSlider', {
    slidesPerView: 1,
    spaceBetween: 15,
    navigation: {
        prevEl: '#dashboardTabsSliderPrev',
        nextEl: '#dashboardTabsSliderNext'
    },
    breakpoints: {
        576: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        992: {
            slidesPerView: 4,
        },
        1200: {
            slidesPerView: 5,
        },
        1400: {
            slidesPerView: 6,
        }
    }
})
