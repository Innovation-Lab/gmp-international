@extends('admin.layouts.pages._default')
@section('title', 'ブランドを新規追加')
@section('content')
<div class="p-create">
  <div class="l-create">
    <div class="l-create__head">
      {{-- 詳細ヘッド --}}
      @include('admin.masters.brand.create._head')
    </div>
    <div class="l-create__body">
      <div class="wrapper u-max--560">
        <div class="container">
          <div class="l-create__body__inner single">
            {{-- メイン --}}
            <div class="l-create__main">
              <div class="p-create__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-create__main__box">
                  <div class="p-create__main__box__wrapper">
                    {{-- フォーム --}}
                    <form action="" class="p-form min">
                      <div class="l-grid__1">
                        <div class="l-grid__item">
                          <ul class="p-formList u-max--320">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  ブランドロゴ
                                </div>
                                <div class="p-formList__data">
                                  <input type="file" id="brand_logo" name="brand_logo" value="">
                                  <label for="brand_logo" class="logo">
                                    <!-- <img src="{{asset('img/admin/brand/airbuggy.svg')}}"> -->
                                  </label>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  ブランド名
                                </div>
                                <div class="p-formList__data u-max--240">
                                  <input type="text" id="brand_name" name="brand_name" placeholder="AIRBUGGY" value="AIRBUGGY">
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="p-create__main__box__foot">
                    <a href="{{route('admin.masters.brand')}}" class="c-button__reset">戻る</a>
                    <button class="c-button">この内容で登録する</button>
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