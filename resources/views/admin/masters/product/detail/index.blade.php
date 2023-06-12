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
                          <img class="" src="{{ data_get($product, 'main_image_url') }}" alt="">
                        <!-- </div> -->
                      </div>
                      <div class="p-list__right">
                        <div class="p-list__head" style="display: flex; justify-content: space-between">
                          <h3 class="p-detail__main__box__head__title">製品情報</h3>
                          <a href="{{route('admin.masters.product.edit', $product)}}" class="c-button">編集</a>
                        </div>
                        <ul class="p-list">
                          @foreach([
                            'ブランド名' => data_get($product, 'mBrand.name'),
                            '製品名' => data_get($product, 'name').' '.data_get($product, 'name_kana'),
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
                          <li class="p-list__item">
                            <div class="p-list__label">
                              登録カラー
                            </div>
                            <div class="p-list__color" style="display: flex;">
                              @foreach(data_get($product, 'color_ball_with_name') as $color)
                                @if (data_get($color, 'image_path'))
                                  {{-- 画像表示の場合 --}}
                                  <div class="p-list__data color">
                                    <div class="c-colorBall ball" style="background: url({{ \Storage::disk('s3')->temporaryUrl(data_get($color, 'image_path'), \Carbon\Carbon::now()->addMinute(10)) }})"></div>{{ data_get($color, 'name') }}
                                  </div>
                                @else
                                  {{-- 2色の場合に追加 --}}
                                  <div class="p-list__data color" style="margin-right: 10px;">
                                    <div class="c-colorBall ball" style="background: {{ data_get($color, 'color', '#fff')}};">
                                      @if (data_get($color, 'second_color'))
                                        <div class="c-colorBall__pallet2" style="background: {{ data_get($color, 'second_color', '#fff') }};"></div>
                                      @endif
                                    </div>{{ data_get($color, 'name') }}
                                  </div>
                                @endif
                              @endforeach
                            </div>
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