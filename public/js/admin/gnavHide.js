(() => {
    const $trigger = document.getElementById("js-trigger__gnavSwitch");
    const $target = document.getElementById("js-target__gnavSwitch");
    const switchHide = JSON.parse(localStorage.getItem("switchHide"));

    if(switchHide) {
        $target.classList.add('is-hide');
    }

    $trigger.addEventListener('click', (e) => clickHandler(e));
    const clickHandler = (e) => {
        e.preventDefault();
        $target.classList.toggle('is-hide');
        saveData();
    }

    function saveData() {
        let switchOnOff = $target.classList.contains('is-hide');
        localStorage.setItem("switchHide",JSON.stringify(switchOnOff));
    }
})();


// 管理者メニュー表示
$(document).ready(function () {
    $(".p-staffMenu").hide();
    $(".p-profileWrap").click(function () {
      $(".p-staffMenu").slideToggle();
    });
  });