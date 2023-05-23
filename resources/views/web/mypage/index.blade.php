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
        @if(count($sales_products) > 0)
          <ul class="p-card">
            @foreach ($sales_products as $sales_product)
              <li>
                <div class="p-card__item">
                  <div class="p-card__box">
                    <div class="p-card__info">
                      <!-- ブランド・製品名・カラー -->
                      <div class="p-card__mainData">
                        <div class="p-card__brand">
                          <p class="c-txt">{{ data_get($sales_product, 'mProduct.mBrand.name') }}</p>
                        </div>
                        <div class="p-card__product">
                          <p class="c-txt c-txt--lg">{{ data_get($sales_product, 'mProduct.name') }}</p>
                        </div>
                        <div class="p-card__color">
                          <div class="c-colorBall" style="background: #A3BBB1;">
                            {{-- 2色の場合に追加 --}}
                            <div class="c-colorBall__pallet2" style="background: #fff;"></div>
                          </div>
                          <p class="c-txt">
                            {{ data_get($sales_product, 'mProduct.color')}}
                          </p>
                        </div>
                      </div>
                      <div class="p-card__subData">
                        <!-- 購入日・シリアルナンバー -->
                        <div class="p-card__purchase">
                          <p class="label c-txt c-txt--sm c-txt--sm--ghost">購入日</p>
                          <p class="data c-txt">{{ date('Y/m/d', strtotime(data_get($sales_product, 'purchase_date'))) }}</p>
                        </div>
                        <!-- 購入店舗 -->
                        <div class="p-card__store">
                          <p class="label c-txt c-txt--sm c-txt--sm--ghost">購入店舗</p>
                          <p class="data c-txt">{{ data_get($sales_product, 'mShop.name') }}</p>
                        </div>
                        <div class="p-card__serialNum">
                          <p class="label c-txt c-txt--sm c-txt--sm--ghost">シリアルナンバー</p>
                          <p class="data c-txt">{{ data_get($sales_product, 'product_code') }}</p>
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
            @endforeach
          </ul>
        @else
          <!-- 製品未登録の場合 -->
          <a href="">
            <ul class="p-card--notRegister">
              <li>
                <div class="p-card__item">
                  <div class="p-card__box">
                    <div class="p-card__info">
                      <!-- ブランド・製品名・カラー -->
                      <div class="p-card__mainData">
                        <div class="p-card__brand">
                          <p class="c-txt c-txt--ghost">BRAND</p>
                        </div>
                        <div class="p-card__product">
                          <p class="c-txt c-txt--lg  c-txt--lg--ghost">PRODUCT</p>
                        </div>
                        <div class="p-card__color">
                          <div class="c-colorBall c-colorBall--ghost"></div>
                          <p class="c-txt c-txt--ghost">COLOR</p>
                        </div>
                      </div>
                      <div class="p-card__subData">
                        <!-- PURCHASE DATE -->
                        <div class="p-card__purchase">
                          <p class="label c-txt c-txt--ghost">PURCHASE DATE</p>
                        </div>
                        <!-- STORE -->
                        <div class="p-card__store">
                          <p class="label c-txt c-txt--ghost">STORE DATE</p>
                        </div>
                        <!-- SERIAL NUMBER -->
                        <div class="p-card__serialNum">
                          <p class="label c-txt c-txt--ghost">SERIAL NUMBER</p>
                        </div>
                      </div>
                    </div>
                    <!-- 製品画像 -->
                    <div class="p-card__img">
                      <img src="{{asset('img/web/product/product-ghost.png')}}" width="110px" height="140px">
                    </div>
                  </div>
                  <div class="p-card__add">
                    <p class="c-ttl--xxl c-ttl--xxl--wh">ADD YOUR ITEM</p>
                    <p class="c-btn--register">製品を登録する</p>
                  </div>
                </div>
              </li>
            </ul>
          </a>
        @endif
      </div>
      <!-- 一覧ページボタン -->
      <div class="p-index__btn">
        @if(count($sales_products) > 0)
          <a href="{{route('mypage.product')}}" class="c-btn c-btn--bk">登録済み製品一覧へ</a>
        @endif
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
        @if($user->last_name)
          <!-- ユーザー情報--登録時 -->
          <div class="p-info">
            <div class="p-info__bar">
              <div class="p-info__ttl">
                <p class="c-ttl">ユーザー情報</p>
              </div>
              <!-- 変更ボタン -->
              <div class="p-info__btn">
                <a href="{{route('mypage.user', $user)}}" class="c-btn c-btn--rd">変更する</a>
              </div>
            </div>
            <div class="p-info__txt">
              <p class="c-txt" data-ttl="氏名">{{ data_get($user, 'full_name') }}（{{ data_get($user, 'full_name_kana') }}）</p>
              <p class="c-txt" data-ttl="郵便番号">〒{{ data_get($user, 'zip_code') }}</p>
              <p class="c-txt" data-ttl="住所">{{ data_get($user, 'full_address') }}</p>
              <p class="c-txt" data-ttl="電話番号">{{ data_get($user, 'formatted_tel') }}</p>
              <p class="c-txt" data-ttl="カタログの送付"><span>カタログの送付を</span>{{ data_get($user, 'string_catalog') }}</p>
              <p class="c-txt" data-ttl="DMの送付"><span>DMの送付を</span>{{ data_get($user, 'string_dm') }}</p>
            </div>
          </div>
        @else
          <!-- ユーザー情報--未登録時 -->
          <a href="{{ route('mypage.user') }}">
            <div class="p-info--notRegister">
              <div class="p-card__add">
                <p class="c-ttl--xxl c-ttl--xxl--rd">ADD YOUR INFO</p>
                <p class="c-btn--register--rd">ユーザー情報を登録する</p>
              </div>
            </div>
          </a>
        @endif
        <!-- アカウント情報 -->
        <div class="p-info">
          <div class="p-info__bar">
            <div class="p-info__ttl">
              <p class="c-ttl">アカウント情報</p>
            </div>
            <!-- 変更ボタン -->
            <div class="p-info__btn">
              <a href="{{route('mypage.account', $user)}}" class="c-btn c-btn--rd">変更する</a>
            </div>
          </div>
          <div class="p-info__txt">
            <p class="c-txt" data-ttl="メールアドレス">{{ data_get($user, 'email') }}</p>
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