@php
  $flash_messages = [];
  $flash_info = session('info');
  if ($flash_info) {
      if (!is_array($flash_info)) {
          $flash_messages[] = [
              "type" => "info",  // info,success,alert
              "title" => "Information",
              "description" => $flash_info,
              "auto-hide" => true,
          ];
      } else {
          foreach ($flash_info as $session_message) {
              $flash_messages[] = [
                "type" => "info",  // info,success,alert
                "title" => "Information",
                "description" => $session_message,
                "auto-hide" => true,
            ];
          }
      }
  }
  $flash_success = request()->session()->get('success');
  if ($flash_success) {
      if (!is_array($flash_success)) {
          $flash_messages[] = [
              "type" => "success",  // info,success,alert
              "title" => $flash_success,
              "auto-hide" => true,
          ];
      } else {
          foreach ($flash_success as $session_message) {
              $flash_messages[] = [
                "type" => "success",  // info,success,alert
                "title" => $session_message,
                "auto-hide" => true,
            ];
          }
      }
  }
  $flash_alert = request()->session()->get('alert');
  if ($flash_alert) {
      if (!is_array($flash_alert)) {
          $flash_messages[] = [
              "type" => "alert",  // info,success,alert
              "title" => "Alert",
              "description" => $flash_alert,
              "auto-hide" => true,
          ];
      } else {
          foreach ($flash_alert as $session_message) {
              $flash_messages[] = [
                "type" => "alert",  // info,success,alert
                "title" => "Alert",
                "description" => $session_message,
                "auto-hide" => true,
            ];
          }
      }
  }
@endphp
@if($flash_messages)
  <div class="p-flash">
    <div class="p-flash__inner">
      @foreach($flash_messages as $flash_message)
        <div
                class="
              p-flash__item auto-hide
              {{ 'p-flash__item--'.data_get($flash_message, 'type', 'info') }}
              {{ data_get($flash_message, true) ? 'auto-hide' : null }}
            "
        >
          <p class="title">
            {{ __(data_get($flash_message, 'title')) }}
            <span class="p-flash__close"></span>
          </p>
          @if(data_get($flash_message, 'description'))
            <p class="description">
              {{ data_get($flash_message, 'description') }}
            </p>
          @endif
        </div>
      @endforeach
    </div>
  </div>
@endif
