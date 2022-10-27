import '@styles/dashboard-media.scss'

import './utils/generalModules'

import lightGallery from 'lightgallery'
import lgThumbnail from 'lightgallery/plugins/thumbnail'
import lgZoom from 'lightgallery/plugins/zoom'

lightGallery(document.getElementById('gallery'), {
    plugins: [lgZoom, lgThumbnail],
    speed: 500,
});