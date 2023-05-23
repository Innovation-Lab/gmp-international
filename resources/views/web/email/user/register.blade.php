@extends('web.email._default')
@section('content')
  <table width="900" border="0" align="center" cellpadding="0" cellspacing="0" class="base" style="margin: 0;">
    <tr>
      <td>
        <!-- 本文テキスト -->
        <table width="100%" border="0" cellpadding="10" cellspacing="0" style="margin: 0 0 20px;">
          <tbody>
          <tr>
            <td class="responsive bg_none " valign="top" style="padding: 0;">
              <font size="3" color="#333333" style="font-size: 15px;line-height: 1.7;color: #333333;">
                {{ data_get($item, 'last_name').' '.data_get($item, 'first_name')  }} 様<br><br>
                GMP International Co. Ltd. 事務局です。<br>
                この度はご登録いただき、ありがとうございます。<br>
                <br>
                会員登録が完了しました。<br>
                こちらの<a class="" href="{{ route('mypage.index') }}">マイページ</a>からご利用ください。
                <br>
              </font>
            </td>
          </tr>
          </tbody>
        </table>
        @include('web.email._footer')
      </td>
    </tr>
  </table>
@endsection
