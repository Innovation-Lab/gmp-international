@extends('web.layouts.pages._form')
@section('title', '退会の手続き')
@section('class', 'body_')
@section('content')
  <div class="l-frame__body">
    <div class="p-formPage">
      <div class="p-formPage__head">
        <div class="l-container">
          <div class="p-formPage__head__ttl">
            <p class="c-ttl">退会の手続き</p>
          </div>
        </div>
      </div>
      <div class="l-container">
        <div class="p-formPage__body">
          <div class="p-delete">
            <div class="p-delete__head">
              <p class="c-description">
                会員を退会された場合には、現在登録されている情報がすべて削除されます。以下の項目を確認して、退会手続きに進んでください。
              </p>
            </div>
            <div class="p-delete__body">
              <ul class="p-delete__list">
                <li class="p-delete__list__item">
                  <p class="c-ttl">登録済み製品について</p>
                  <p class="c-description">ご登録されている製品の情報が削除され、<b>アフターサポートを受けることができなくなります。</b></p>
                </li>
                <li class="p-delete__list__item">
                  <p class="c-ttl">アカウント情報について</p>
                  <p class="c-description">ご登録されているメールアドレス、パスワード情報が削除されます。<b>削除した情報は復元することはできません。</b></p>
                </li>
                <li class="p-delete__list__item">
                  <p class="c-ttl">ユーザー情報について</p>
                  <p class="c-description">ご登録されているお名前、住所、電話番号情報が削除されます。<b>削除した情報は復元することはできません。</b></p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="p-formPage__foot p-formPage__foot--delete">
          <!-- チェックボックス -->
          <div class="c-input c-input--checkbox">
            <input type="checkbox" name="checkbox1" id="checkbox-1-01">
            <label for="checkbox-1-01">上記の内容を確認しました</label>
            <!-- 入力不備エラーメッセージ -->
          </div>
          <div class="err-txt">
            <p style="text-align: center;" class="c-txt c-txt--err">※退会には上記の確認が必要です。</p>
          </div>
          <!-- ボタン -->
          <div class="p-btnWrap p-btnWrap--center">
            <a href="{{route('mypage.index')}}" class="c-btn c-btn--back">戻る</a>
            <!-- <a href="" class="c-btn c-btn--next" id=>退会する</a> -->
            <button class="modalOpen c-btn c-btn--next" data-micromodal-trigger="modal-delete--account" role="button">退会する</button>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
    // ページの読み込みが完了したら実行される

      // チェックボックスの状態に応じてリンクの無効/有効と背景色の変更を行う関数を定義
      function toggleLink() {
        var checkbox = $('#checkbox-1-01');
        var link = $('button.c-btn.c-btn--next');

        if (checkbox.prop('checked')) {
          link.prop('disabled', false);
          link.css('pointer-events', 'auto');
          link.css('background-color', '');
        } else {
          link.prop('disabled', true);
          link.css('pointer-events', 'none');
          link.css('background-color', 'gray');
        }
      }

      // 初期状態でのリンクの無効/有効と背景色の設定
      toggleLink();

      // チェックボックスの状態が変更されたらtoggleLink関数を呼び出す
      $('#checkbox-1-01').change(function() {
        toggleLink();
      });

      // チェックボックスの状態に応じてメッセージの表示/非表示を切り替える関数を定義
      function toggleMessage() {
        var checkbox = $('#checkbox-1-01');
        var message = $('p.c-txt.c-txt--err');

        if (checkbox.prop('checked')) {
          message.css('color', 'transparent');
        } else {
          message.css('color', '');
        }
      }

      // 初期状態でのメッセージの表示/非表示を設定
      toggleMessage();

      // チェックボックスの状態が変更されたらtoggleMessage関数を呼び出す
      $('#checkbox-1-01').change(function() {
        toggleMessage();
      });
    });
  </script>

{{-- 退会モーダル --}}
@include('web.auth.leave._modal-delete--account')

@endsection