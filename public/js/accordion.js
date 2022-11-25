(() => {

  // アコーディオンの挙動
  class Accordion {
    constructor(object) {
      const elm = document.querySelector(object.hookName);
      const trigger = elm.querySelectorAll(object.tagName);
      const triggerLength = trigger.length;
      console.log(trigger);
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
      const content = target.nextElementSibling;
      if (content.style.display === 'block') {
        content.style.display = 'none';
      } else {
        content.style.display = 'block';
      }
    }
  }

  // アコーディオンのリセット
  class ResetAccordion {
    constructor(object) {
      document.addEventListener('click', (e) => {
        const elm = document.querySelector(object.hookName);
        const trigger = elm.querySelectorAll(object.tagName);
        const triggerLength = trigger.length;
        let index = 0;
        while (index < triggerLength) {
          const content = trigger[index].nextElementSibling;
          content.style.display = 'none';
          index++;
        }
      })
    }
  }

  const mainHeadAccordion = new Accordion({
    hookName: "#js-accordion",
    tagName: ".p-main__account__act__btn"
  });
  const mainHeadResetAccordion = new ResetAccordion({
    hookName: "#js-accordion",
    tagName: ".p-main__account__act__btn"
  });

  const filterAccordion = new Accordion({
    hookName: ".js-accordion",
    tagName: ".p-main__head__filter__btn"
  });
  const filterResetAccordion = new ResetAccordion({
    hookName: ".js-accordion",
    tagName: ".p-main__head__filter__btn"
  });


})();