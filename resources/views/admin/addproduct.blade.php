
@include('admin/includes/header')
    <!-- Main Content -->
    <div class="main-content mt-5">
        <form action="/admin/product/add" method="post">
            @csrf
        <div class="container mt-5">
            <div class="form-container">
                <h2 class="mb-4 text-center">Thêm sản phẩm</h2>
        
                <!-- Họ và tên -->
                <div class="mb-3">
                    <label for="codeProduct" class="form-label">Mã Sản Phẩm :</label>
                    <input value="" required type="text" class="form-control" name="codeProduct" placeholder="Nhập mã sản phẩm">
                </div>
        
                <!-- Email -->
                <div class="mb-3">
                    <label for="material" class="form-label">Chất liệu :</label>
                    <input value="" required type="text" class="form-control" name="material" placeholder="Chất liệu sản phẩm">
                </div>
        
                <!-- Số điện thoại -->
                <div class="mb-3">
                    <label for="price" class="form-label">Giá :</label>
                    <input value="" required type="number" min="0" step="1" class="form-control" name="price" placeholder="Giá sản phẩm">
                </div>
        
                <!-- Mật khẩu -->
                <div class="mb-3">
                    <label for="nameProduct" class="form-label">Tên sản phẩm :</label>
                    <input value="" required type="text" class="form-control" name="nameProduct" placeholder="Tên sản phẩm">
                </div>
        
                <!-- Xác nhận mật khẩu -->
                <div class="mb-3">
                    <label for="mainImage" class="form-label">Ảnh bìa :</label>
                    <br>
                    <input value="" required type="text" class="form-control" name="mainImage" placeholder="Link ảnh bìa">
                </div>
        
                <!-- Địa chỉ -->
                <div class="mb-3">
                    <label for="descriptionProduct" class="form-label">Mô tả :</label>
                    <textarea class="form-control" name="descriptionProduct" rows="3" placeholder="Mô tả sản phẩm"></textarea>
                </div>
        
                <!-- Giới tính -->
                <div class="mb-3">
                    <label class="form-label">Danh mục</label>
                    <select class="form-control" name="category_id" id="" required>
                        @foreach ($category_all as $item)
                        <option value="{{$item->id}}">{{$item->nameCategory}}</option>
                        @endforeach
                    </select>
                    
                </div>
        
                <!-- Nút gửi -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </div>
    </form>
    </div>
    @include('admin/includes/footer')
  
