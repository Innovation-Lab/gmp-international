<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- ファビコン --}}
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/admin/favicon/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/admin/favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/admin/favicon/favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('img/admin/favicon/site.webmanifest')}}" crossorigin="use-credentials">
  <link rel="mask-icon" href="{{asset('img/admin/favicon/safari-pinned-tab.svg')}}" color="#3959df">
  <meta name="msapplication-TileColor" content="#ff0000">
  <meta name="theme-color" content="#ffffff">
  <title>@yield('title') | {{ config('app.name').'' }}</title>
  {{-- スタイルシート --}}
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" href="{{ asset('css/style-web.css') }}">
  

  {{-- フォント --}}
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">

  {{-- スクリプト --}}
  {{-- jQuery読み込み --}}
  <script type="text/javascript" src="{{ asset('js/library/jquery-3.5.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/web/product.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/web/slick.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
  <script src="//jpostal-1006.appspot.com/jquery.jpostal.js" type="text/javascript"></script>
  <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
</head>
