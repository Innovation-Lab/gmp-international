<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title></title>
  <style type="text/css">
      body {
          font-family: 'noto sans japanese', sans-serif;
          font-color: #333;
          text-align: left;
      }

      /* フォントの設定 */
      b {
          font-family: 'Roboto', 'noto sans japanese', sans-serif;
          font-weight: normal;
      }

      table,
      td {
          border-collapse: collapse;
          mso-table-lspace: 0;
          mso-table-rspace: 0;
      }

      /* テーブルの設定 */
      img {
          outline: none;
          border: none;
          text-decoration: none;
          max-width: 100%;
      }

      /* 画像の設定 */
      a img {
          border: none;
      }

      /* リンク画像の枠線を消す設定 */
      td a {
          background-color: none !important;
          color: #333 !important;
      }

      td.bg_none a {
          background: none !important;
      }

      td a.btn {
          background: none !important;
          color: white !important;
      }

      td .TSRSpan {
          display: none !important;
      }

      /* 変更フォーム */
      table.change_form {
          border-top: solid 1px #000;
          border-bottom: solid 1px #000;
          width: 350px;
          margin: 30px 0;
          text-align: left;
          table-layout: fixed;
      }

      table.change_form th {
          width: 100px;
      }

      table.change_form th,
      table.change_form td {
          padding: 4px 10px 4px;
          color: #333 !important;
      }

      .caution {
          font-size: 12px;
          color: #777;
      }

      table.reasons {
          background: #eee;
      }
      table.reasons tr,
      table.reasons th,
      table.reasons td {
          display: block;
      }

      table.reasons {
          margin: 15px 0 10px 10px;
      }

      table.reasons th,
      table.reasons td {
          display: block;
          text-align: left;
          padding: 5px 25px 5px 15px;
          width: 100%;
      }

      table.reasons th {
          padding-top: 10px;
      }

      table.reasons td {
          padding-bottom: 10px;
          background: #f5f5f5;
      }

      table.reasons td font {
          line-height: 1.8;
      }

      font.normal,
      font.ubnormal {
          display: block;
          background: #eef1f5;
          padding: 2px 10px;
          font-size: 14px;
          margin: 2px 0;
      }

      /* お問い合わせフォーム */
      table.contact {
          background: #fff;
          margin: 0;
          width: 100%;
          max-width: 480px;
      }

      table.contact th {
          background: #fff;
          padding: 0;
      }

      table.contact th font {
          font-size: 13px;
          line-height: 1.7;
          font-weight: 500;
          color: #666;
      }

      table.contact td {
          background: #fff;
          padding: 0;
          /*       border-bottom: solid 1px #ddd; */
      }

      table.contact td font {
          font-size: 14px;
          font-weight: 600;
      }

      @media only screen and (max-width: 480px) {
          .base {
              width: 100% !important;
              min-width: 100% !important;
          }

          td.responsive {
              width: 100% !important;
              padding-left: 10px !important;
              padding-right: 10px !important;
              box-sizing: border-box !important;
              display: block !important;
          }

          img {
              width: 100% !important;
              max-width: 100% !important;
          }
      }

      /* スマートフォン表示の設定 */
  </style>
</head>

<body style="max-width: 480px;">
<table width="100%" border="0" cellpadding="10" cellspacing="0" style="border-bottom: solid 2px #eee; margin: 0 auto 30px;">
  <tbody>
  <tr>
    <td style="text-align: center; padding: 24px 10px 16px;">
      <img class="logo" src="" style="width:160px; display: block; margin: auto;">
      <font style="font-size: 14px; font-weight: 600; margin: 10px 0 0; display: block;">メールアドレスの認証をお願いします。</font>
    </td>
  </tr>
  </tbody>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="base" style="margin: 0; width: 100%;">
  <tr style="display: block; width: 100%;">
    <td style="display: block; width: 100%;">
      <!-- 本文テキスト -->
      <table width="100%" border="0" cellpadding="10" cellspacing="0" style="margin: 0 auto 40px;">
        <tbody>
        <tr style="display: block; width: 100%;">
          <td class="responsive bg_none " valign="top" style="padding: 0; display:block; margin: auto;">
          </td>
        </tr>
        </tbody>
      </table>

      <table  style="margin: 40px auto 0; width: 100%; max-width: 480px;">
        <tbody>
        <a href="{{ $reset_url }}">{{ $reset_url }}</a>
        </tbody>
      </table>
    </td>
  </tr>
</table>
</body>

</html>
