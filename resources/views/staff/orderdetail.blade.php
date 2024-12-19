
@include('staff/includes/header')
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
            <h2 class="mb-4">Chi tiết đơn hàng số {{$id}}</h2>
            
            <table class="table">
                <thead>
                    <tr class="cart-header">
                        <th class="" scope="col">#</th>
                        <th class="" scope="col">Mã Sản phẩm</th>
                        <th class="col-2" scope="col">Ảnh Sản phẩm</th>
                        <th class="" scope="col">Tên Sản phẩm</th>
                        <th class="" scope="col">Đơn Giá</th>
                        <th class="" scope="col">Màu</th>
                        <th class="" scope="col">Số Lượng</th>
                        <th class="" scope="col">Tổng</th>
                    </tr>
                </thead>
                <tbody>
            @foreach ($order_details as $index => $item)
            <tr>
                <th scope="row">{{++$index}}</th>
                <td>{{$item->codeProduct}}</td>
                <td><img src="{{$item->mainImage}}" width="100%" alt="" srcset=""></td>
                <td>{{$item->nameProduct}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->nameColor}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->total}} VNĐ</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @include('staff/includes/footer')
  
