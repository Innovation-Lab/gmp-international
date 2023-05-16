<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- ファビコン --}}
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/admin/favicon/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/admin/favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/admin/favicon/favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('img/admin/favicon/site.webmanifest')}}">
  <link rel="mask-icon" href="{{asset('img/admin/favicon/safari-pinned-tab.svg')}}" color="#3959df">
  <meta name="msapplication-TileColor" content="#ff0000">
  <meta name="theme-color" content="#ffffff">
  <title>@yield('title') | {{ config('app.name').'' }}</title>
  {{-- スタイルシート --}}
  <link href="{{ asset('css/admin/style-admin.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  {{-- フォント --}}
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
  {{-- スクリプト --}}
</head>
