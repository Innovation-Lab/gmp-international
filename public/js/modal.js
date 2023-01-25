(() => {
  const openButtons = document.querySelectorAll('[data-modal-open]');
  const closeButtons = document.querySelectorAll('[data-modal-close]');
  const modals = document.querySelectorAll('dialog');
  openButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      modals.forEach(modal => {
        // data-modalとidが一致したら
        if(modal.id == button.dataset.modalOpen){
          modal.showModal()
        }
      })
    })
  });
  closeButtons.forEach(function(button){
    button.addEventListener('click', function(e){
      modals.forEach(modal => {
        // 先祖のmodalを閉じる
        if(e.currentTarget.closest('dialog') == modal) {
          modal.close();
        }
      })
    })
  })
})();