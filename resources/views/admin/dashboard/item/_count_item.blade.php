<div class="p-dashboard__item">
  <div class="p-dashboard__head">
    <h3 class="p-dashboard__head__title">
      製品登録数
    </h3>
  </div>
  <div class="p-dashboard__body">
    <div class="c-text__xs">
      製品登録総数
    </div>
    <div class="c-text__xl c-color__secondary" style="margin: 0.2em 0;">
      {{ number_format($sales_count) }}
      <span class="c-text__sm c-text__weight--800 c-color__secondary">個</span>
    </div>
    <small>
      @php date_default_timezone_set('UTC'); echo date('Y/m/d'); @endphp 時点
    </small>
  </div>
</div>