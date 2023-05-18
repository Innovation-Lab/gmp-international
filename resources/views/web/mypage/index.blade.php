@extends('web.layouts.pages._mypage')
@section('title', 'マイページ')
@section('class', 'body_mypage--home')
@section('content')
<div class="l-frame__body">
  <div class="p-index">
    <div class="p-index__head">
      <div class="l-container">
        <!-- タイトル -->
        <div class="p-index__bar">
          <div class="p-index__ttl">
            <p class="c-ttl c-ttl--xl">MY ITEM</p>
            <p class="c-ttl">登録済み製品</p>
          </div>
          <!-- 追加登録ボタン -->
          <div class="p-index__btn">
            <a href="{{route('mypage.add')}}" class="c-btn c-btn--ghost c-btn--ghost--rd c-btn--innerIco  c-btn--innerIco--add">製品の追加登録</a>
          </div>
        </div>
        <!-- 登録製品複数の場合 -->
        <ul class="p-card">
          <li>
            <div class="p-card__item">
              <div class="p-card__box">
                <div class="p-card__info">
                  <!-- ブランド・製品名・カラー -->
                  <div class="p-card__mainData">
                    <div class="p-card__brand">
                      <p class="c-txt">AIR BUGGY</p>
                    </div>
                    <div class="p-card__product">
                      <p class="c-txt c-txt--lg">COCO PREMIER FROM BIRTH</p>
                    </div>
                    <div class="p-card__color">
                      <div class="c-colorBall" style="background: #A3BBB1;">
                        {{-- 2色の場合に追加 --}}
                        <div class="c-colorBall__pallet2" style="background: #fff;"></div>
                      </div>
                      <p class="c-txt">GRASS GREEN</p>
                    </div>
                  </div>
                  <div class="p-card__subData">
                    <!-- 購入日・シリアルナンバー -->
                    <div class="p-card__purchase">
                      <p class="label c-txt c-txt--sm c-txt--sm--ghost">購入日</p>
                      <p class="data c-txt">2023/04/04</p>
                    </div>
                    <!-- 購入店舗 -->
                    <div class="p-card__store">
                      <p class="label c-txt c-txt--sm c-txt--sm--ghost">購入店舗</p>
                      <p class="data c-txt">エアバギー代官山店</p>
                    </div>
                    <div class="p-card__serialNum">
                      <p class="label c-txt c-txt--sm c-txt--sm--ghost">シリアルナンバー</p>
                      <p class="data c-txt">GMP123456789</p>
                    </div>
                  </div>
                </div>
                <!-- 製品画像 -->
                <div class="p-card__img">
                  <img src="{{asset('img/web/user/sample/product_sample.png')}}" width="110px" height="140px">
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="p-card__item">
              <div class="p-card__box">
                <div class="p-card__info">
                  <!-- ブランド・製品名・カラー -->
                  <div class="p-card__mainData">
                    <div class="p-card__brand">
                      <p class="c-txt">AIR BUGGY</p>
                    </div>
                    <div class="p-card__product">
                      <p class="c-txt c-txt--lg">COCO PREMIER FROM BIRTH</p>
                    </div>
                    <div class="p-card__color">
                      {{-- 画像表示の場合 --}}
                      <div class="c-colorBall" style="background: url({{asset('img/web/sample/c-color--camo.png')}})"></div>
                      <p class="c-txt">CAMO PRINT</p>
                    </div>
                  </div>
                  <div class="p-card__subData">
                    <!-- 購入日・シリアルナンバー -->
                    <div class="p-card__purchase">
                      <p class="label c-txt c-txt--sm c-txt--sm--ghost">購入日</p>
                      <p class="data c-txt">2023/04/04</p>
                    </div>
                    <!-- 購入店舗 -->
                    <div class="p-card__store">
                      <p class="label c-txt c-txt--sm c-txt--sm--ghost">購入店舗</p>
                      <p class="data c-txt">エアバギー代官山店</p>
                    </div>
                    <div class="p-card__serialNum">
                      <p class="label c-txt c-txt--sm c-txt--sm--ghost">シリアルナンバー</p>
                      <p class="data c-txt">GMP123456789</p>
                    </div>
                  </div>
                </div>
                <!-- 製品画像 -->
                <div class="p-card__img">
                  <img src="{{asset('img/web/user/sample/product_sample.png')}}" width="110px" height="140px">
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="p-card__item">
              <div class="p-card__box">
                <div class="p-card__info">
                  <!-- ブランド・製品名・カラー -->
                  <div class="p-card__mainData">
                    <div class="p-card__brand">
                      <p class="c-txt">AIR BUGGY</p>
                    </div>
                    <div class="p-card__product">
                      <p class="c-txt c-txt--lg">COCO PREMIER FROM BIRTH</p>
                    </div>
                    <div class="p-card__color">
                      <div class="c-colorBall" style="background: #A3BBB1;"></div>
                      <p class="c-txt">GRASS GREEN</p>
                    </div>
                  </div>
                  <div class="p-card__subData">
                    <!-- 購入日・シリアルナンバー -->
                    <div class="p-card__purchase">
                      <p class="label c-txt c-txt--sm c-txt--sm--ghost">購入日</p>
                      <p class="data c-txt">2023/04/04</p>
                    </div>
                    <div class="p-card__serialNum">
                      <p class="label c-txt c-txt--sm c-txt--sm--ghost">シリアルナンバー</p>
                      <p class="data c-txt">GMP123456789</p>
                    </div>
                  </div>
                </div>
                <!-- 製品画像 -->
                <div class="p-card__img">
                  <img src="{{asset('img/web/user/sample/product_sample.png')}}" width="110px" height="140px">
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <!-- 一覧ページボタン -->
      <div class="p-index__btn">
        <a href="{{route('mypage.product')}}" class="c-btn">登録済み製品一覧へ</a>
      </div>
    </div>
    <div class="p-index__body">
      <div class="l-container">
        <!-- カテゴリータイトル -->
        <div class="p-index__bar">
          <div class="p-index__ttl">
            <p class="c-ttl c-ttl--xl">USER</p>
            <p class="c-ttl">会員登録情報</p>
          </div>
        </div>
        <!-- ユーザー情報 -->
        <div class="p-info">
          <div class="p-info__bar">
            <div class="p-info__ttl">
              <p class="c-ttl">ユーザー情報</p>
            </div>
            <!-- 変更ボタン -->
            <div class="p-info__btn">
              <a href="{{route('mypage.user')}}" class="c-btn c-btn--rd">変更する</a>
            </div>
          </div>
          <div class="p-info__txt">
            <p class="c-txt" data-ttl="氏名">小山 浩行（コヤマ ヒロユキ）</p>
            <p class="c-txt" data-ttl="郵便番号">〒102-0094</p>
            <p class="c-txt" data-ttl="住所">東京都千代田区紀尾井町3-12 紀尾井町ビル16F</p>
            <p class="c-txt" data-ttl="電話番号">03-6380-8220</p>
            <p class="c-txt" data-ttl="カタログの送付"><span>カタログの送付を</span>希望する</p>
            <p class="c-txt" data-ttl="DMの送付"><span>DMの送付を</span>希望する</p>
          </div>
        </div>
        <!-- アカウント情報 -->
        <div class="p-info">
          <div class="p-info__bar">
            <div class="p-info__ttl">
              <p class="c-ttl">アカウント情報</p>
            </div>
            <!-- 変更ボタン -->
            <div class="p-info__btn">
              <a href="{{route('mypage.account')}}" class="c-btn c-btn--rd">変更する</a>
            </div>
          </div>
          <div class="p-info__txt">
            <p class="c-txt" data-ttl="メールアドレス">h.koyama@soushin-lab.co.jp</p>
            <p class="c-txt" data-ttl="パスワード">パスワードはセキュリティのため非表示</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- PCマイページのみ表示 -->
  <footer class="p-footer p-footer--mypage">
    <p class="c-txt--copyRight">Copyright©2008 GMP International Co., Ltd. All Right Reserved</p>
  </footer>
</div>
<script>
  $('.p-card').slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    centerMode: false,
    variableWidth: false,
    arrows: true,
    centerPadding: '0px',
    responsive: [
      {
        breakpoint: 768,
        settings: {
          infinite: false,
          slidesToShow: 1,
          variableWidth: false,
          arrows: false,
          centerPadding: '16px',
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          variableWidth: true,
          arrows: false,
        }
      },
      {
        breakpoint: 375,
        settings: {
          slidesToShow: 1,
          variableWidth: false,
          arrows: false,
        }
      },
    ]
  });
</script>
<script>
  $(function(){
    let Tag = $('.slick-dots'),
        Num = Tag.find('li').length,
        Pos = 62 + (Num * 18),
        Ng  = $('.p-card').innerWidth(); 
    if(Pos > Ng - 160){
      Pos = Ng - 200;
    }
    if(Tag.length > 0){
      $('.p-index__head .p-index__btn').addClass('right');
      $('.p-card .slick-arrow.slick-next').css('left',Pos+'px');
    }
  });
</script>
@endsection