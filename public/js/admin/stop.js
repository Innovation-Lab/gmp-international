// ボタンクリック時の伝播を止める
$('[class*="c-button"]').click(function(e) {
  e.stopPropagation();
})