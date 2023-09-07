import PhotoSwipeLightbox from 'photoswipe/lightbox';
import 'photoswipe/style.css';

const lightbox = new PhotoSwipeLightbox({
    mainClass: 'pswp--custom-icon-colors',
    gallery: '#library-images-gallery',
    showHideAnimationType: 'fade',
    children: 'a',
    pswpModule: () => import('photoswipe')
});
lightbox.init();
