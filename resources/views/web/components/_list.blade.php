<ul class="p-list">
  @foreach($list as $key => $val)
  <li class="p-list__item">
    <div class="p-list__label">
      {!! $key !!}
    </div>
    <div class="p-list__data">
      {!! $val !!}
    </div>
  </li>
  @endforeach
</ul>