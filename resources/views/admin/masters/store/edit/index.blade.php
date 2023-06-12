@extends('admin.layouts.pages._default')
@section('title', '店舗情報編集')
@section('content')
<div class="p-edit">
  <div class="l-edit">
    <div class="l-edit__head">
      {{-- 詳細ヘッド --}}
      @include('admin.masters.store.edit._head')
    </div>
    <div class="l-edit__body">
      <div class="wrapper u-max--800">
        <div class="container">
          <div class="l-edit__body__inner single">
            {{-- メイン --}}
            <div class="l-edit__main">
              <div class="p-edit__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-edit__main__box">
                  <div class="p-edit__main__box__wrapper">
                    {{-- フォーム --}}
                    {!! Form::open(['method' => 'POST', 'route' => 'admin.masters.store.updateOrCreate', 'class' => 'p-form h-adr', 'id' => 'updateShopForm', 'files' => true]) !!}
                    <span class="p-country-name" style="display:none;">Japan</span>
                    {!! Form::hidden('id', data_get($shop, 'id')) !!}
                      <div class="p-edit__main__box__head">
                        <h3 class="p-edit__main__box__head__title">
                          店舗情報編集
                        </h3>
                      </div>
                      <div class="l-grid__2 l-grid__2--xl" style="gap: 1.5rem 2rem;">
                        <div class="l-grid__item" style="grid-column: 1/3;">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__data" style="width: 220px;">
                                  <input
                                    id="store_img"
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
                                  <label for="store_img" class=" @if(data_get($shop, 'image_path')) clear_fake @endif">
                                    <img
                                      id="image_preview_form"
                                      src="{{ data_get($shop, 'main_image_url') }}"
                                    >
                                  </label>
                                  <script>
                                      function changeFilePreview(file) {
                                          $('#image_preview_form').attr('src', URL.createObjectURL(file));
                                      }
                                  </script>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="l-grid__item">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  店舗名
                                </div>
                                <div class="p-formList__data" style="display: block;">
                                  {!! Form::text('name', old('name', data_get($shop, 'name')), ['placeholder' => '例）エアバギー○○店']) !!}
                                  @error('name')
                                  <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  郵便番号<small>（ハイフンなし）</small>
                                </div>
                                <div class="p-formList__data" style="width: 162.5px; display: block;" >
                                  {!! Form::number('zip_code',  old('zip_code', data_get($shop, 'zip_code')), ['class' => 'p-postal-code', 'placeholder' => '例）1230000']) !!}
                                  @error('zip_code')
                                  <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  都道府県
                                </div>
                                <div class="p-formList__data" style="width: 162.5px; display: block;">
                                  <select id="prefecture" name="prefecture" class="p-region">
                                    <option value="" hidden>都道府県</option>
                                    @foreach($prefectures as $index => $name)
                                      <option value="{{ $index }}" {{ old('prefecture', data_get($shop, 'prefecture')) == $index ? 'selected' : '' }} >{{ $name }}</option>
                                    @endforeach
                                  </select>
                                  @error('prefecture')
                                  <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  市区町村
                                </div>
                                <div class="p-formList__data" style="display: block;">
                                  {!! Form::text('address_city_block',  old('address_city_block', data_get($shop, 'address_city_block')), ['class' => 'p-locality p-street-address p-extended-address', 'placeholder' => '例）渋谷区渋谷1-2-3']) !!}
                                  @error('address_city_block')
                                  <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  建物名など
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('address_building',  old('address_building', data_get($shop, 'address_building')), ['placeholder' => '例）代々木公園ビル1F']) !!}
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="l-grid__item">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label optional">
                                  電話番号<small>（ハイフンなし）</small>
                                </div>
                                <div class="p-formList__data" style="display: block;">
                                  {!! Form::tel('tel',  old('tel', data_get($shop, 'tel')), ['placeholder' => '例）09012345678']) !!}
                                  @error('tel')
                                  <p class="error">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="l-grid__1 l-grid__gap2">
                                <div class="l-grid__item">
                                  <div class="p-formList__content">
                                    <div class="p-formList__label">
                                      営業時間1
                                    </div>
                                    <div class="l-grid__4">
                                      <div class="p-formList__data">
                                        {!! Form::time('open_time_of_week', old('open_time_of_week', data_get($shop, 'week_business_hour') ? data_get($shop, 'week_business_work_array')[0]: ''), ['placeholder' => '例）10:00']) !!}
                                      </div>
                                      <div class="p-formList__data store">
                                        {!! Form::time('close_time_of_week', old('close_time_of_week', data_get($shop, 'week_business_hour') ? data_get($shop, 'week_business_work_array')[1]: ''), ['placeholder' => '例）19:00']) !!}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  営業時間1備考
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('week_business_hour_memo',  old('week_business_hour_memo', data_get($shop, 'week_business_hour_memo')), ['placeholder' => '例）定休日：○曜日']) !!}
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="l-grid__1 l-grid__gap2">
                                <div class="l-grid__item">
                                  <div class="p-formList__content">
                                    <div class="p-formList__label">
                                      営業時間2
                                    </div>
                                    <div class="l-grid__4">
                                      <div class="p-formList__data">
                                        {!! Form::time('open_time_of_holiday', old('open_time_of_holiday', data_get($shop, 'holiday_business_hour') ? data_get($shop, 'holiday_business_work_array')[0]: ''), ['placeholder' => '例）10:00']) !!}
                                      </div>
                                      <div class="p-formList__data store">
                                        {!! Form::time('close_time_of_holiday', old('close_time_of_holiday', data_get($shop, 'holiday_business_hour') ? data_get($shop, 'holiday_business_work_array')[1]: ''), ['placeholder' => '例）19:00']) !!}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  営業時間2備考
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('holiday_business_hour_memo',  old('holiday_business_hour_memo', data_get($shop, 'holiday_business_hour_memo')), ['placeholder' => '例）定休日：○曜日']) !!}
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
                    <button form="updateShopForm" class="c-button">@if(str_contains(request()->url(), 'edit')) 変更を反映する @else 新規追加する @endif</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- 要素をページ下部に固定 --}}
    {{--
    <div class="l-edit__foot">
      <div class="p-detail__foot">
        要素をページ下部に固定
      </div>
    </div>
    --}}
  </div>
</div>
{{-- ユーザー写真 --}}
@include('admin.users._modal-users-photo')
<script>
  // (function() {
  //   const table = $('table');
  //   const thLength = table.find('th').length;
  //   table.css('grid-template-columns','repeat(' + thLength + ', minmax(max-content, 1fr))')
  // })();
</script>
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
@endsection

                              