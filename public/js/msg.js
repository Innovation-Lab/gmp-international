(() => {

  const msgCards = document.querySelectorAll('.c-msg__close');
  msgCards.forEach(el => {
    el.addEventListener('click', function(e){
      const trigger = e.currentTarget;
      console.log(trigger.parentElement)
      trigger.parentElement.classList.add('is-hide')
      trigger.parentElement.classList.remove('is-active')
    })
  })

})();