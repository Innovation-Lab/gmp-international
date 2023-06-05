
<form action="" class="p-form">
  <div class="p-edit__main__box__head">
    <h3 class="p-edit__main__box__head__title">
    店舗情報追加登録
    </h3>
  </div>
  <div class="l-grid__2 l-grid__2--xl" style="gap: 1.5rem 2rem;">
    <div class="l-grid__item" style="grid-column: 1/3;">
      <ul class="p-formList">
        <li class="p-formList__item">
          <div class="p-formList__content">
            <div class="p-formList__data" style="width: 220px;">
              <input type="file" id="brand_logo" name="brand_logo" value="">
              <label for="brand_logo" class="store">
              {{--<img class="" src="{{ asset('img/web/product/airbuggy_coco_premire_newflame_blossom_front.png')}}" alt="">--}}
              </label>
            </div>
          </div>
          <!-- <div class="p-formList__content">
            <div class="p-formList__data" style="width: 220px;">
              <input type="file" id="store_img" name="store_img" value="">
              <label for="product_img" class="">
                <img src="{{asset('img/admin/store/airbuggy-yoyogipark.png')}}">
              </label>
            </div>
          </div> -->
        </li>
      </ul>
    </div>
    <div class="l-grid__item">
      <ul class="p-formList">
        <li class="p-formList__item">
          <div class="p-formList__content">
            <div class="p-formList__label">
              店舗名
            </div>
            <div class="p-formList__data">
              {!! Form::text('store-name', '', ['placeholder' => '例）エアバギー○○店']) !!}
            </div>
          </div>
        </li>
        <li class="p-formList__item">
          <div class="p-formList__content">
            <!-- <div class="p-formList__label optional"> -->
            <div class="p-formList__label">
              電話番号
            </div>
            <div class="p-formList__data">
              {!! Form::tel('telephone', '', ['placeholder' => '例）09012345678']) !!}
            </div>
            <!-- <small>ハイフンなしで入力してください</small> -->
          </div>
        </li>
        <li class="p-formList__item">
          <div class="l-grid__2 l-grid__gap2">
            <div class="l-grid__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                  郵便番号
                </div>
                <div class="p-formList__data">
                  {!! Form::number('zip', '', ['placeholder' => '例）1230000']) !!}
                </div>
              </div>
            </div>
            <div class="l-grid__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                  都道府県
                </div>
                <div class="p-formList__data">
                  {!!
                    Form::select('prefectures', 
                      [
                      'tokyo' => '東京都',
                      'kanagawa' => '神奈川県',
                      'saitama' => '埼玉県',
                      'chiba' => '千葉県',
                      ],
                      'tokyo', ['placeholder' => '都道府県を選択']
                    )
                  !!}
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="p-formList__item">
          <div class="p-formList__content">
            <div class="p-formList__label">
              市区町村
            </div>
            <div class="p-formList__data">
              {!! Form::text('city', '', ['placeholder' => '例）渋谷区渋谷1-2-3']) !!}
            </div>
          </div>
        </li>
        <li class="p-formList__item">
          <div class="p-formList__content">
            <div class="p-formList__label">
              建物名など
            </div>
            <div class="p-formList__data">
              {!! Form::text('room', '', ['placeholder' => '例）代々木公園ビル1F']) !!}
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="l-grid__item">
      <ul class="p-formList">
        <li class="p-formList__item">
          <div class="l-grid__1 l-grid__gap2">
            <div class="l-grid__item">
              <div class="p-formList__content">
                <div class="p-formList__label">
                  営業時間1
                </div>
                <div class="l-grid__4">
                  <div class="p-formList__data">
                    {!! Form::time('prefectures', '', ['placeholder' => '例）10:00']) !!}
                  </div>
                  <div class="p-formList__data store">
                    {!! Form::time('prefectures', '', ['placeholder' => '例）19:00']) !!}
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
              {!! Form::text('hour', '', ['placeholder' => '例）定休日：○曜日']) !!}
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
                    {!! Form::time('prefectures', '', ['placeholder' => '例）11:00']) !!}
                  </div>
                  <div class="p-formList__data store">
                    {!! Form::time('prefectures', '', ['placeholder' => '例）20:00']) !!}
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
              {!! Form::text('hour', '', ['placeholder' => '例）定休日：○曜日']) !!}
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</form>



                              