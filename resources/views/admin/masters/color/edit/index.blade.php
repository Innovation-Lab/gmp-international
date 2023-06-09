@extends('admin.layouts.pages._default')
@section('title', 'カラー編集')
@section('class', 'body_edit')
@section('content')
<style>
    input[type=file] + label.clear_fake:before {
        opacity: 0;
    }
    input[type=file] + label.clear_fake:after {
        content: "";
        opacity: 0;
    }
</style>
<div class="p-edit">
  <div class="l-edit">
    <div class="l-edit__head">
      {{-- 詳細ヘッド --}}
      @include('admin.masters.color.edit._head')
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
                    {!! Form::open(['method' => 'POST', 'route' => 'admin.masters.color.updateOrCreate', 'class' => 'p-form min', 'id' => 'updateColorForm', 'files' => true]) !!}
                      <input type="hidden" name="id" value="{{ data_get($color, 'id') }}">
                      <div class="l-grid__1">
                        {{-- -------------------- 編集項目 -------------------- --}}
                        <div class="p-edit__item" id="edit_1" style="display: block;">
                          <div class="p-edit__body">
                            <div class="l-grid__1">
                              <div class="l-grid__item">
                                <ul class="p-formList" style="max-width: 320px;">
                                  <li class="p-formList__item">
                                    <div class="p-formList__content">
                                      <div class="p-formList__label">
                                        カラータイプ
                                      </div>
                                      <div class="p-formList__data">
                                        <div class="p-formList__colorSet">
                                          <div class="p-formList__colorSet__type">
                                            <div class="radio">
                                              <input type="radio" id="colorSet_type_single" name="colorSet_type" value="single" @if( data_get($color, 'type_color_picker') == 'single' ) checked @endif>
                                              <label for="colorSet_type_single">1色</label>
                                              <input type="radio" id="colorSet_type_double" name="colorSet_type" value="double" @if( data_get($color, 'type_color_picker') == 'double' ) checked @endif>
                                              <label for="colorSet_type_double">2色</label>
                                              <input type="radio" id="colorSet_type_mix" name="colorSet_type" value="mix" @if( data_get($color, 'type_color_picker') == 'mix' ) checked @endif>
                                              <label for="colorSet_type_mix">パターン</label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="p-formList__item">
                                    <div class="p-formList__content">
                                      <div class="p-formList__label">
                                        カラー
                                      </div>
                                      <div class="p-formList__data">
                                        <div class="p-formList__colorSet__type">
                                          <!-- 1色 -->
                                          <div class="p-formList__colorSet__type__item js_prop_single" style="display:none;">
                                            <div class="p-inputColor">
                                              <div class="p-inputColor__palet">
                                                <input type="color" class="color_palet" name="" placeholder="" value="{{ old('color', data_get($color, 'color')) }}">
                                              </div>
                                              <div class="p-inputColor__code">
                                                <input type="text" class="color_code" name="color" placeholder="#FFD3D3" value="{{ old('color', data_get($color, 'color')) }}" @if( data_get($color, 'type_color_picker') != 'single' ) disabled @endif>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- 2色 -->
                                          <div class="p-formList__colorSet__type__item js_prop_double" style="display:none;">
                                            <div class="p-inputColor">
                                              <div class="p-inputColor__palet">
                                                <input type="color" class="color_palet" name="" placeholder="" value="{{ old('color', data_get($color, 'color')) }}">
                                              </div>
                                              <div class="p-inputColor__code">
                                                <input type="text" class="color_code" name="color" placeholder="#FFD3D3" value="{{ old('color', data_get($color, 'color')) }}" @if( data_get($color, 'type_color_picker') != 'double' ) disabled @endif>
                                              </div>
                                            </div>
                                            <div class="p-inputColor">
                                              <div class="p-inputColor__palet">
                                                <input type="color" class="color_palet" name="" placeholder="" value="{{ old('second_color', data_get($color, 'second_color')) }}">
                                              </div>
                                              <div class="p-inputColor__code">
                                                <input type="text" class="color_code" name="second_color" placeholder="#FFD3D3" value="{{ old('second_color', data_get($color, 'second_color')) }}" @if( data_get($color, 'type_color_picker') != 'double' ) disabled @endif>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- パターン -->
                                          <div class="p-formList__colorSet__type__item js_prop_mix" style="display:none;">
                                            <input
                                              id="color_pattern"
                                              type="file"
                                              name="image_path"
                                              class="file_img_preview"
                                              accept="image/jpeg,image/png,.svg"
                                              @if( data_get($color, 'type_color_picker') != 'mix' ) disabled @endif
                                              style="opacity: 0"
                                              onchange="
                                                const [file] = $(this).prop('files');
                                                if(file){
                                                  changeFilePreview(file);
                                                }
                                              "
                                            >
                                            <label for="color_pattern" class="colorPattern @if(data_get($color, 'image_path')) clear_fake @endif">
                                              <img
                                                id="image_preview_form"
                                                src="{{ data_get($color, 'main_image_url') }}"
                                              >
                                            </label>
                                            <script>
                                                function changeFilePreview(file) {
                                                    $('#image_preview_form').attr('src', URL.createObjectURL(file));
                                                    $('.colorPattern').addClass('clear_fake')
                                                }
                                            </script>
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
                                      <div class="p-formList__data" style="display: block;">
                                        <input type="text" id="color_name" name="name" placeholder="ブロッサム" value="{{ data_get($color, 'name') }}">
                                        @error('name')
                                        <p class="error">{{ $message }}</p>
                                        @enderror
                                      </div>
                                    </div>
                                  </li>
                                  <li class="p-formList__item">
                                    <div class="p-formList__content">
                                      <div class="p-formList__label">
                                        カラー名(英字)
                                      </div>
                                      <div class="p-formList__data" style="display: block;">
                                        <input type="text" id="color_name_" name="alphabet_name" placeholder="BLOSSOM" value="{{ data_get($color, 'alphabet_name') }}">
                                        @error('alphabet_name')
                                        <p class="error">{{ $message }}</p>
                                        @enderror
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
                    <div class="p-edit__main__box__foot">
                        <button class="c-button__reset">変更をリセット</button>
                        <button type="submit" class="c-button">変更を反映する</button>
                    </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="l-edit__foot">
          <div class="p-edit__foot">
            <div class="wrapper">
              <div class="container">
                <div class="inner" style="text-align: right;">
                  <button class="c-button">変更内容を保存する</button>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</div>
{{-- ユーザー写真 --}}
@include('admin.users._modal-users-photo')
<script>
    $('.color_palet').each(function(index, elem) {
        $(elem).on('input', function() {
            showColor(index);
        })
        $(elem).on('change', function() {
            showColor(index);
        })
    })

    $('.color_code').each(function(index, elem) {
        $(elem).on('input', function() {
            showPalletColor(index);
        })
        $(elem).on('change', function() {
            showPalletColor(index);
        })
    })

    function showColor(index) {
        // 選択した色を取得
        let color = $('.color_palet').eq(index).val();
        // 選択したカラーコードを表示
        $('.color_code').eq(index).val(color);
    }

    function showPalletColor(index) {
        // 選択した色を取得
        let color = $('.color_code').eq(index).val();
        // 選択したカラーコードを表示
        $('.color_palet').eq(index).val(color);
    }
</script>

<script>
    $(window).on('load',function(){
        setPicker();
    });

    $('input[name="colorSet_type"]').each(function(index, elem) {
        $(elem).on('change', function() {
            setPicker();
        })
    })

    function setPicker() {
        let all = $('.p-formList__colorSet__type__item');
        all.hide();
        all.find('input').prop('disabled', true);

        var checkedValue = $('input[name="colorSet_type"]:checked').val();
        var insert = '.js_prop_'+ checkedValue;
        $(insert).show();
        $(insert).find('input').prop('disabled', false);
    }
</script>

@endsection