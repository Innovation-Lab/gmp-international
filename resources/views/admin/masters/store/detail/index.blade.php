@extends('admin.layouts.pages._default')
@section('title', '店舗情報詳細')
@section('content')
<div class="p-detail">
  <div class="l-detail">
    <div class="l-detail__head">
      {{-- 詳細ヘッド --}}
      @include('admin.masters.store.detail._head')
    </div>
    <div class="l-detail__body">
      <div class="wrapper">
        <div class="container">
          <div class="l-detail__body__inner l-detail__body__inner--full">
            {{-- メイン --}}
            <div class="l-detail__full">
              <div class="p-detail__full">
                {{-- ---------- 登録製品情報 ---------- --}}
                <div class="p-detail__full__box">
                  <div class="p-detail__full__box__wrapper">
                    {{-- ---------- リスト ---------- --}}
                    <div class="p-list--product">
                      <div class="p-list__left">
                        <div class="p-list__img p-list__img--store" style="width: 200px;">
                          <img class="" src="{{ asset('img/admin/store/airbuggy-yoyogipark.png')}}" alt="">
                        </div>
                      </div>
                      <div class="p-list__right">
                        <div class="p-list__head">
                          <h3 class="p-detail__main__box__head__title">店舗情報</p>
                          <a href="{{route('admin.masters.store.edit')}}" class="c-button__2">編集</a>
                        </div>
                        <ul class="p-list">
                          @foreach([
                            '店舗名' => 'エアバギー代々木公園本店',
                            '電話番号' => '03-5465-7580',
                            '住所' => 
                            '〒 1510063<br>
                            東京都渋谷区富ヶ谷1-16-1 ラクール代々木公園1F',
                            '営業時間1<br>備考' => '11:00〜19:00<br>（定休日：木曜）',
                            '営業時間2<br>備考' => '10:00〜20:00<br>（土日祝）',
                            ] as $key => $val)
                          <li class="p-list__item">
                            <div class="p-list__label">
                              {!! $key !!}
                            </div>
                            <div class="p-list__data">
                              {!! $val !!}
                            </div>
                            @endforeach
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- ユーザー写真 --}}
{{--@include('users._modal-users-photo')--}}
<script>
  // (function() {
  //   const table = $('table');
  //   const thLength = table.find('th').length;
  //   table.css('grid-template-columns','repeat(' + thLength + ', minmax(max-content, 1fr))')
  // })();
</script>
@endsection