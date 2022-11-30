(() => {

  // バーガーボタンを挿入
  const elm = document.querySelector('.p-main__head__main__txt');
  const sidebar = document.getElementById('sidebar')
  const main = document.getElementById('main')
  let btn = document.createElement('div');
  btn.classList.add('p-main__head__main__txt__burger');
  btn.addEventListener('click', (e) => clickHandler(e))
  elm.insertBefore(btn, elm.firstChild);

  // 閉じるボタン
  const insertTarget = document.querySelector('.p-header__act');
  let close = document.createElement('div');
  close.classList.add('p-header__act__close');
  close.addEventListener('click', (e) => clickHandler(e))
  insertTarget.insertBefore(close, insertTarget.firstChild);
  
  // クリックの挙動
  const clickHandler = (e) => {
    e.preventDefault();
    e.stopPropagation();
    if (sidebar.classList.contains('is-active')) {
      sidebar.classList.remove('is-active')
      main.classList.remove('is-hide')
    } else {
      sidebar.classList.add('is-active')
      main.classList.add('is-hide')
    }
  }

  sidebar.style.animation = "hideSidebar 0.2s linear forwards";

})();