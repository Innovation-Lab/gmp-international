<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
@include('web.email._head')
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
@yield('content')
</body>
</html>
