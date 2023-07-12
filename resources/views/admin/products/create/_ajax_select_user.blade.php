<select name="user_id" class="select2">
  <option value="" selected>選択してください</option>
  @foreach ($users as $k => $v)
    <option value="{{ $k }}">{{ $v }}</option>
  @endforeach
</select>