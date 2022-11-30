(() => {

  // アコーディオンの挙動
  class Accordion {
    constructor(object) {
      const elm = document.querySelector(object.hookName);
      const trigger = elm.querySelectorAll(object.tagName);
      const triggerLength = trigger.length;
      let index = 0;
      while (index < triggerLength) {
        trigger[index].addEventListener('click', (e) => this.clickHandler(e));
        index++;
      }
    }
    clickHandler(e) {
      e.preventDefault();
      e.stopPropagation();
      const target = e.currentTarget; //クリックした要素
      if (target.classList.contains('is-active')) {
        target.classList.remove('is-active')
      } else {
        target.classList.add('is-active')
      }
      // target.onblur = function(){
      //   this.classList.remove('is-active')
      // }
    }
  }

  const mainHeadAccordion = new Accordion({
    hookName: "#js-accordion",
    tagName: ".p-main__account__act__btn"
  });

  const filterAccordion = new Accordion({
    hookName: ".js-accordion",
    tagName: ".p-main__head__filter__btn"
  });

})();