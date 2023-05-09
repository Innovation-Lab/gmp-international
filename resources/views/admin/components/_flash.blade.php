<div class="p-flash">
  <div class="p-flash__inner">
    @foreach($flash as $key => $val)
    <div
      class="
        p-flash__item
        {{ 'p-flash__item--'.$val['type'] }}
        {{ $val['auto-hide'] ? 'auto-hide' : ''}}
      "
    >
      <p class="title">
        {{$val['title']}}
        <span class="p-flash__close"></span>
      </p>
      @isset($val['description'])
        <p class="description">
          {{$val['description']}}
        </p>
      @endisset
    </div>
    @endforeach
  </div>
</div>