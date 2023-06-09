@extends('admin.layouts.pages._default')
@section('title', '製品情報編集')
@section('class', 'body_edit')
@section('content')
<div class="p-edit">
  <div class="l-edit">
    <div class="l-edit__head">
      {{-- 詳細ヘッド --}}
      @include('admin.masters.product.edit._head')
    </div>
    <div class="l-edit__body">
      <div class="wrapper u-max--560">
        <div class="container">
          <div class="l-edit__body__inner single">
            {{-- メイン --}}
            <div class="l-edit__main">
              <div class="p-edit__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-edit__main__box">
                  <div class="p-edit__main__box__wrapper">
                    {{-- フォーム --}}
                    <form action="" class="p-form min">
                      <div class="l-grid__1">
                        <div class="l-grid__item">
                          <ul class="p-formList u-max--320">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  ブランド名
                                </div>
                                <div class="p-formList__data  u-max--360">
                                  <select name="brand" class="select2">
                                    <option value="" hidden>選択してください</option>
                                    @foreach($brands as $k => $v)
                                      <option value="{{ $k }}" @if(old('m_brand_id', data_get($product, 'm_brand_id')) == $k) selected @endif>{{ $v }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  製品名
                                </div>
                                <div class="p-formList__data u-max--360">
                                  <input placeholder="例）COCO PREMIER FROM BIRTH" name="name" type="text" value="{{ old('name', data_get($product, 'name')) }}">
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              @forelse(data_get($product, 'color_ball_with_name') as $color)
                                <div class="p-formList__content">
                                  @if ($loop->index == 0)
                                    <div class="p-formList__label">
                                      カラー
                                    </div>
                                  @else
                                    <div style="margin-top: 10px;"></div>
                                  @endif
                                  <div class="p-formList__data  u-max--360">
                                    <select name="m_color_id[{{ data_get($color, 'id') }}][color]" class="select2">
                                      <option value="" hidden>選択してください</option>
                                      @foreach($colors as $k => $v)
                                        <option value="{{ $k }}" @if(old('m_color_id', data_get($color, 'id')) == $k ) selected @endif>{{ $v }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="p-formList__data  u-max--360">
                                    <input type="text" name="m_color_id[{{ data_get($color, 'id') }}][url]" placeholder="https://www.sample.page.com/airbuggy.png" value="{{ data_get($color, 'url') }}">
                                  </div>
                                </div>
                              @empty
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    カラー
                                  </div>
                                  <div class="p-formList__data  u-max--360">
                                    <select name="m_color_id[add][1][m_color_id]" class="select2">
                                      <option value="" hidden>選択してください</option>
                                      @foreach($colors as $k => $v)
                                        <option value="{{ $k }}">{{ $v }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="p-formList__data  u-max--360">
                                    <input type="text" name="m_color_id[add][1][url]" placeholder="https://www.sample.page.com/airbuggy.png" value="">
                                  </div>
                                </div>
                              @endforelse

                                {{-- ここに追加していく --}}

                              <div class="p-formList__btn">
                                <button class="c-textButton__icon c-textButton--gray {{--u-mt--24--}}">
                                  <svg class="icon"><use href="#add"/></svg>カラーを追加する
                                </button>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="p-edit__main__box__foot">
                    <button onclick="window.location.href = {{ request()->url() }}" class="c-button__reset">変更をリセット</button>
                    <button class="c-button">@if(str_contains(request()->url(), 'edit')) 変更を反映する @else 新規追加する @endif</button>
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
@endsection