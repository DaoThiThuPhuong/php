
@include('admin/includes/header')
    <!-- Main Content -->
    <div class="main-content mt-5">
        <form action="" method="post">
            @csrf
        <div class="container mt-5">
            <div class="form-container">
                <h2 class="mb-4 text-center">Thông tin sản phẩm</h2>
        
                <!-- Họ và tên -->
                <div class="mb-3">
                    <label for="codeProduct" class="form-label">Mã Sản Phẩm :</label>
                    <input value="{{$product_by_id->codeProduct}}" required type="text" class="form-control" name="codeProduct" placeholder="Nhập mã sản phẩm">
                </div>
        
                <!-- Email -->
                <div class="mb-3">
                    <label for="material" class="form-label">Chất liệu :</label>
                    <input value="{{$product_by_id->material}}" required type="text" class="form-control" name="material" placeholder="Chất liệu sản phẩm">
                </div>
        
                <!-- Số điện thoại -->
                <div class="mb-3">
                    <label for="price" class="form-label">Giá :</label>
                    <input value="{{$product_by_id->price}}" required type="number" min="0" step="1" class="form-control" name="price" placeholder="Giá sản phẩm">
                </div>
        
                <!-- Mật khẩu -->
                <div class="mb-3">
                    <label for="nameProduct" class="form-label">Tên sản phẩm :</label>
                    <input value="{{$product_by_id->nameProduct}}" required type="text" class="form-control" name="nameProduct" placeholder="Tên sản phẩm">
                </div>
        
                <!-- Xác nhận mật khẩu -->
                <div class="mb-3">
                    <label for="mainImage" class="form-label">Ảnh bìa :</label>
                    <br>
                    <img width="20%" src="{{$product_by_id->mainImage}}" alt="">
                    <input value="{{$product_by_id->mainImage}}" required type="text" class="form-control" name="mainImage" placeholder="Link ảnh bìa">
                </div>
        
                <!-- Địa chỉ -->
                <div class="mb-3">
                    <label for="descriptionProduct" class="form-label">Mô tả :</label>
                    <textarea class="form-control" name="descriptionProduct" rows="3" placeholder="Mô tả sản phẩm">{{$product_by_id->descriptionProduct}}</textarea>
                </div>
        
                <!-- Giới tính -->
                <div class="mb-3">
                    <label class="form-label">Danh mục</label>
                    <select class="form-control" name="category_id" id="" required>
                        @foreach ($category_all as $item)
                        @if ($item->id==$product_by_id->category_id)
                        <option value="{{$item->id}}" selected>{{$item->nameCategory}}</option>
                        @else
                        <option value="{{$item->id}}">{{$item->nameCategory}}</option>
                        @endif
                        @endforeach
                    </select>
                    
                </div>
        
                <!-- Nút gửi -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>


    <div class="container mt-5">
        <h2 class="mb-4">Danh sách màu của kính</h2>
        <label for="">Thêm màu:</label>
            <form action="/admin/product/{{$product_by_id->id}}/color" method="post">
                @csrf
                <input class="form-control mb-2 mt-2 w-25" type="text" value="" placeholder="Tên màu" required name="nameColor"/>
            <input class="form-control mb-2 mt-2 w-25" type="text" value="" placeholder="Mã màu" required name="codeColor"/>
            <input class="form-control mb-2 mt-2 w-25" type="number" min="1" step="1" value="" placeholder="Số lượng" required name="quantity"/>
            <button class="btn btn-primary mb-5" type="submit">Thêm</button>
            </form>
        <table class="table table-bordered table-striped table-custom">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên màu</th>
                    <th>Mã màu</th>
                    <th>Số Lượng</th>
                    <th>Lưu</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_color as $index => $item)
                <form action="/admin/color/{{$item->id}}" method="post">
                    @csrf
                <tr>
                    <td>{{++$index}}</td>
                    <td><input type="text" value="{{$item->nameColor}}" name="nameColor" required></td>
                    <td><input type="text" value="{{$item->codeColor}}" name="codeColor" required></td>
                    <td><input type="number" min="1" step="1" value="{{$item->quantity}}" name="quantity" required></td>
                    <td><button class="btn btn-primary" type="submit">Lưu</button></td>
                    @if ($item->delColor==1)
                    <td><a href="/admin/color/restore/{{$item->id}}" class="btn btn-success">Mở Khóa</a></td>
                    @else
                    <td><a href="/admin/color/lock/{{$item->id}}" class="btn btn-danger">Khóa</a></td>
                    @endif
                </tr>
            </form>
                @endforeach
            </tbody>
        </table>
</div>

<div class="container mt-5">
    <h2 class="mb-4">Danh sách ảnh của kính</h2>
    <label for="">Thêm ảnh:</label>
        <form action="/admin/product/{{$product_by_id->id}}/image" method="post">
            @csrf
            <input class="form-control mb-2 mt-2 w-25" type="text" value="" placeholder="Link ảnh" required name="linkImage"/>
        <button class="btn btn-primary mb-5" type="submit">Thêm</button>
        </form>
    <table class="table table-bordered table-striped table-custom">
        <thead>
            <tr>
                <th>#</th>
                <th class="col-2">Ảnh</th>
                <th class="">Link ảnh</th>
                <th class="">Lưu</th>
                <th class="">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product_image as $index => $item)
            <form action="/admin/image/{{$item->id}}" method="post">
                @csrf
            <tr>
                <td>{{++$index}}</td>
                <td><img src="{{$item->linkImage}}" width="20%" alt="" srcset=""></td>
                <td><input class="w-100" type="text" value="{{$item->linkImage}}" name="linkImage" required></td>
                <td><button class="btn btn-primary" type="submit">Lưu</button></td>
                <td><a href="/admin/image/delete/{{$item->id}}" class="btn btn-danger">Xóa vĩnh viễn</a></td>
            </tr>
        </form>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
    @include('admin/includes/footer')
  
