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
  
  // 各ボタンにクリックイベントを追加
  for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", function() {

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
      let productComment = row.cells[6].textContent;
      
      // 詳細画面にデータセット
      productIdElement.value = productId;
      productNameElement.value = productName;
      companyNameElement.value = companyName;
      productPriceElement.value = productPrice;
      productStockElement.value = productStock;
      productImageElement.value = productImage;
      productCommentElement.value = productComment;
      
      //編集画面にデータセット
      edit_productIdElement.value = productId;
      edit_productNameElement.value = productName;
      edit_companyNameElement.value = companyName;
      edit_productPriceElement.value = productPrice;
      edit_productStockElement.value = productStock;
      edit_productImageElement.value = productImage;
      edit_productCommentElement.value = productComment;
    });
  };

  $updateBtn = document.getElementById("updateBtn");

  $updateBtn.addEventListener("click", function(){
    
  });

});