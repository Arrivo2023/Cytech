//import { forEach, set } from "lodash";
//import { document } from "postcss";

document.addEventListener("DOMContentLoaded", function() {
  
  let productsId = document.getElementsByClassName('productsId');
  let productsName = document.getElementsByClassName('productsName');


  // ソートを実行する関数
  //console.log("ーーーーーーーーーーーーーーーーーーーーー");
  function sortTable() {
    const table = document.getElementById('item-list__table');
    const rows = table.querySelectorAll('.tableItems');
    
    // select要素の値を取得
    const sortColumn = Number(document.getElementById('sortValue').value);
    const sortOrder = Number(document.getElementById('sortFormat').value);
    
    // ソートを実行
    const sortedRows = Array.from(rows).slice().sort((a, b) => {
      const aValue = a.cells[sortColumn].textContent.trim();
      const bValue = b.cells[sortColumn].textContent.trim();
      
    if (sortOrder === 1) {
      return aValue.localeCompare(bValue, undefined, { numeric: true });
    } else {
      return bValue.localeCompare(aValue, undefined, { numeric: true });
    }
  });

  // ソートされた行を一旦別の場所に移動させる
  const fragment = document.createDocumentFragment();
  sortedRows.forEach((row) => {
    fragment.appendChild(row);
  });

  // テーブルの子要素をすべて削除して、ソート済みの行を追加する
  table.querySelector('tbody').appendChild(fragment);
}

// 初期表示時にソートを実行
sortTable();

// select要素が変更された時にソートを実行
document.getElementById('sortValue').addEventListener('change', sortTable);
document.getElementById('sortFormat').addEventListener('change', sortTable);


  ///////////////////////////

/*  // ソートロジックを定義
function sortRows() {
  const table = document.getElementById("item-list__table");
  const rows = table.getElementsByTagName("tr");
  const sortColumn = document.getElementById("sortValue").value;
  const formatColumn = document.getElementById("sortFormat").value;

  // tr要素を配列に変換してソート
  const sortedRows = Array.from(rows).slice(1).sort((a, b) => {
    const sortValueA = a.cells[sortColumn].textContent;
    const sortValueB = b.cells[sortColumn].textContent;
    const formatValueA = a.cells[formatColumn].textContent;
    const formatValueB = b.cells[formatColumn].textContent;

    console.log(sortValueA);
    console.log(sortValueB);


    //昇順メソッド
  function upSort(){
    //let sortedArray = sortData.slice().sort();
    let sortedArray = b - a;
    return sortedArray;
  }
  
  //降順メソッド
  function downSort(){
    //let sortedArray = sortData.slice().sort((a,b) => a - b);
    let sortedArray = a - b;
    return sortedArray;
  }

  //文字列の降順メソッド
  function strDownSort(){
      if (a > b) {
        return -1; // aがbより大きい場合、aを前に並べる
      } else if (a < b) {
        return 1; // aがbより小さい場合、aを後ろに並べる
      } else {
        return 0; // aとbが同じ場合、順序を変更しない
      }
  }

  function isNumber(value) {
    return typeof value === 'number' && !isNaN(value);
  }
  
  function isString(value) {
    return typeof value === 'string';
  }


  if(sortValueA == 0){
    if(isNumber(sortValueA) == true){
      downSort();
    }else if(isString(sortValueA) == true){
      strDownSort();
    }
  }else{
    upSort();
  }*/



  
  // 使用例
  /*const val1 = 42;
  const val2 = "Hello";
  
  console.log(isNumber(val1)); // true
  console.log(isString(val1)); // false
  
  console.log(isNumber(val2)); // false
  console.log(isString(val2)); // true
  */

    //return aValue.localeCompare(bValue); // 文字列として比較
  //});

  // ソートされたtr要素をテーブルに追加
  /*sortedRows.forEach((row) => {
    table.appendChild(row);
  });
}

// select要素の変更イベントリスナーを設定
const sortColumn = document.getElementById("sortValue");
const formatColumn = document.getElementById("sortFormat");
sortColumn.addEventListener("change", sortRows);
formatColumn.addEventListener("change", sortRows);*/





  /*let prices = document.getElementsByClassName('price');
  let stocks = document.getElementsByClassName('stock');
  let tableItems = docment.getElementsByClassName('tableItems');
  
  let productId = [];
  let productName = [];
  let price = [];
  let stock = [];


  //push関数で、既存の配列の末尾に新しい要素を追加。
  for (let i = 0; i < productsId.length; i++) {
    productId.push(productsId[i].innerText);
  }
  
  for (let i = 0; i < productsName.length; i++) {
    productName.push(productsName[i].innerText);
  }
  
  for (let i = 0; i < prices.length; i++) {
    price.push(prices[i].innerText);
  }

  for (let i = 0; i < stocks.length; i++) {
    stock.push(stocks[i].innerText);
  }

  console.log(productId);
  console.log(productName);
  console.log(price);
  console.log(stock);

  //昇順メソッド
  function upSort(sortData){
    let sortedArray = sortData.slice().sort();
    return sortedArray;
  }
  
  //降順メソッド
  function downSort(sortData){
    let sortedArray = sortData.slice().sort((a,b) => a - b);
    return sortedArray;
  }

  //文字列の降順メソッド
  function strDownSort(sortData){
    let sortedArray = sortData.slice().sort((a, b) => {
      if (a > b) {
        return -1; // aがbより大きい場合、aを前に並べる
      } else if (a < b) {
        return 1; // aがbより小さい場合、aを後ろに並べる
      } else {
        return 0; // aとbが同じ場合、順序を変更しない
      }
    });
    //console.log(arr); // 結果: ["orange", "kiwi", "grape", "banana", "apple"]
    
    return sortedArray;
  }

  let sortValue = document.getElementById("sortValue");
  let sortFormat = document.getElementById("sortFormat");
  let selectedSortValue = sortValue.value;
  let selectedSortFormat = sortFormat.value;
  console.log('value初期値:',selectedSortValue);
  console.log('format初期値:',selectedSortFormat);


  // changeイベントのリスナーを登録
  sortValue.addEventListener('change', function(event) {
  // 選択されたオプションの値を取得
  selectedSortValue = event.target.value;
  // 選択された値に基づいて処理を実行





  if(selectedSortValue == 1){
    let upResult = upSort(productName);
    let downResult = strDownSort(productName);
    tableItems = productName;
    console.log("元の順序は、["+productName+"]です。")
    console.log("昇順は、["+upResult+"]です。");
    console.log("昇順は、["+downResult+"]です。");
  
    console.log('選択された値:', selectedSortValue);

    selectedSortValue = upResult;
  }
});*/




  /*let upResult = upSort(productName);
  let downResult = strDownSort(productName);
  console.log("元の順序は、["+productName+"]です。")
  console.log("昇順は、["+upResult+"]です。");
  console.log("昇順は、["+downResult+"]です。");*/






  /*
  // select要素を取得
  let sortValue = document.getElementById("sortValue");
  let sortFormat = document.getElementById("sortFormat");
  let selectedSortValue = sortValue.value;
  let selectedSortFormat = sortFormat.value;
  //console.log('value初期値:',selectedSortValue);
  console.log('format初期値:',selectedSortFormat);

  // changeイベントのリスナーを登録
  sortValue.addEventListener('change', function(event) {
    // 選択されたオプションの値を取得
    selectedSortValue = event.target.value;
    // 選択された値に基づいて処理を実行

    console.log('選択された値:', selectedSortValue);
  });
  console.log(selectedSortValue);
  
  sortFormat.addEventListener('change', function(event) {
    let selectedSortFormat = event.target.value;
    if(selectedSortFormat == 0){
      selectedSortFormat.sort(function(a,b){
        return a - b;
      })  
    }else{
      return b - a;
    }
    console.log('選択された値:', selectedSortFormat);
  });
  */











/*
// カラムと昇順・降順のselectタグを取得
const columnSelect = document.getElementById('sortValue');
const orderSelect = document.getElementById('sortFormat');

// イベントリスナーを追加
columnSelect.addEventListener('change', handleSort);
orderSelect.addEventListener('change', handleSort);

// 非同期でソート処理を実行する関数
async function sortData(column, order) {
  try {
    // データを取得してソート処理を実行する
    const response = await fetch(`http://localhost:8888/cytech/public/sarch_index?column=${column}&order=${order}`);
    const html = await response.text();
    //const sortedData = await html.json();
    console.log(sortedData); // ソート済みデータを表示
  } catch (error) {
    console.error(error);
  }
}

// イベントが発生した時に実行する処理
function handleSort() {
  const selectedColumn = columnSelect.value;
  const selectedOrder = orderSelect.value;
  html(selectedColumn, selectedOrder);
}
*/




  /*if(sortValue == 0){
    if(sortFormat == 0){
      productId.sort(function(a,b){
        return a - b;
      });
    }else{
      productId.sort(function(a,b){
        return b - a;
      });
    }
    console.log(productId);
  }*/




  // ボタン要素を取得
  let buttons = document.getElementsByClassName("infoBtn");
  
  // 商品詳細要素を取得
  let productIdElement = document.getElementById("product-id");
  let productNameElement = document.getElementById("product-name");
  let companyNameElement = document.getElementById("company-name");
  let productPriceElement = document.getElementById("product-price");
  let productStockElement = document.getElementById("product-stock");
  let productImageElement = document.getElementById("product-image");
  let productCommentElement = document.getElementById("product-comment");
  
  
  let edit_productIdElement = document.getElementById("edit-id");
  let edit_productNameElement = document.getElementById("edit-productName");
  let edit_companyNameElement = document.getElementById("edit-companyName");
  let edit_productPriceElement = document.getElementById("edit-productPrice");
  let edit_productStockElement = document.getElementById("edit-productStock");
  let edit_productImageElement = document.getElementById("edit-productComment");
  let edit_productCommentElement = document.getElementById("edit-productComment");
  
  let editForm = document.getElementById("editForm");
  let updateBtn = document.getElementById("updateBtn");

  let count = 0;

  
  //for文で詳細ボタンの数だけ繰り返し処理
  for (let i = 0; i < buttons.length; i++) {
    // 各ボタンにクリックイベントを追加
    buttons[i].addEventListener("click", function() {
      
      //新規登録画面との差をリセット
      let modal_title = document.getElementById("modal-title");
      modal_title.textContent = "商品情報編集画面";
      updateBtn.textContent = "更新";

      //新規登録クリックで変更した値を再セット
      //更新ボタンと登録ボタンでルートを切り替え
      //変更前後の値をコンソールで確認
      if(count == 1){
        let action = editForm.getAttribute("action");
        let dataRoute = editForm.getAttribute("data-route");

        editForm.setAttribute("action", dataRoute);
        editForm.setAttribute("data-route", action);
        console.log("元のルートは　"+action+"　です");
        console.log("変更後のルートは　"+dataRoute+"　です");

        console.log("元のカウントは　"+count+"　です");
        count = 0;
        console.log("変更後のカウントは　"+count+"　です");
      }else{
        console.log("元のカウントは　"+count+"　です");
      }
      
      // 商品詳細データを取得
      // ボタンの親要素の親要素である行を取得
      let row = this.parentNode.parentNode;
      
      //取得した行の各sellを変数に代入
      let productId = row.cells[0].textContent;
      let productImage = row.cells[1].querySelector('img').src;
      let productName = row.cells[2].textContent;
      let productPrice = row.cells[3].textContent;
      let productStock = row.cells[4].textContent;
      let companyName = row.cells[5].textContent;
      let companyId = row.cells[5].dataset.value;
      let productComment = row.cells[6].textContent;
      
      
      // 詳細画面にデータセット
      productIdElement.value = productId;
      productNameElement.value = productName;
      companyNameElement.value = companyName;
      productPriceElement.value = productPrice;
      productStockElement.value = productStock;
      productImageElement.src = productImage;
      productCommentElement.value = productComment;
      
      console.log(productImage);

      //編集画面にデータセット
      edit_productIdElement.value = productId+"（IDは変更できません）";
      edit_productNameElement.value = productName;
      edit_productPriceElement.value = productPrice;
      edit_productStockElement.value = productStock;
      edit_productImageElement.value = productImage;
      edit_productCommentElement.value = productComment;

      //option属性の動的idを取得（optionが含まれるid属性を取得）
      let optionElements = document.querySelectorAll("[id^='option");
      //console.log(optionElements);
      optionElements.forEach(function(optionElement){
        //console.log(optionElement);
        //console.log(companyId);
        if(optionElement.value == companyId){
          console.log("'"+optionElement.value+"'"+"一致しています");
          optionElement.selected = true;
        }else{
          console.log(optionElement.value);
        };
      });
    });
  };


  
  //新規登録ボタンのクリックイベント
  let createBtn = document.getElementById("create-btn");
  createBtn.addEventListener("click", function(){
    
    
    //商品編集画面のタイトル・id・メーカーを取得
    let modal_title = document.getElementById("modal-title");
    let edit_id = document.getElementById("edit-id");
    let default_company = document.getElementById("default-company");
    //let originalBtn = updateBtn;
    
    //新規登録画面のデータセット
    modal_title.textContent = "商品新規登録画面";
    edit_id.value = "idは自動で登録されます";
    edit_companyNameElement.value = default_company.textContent;
    updateBtn.textContent = "登録";
    updateBtn.name = "addBtn";
    
    //placeholder表示用に値セット
    let edit_values = [
      edit_productNameElement,
      edit_productPriceElement,
      edit_productStockElement,
      edit_productImageElement,
      edit_productCommentElement
    ];

    //各値を初期化しplaceholderを表示
    edit_values.forEach((edit_value)=>{
      edit_value.value = "";
      //console.log(edit_value.value);
    });


    if(count == 0){
      let action = editForm.getAttribute("action");
      let dataRoute = editForm.getAttribute("data-route");

      editForm.setAttribute("data-route", action);
      editForm.setAttribute("action", dataRoute);
      console.log("元のルートは　"+action+"　です");
      console.log("変更後のルートは　"+dataRoute+"　です");

      console.log("元のカウントは　"+count+"　です");
      count = 1;
      console.log("変更後のカウントは　"+count+"　です");
    }else{
      console.log("元のカウントは　"+count+"　です");
    };
  });
});