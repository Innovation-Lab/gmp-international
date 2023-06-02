<div class="p-tab">
  <ul class="p-tabList">
    @foreach([
      'account'=> [
        'label' => 'アカウント情報',
        'path' => 'admin.users.detail.account',
        'alert' => '',
      ],
      'contract'=> [
        'label' => '契約情報',
        'path' => 'admin.users.detail.contract',
        'alert' => '',
      ],
      'payment'=> [
        'label' => '支払い情報',
        'path' => 'admin.users.detail.payment',
        'alert' => '2',
      ]
    ] as $key => $val)
    <li class="p-tabList__item">
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