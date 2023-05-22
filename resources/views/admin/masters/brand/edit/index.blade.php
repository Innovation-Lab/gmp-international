@extends('admin.layouts.pages._default')
@section('title', 'ユーザー管理')
@section('class', 'body_edit')
@section('content')
<div class="p-detail">
  <div class="l-detail">
    <div class="l-detail__head">
      {{-- 詳細ヘッド --}}
      @include('admin.masters.brand.edit._head')
    </div>
    <div class="l-detail__body single">
      <div class="wrapper">
        <div class="container">
          <div class="l-detail__body__inner">
            {{-- メイン --}}
            <div class="l-detail__main">
              {{-- 編集エリア --}}
              <form action="" class="p-form">
                <div class="p-edit">
                  <div class="p-edit__main" style="max-width: 520px;">
                    {{-- -------------------- 編集項目 -------------------- --}}
                    <div class="p-edit__item" id="edit_1" style="display: block;">
                      <div class="p-edit__body">
                        <div class="l-grid__1">
                          <div class="l-grid__item">
                            <ul class="p-formList" style="max-width: 320px;">
                              <li class="p-formList__item">
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    ブランドロゴ
                                  </div>
                                  <div class="p-formList__data">
                                    <input type="file" id="brand_logo" name="brand_logo" value="">
                                    <label for="brand_logo" class="logo">
                                      <img src="{{asset('img/admin/brand/airbuggy.svg')}}">
                                    </label>
                                  </div>
                                </div>
                              </li>
                              <li class="p-formList__item">
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    ブランド名
                                  </div>
                                  <div class="p-formList__data">
                                    <input type="text" id="brand_name" name="brand_name" placeholder="AIRBUGGY" value="AIRBUGGY">
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="l-detail__foot">
      <div class="p-detail__foot">
        <div class="wrapper">
          <div class="container">
            <div class="inner" style="text-align: right;">
              <button class="c-button">変更内容を保存する</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection