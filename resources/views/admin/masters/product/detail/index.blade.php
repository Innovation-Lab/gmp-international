@extends('admin.layouts.pages._default')
@section('title', '製品管理一覧')
@section('content')
<div class="p-detail">
  <div class="l-detail">
    <div class="l-detail__head">
      {{-- 詳細ヘッド --}}
      @include('admin.masters.product.detail._head')
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
                      <div class="p-list__left" style="display: flex; align-items: center;">
                        <!-- <div class="p-list__img" style="width: 200px;"> -->
                          <img class="" src="{{ asset('img/web/product/airbuggy_coco_premire_newflame_blossom_front.png')}}" alt="">
                        <!-- </div> -->
                      </div>
                      <div class="p-list__right">
                        <div class="p-list__head">
                          <h3 class="p-detail__main__box__head__title">製品情報</p>
                          <a href="{{route('admin.masters.product.edit')}}" class="c-button__2">編集</a>
                        </div>
                        <ul class="p-list">
                          @foreach([
                            'ブランド名' => 'AIRBUGGY',
                            '製品名' => 'COCO BRAKE EX FROM BIRTH',
                            'カラー登録数' => 'BLOSSOM',
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
@endsection