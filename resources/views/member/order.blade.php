@include('member/includes/header')
    <style>
        body {
            background-color: #e0f7fa; /* Xanh da trời nhạt */
            font-family: Arial, sans-serif;
        }
        .table-custom {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .table-custom th {
        background-color: #007bff;
        color: white;
        text-align: center;
    }
    .table-custom td {
        text-align: center;
    }        
    </style>
    <div class="main-content mt-5">
        <div class="container mt-5">
            <h2 class="mb-4">Quản lý đơn hàng</h2>
        
            <table class="table table-bordered table-striped table-custom">
                <thead>
                    <tr>
                        <th>Mã Hóa Đơn</th>
                        <th>Tên Khách Hàng</th>
                        <th>Ngày Mua</th>
                        <th>Tổng Đơn (Đã được tính giảm giá nếu có)</th>
                        <th>Phương Thức Thanh Toán</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Mã giảm giá được áp dụng</th>
                        <th>Số tiền được giảm</th>
                        <th>Xem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item1)
                    <tr>
                        <td>{{$item1->id}}</td>
                        <td>{{$item1->name}}</td>
                        <td>{{$item1->dateOrder}}</td>
                        <td>{{$item1->totalOrder}}</td>
                        <td>{{$item1->nameMethod}}</td>
                        <td>{{$item1->nameStatus}}</td>
                        @if ($item1->nameVoucher)
                        <td>{{$item1->nameVoucher}}</td>
                            @else
                        <td>Không có</td>
                        @endif
                        @if ($item1->discount)
                        <td>{{$item1->discount}}</td>
                            @else
                        <td>Không có</td>
                        @endif
                        <td>
                            <a href="/order/{{$item1->id}}">xem</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@include('member/includes/footer')
