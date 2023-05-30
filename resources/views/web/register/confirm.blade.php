@extends('web.layouts.pages._form')
@section('title', 'ユーザー情報の入力')
@section('class', 'body_confirm')
@section('content')
  <div class="l-frame__body">
    <div class="p-formPage">
      <div class="p-formPage__head">
        <div class="l-container">
          <div class="p-formPage__head__ttl">
            <p class="c-ttl">登録内容の確認</p>
          </div>
        </div>
      </div>
      <div class="l-container">
        <div class="p-formPage__body p-formPage__body--thin">
          <form method="POST" action="{{ route('register.store.variable') }}" id="variableSubmitForm">
            @csrf
            <div class="l-stack">
              <div class="l-stack__item">
                <ul class="p-formList p-formList--confirm">
                  <!-- アカウント情報 -->
                  <li class="p-formList__item">
                    <div class="p-formList__ttl">
                      <p class="c-ttl">アカウント情報</p>
                    </div>
                    <div class="p-formList__content">
                      <div class="l-stack">
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">メールアドレス</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ data_get($user, 'email') }}</p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">パスワード</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">*********</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="l-stack__item l-stack__item--line">
                <ul class="p-formList p-formList--confirm">
                  <!-- ユーザー情報 -->
                  <li class="p-formList__item">
                    <div class="p-formList__ttl">
                      <p class="c-ttl">ユーザー情報</p>
                    </div>
                    <div class="p-formList__content">
                      <div class="l-stack">
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">お名前</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ data_get($user, 'last_name').' '. data_get($user, 'first_name')  }}</p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">フリガナ</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ data_get($user, 'last_name_kana').' '. data_get($user, 'first_name_kana')  }}</p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">郵便番号</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ format_zip_code(data_get($user, 'zip_code')) }}</p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">住所</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">
                              {{ data_get($user, 'prefecture') }}<br>
                              {{ data_get($user, 'address_city') }} {{ data_get($user, 'address_block') }} {{ data_get($user, 'address_building') }}
                            </p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">電話番号</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ phone_template_format( data_get($user, 'tel') ) }}</p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">新着情報、お得情報</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ data_get($user, 'is_dm') ? \App\Models\User::DM_STATUS[data_get($user, 'is_dm')] : '受け取らない' }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="l-stack__item l-stack__item--line">
                <ul class="p-formList p-formList--confirm">
                  @forelse ($sales_products as $product)
                  <!-- 購入製品 -->
                  <li class="p-formList__item">
                    <div class="p-formList__ttl">
                      <p class="c-ttl">製品</p>
                      <p class="c-txt">{{ data_get($product, 'm_product_id') ? $products[data_get($product, 'm_product_id')] : '指定なし' }}</p>
                    </div>
                    <div class="p-formList__content">
                      <div class="l-stack">
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">購入日</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ formatYmdSlash(data_get($product, 'purchase_date')) }}</p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">ブランド名</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ data_get($product, 'm_brand_id') ? $brands[data_get($product, 'm_brand_id')] : '指定なし' }}</p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">カラー</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ data_get($product, 'm_color_id') && data_get($product, 'm_color_id') != 'other' ? $colors[data_get($product, 'm_color_id')] : data_get($product, 'other_color_name', '指定なし') }}</p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">シリアルナンバー</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ data_get($product, 'product_code', '指定なし') }}</p>
                          </div>
                        </div>
                        <div class="l-stack__item">
                          <div class="p-formList__label">
                            <p class="c-txt">購入店舗</p>
                          </div>
                          <div class="p-formList__data">
                            <p class="c-txt">{{ data_get($product, 'm_shop_id') && data_get($product, 'm_shop_id') != 'other' ? $shops[data_get($product, 'm_shop_id')] : data_get($product, 'other_shop_name', '指定なし') }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  @empty
                  @endforelse
                </ul>
              </div>
            </div>
          </form>
        </div>
        <div class="p-formPage__foot">
          <div class="p-btnWrap p-btnWrap--center">
              <a href="{{route('register.product')}}" class="c-btn c-btn--back">修正する</a>
              <button onclick="blockDoubleClick()" id="submitRegisterForm" class="c-btn c-btn--next">登録する</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
<script>
  function blockDoubleClick()
  {
      $('#submitRegisterForm').prop('disabled', true);
      $('#variableSubmitForm').submit();
  }
</script>