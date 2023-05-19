<div class="modal micromodal-slide" id="modal-delete--product" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1">
    <div class="modal__container modal__container--min" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <div class="modal__box">
        <header class="modal__header modal__header--column">
          <h2 class="modal__title c-txt--center" id="modal-1-title">
            注意事項
          </h2>
          <p class="modal__description c-txt--center">
            この操作は<b>取り消すことができません。</b><br />
            本当に削除しますか？
          </p>
        </header>
        <main class="modal__content" id="modal-1-content">
          <div class="modal__content__body">
            <div class="p-deleteProduct">
              <div class="p-deleteProduct__img">
                <img src="{{asset('img/web/user/sample/product_sample.png')}}">
              </div>
              <div class="p-deleteProduct__txt">
                <p class="name">COCO DOUBLE EX FROM BIRTH</p>
                <div class="info">
                  <!-- 購入日・シリアルナンバー・購入店舗 -->
                  <div class="p-card__purchase">
                    <p class="label c-txt--sm c-txt--sm--ghost">購入日</p>
                    <p class="data c-txt">2023/04/04</p>
                  </div>
                  <div class="p-card__serialNum">
                    <p class="label c-txt--sm c-txt--sm--ghost">シリアルNo.</p>
                    <p class="data c-txt">GMP123456789</p>
                  </div>
                  <div class="p-card__store">
                    <p class="label c-txt--sm c-txt--sm--ghost">購入店舗</p>
                    <p class="data c-txt">エアバギー代官山店</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal__content__foot">
            <div class="p-btnWrap p-btnWrap--center">
              <button class="c-btn c-btn--back" aria-label="Close modal" data-micromodal-close>戻る</button>
              <a href="{{route('mypage.product')}}" class="c-btn c-btn--accent">削除する</a>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</div>

{{-- 登録製品追加 / 削除 --}}
<script>
  //製品の追加とナンバリング
  $(document).on('click', '#js-product--add', function(){
    let Tag = $('.l-stack__item.l-stack__item--line').eq(0),
        Code = Tag.clone(),
        Num = $('.l-stack--product > .l-stack__item').length;
    $('#js-product--add').before(Code);
    $('.l-stack--product > .l-stack__item').eq(Num - 1).find('.p-formList__ttl .c-ttl').text('製品'+Num);
  });
</script>
<script>
  //製品の削除とナンバリング
  $(document).on('click', '.c-btn--ico--remove', function(){
    $(this).parents('.l-stack__item--line').remove();
    let Tag = $('.l-stack--product > .l-stack__item'),
        Num = Tag.length;
    Tag.each(function(){
      let This = $(this),
          Ind = This.index() + 1;
      This.find('.p-formList__ttl .c-ttl').text('製品'+Ind);
    });
  });
</script>
{{-- フォームの表示切り替え --}}
<script>
  $('select').on('keydown keyup keypress change click lord',function(){    
    if($(this).val() == 'other'){
      $(this).parents('.p-formList__data').find('.p-formList__other').css('display','grid');
    }else{   
      $(this).parents('.p-formList__data').find('.p-formList__other').hide();
    }  
  }).change();
</script>
{{-- 日付選択 --}}
<script>
  $(function() {
    $('.c-input--date input').datepicker();
  });
</script>