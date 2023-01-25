(() => {
  const tables = document.querySelectorAll('.p-table');
  const mainHead = document.querySelector('.l-main__head');
  const tableFoot = document.querySelector('.p-table__foot');
  const bodyPadding = 48;
  mainHeadHeight = mainHead?.offsetHeight;
  tableFootHeight = tableFoot?.offsetHeight;

  tables.forEach(table => {
    let cTable = table.querySelector('table');
    let thCount = table.querySelector('thead tr').childElementCount;
    let tableHeight = 'calc(100vh - '+ (mainHeadHeight + tableFootHeight + bodyPadding - 15 ) +'px)';//-16 →ネガティブマージン分
    cTable.style.gridTemplateColumns = 'repeat('+thCount+', minmax(max-content, 1fr))';
    table.style.maxHeight = tableHeight;
  })
})();