<div class="l-frame__foot">
  <footer class="p-footer p-footer--login">
    <p class="c-txt--login">GMPサポートデスク　営業時間：平日10:00〜17:00</p>
    <div class="p-footer__tel">
      <div class="p-footer__tel__item">
        <p class="c-ttl">ベビー用品</p>
        <a href="tel:0120-178-363" class="c-txt c-txt--tel">0120-178-363</a>
      </div>
      <div class="p-footer__tel__item">
        <p class="c-ttl">ペット用品</p>
        <a href="tel:0120-178-363" class="c-txt c-txt--tel">0120-98-1511</a>
      </div>
    </div>
  </footer>
  <footer class="p-footer p-footer--brand"> 
    <ul class="p-login__brand">
      <li><img class="c-brand c-brand--pc" src="{{ asset('img/web/brand/logo_bar_pc.png')}}" alt=""></li>
      <li><img class="c-brand c-brand--pc" src="{{ asset('img/web/brand/logo_bar_pc.png')}}" alt=""></li>
    </ul>
</footer>
</div>
<script>
$('.p-login__brand').slick({
    autoplay: true, // 自動でスクロール
    autoplaySpeed: 0, // 自動再生のスライド切り替えまでの時間を設定
    speed: 30000, // スライドが流れる速度を設定
    cssEase: 'linear',
    slidesToShow: 1, // 表示するスライドの数
    slidesToScroll: 1,
    swipe: false, // 操作による切り替えはさせない
    arrows: false, // 矢印非表示
    pauseOnFocus: false, // スライダーをフォーカスした時にスライドを停止させるか
    pauseOnHover: false, // スライダーにマウスホバーした時にスライドを停止させるか
    centerPadding: '32px',
    responsive: [
      {
        breakpoint: 1280,
        settings: {
          speed: 15000,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          variableWidth: false,
          arrows: false,
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          variableWidth: true,
          arrows: false,
          infinite: true,
        }
      },
    ]
  });
</script>
