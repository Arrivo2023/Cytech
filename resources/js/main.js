//import { forEach, set } from "lodash";
//import { document } from "postcss";

document.addEventListener("DOMContentLoaded", function() {
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
      //edit_companyNameElement.value = companyName;
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
    let originalBtn = updateBtn;
    
    
    //placeholder表示用に値セット
    let edit_values = [
      edit_productNameElement,
      edit_productPriceElement,
      edit_productStockElement,
      edit_productImageElement,
      edit_productCommentElement
    ];


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
    
    //商品編集画面のタイトル・id・メーカーを修正
    modal_title.textContent = "商品新規登録画面";
    edit_id.value = "idは自動で登録されます";
    edit_companyNameElement.value = default_company.textContent;
    
    //各値を初期化しplaceholderを表示
    edit_values.forEach((edit_value)=>{
      edit_value.value = "";
      //console.log(edit_value.value);
    });
    
    //更新ボタンを登録ボタンに変更
    updateBtn.textContent = "登録";
    updateBtn.name = "addBtn";
    
  });
  
  //let backBtn = document.getElementById("backBtn");
});