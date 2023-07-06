@extends('layouts.app')
@section('stylesheet')
    <link rel="stylesheet" href="../resources/css/sarch_index.css">
@endsection

@section('content')
    <div class="title">
        <h1><a href="{{route('index')}}">商品一覧画面</a></h1>
    </div>

    <div class="search-container">
        <form action="" method="GET">
            <div class="search-container__title">
                <h2>検索フォーム</h2>
            </div>
            <div class="search-container__form">
                <input type="text" placeholder="検索キーワード" name="keyword" id="text" class="text">
                <select name="companies" id="companies">™
                    <option hidden>会社名</option>
                    @foreach($companies as $company)
                        <option value="{{$company->company_name}}">{{$company->company_name}}</option>
                    @endforeach
                </select>
                <input type="submit" value="検索" class="search-container__btn">
            </div>
        </form>
    </div>

    <div class="list-container">
        <button class="create-btn" id="create-btn" data-bs-toggle="modal" data-bs-target="#edit-modal">新規登録</button>


        <div class="item-list">
            <table class="item-list__table" id="item-list__table">
                <tr>
                    <th class="item-list__table--id">ID</th>
                    <th class="item-list__table--image">商品画像</th>
                    <th class="item-list__table--name">商品名</th>
                    <th class="item-list__table--price">価格</th>
                    <th class="item-list__table--stock">在庫数</th>
                    <th>メーカー名</th>
                    <th class="item-list__table--btn">
                        <!--詳細表示-->
                        <!--削除-->
                    </th>
                </tr>

                @foreach ($products as $product)

                    <tr>
                        <td id="productId" class="item-list__table--id">{{ $product -> id }}</td>
                        <td id="productImage" class="item-list__table--image"><!--<img src="{{ $product -> img_path }}"/>--></td>
                        <td id="productName" class="item-list__table--name">{{ $product -> product_name }}</td>
                        <td id="productPrice" class="item-list__table--price">{{ $product -> price }}</td>
                        <td id="productStock" class="item-list__table--stock">{{ $product -> stock }}</td>
                        <td id="companyName" class="item-list__company--name">{{ $product -> company_name }}</td>
                        <td id="productComment" class="item-list__comment">{{ $product -> comment }}</td>
                        <td class="item-list__table--btn">

                            <!--<button>詳細表示</button>-->
                            <!-- Button trigger modal -->
                            <button type="button" id="infoBtn" class="btn btn-primary infoBtn" data-bs-toggle="modal" data-bs-target="#detail-modal">
                                詳細表示
                            </button>


                            <button class="delBtn">削除</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!--Modal-->
    <div class="modal fade detail-modal" id="detail-modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">商品情報詳細画面</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="left-item">
                            <div class="item id-label modal-label">
                                <label id="idLabel">id</label><br>
                                <input type="text" value="id" id="product-id" readonly>
                            </div>
                            <div class="item product-label modal-label">
                                <label>商品名</label><br>
                                <input type="text" value="商品名" id="product-name" readonly>
                            </div>
                            <div class="item company-label modal-label">
                                <label>メーカー</label><br>
                                <input type="text" value="メーカー" id="company-name" readonly>
                            </div>
                            <div class="item price-label modal-label">
                                <label>価格</label><br>
                                <input type="text" value="価格" id="product-price" readonly>
                            </div>
                            <div class="item stock-label modal-label">
															<label>在庫数</label><br>
															<input type="text" value="在庫数" id="product-stock" readonly>
														</div>
														<label for="">id</label>
														<p>333</p>
														<label for="">商品名</label>
														<p>レモンティー</p>
														<label for="">メーカー</label>
														<p>TNG</p>
														<label for="">価格</label>
														<p>33333</p>
														<label for="">在庫数</label>
														<p>11</p>
													</div>

													<div class="right-item">
														<div class="item image-label modal-label">
															<label>画像</label><br>
															<img src="" alt="" id="product-image">
                            </div>
                            <div class="item comment-label modal-label">
															<label>コメント </label><br>
															<textarea name="" id="product-comment" readonly></textarea>
                            </div>
														<label for="">画像</label>
														<p>レモンティー</p>
														<label for="">コメント</label>
														<p>レモンティー</p>
                        </div>
                    </form>




										<table>
											<tr>
												<th>id</th>
												<td></td>
											</tr>
											<tr>
												<th>商品名</th>
												<td><input type="text" value="商品名" id="product-name" readonly></td>
											</tr>
											<tr>
												<th>メーカー</th>
												<td>メーカー</td>
											</tr>
											<tr>
												<th>価格</th>
												<td>価格</td>
											</tr>
											<tr>
												<th>在庫数</th>
												<td>在庫数</td>
											</tr>
										</table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="backBtn" data-bs-dismiss="modal">戻る</button>
                    <button type="button" class="btn btn-primary" data-bs-target="#edit-modal" data-bs-toggle="modal" data-bs-dismiss="modal" id="backBtn">
                      編集
                    </button>
                </div>
                <!--<div class="modal-footer">
                  <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
                </div>-->
            </div>
        </div>
    </div>

    <!--２ページ目-->
    <div class="modal fade edit-modal" id="edit-modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">商品情報編集画面</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="{{route('update')}}" method="POST">
                        <div class="left-item">
                            @csrf
                            <div class="item id-label modal-label">
                                <label id="idLabel">id</label><br>
                                <input type="text" value="id" id="edit-id" name="productId" readonly>
                            </div>
                            <div class="item product-label modal-label">
                                <label>商品名</label><br>
                                <input type="text" value="" placeholder="商品名" id="edit-productName" name="productName">
                            </div>
                            <div class="item company-label modal-label">

                                <label>メーカー名</label><br>
                                <select id="edit-companyName" name="companyId">
                                    <option hidden>メーカー名を選択</option>
																		@php
																			$count = 1;
																		@endphp
                                    @foreach($companies as $company)
																		
                                        <option value="{{$company->id}}" placeholder="メーカー名" id="option{{$count++}}"
																								>{{$company->company_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="item price-label modal-label">
                                <label>価格</label><br>
                                <input type="text" placeholder="価格" value="" id="edit-productPrice" name="price">
                            </div>
                            <div class="item stock-label modal-label">
                                <label>在庫数</label><br>
                                <input type="text" placeholder="在庫数" value="" id="edit-productStock" name="stock">
                            </div>
                        </div>
                        <div class="right-item">
                            <div class="item image-label modal-label">
                                <label>画像</label><br>
                                <img src="" alt="" id="product-image">
                            </div>
                            <div class="item comment-label modal-label">
                                <label>コメント </label><br>
                                <textarea id="edit-productComment" name="comment" placeholder="コメント入力欄" value=""></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="updateBtn" name="updateBtn">更新</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-target="#detail-modal" data-bs-toggle="modal" data-bs-dismiss="modal" id="backBtn">
                        戻る
                    </button>
                </div>
                <!--</form>-->
            </div>
        </div>
    </div>
    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>
@endsection
@section('scripts')
    <script src="{{ asset('../resources/js/main.js') }}"></script>
@endsection


<!-- Modal
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">商品情報詳細画面</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="left-item">
					<form action="">
						<div class="item id-label modal-label">
							<label id="idLabel">id</label><br>
							<input type="text" value="id" id="product-id">
						</div>
						<div class="item product-label modal-label">
							<label>商品名</label><br>
							<input type="text" value="商品名" id="product-name">
						</div>
						<div class="item company-label modal-label">
							<label>メーカー</label><br>
							<input type="text" value="メーカー" id="company-name">
						</div>
						<div class="item price-label modal-label">
							<label>価格</label><br>
							<input type="text" value="価格" id="product-price">
						</div>
						<div class="item stock-label modal-label">
							<label>在庫数</label><br>
							<input type="text" value="在庫数" id="product-stock">
						</div>
					</div>
					<div class="right-item">
						<div class="item image-label modal-label">
							<label>画像</label><br>
							<img src="" alt="" id="product-image">
						</div>
						<div class="item comment-label modal-label">
							<label>コメント </label><br>
							<textarea name="" id="product-comment"></textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">戻る</button>
				<button type="button" class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-dismiss="modal" id="backBtn">編集</button>
			</div>
		</div>
	</div>

	//２ページ目
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Hide this modal and show the first with the button below.
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
      </div>
    </div>
  </div>
</div>
</div> -->

