@extends('layouts.app')
@section('stylesheet')
    <link rel="stylesheet" href="../resources/css/sarch_index.css">
@endsection

@section('content')
    <div class="title">
        <h1><a href="{{ route('index') }}">商品一覧画面</a></h1>
    </div>

    <div>
        <p id="testjson"></p>
    </div>
    <div>
        <p id="error"></p>
    </div>
    <select name="" class="group">
        <option hidden>選択してください</option>
        <option value="groupA">グループA</option>
        <option value="groupB">グループB</option>
        <option value="groupC">グループC</option>
    </select>
    <div>
        <ul id="member-list"></ul>
    </div>
    
    <div class="search-container">
        <form action="{{ route('sarchList') }}" method="GET">
            <div class="search-container__title">
                <h2>検索フォーム</h2>
            </div>
            <div class="search-container_form">
                <div class="search-container_main">
                    <input type="text" placeholder="検索キーワード" name="keyword" id="text" class="text">
                    <select name="companies" id="companies">™
                        <option hidden>会社名</option>
                        @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->company_name}}</option>
                        @endforeach
                    </select>                
                </div>
                <div class="search-container_sub">
                    <div class="priceValue">
                        <label for="">価格</label>
                        <input type="text" placeholder="0" name="minPrice"  class="minPrice">
                        <p>〜</p>
                        <input type="text" placeholder="0" name="maxPrice"  class="maxPrice">
                    </div>
                    <div class="stockValue">
                        <label for="">在庫</label>
                        <input type="text" placeholder="0" name="minStock" class="minStock">
                        <p>〜</p>
                        <input type="text" placeholder="0" name="maxStock" class="maxStock">
                    </div>
                    <input type="submit" value="検索" class="searchBtn">
                </div>
            </div>
        </form>
    </div>
    
    <div class="list-container">
        <button class="create-btn" id="create-btn" data-bs-toggle="modal" data-bs-target="#edit-modal">新規登録</button>
        
        <div class="sort">
            <label for="">並び替え</label>
            <select name="sortValue" id="sortValue">
                <option value="0">ID</option>
                <option value="2">商品名</option>
                <option value="3">価格</option>
                <option value="4">在庫数</option>
                <option value="5">メーカー名</option>
            </select>
            
            <select name="sortFormat" id="sortFormat">
                <option value="0">降順</option>
                <option value="1">昇順</option>
            </select>
        </div>
        
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
               
                <!--
                @foreach ($products as $product)
                
                <tr class="tableItems">
                    <td class="item-list__table--id productsId">{{ $product -> id }}</td>
                    <td class="item-list__table--image"><img src="{{ asset($product -> img_path) }}"/></td>
                    <td class="item-list__table--name productsName">{{ $product -> product_name }}</td>
                    <td class="item-list__table--price price">{{ $product -> price }}</td>
                    <td class="item-list__table--stock stock">{{ $product -> stock }}</td>
                    <td class="item-list__company--name" 
                    data-value="{{$product -> companies_id}}">{{ $product -> company_name }}</td>
                    <td id="productComment" class="item-list__comment">{{ $product -> comment }}</td>
                    <td class="item-list__table--btn">
                        
                        <!--<button>詳細表示</button>-->
                        <!-- Button trigger modal -->
                       <!-- <button type="button" id="infoBtn" class="btn btn-primary infoBtn" data-bs-toggle="modal" data-bs-target="#detail-modal">
                            詳細表示
                        </button>
                        
                        <form action="{{route('itemDelete')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $product -> id}}" class="deleteId" name="productId">
                            <input type="submit" value="削除" class="delBtn">
                        </form>
                    </td>
                </tr>
                @endforeach -->
            </table>
        </div>
    </div>
    
    <!--Modal商品詳細画面-->
    <div class="modal fade detail-modal" id="detail-modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">商品情報詳細画面</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="left-item">
                        <div class="item-ditail id-label modal-label">
                            <label id="idLabel">ID</label><br>
                            <input id="product-id" readonly>
                        </div>
                        <div class="item-ditail product-label modal-label">
                            <label>商品名</label><br>
                            <input id="product-name" readonly>
                        </div>
                        <div class="item-ditail company-label modal-label">
                            <label>メーカー</label><br>
                            <input id="company-name" readonly>
                        </div>
                        <div class="item-ditail price-label modal-label">
                            <label>価格</label><br>
                            <input id="product-price" readonly>
                        </div>
                        <div class="item-ditail stock-label modal-label">
                            <label>在庫数</label><br>
                            <input id="product-stock" class="" readonly>
                        </div>														
                    </div>
                    
                    <div class="right-item">
                        <div class="item-ditail image-label modal-label">
                            <label>画像</label><br>
                            <img src="" alt="" id="product-image" class="image-ditail">
                        </div>
                        <div class="item-ditail comment-label modal-label">
                            <label>コメント </label><br>
                            <textarea id="product-comment" readonly></textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary back-btn" data-bs-dismiss="modal">戻る</button>
                    <button type="button" class="btn btn-primary" data-bs-target="#edit-modal" data-bs-toggle="modal" data-bs-dismiss="modal" id="editBtn">編集</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--Modal商品編集・登録画面-->
    <div class="modal fade edit-modal" id="edit-modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">商品情報編集画面</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="{{route('update')}}" 
                    data-route="{{route('newRecord')}}" method="POST" enctype="multipart/form-data">
                    <div class="left-item">
                        @csrf
                        <div class="item-edit id-label modal-label">
                            <label id="idLabel">ID</label><br>
                            <input type="text" value="id" id="edit-id" name="productId" readonly>
                        </div>
                        <div class="item-edit product-label modal-label">
                            <label>商品名</label><br>
                            <input type="text" value="" placeholder="商品名" id="edit-productName" name="productName" required>
                        </div>
                        <div class="item-edit company-label modal-label">
                            <label>メーカー名</label><br>
                            <select id="edit-companyName" name="companyId" required>
                                <option id="default-company" hidden disabled></option>
                                @php
                                $count = 1;
                                @endphp
                                @foreach($companies as $company)																		
                                <option value="{{$company->id}}" placeholder="メーカー名" id="option{{$count++}}">{{$company->company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="item-edit price-label modal-label">
                            <label>価格</label><br>
                            <input type="text" placeholder="価格" value="" id="edit-productPrice" name="price" required>
                        </div>
                        <div class="item-edit stock-label modal-label">
                            <label>在庫数</label><br>
                            <input type="text" placeholder="在庫数" value="" id="edit-productStock" name="stock" required>
                        </div>
                    </div>
                    <div class="right-item">
                        <div class="item-edit image-label modal-label">
                            <label>画像</label><br>
                            <input type="file" id="product-image" class="image-edit" name="file">
                        </div>
                        <div class="item-edit comment-label modal-label">
                            <label>コメント </label><br>
                            <textarea id="edit-productComment" name="comment" placeholder="コメント入力欄" value=""></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="updateBtn" name="updateBtn">更新</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="back-btn" data-bs-target="#detail-modal" data-bs-toggle="modal">戻る</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('../resources/js/main.js') }}"></script>
<script src="{{ asset('../resources/js/api.js') }}"></script>
@endsection
