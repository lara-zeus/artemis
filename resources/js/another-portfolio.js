import PhotoSwipeLightbox from 'photoswipe/lightbox';
import PhotoSwipe from 'photoswipe';

const lightbox = new PhotoSwipeLightbox({
    mainClass: 'pswp--custom-icon-colors',
    gallery: '#library-images-gallery',
    showHideAnimationType: 'fade',
    children: 'a',
    pswpModule: () => PhotoSwipe
});

lightbox.init();
