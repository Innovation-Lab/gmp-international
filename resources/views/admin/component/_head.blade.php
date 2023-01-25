<div class="p-head">
  <div class="p-head__txt">
    {{$main}}
  </div>
  <div class="p-head__act">
    <div class="u-align--hlc u-gap--16">
      <a href="{{ route('admin.account.profile') }}" class="u-align u-gap--12">
        <p class="c-link--sm">
          <svg>
            <use xlink:href="#user"/>
          </svg>
          sample@example.com
        </p>
      </a>
      <!-- メニュー -->
      <div class="p-menu" id="js-accordion">
        <div class="c-btn--light">
          <svg>
            <use xlink:href="#dot"/>
          </svg>
        </div>
        <div
          class="c-box--xxs"
        >
          <div class="u-align--vl u-gap--4">
            <a href="{{ route('admin.auth.login') }}" class="c-btn--sm">ログアウト</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="p-msg">
    <div class="c-msg">
      <i class="c-msg__ico"></i>
      <div class="c-msg__txt">
        <p class="c-txt--sm">通知・情報メッセージ</p>
      </div>
      <button class="c-msg__close"></button>
    </div>
    <div class="c-msg is-auto-hide">
      <i class="c-msg__ico--valid"></i>
      <div class="c-msg__txt">
        <p class="c-ttl--sm">有効・完了メッセージ</p>
        <p class="c-txt--xs u-mt--4 u-color--txt-weak">処理が有効だった場合のメッセージ表示に使用します<br>
          .is-auto-hide 自動で閉じる(6s)
        </p>
      </div>
      <button class="c-msg__close"></button>
    </div>
    <div class="c-msg is-auto-hide--l">
      <i class="c-msg__ico--invalid"></i>
      <div class="c-msg__txt">
        <p class="c-txt--sm">無効・エラーメッセージ</p>
        <p class="c-txt--xs u-mt--4 u-color--txt-weak">
          .is-auto-hide--l 自動で閉じる(12s)
        </p>
      </div>
      <button class="c-msg__close"></button>
    </div>
  </div>
</div>
@isset($sub)
  {{$sub}}
@endisset
