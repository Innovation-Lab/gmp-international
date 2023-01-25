(() => {
  // アコーディオンの挙動
  class Accordion {
    constructor(object) {
      const elm = document.querySelector(object.hookName);
      const triggers = elm?.querySelectorAll(object.tagName);
      triggers?.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
          triggers.forEach(el => {
            el.classList.remove('is-active');
          })
          this.clickHandler(e);
        });
      })
      // トリガー以外をクリックしたら、全activeを削除
      document.addEventListener('click', function(e) {
        //elmに含まれる要素以外にイベント適用
        if (!elm?.contains(e.target)) {
          triggers?.forEach(trigger => {
            trigger.classList.remove('is-active');
          });
        }
      });
    }
    clickHandler(e) {
      const target = e.currentTarget;
      target.classList.add('is-active')
    }
  }
  const mainHeadAccordion = new Accordion({
    hookName: "#js-accordion",
    tagName: "[class*='c-btn']"
  });
  const filterAccordion = new Accordion({
    hookName: ".js-accordion",
    tagName: ".p-filter__item"
  });
})();