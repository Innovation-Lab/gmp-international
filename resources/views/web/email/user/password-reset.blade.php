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
        }

        table.contact th {
        background: #fff;
        padding: 0;
        }

        table.contact th font {
        font-size: 13px;
        line-height: 1.7;
        color: #E0768E;
        font-weight: bold;
        }

        table.contact td {
        background: #fff;
        padding: 0;
        }

        table.contact td font {
        font-size: 14px;
        line-height: 1.7;
        color: #333333;
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

    <body>
    <table width="100%" border="0" cellpadding="10" cellspacing="0">
        <tbody>
        <tr>
            <td class="responsive" valign="top">
            <a style="display: block; margin: 0; width: 180px;">
                {{--<img class="logo" src="{{ $message->embed(public_path() . '/img/logo/logo.png') }}" style="margin:
                0 0
                20px; width:100%;">--}}
            </a>
            </td>
        </tr>
        </tbody>
    </table>
    <table width="900" border="0" align="center" cellpadding="0" cellspacing="0" class="base" style="margin: 0;">
        <tr>
        <td>
            <table width="100%" border="0" cellpadding="10" cellspacing="0" style="margin: 0 0 30px;">
            <tbody>
                <tr>
                    <td class="responsive" valign="top" style="padding: 0;">
                        <font style="
                        width: 100%;
                        padding: 20px 30px;
                        text-align: left;
                        display: block;
                        border-top: 1px solid #27305A;
                        border-bottom: 1px solid #27305A;
                        color: #fff;
                        box-sizing: border-box;
                        font-size: 12px;
                        font-weight: bold;
                        background: #27305A;
                        ">
                        <b style="padding: 0 10px 0 0; font-size: 18px;">[GMPインターナショナル]　パスワード再設定のお知らせ</b>
                        </font>
                    </td>
                </tr>
            </tbody>
            </table>
            <!-- 本文テキスト -->
            <table width="100%" border="0" cellpadding="10" cellspacing="0" style="margin: 0 0 20px;">
            <tbody>
                <tr>
                <td class="responsive bg_none " valign="top" style="padding: 0;">
                    <font size="3" color="#333333" style="font-size: 15px;line-height: 1.7;color: #333333;">
                    下記URLより、パスワードの再設定をしてください。<br>
                    以下のリンクから再設定を行ってください。<br><br>

                    {{--<a href="{{ $reset_url }}">{{ $reset_url }}</a>--}}
                    
                    <br><br>
                    ご注意：URLの有効期限は{{--{{ $count }}--}}分間です。<br>
                    本メールに心当たりがない場合は、お手数ですが破棄していただきますようお願い致します。


                    </font>
                    <br><br>
                </td>
                </tr>
            </tbody>
            </table>
            <table width="100%" border="0" cellpadding="10" cellspacing="0" style="background: #F7F9F9; margin: 30px 0 0;">
            <tbody>
                <tr>
                <td class="responsive" valign="top">
                    <font size="4" color="#333333" style="
                    font-size: 12px;
                    padding: 10px 20px;
                    display: block;
                    ">
                    ※このメールは送信専用メールアドレスから配信されています。 ご返信いただいてもお答えできませんので、ご了承ください。
                    <table>
                        <tbody>
                        <tr>
                            <td class="responsive" valign="top">
                            <a style="display: block; margin: 0; width: 120px;">
                                {{--<img class="logo" src="{{ $message->embed(public_path() . '/img/logo/logo.png') }}"
                                style="width:100%;">--}}
                            </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </font>
                </td>
                </tr>
            </tbody>
            </table>
        </td>
        </tr>
    </table>
    </body>
</html>
