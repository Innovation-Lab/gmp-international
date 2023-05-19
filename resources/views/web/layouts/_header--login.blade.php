<div class="l-frame__head">
  <header class="p-header p-header--login">
    <div class="p-header__logo">
      <img src="{{ asset('img/web/user/logo/GMP_logo.png')}}" alt="" width="136px">
    </div>
  </header>
  <header class="p-header p-header--bar"> 
    <ul class="p-header__brand">
      <li><img class="c-brand" src="{{ asset('img/web/brand/logo_bar.png')}}" alt=""></li>
      <li><img class="c-brand" src="{{ asset('img/web/brand/logo_bar.png')}}" alt=""></li>
      <li><img class="c-brand" src="{{ asset('img/web/brand/logo_bar.png')}}" alt=""></li>
      <li><img class="c-brand" src="{{ asset('img/web/brand/logo_bar.png')}}" alt=""></li>
    </ul>
  </header>
</div>
<script>
$('.p-header__brand').slick({
    autoplay: true, // 自動でスクロール
    autoplaySpeed: 0, // 自動再生のスライド切り替えまでの時間を設定
    speed: 11000, // スライドが流れる速度を設定
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
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          variableWidth: true,
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

