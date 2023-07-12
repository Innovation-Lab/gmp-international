// (function() {
//   $(".p-card").slick({
//     slidesToShow: 1,
//     // dots: true,
//   })
// })

$(function(){
  $(".p-card").slick({
    slidesToShow: 1,
    arrows: false,
    dots: true,
    dotsClass: 'c-dots',
    // autoplay: false,
    // swipe: true,
    variableWidth: true,
    adaptiveHeight: true,
    // appendArrows: '#js-slide__nav__inner',
    // appendDots: '#js-slide__nav__inner',
    // centerMode: true,
  });
});




// $(function(){
//  alert(1);
// });