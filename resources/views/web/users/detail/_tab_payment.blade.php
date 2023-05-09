<div class="p-tab">
  <ul class="p-tabList">
    @foreach([
      'account'=> [
        'label' => '支払い総額・未入金',
        'path' => 'admin.users.detail.account',
        'active' => true,
        'alert' => '2',
      ],
      'contract'=> [
        'label' => '入会時支払い',
        'path' => 'admin.users.detail.contract',
        'active' => false,
        'alert' => '',
      ],
    ] as $key => $val)
    <li class="p-tabList__item">
      <a
        href="{{ route($val['path'])}}"
        class="p-tabList__label {{ $val['active'] ? 'is-active' : '' }}"
      >
        {{$val['label']}}
        @if($val['alert'])
          <span class="alert">
            {{$val['alert']}}
          </span>
        @endif
      </a>
    </li>
    @endforeach

  </ul>
</div>