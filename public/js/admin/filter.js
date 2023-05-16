const trigger = $('.p-filterList__label')
const target = $('.p-filterList__content')
trigger.click(function(e) {
  trigger.removeClass('is-active')
  $(this).addClass('is-active');
  $(this).next(trigger).find('input').focus();
  e.stopPropagation();
})
target.click(function(e) {
  e.stopPropagation();
})
$(document).click(function(e) {
  trigger.removeClass('is-active')
})