new Vue({
  el: '#app-wrapper'
});
window.semantic = {
  handler: {}
};
semantic.home = {};
// ready event
semantic.home.ready = function() {
  var $header        = $('.masthead'),
      $ui            = $header.find('h1 b'),
      $phrase        = $header.find('h1 span'),
      handler;
  handler = {
    getRandomInt: function(min, max) {
      return Math.floor(Math.random() * (max - min + 1)) + min;
    },
    introduction: function() {
      var background = 'bg' + handler.getRandomInt(1, 14);
      // zoom out
      $header.addClass(background).removeClass('zoomed');
    },
  };
  // intro
  handler.introduction();
  if($(window).width() > 600) {
    $('body').visibility({
        offset         : -10,
        observeChanges : false,
        once           : false,
        continuous     : false,
        onTopPassed: function() {
          requestAnimationFrame(function() {
            $('.following.bar').addClass('light fixed').find('.menu').removeClass('inverted');
            $('.following .additional.item').transition('scale in', 750);
          });
        },
        onTopPassedReverse: function() {
          requestAnimationFrame(function() {
            $('.following.bar').removeClass('light fixed')
              .find('.menu').addClass('inverted').find('.additional.item').transition('hide');
          });
        }
      });
  }
};
// attach ready event
$(document).ready(semantic.home.ready);
