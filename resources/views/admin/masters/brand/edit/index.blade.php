@extends('admin.layouts.pages._default')
@section('title', 'ブランド情報の編集')
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
      @include('admin.masters.brand.edit._head')
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
                    {!! Form::open(['method' => 'POST', 'route' => 'admin.masters.brand.updateOrCreate', 'class' => 'p-form min', 'id' => 'updateBrandForm', 'files' => true]) !!}
                    <input type="hidden" name="id" value="{{ data_get($brand, 'id') }}">
                    <div class="l-grid__1">
                        <div class="l-grid__item">
                          <ul class="p-formList u-max--320">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  ブランドロゴ
                                </div>
                                <div class="p-formList__data" style="display: block;">
                                  <input
                                    id="brand_logo"
                                    type="file"
                                    name="image_path"
                                    class="file_img_preview"
                                    accept="image/jpeg,image/png,.svg"
                                    onchange="
                                      const [file] = $(this).prop('files');
                                      if(file){
                                        changeFilePreview(file);
                                      }
                                    "
                                  >
                                  <label for="brand_logo" class="logo @if(data_get($brand, 'image_path')) clear_fake @endif">
                                      <img
                                        id="image_preview_form"
                                        @if(Route::currentRouteName() == 'admin.masters.brand.edit') src="{{ data_get($brand, 'main_image_url') }}" @endif
                                      >
                                  </label>
                                  @error('image_path')
                                  <p class="error">{{ $message }}</p>
                                  @enderror
                                  <script>
                                      function changeFilePreview(file) {
                                          $('#image_preview_form').attr('src', URL.createObjectURL(file));
                                          $('.logo').addClass('clear_fake')
                                      }
                                  </script>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  ブランド名
                                </div>
                                <div class="p-formList__data u-max--240" style="display: block;">
                                  <input type="text" id="brand_name" name="name" placeholder="AIRBUGGY" value="{{ old('name', data_get($brand, 'name')) }}">
                                  @error('name')
                                  <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label ">
                                  公開 / 非公開
                                </div>
                                <div class="p-formList__data">
                                  <div class="radio">
                                    {!! Form::radio('public_flag', '1', !old('public_flag', data_get($brand, 'public_flag')) || old('public_flag', data_get($brand, 'public_flag')) == 1, ['id' => 'is_public']) !!}
                                    {!! Form::label('is_public', '公開') !!}
                                    {!! Form::radio('public_flag', '2', old('public_flag', data_get($brand, 'public_flag')) == 2, ['id' => 'not_public']) !!}
                                    {!! Form::label('not_public', '非公開') !!}
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    {!! Form::close() !!}
                  </div>
                  <div class="p-edit__main__box__foot">
                    <button onclick="window.location='{{ request()->url() }}'" class="c-button__reset">変更をリセット</button>
                    <button form="updateBrandForm" class="c-button">@if(str_contains(request()->url(), 'edit')) 変更を反映する @else 新規追加する @endif</button>
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