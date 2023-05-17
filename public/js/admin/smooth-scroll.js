// Smooth scroll スムーズスクロール
$('a[data-scroll]').on('click', function(e){
  e.preventDefault();
  var id = $(this).attr('href');
  var offset = ($(this).attr('data-offset') != undefined) ? parseInt($(this).attr('data-offset')): 0;
  $("html,body").animate({scrollTop:$(id).offset().top + offset}, 200);
})