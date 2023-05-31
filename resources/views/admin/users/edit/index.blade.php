@extends('admin.layouts.pages._default')
@section('title', 'ユーザー管理')
@section('content')
<div class="p-detail">
  <div class="l-detail">
    <div class="l-detail__head">
      {{-- 詳細ヘッド --}}
      @include('admin.users.detail._head')
    </div>
    <div class="l-detail__body">
      <div class="wrapper">
        <div class="container">
          <div class="l-detail__body__inner">
            {{-- メイン --}}
            <div class="l-detail__main">
              <div class="p-detail__main">
                {{-- ---------- ボックス（メインエリア） ---------- --}}
                <div class="p-detail__main__box">
                  <div class="p-detail__main__box__wrapper">
                    <form action="" class="p-form">
                      <div class="l-grid__1 l-grid__2--xl">
                        <div class="l-grid__item">
                          <div class="p-detail__main__box__head">
                            <h3 class="p-detail__main__box__head__title">
                              ユーザー情報
                            </h3>
                          </div>
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="l-grid__2 l-grid__gap1">
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    姓
                                  </div>
                                  <div class="p-formList__data">
                                    {!! Form::text('last-name', '山田', ['placeholder' => '例）山田']) !!}
                                  </div>
                                </div>
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    名
                                  </div>
                                  <div class="p-formList__data">
                                    {!! Form::text('first-name', '太郎', ['placeholder' => '例）太郎']) !!}
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="l-grid__2 l-grid__gap1">
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    セイ
                                  </div>
                                  <div class="p-formList__data">
                                    {!! Form::text('sei', 'ヤマダ', ['placeholder' => '例）ヤマダ']) !!}
                                  </div>
                                </div>
                                <div class="p-formList__content">
                                  <div class="p-formList__label">
                                    メイ
                                  </div>
                                  <div class="p-formList__data">
                                    {!! Form::text('mei', 'タロウ', ['placeholder' => '例）タロウ']) !!}
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  メールアドレス
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::email('email', 'sample@example.com', ['placeholder' => '例）sample@example.com']) !!}
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
                                  {!! Form::tel('telephone', '09012345678', ['placeholder' => '例）09012345678']) !!}
                                </div>
                                <!-- <small>ハイフンなしで入力してください</small> -->
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="l-grid__item">
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="l-grid__2 l-grid__gap1">
                                <div class="l-grid__item">
                                  <div class="p-formList__content">
                                    <div class="p-formList__label">
                                      郵便番号
                                    </div>
                                    <div class="p-formList__data">
                                      {!! Form::number('zip', '1230000', ['placeholder' => '例）1230000']) !!}
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
                                  {!! Form::text('city', '渋谷区渋谷123', ['placeholder' => '例）渋谷区渋谷1-2-3']) !!}
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  マンション名・部屋番号など
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('room', 'マンション名・部屋番号など', ['placeholder' => '例）渋谷マンション1201']) !!}
                                </div>
                              </div>
                            </li>
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__label">
                                  パスワード
                                </div>
                                <div class="p-formList__data">
                                  {!! Form::text('room', 'マンション名・部屋番号など', ['placeholder' => '例）渋谷マンション1201']) !!}
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                        {{--個人情報の取り扱いについて--}}
                        <div class="l-grid__item">
                          <div class="p-detail__main__box__head" {{--style="margin-top: 3rem;"--}}>
                            <h3 class="p-detail__main__box__head__title">
                              個人情報の取り扱いについて
                            </h3>
                          </div>
                          <ul class="p-formList">
                            <li class="p-formList__item">
                              <div class="p-formList__content">
                                <div class="p-formList__data">
                                  <div class="c-input c-input--radio">
                                    <input type="radio" id="inq1-2" name="is_dm" value="1" {{ Auth::user()->is_dm == 1 ? 'checked' : '' }}>
                                    <label for="inq1-2">同意する</label>
                                    <input type="radio" id="inq2-2" name="is_dm" value="0" {{ Auth::user()->is_dm == 0 ? 'checked' : '' }}>
                                    <label for="inq2-2">同意しない</label>
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <ul class="p-formList">
                          <li class="p-formList__item">
                            <div class="p-formList__content">
                              <div class="p-formList__label">
                                管理メモ
                              </div>
                              <div class="p-formList__content__data">
                                <textarea placeholder="修正対応や報告事項を記載してください。"></textarea>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </form>
                  </div>
                  <div class="p-detail__main__box__foot">
                    <button class="c-button__reset">変更をリセット</button>
                    <button class="c-button__disabled">保存する</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- 要素をページ下部に固定 --}}
    {{--
    <div class="l-detail__foot">
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
@endsection