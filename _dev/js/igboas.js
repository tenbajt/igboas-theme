window.collectionFeatureSlider = new Swipe( document.getElementById( 'collection-slider' ) );

document.getElementById( 'collection-slider__previous' ).addEventListener( 'click', function( event ) {
  window.collectionFeatureSlider.prev();
});

document.getElementById( 'collection-slider__next' ).addEventListener( 'click', function( event ) {
  window.collectionFeatureSlider.next();
});

window.birthFeatureSlider = new Swipe( document.getElementById( 'birth-slider' ) );

document.getElementById( 'birth-slider__previous' ).addEventListener( 'click', function( event ) {
  window.birthFeatureSlider.prev();
});

document.getElementById( 'birth-slider__next' ).addEventListener( 'click', function( event ) {
  window.birthFeatureSlider.next();
});

window.availableFeatureSlider = new Swipe( document.getElementById( 'available-slider' ) );

document.getElementById( 'available-slider__previous' ).addEventListener( 'click', function( event ) {
  window.availableFeatureSlider.prev();
});

document.getElementById( 'available-slider__next' ).addEventListener( 'click', function( event ) {
  window.availableFeatureSlider.next();
});

window.morphsFeatureSlider = new Swipe( document.getElementById( 'morphs-slider' ) );

document.getElementById( 'morphs-slider__previous' ).addEventListener( 'click', function( event ) {
  window.morphsFeatureSlider.prev();
});

document.getElementById( 'morphs-slider__next' ).addEventListener( 'click', function( event ) {
  window.morphsFeatureSlider.next();
});