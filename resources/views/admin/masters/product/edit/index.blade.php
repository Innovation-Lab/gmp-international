@extends('admin.layouts.pages._default')
@section('title', 'ユーザー管理')
@section('class', 'body_edit')
@section('content')
<div class="p-detail">
  <div class="l-detail">
    <div class="l-detail__head">
      {{-- 詳細ヘッド --}}
      @include('admin.masters.color.edit._head')
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
                                    カラー
                                  </div>
                                  <div class="p-formList__data">
                                    <div class="p-inputColor">
                                      <div class="p-inputColor__palet">
                                        <input type="color" id="color_palet" name="color_palet" placeholder="" value="">
                                      </div>
                                      <div class="p-inputColor__code">
                                        <input type="text" id="color_code" name="color_code" placeholder="#FFD3D3" value="#FFD3D3">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              <li class="p-formList__item">
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    カラー名
                                  </div>
                                  <div class="p-formList__data">
                                    <input type="text" id="color_name" name="color_name" placeholder="ブロッサム" value="ブロッサム">
                                  </div>
                                </div>
                              </li>
                              <li class="p-formList__item">
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    カラー名(英字)
                                  </div>
                                  <div class="p-formList__data">
                                    <input type="text" id="color_name_" name="color_name" placeholder="BLOSSOM" value="BLOSSOM">
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
{{-- ユーザー写真 --}}
@include('admin.users._modal-users-photo')
<script>
    // 色を選択するたびに、色を表示するイベントを登録（changeイベント）
    document.getElementById('color_palet').addEventListener("input", showColor);
    // 色の選択が確定した後に、メッセージを表示する処理を登録（changeイベント）
    document.getElementById('color_palet').addEventListener("change", function(){});
    // 色を表示するタグを変数に入れる
    const eleShowColor = document.getElementById('color_code');
    // 選択した色とカラーコードを表示する
    function showColor(){
      // 選択した色を取得
      let color = document.getElementById('color_palet').value;
      // 選択したカラーコードを表示
      eleShowColor.value = color;
    }
</script>
@endsection