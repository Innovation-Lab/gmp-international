(() => {
  let headHeight = document.getElementsByClassName('p-main__head')[0].offsetHeight;
  let bodyPadding = 48;
  let tHead = document.getElementsByClassName('t-head')[0].offsetHeight;
  let tFoot = document.getElementsByClassName('t-foot')[0].offsetHeight;
  // thの数を取得
  let thCount = document.querySelector('thead tr').childElementCount;
  // tableにカラムのスタイルを指定
  const table = document.querySelector('table');
  table.style.gridTemplateColumns = 'repeat('+thCount+', minmax(max-content, 1fr))';
  const tTable = document.getElementsByClassName('t-table')[0];
  let tTableHeight = 'calc(100vh - '+ (headHeight + bodyPadding + tHead + tFoot) +'px)';
  console.log('tt:'+tTableHeight)
  tTable.style.maxHeight = tTableHeight;
})();