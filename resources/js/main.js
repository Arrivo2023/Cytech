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
  
  /*let count = 1;
  let optionId = "option" + count;
  let edit_companyNameElement = document.getElementById(optionId);
  
  if (edit_companyNameElement) {
    // 要素が存在する場合の処理
    // ここで取得した要素に対して必要な操作を行います
    console.log("要素が存在します"+optionId); // 例: 要素をコンソールに出力
    
  } else {
    // 要素が存在しない場合の処理
    console.log("要素が存在しません");
  }*/
  
  
  
  
  let edit_productPriceElement = document.getElementById("edit-productPrice");
  let edit_productStockElement = document.getElementById("edit-productStock");
  let edit_productImageElement = document.getElementById("edit-productComment");
  let edit_productCommentElement = document.getElementById("edit-productComment");
  
  let editForm = document.getElementById("editForm");
  let route = editForm.getAttribute("data-route");
  let updateBtn = document.getElementById("updateBtn");

  let count = 0;
  
  // 各ボタンにクリックイベントを追加
  for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function() {
      
      //新規登録クリックで変更した値を再セット
      let modal_title = document.getElementById("modal-title");
      modal_title.textContent = "商品情報編集画面";
      updateBtn.textContent = "更新";

      //新規登録クリックで変更した値を再セット
      
      if(count == 1){
        editForm.action=route;
        let action = editForm.getAttribute("action");
        let dataRoute = editForm.getAttribute("data-route");

        editForm.setAttribute("action", dataRoute);
        editForm.setAttribute("data-route", action);

        console.log("元のカウントは　"+count+"　です");
        count = 0;
        console.log("変更後のカウントは　"+count+"　です");
      }else{
        console.log("元のカウントは　"+count+"　です");
      }
      
      // 商品の詳細データを取得
      // ボタンの親要素の親要素である行を取得
      let row = this.parentNode.parentNode;
      
      //取得した行の各sellを変数に代入
      let productId = row.cells[0].textContent;
      let productImage = row.cells[1].textContent;
      let productName = row.cells[2].textContent;
      let productPrice = row.cells[3].textContent;
      let productStock = row.cells[4].textContent;
      let companyName = row.cells[5].textContent;
      let companyId = row.cells[5].dataset.value;
      let productComment = row.cells[6].textContent;
      
      // 詳細画面にデータセット
      productIdElement.textContent = productId;
      productNameElement.textContent = productName;
      companyNameElement.textContent = companyName;
      productPriceElement.textContent = productPrice;
      productStockElement.textContent = productStock;
      productImageElement.textContent = productImage;
      productCommentElement.textContent = productComment;
      
      
      
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
        console.log(optionElement);
        console.log(companyId);
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
      //edit_productIdElement,
      edit_productNameElement,
      //edit_companyNameElement,
      edit_productPriceElement,
      edit_productStockElement,
      edit_productImageElement,
      edit_productCommentElement
    ];


    if(count == 0){
      editForm.action=route;
      let action = editForm.getAttribute("action");
      let dataRoute = editForm.getAttribute("data-route");

      editForm.setAttribute("action", dataRoute);
      editForm.setAttribute("data-route", action);
      console.log("元のカウントは　"+count+"　です");
      count = 1;
      console.log("変更後のカウントは　"+count+"　です");
    }else{
      console.log("元のカウントは　"+count+"　です");
    }
    
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
    //editForm.action = "{{route('create')}}";
    
  });
  
  let backBtn = document.getElementById("backBtn");
  
    
 

});