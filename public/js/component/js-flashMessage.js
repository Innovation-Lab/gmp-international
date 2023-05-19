//フラッシュの削除
$(document).on('click', '.js-trigger__flashMessage--remove', function() {
    $(this).parents('.js-target__flashMessage').addClass('is-active__flashMessage--remove');
  }
);


$(function(){
  $('.p-flashMessage').delay(4000).queue(function(next){
    $(this).addClass('hide');
    next();
  });
});

