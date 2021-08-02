function animate( callback, duration ) {
  var requestAnimationFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame,
      startTime = 0,
      animationTime = 0;

  var animation = function( timestamp ) {
    if ( startTime === 0 ) {
      startTime = timestamp;
    } else {
      animationTime = timestamp - startTime;
    }

    if  (typeof callback.start === 'function' && startTime === timestamp ) {
      callback.start();
      requestAnimationFrame(animation);
    } else if ( animationTime < duration ) {
      if ( typeof callback.progress === 'function' ) {
        callback.progress( animationTime / duration );
      }
      requestAnimationFrame(animation);
    } else if ( typeof callback.end === 'function' ){
      callback.end();
    }
  };
  requestAnimationFrame(animation);
}

function easeInOutQuad( t ) {
  return t < .5 ? 2 * t * t : -1 + ( 4 - 2 * t ) * t;
}