@extends('admin.layouts.pages._default')
@section('title', 'カラー新規追加')
@section('class', 'body_edit')
@section('content')
<div class="p-edit">
  <div class="l-edit">
    <div class="l-edit__head">
      {{-- 詳細ヘッド --}}
      @include('admin.masters.color.create._head')
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
                        {{-- -------------------- 編集項目 -------------------- --}}
                        <div class="p-edit__item" id="edit_1" style="display: block;">
                          <div class="p-edit__body">
                            <div class="l-grid__1">
                              <div class="l-grid__item">
                                <ul class="p-formList" style="max-width: 320px;">
                                  <li class="p-formList__item">
                                    <div class="p-formList__content">
                                      <div class="p-formList__label optional">
                                        カラータイプ
                                      </div>
                                      <div class="p-formList__data">
                                        <div class="p-formList__colorSet">
                                          <div class="p-formList__colorSet__type">
                                            <div class="radio">
                                              <input type="radio" id="colorSet_type_single" name="colorSet_type" value="colorSet_type_single" checked>
                                              <label for="colorSet_type_single">1色</label>
                                              <input type="radio" id="colorSet_type_double" name="colorSet_type" value="colorSet_type_double">
                                              <label for="colorSet_type_double">2色</label>
                                              <input type="radio" id="colorSet_type_mix" name="colorSet_type" value="colorSet_type_mix">
                                              <label for="colorSet_type_mix">パターン</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="p-formList__item">
                                    <div class="p-formList__content">
                                      <div class="p-formList__label optional">
                                        カラー
                                      </div>
                                      <div class="p-formList__data">
                                        <div class="p-formList__colorSet__type">
                                          <!-- 1色 -->
                                          <div class="p-formList__colorSet__type__item">
                                            <div class="p-inputColor">
                                              <div class="p-inputColor__palet">
                                                <input type="color" id="color_palet" name="color_palet" placeholder="" value="">
                                              </div>
                                              <div class="p-inputColor__code">
                                                <input type="text" id="color_code" name="color_code" placeholder="例）#ffffff" value="">
                                              </div>
                                            </div>
                                          </div>
                                          <!-- 2色 -->
                                          <div class="p-formList__colorSet__type__item">
                                            <div class="p-inputColor">
                                              <div class="p-inputColor__palet">
                                                <input type="color" id="color_palet" name="color_palet" placeholder="" value="">
                                              </div>
                                              <div class="p-inputColor__code">
                                                <input type="text" id="color_code" name="color_code" placeholder="例）#ffffff" value="">
                                              </div>
                                            </div>
                                            <div class="p-inputColor">
                                              <div class="p-inputColor__palet">
                                                <input type="color" id="color_palet" name="color_palet" placeholder="" value="">
                                              </div>
                                              <div class="p-inputColor__code">
                                                <input type="text" id="color_code" name="color_code" placeholder="例）#ffffff" value="">
                                              </div>
                                            </div>
                                          </div>
                                          <!-- パターン -->
                                          <div class="p-formList__colorSet__type__item">
                                            <input type="file" id="color_pattern" name="color_pattern" value="color_pattern">
                                            <label for="color_pattern" class="colorPattern">
                                              <!-- <img src="{{asset('img/admin/brand/airbuggy.svg')}}"> -->
                                            </label>
                                          </div>                                 
                                        </div>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="p-formList__item">
                                    <div class="p-formList__content">
                                      <div class="p-formList__label optional">
                                        カラー名
                                      </div>
                                      <div class="p-formList__data">
                                        <input type="text" id="color_name" name="color_name" placeholder="ブロッサム" value="ブロッサム">
                                      </div>
                                    </div>
                                  </li>
                                  <li class="p-formList__item">
                                    <div class="p-formList__content">
                                      <div class="p-formList__label optional">
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
                    <div class="p-create__main__box__foot">
                      <a href="{{route('admin.masters.color')}}" class="c-button__reset">戻る</a>
                      <button class="c-button">この内容で登録する</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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