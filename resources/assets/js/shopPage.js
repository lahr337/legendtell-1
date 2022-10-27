import '@styles/shop-page.scss'

import './utils/generalModules'

import Swiper, { Navigation, Thumbs, FreeMode } from 'swiper'

Swiper.use([Navigation, Thumbs, FreeMode])

const carThumbsSlider = new Swiper('#carThumbsSlider', {
    // loop: true,
    slidesPerView: 5,
    spaceBetween: 10,
    freeMode: true,
    watchSlidesProgress: true,
    allowTouchMove: true,
    breakpoints: {
        576: {
            spaceBetween: 20,
        },
        992: {
            spaceBetween: 30,
        }
    }
})

new Swiper('#carGeneralSlider', {
    // loop: true,
    spaceBetween: 20,
    
    thumbs: {
        swiper: carThumbsSlider
    }
})