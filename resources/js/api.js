const csrfToken = $('meta[name="csrf-token"]').attr('content');

let id = null;
let img_path = null;
let product_name = null;
let price = null;
let stock = null;
let company_name = null;
let company_id = null;

let arrayData = [];
let arrayDataCopy = [];

//コピー関数
function copyData(src) {
  return JSON.parse(JSON.stringify(src));
}

//テーブルリスト作成関数
function createTableList($item){
  $.each($item, function(key, value){
    //nullの変数に値セット
    id = value.id;
    img_path = value.img_path;
    product_name = value.product_name;
    price = value.price;
    stock = value.stock;
    company_name = value.company_name;
    company_id =value.company_id;

    //console.log(id,img_path,product_name,price,stock,company_name);

    let getRoute = $('#list-body').attr('data-routeName');
    //console.log(getRoute, " : test");


    let form = $('<form>')
    .attr({
      'action': getRoute,
      'method': 'POST'
    });

    // CSRFトークンを含むhidden要素を生成
    const csrfInput = $('<input>', {
      'type': 'hidden',
      'name': '_token',
      'value': csrfToken
    });

    let deleteId = $('<input>')
    .attr({
      'type': 'hidden',
      'value': id,
      'class': 'deleteId',
      'name': 'productId'
    });

    let delBtn = $('<input>')
    .attr({
      'class': 'delBtn',
      'type': 'submit',
      'value': '削除'
    });


    //let buttons = $('<button>').text('詳細表示')
    let attribute = $('<td>').attr({
      'class': 'button-items'
      }).append(
        $('<button>').text('詳細表示')
        .attr({
          'type': 'button', // クラス属性を追加
          //'id': 'infoBtn', // data-id属性を追加
          'class': 'btn btn-primary infoBtn', // data-type属性を追加
          'data-bs-toggle': 'modal',
          'data-bs-target': '#detail-modal'
      }),
      form.append(csrfInput,deleteId,delBtn));
      

    let image = $('<td>').append($('<img>').attr('src', img_path));

    let newRow = $('<tr>').attr({'class': 'tableItems','data-index': id}).append(
      $('<td>').attr({'class': 'productsId'}).text(id),
      image,
      $('<td>').attr({'class': 'product_name'}).text(product_name),
      $('<td>').attr({'class': 'price'}).text(price),
      $('<td>').attr({'class': 'stock'}).text(stock),
      $('<td>').attr({'class': 'company_name','data-company_id': company_id}).text(company_name),
      attribute
    );

    
    $('tbody').append(newRow);
    //$('.button-items').append($('<button>').text('削除'));
  }) 
}
//ここまでテーブルリスト作成関数


async function tableList(){

  try{

    const response = await fetch("ajax_index");
    const data = await response.json();
    
    console.log("data",data);

    arrayData.push(data);
    //arrayDataCopy.push(data);
    
    // データをコピーして arrayDataCopy に代入
    arrayDataCopy = copyData(arrayData);

    console.log("配列データ",arrayData);
    console.log(arrayData[0].result);
    
    let item = data.result;

    createTableList(arrayData[0].result);

    //--------------------------------------

      //let productsId = document.getElementsByClassName('productsId');
      //let productsName = document.getElementsByClassName('productsName');
    
      // ソートを実行する関数
      

      //ソートここまで---------------------


    
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
    
      //console.log("buttons.length", buttons.length);
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
          let productImage = row.cells[1].textContent;
          let productName = row.cells[2].textContent;
          let productPrice = row.cells[3].textContent;
          let productStock = row.cells[4].textContent;
          let companyName = row.cells[5].textContent;
          //.dataset.value;から.textContentに変更（JSON）ファイルのため
          let companyId = row.cells[5].textContent;
          let productComment = row.cells[6].textContent;

          //----------------
          console.log(`conpanyId ${companyId}`);
          //----------------
          
          
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

          console.log(`デフォルト${companyNameElement.value}`);
    
          //option属性の動的idを取得（optionが含まれるid属性を取得）
          let optionElements = document.querySelectorAll("[id^='option");
          //console.log(optionElements);
          optionElements.forEach(function(optionElement){
            //optionElement.valueからoptionElement.textContentに変更（JSONファイルのため）
            if(optionElement.textContent == companyId){
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
        let back_btn = document.getElementById("back-btn");
    
        //新規登録画面のデータセット
        modal_title.textContent = "商品新規登録画面";
        edit_id.value = "idは自動で登録されます";
        edit_companyNameElement.value = default_company.textContent;
        updateBtn.textContent = "登録";
        updateBtn.name = "addBtn";
    
        back_btn.removeAttribute("data-bs-target");
        back_btn.removeAttribute("data-bs-toggle");
        back_btn.setAttribute('data-bs-dismiss', 'modal');
        
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
  } catch(errorCount) {
    console.log(errorCount);
  } finally {
    console.log("テーブルの非同期表示処理完了");
  }
}
//ここまで非同期テーブル表示


//ソート処理の関数
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
    
    if (sortOrder === 0) {
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

  console.log("変更されました");
}


async function operation(){
  let tableView = await tableList();
  // 初期表示時にソートを実行
  let sort = await sortTable();
}

operation();


// select要素が変更された時にソートを実行
document.getElementById('sortValue').addEventListener('change', sortTable);
document.getElementById('sortFormat').addEventListener('change', sortTable);


// フォームの送信イベントを設定
$('#sarchForm').submit(function(event) {
  event.preventDefault(); // デフォルトのフォーム送信をキャンセル

  // フォームの値を取得
  let textValue = $('#text').val();
  let companyValue = $('#companies').val();
  let companyId = $('#companies').text();
  let minPrice = $('#minPrice').val();
  let maxPrice = $('#maxPrice').val();
  let minStock = $('#minStock').val();
  let maxStock = $('#maxStock').val();

  // 取得した値を非同期処理に渡す
  searchOperation(
    textValue,
    companyValue,
    minPrice,
    maxPrice,
    minStock,
    maxStock);
});

// 非同期処理を行う関数
function searchOperation(
  textValue,
  companyValue,
  minPrice,
  maxPrice,
  minStock,
  maxStock) {
  // ここで非同期処理を実行する
  // 例えば、fetch() などを使用してサーバーにデータを送信し、結果を取得するなど
  
  console.log("companyValue",companyValue);

  // テーブルの各行をループして、条件に基づいて列を表示/非表示にする
  $("#item-list__table tbody tr").each(function() {
    let rowProductName = ($(this).find(".product_name").text());
    let rowCompanyName = ($(this).find(".company_name").text());
    let rowCompanyId = ($(this).find(".company_name").data("company_id"));
    let rowPrice = parseInt($(this).find(".price").text());
    let rowStock = parseInt($(this).find(".stock").text());
    console.log(rowProductName) // 行内のminPriceの値を取得
    console.log(rowCompanyName) // 行内のminPriceの値を取得
    console.log(rowPrice) // 行内のminPriceの値を取得
    console.log(rowStock) // 行内のminPriceの値を取得
    console.log(rowCompanyId);
    
    //console.log($(this).val());

    let productNameSearch = rowProductName.includes(textValue) || textValue === "";
    let companyNameSearch = rowCompanyId == companyValue || companyValue == "会社名" || companyValue == "未選択";
    let minPriceSearch = isNaN(minPrice) || rowPrice >= minPrice || minPrice ==="";
    let maxPriceSearch = isNaN(maxPrice) || rowPrice <= maxPrice || maxPrice ==="";
    let minStockSearch = isNaN(minStock) || rowStock >= minStock || minStock ==="";
    let maxStockSearch = isNaN(maxStock) || rowStock <= maxStock || maxStock ==="";

    console.log("productNameSearch:", productNameSearch);
    console.log("companyNameSearch:", companyNameSearch);
    console.log("minPriceSearch:", minPriceSearch);
    console.log("maxPriceSearch:", maxPriceSearch);
    console.log("minStockSearch:", minStockSearch);
    console.log("maxStockearch:", maxStockSearch);

    if ((productNameSearch && companyNameSearch) && (minPriceSearch && maxPriceSearch) && (minStockSearch && maxStockSearch)) {
      $(this).show(); // 検索条件に合致する場合は行を表示
    } else {
      $(this).hide(); // 検索条件に合致しない場合は行を非表示
    }
  });

}