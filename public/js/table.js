(() => {
  const table = document.querySelector('table');
  const tTable = document.getElementsByClassName('p-table')[0];
  let lMainHead = document.getElementsByClassName('l-main__head')[0];
  let pTableFoot = document.getElementsByClassName('p-table__foot')[0];
  let headHeight = 0
  let tFoot = 0
  let bodyPadding = 48;
  if(headHeight) {
    headHeight = lMainHead.offsetHeight;
  }
  if(pTableFoot) {
    tFoot = pTableFoot.offsetHeight;
  }
  // thの数を取得
  let thCount = document.querySelector('thead tr').childElementCount;
  // tableにカラムのスタイルを指定
  table.style.gridTemplateColumns = 'repeat('+thCount+', minmax(max-content, 1fr))';
  let tTableHeight = 'calc(100vh - '+ (headHeight + bodyPadding + tFoot ) +'px)';//-16 →ネガティブマージン分
  if(tTable){
    tTable.style.maxHeight = tTableHeight;
  }
})();