
@include('admin/includes/header')
<style>
    .table-custom {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .table-custom th, .table-custom td {
        text-align: center;
    }
    .table-custom th {
        background-color: #007bff;
        color: white;
    }
    .table-custom tbody tr:hover {
        background-color: #f1f1f1;
    }
    .table-pagination {
        justify-content: center;
    }
</style>
    <!-- Main Content -->
    <div class="main-content mt-5">
        <div class="container mt-5">
            <h2 class="mb-4">Danh sách sản phẩm</h2>

            <a class="btn btn-primary mb-5" href="/admin/product/add" type="submit">Thêm sản phẩm mới</a>

            <table class="table table-bordered table-striped table-custom">
                <thead>
                    <tr>
                        <th class="">#</th>
                        <th class="">Mã Sản Phẩm</th>
                        <th class="">Tên Sản Phẩm</th>
                        <th class="col-2">Ảnh Sản Phẩm</th>
                        <th class="">Danh Mục</th>
                        <th class="">Hành động</th>
                        <th class="">Xem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product_all as $index => $item)
                    <form action="/admin/product/{{$item->id}}" method="post">
                        @csrf
                    <tr>
                        <td>{{++$index}}</td>
                        <td>{{$item->codeProduct}}</td>
                        <td>{{$item->nameProduct}}</td>
                        <td><img width="20%" src="{{$item->mainImage}}" alt=""></td>
                        <td>{{$item->nameCategory}}</td>
                        @if ($item->delProduct==1)
                        <td><a href="/admin/product/restore/{{$item->id}}" class="btn btn-success">Khôi Phục</a></td>
                        @else
                        <td><a href="/admin/product/lock/{{$item->id}}" class="btn btn-danger">Xóa</a></td>
                        @endif
                        <td><a href="/admin/product/{{$item->id}}" class="btn btn-primary">Xem</a></td>
                    </tr>
                </form>
                    @endforeach
                </tbody>
            </table>
    </div>
    @include('admin/includes/footer')
  
