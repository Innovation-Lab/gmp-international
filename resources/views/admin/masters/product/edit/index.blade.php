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
                    <form action="{{ route('admin.masters.product.updateOrCreate') }}" method="POST" class="p-form min" id="updateProductForm">
                      @csrf
                      <input type="hidden" value="{{ data_get($product, 'id') }}">
                      <div class="l-grid__1">
                        <div class="l-grid__item">
                          <ul class="p-formList u-max--320">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  ブランド名
                                </div>
                                <div class="p-formList__data  u-max--360" style="display: block;">
                                  <select name="m_brand_id" class="select2">
                                    <option value="" hidden>選択してください</option>
                                    @foreach($brands as $k => $v)
                                      <option value="{{ $k }}" @if(old('m_brand_id', data_get($product, 'm_brand_id')) == $k) selected @endif>{{ $v }}</option>
                                    @endforeach
                                  </select>
                                  @error('m_brand_id')
                                  <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  製品名
                                </div>
                                <div class="p-formList__data u-max--360" style="display: block;">
                                  <input placeholder="例）COCO PREMIER FROM BIRTH" name="name" type="text" value="{{ old('name', data_get($product, 'name')) }}">
                                  @error('name')
                                  <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  製品名（カナ）
                                </div>
                                <div class="p-formList__data u-max--360" style="display: block;">
                                  <input placeholder="例）ココプレミア フロムバース" name="name_kana" type="text" value="{{ old('name_kana', data_get($product, 'name_kana')) }}">
                                  @error('name_kana')
                                  <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              @forelse(data_get($product, 'color_ball_with_name') as $key => $color)
                                <input type="hidden" name="id" value="{{ data_get($product, 'id') }}">
                                <div class="p-formList__content add_color" id="js_delete_{{ $loop->index + 1 }}">
                                  @if ($loop->index == 0)
                                    <div class="p-formList__label optional">
                                      カラー（メイン画像）
                                    </div>
                                  @else
                                    <div style="margin-top: 30px;"></div>
                                  @endif
                                  <div class="p-formList__data  u-max--360">
                                    <select name="color[edit][{{ data_get($color, 'id') }}][m_color_id]" class="select2">
                                      <option value="" hidden>選択してください</option>
                                      @foreach($colors as $k => $v)
                                        <option value="{{ $k }}" @if(old('m_color_id', data_get($color, 'id')) == $k ) selected @endif>{{ $v }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="p-formList__data  u-max--360">
                                    <input type="hidden" name="color[edit][{{ data_get($color, 'id') }}][id]" value="{{ data_get($product->getColorUrl(data_get($color, 'id')), 'id') }}">
                                    <input type="text" name="color[edit][{{ data_get($color, 'id') }}][url]" placeholder="https://www.sample.page.com/airbuggy.png" value="{{ data_get($product->getColorUrl(data_get($color, 'id')), 'url')  }}">
                                  </div>
                                  @if ($loop->index != 0)
                                  <div class="p-formList__btn" style="margin-left: auto;">
                                    <a class="c-textButton__icon c-textButton--gray delete" onclick="deleteExistingColorForm({{ $loop->index + 1 }}, {{ data_get($product, 'id') }}, {{  data_get($color, 'id') }})">
                                      削除
                                    </a>
                                  </div>
                                  @endif
                                </div>
                              @empty
                                <div class="p-formList__content add_color" id="js_delete_1">
                                  <div class="p-formList__label optional">
                                    カラー
                                  </div>
                                  <div class="p-formList__data  u-max--360">
                                    <select name="color[add][1][m_color_id]" class="select2">
                                      <option value="" hidden>選択してください</option>
                                      @foreach($colors as $k => $v)
                                        <option value="{{ $k }}">{{ $v }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="p-formList__data  u-max--360">
                                    <input type="text" name="color[add][1][url]" placeholder="https://www.sample.page.com/airbuggy.png" value="">
                                  </div>
                                </div>
                              @endforelse

                                {{-- ここに追加していく --}}

                              <div class="p-formList__btn">
                                <button class="c-textButton__icon c-textButton--gray {{--u-mt--24--}}" id="addColorForm">
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
                    <button onclick="window.location='{{ request()->url() }}'" class="c-button__reset">変更をリセット</button>
                    <button form="updateProductForm" class="c-button">@if(str_contains(request()->url(), 'edit')) 変更を反映する @else 新規追加する @endif</button>
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
<script>
    $(document).ready(function() {
        var num = {{data_get($product, 'color_count')}};

        $('#addColorForm').on('click', function(e) {
            e.preventDefault();
            // ボタンが無効化されている場合は処理を中断
            if ($(this).hasClass('disabled')) {
                return false;
            }
            $(this).addClass('disabled');

            $.ajax({
                url: '/register/js-get-array',
                method: 'GET',
                success: function (response) {
                    var colors = response.colors;

                    var selectColorHtml = '<select name="color[add]['+ num +'][m_color_id]" style="background-color: #e4d6d6">' +
                        '<option value="" selected>追加カラーを選択してください</option>';

                    $.each(colors, function(key, value) {
                        selectColorHtml += '<option value="' + key + '">' + value + '</option>';
                    });
                    selectColorHtml += '</select>';

                    let newForm = '<div class="p-formList__content add_color" id="js_delete_'+ num +'">' +
                        '    <div style="margin-top: 30px;"></div>'+
                        '    <div class="p-formList__data  u-max--360">' +
                          selectColorHtml +
                        '    </div>' +
                        '    <div class="p-formList__data  u-max--360">' +
                        '        <input type="text" name="color[add]['+ num +'][url]" placeholder="https://www.sample.page.com/airbuggy.png" value="" style="background-color: #e4d6d6">' +
                        '    </div>' +
                        '    <div class="p-formList__btn" style="margin-left: auto;">' +
                        '        <a class="c-textButton__icon c-textButton--gray delete" onclick="deleteColorForm('+ num +')">' +
                        '            削除' +
                        '        </a>' +
                        '    </div>' +
                        '</div>';

                    $('.add_color').last().after(newForm);
                    $('#addColorForm').removeClass('disabled');
                }
            })
            num++;

        });


    });

    // 既存のカラー削除
    function deleteExistingColorForm(
        number,
        product_id,
        color_id
    ) {
        if(confirm('本当に削除してよろしいですか？')) {
          $.post({
              url: "{{ route('admin.masters.product.color.delete') }}",
              headers: {
                  "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
              },
              data: {
                  'product_id': product_id,
                  'color_id': color_id,
              },
          }).done(function (response) {
              let target = '#js_delete_' + number;
              $(target).empty();
          });
        }
    }

    function deleteColorForm(number) {
        let target = '#js_delete_' + number;
        $(target).empty();
    }
</script>
@endsection