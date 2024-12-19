@include('member/includes/header')
<style>
    body {
        background-color: #e0f7fa;
        font-family: Arial, sans-serif;
    }
    .cart-container {
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .cart-header {
        font-weight: bold;
        color: #007bff;
    }
    .btn-custom {
        background-color: #007bff;
        color: #ffffff;
    }
    .btn-custom:hover {
        background-color: #0056b3;
    }
    .total-amount {
        font-size: 1.2rem;
        font-weight: bold;
        color: #28a745;
    }
</style>

<body>
<div class="container">
    <div class="cart-container">
        <h2 class="text-center mb-4">Giỏ Hàng</h2>

        <!-- Thông báo -->
        @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
        @endif

        @if (session('fail'))
        <div class="alert alert-danger text-center">
            {{ session('fail') }}
        </div>
        @endif

        <!-- Bảng Giỏ Hàng -->
        @if (count($cart) > 0)
        <table class="table table-bordered text-center">
            <thead>
                <tr class="cart-header">
                    <th>#</th>
                    <th>Mã Sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Tên Sản phẩm</th>
                    <th>Đơn Giá</th>
                    <th>Số Lượng</th>
                    <th>Tổng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $grandTotal = 0; // Biến tính tổng tiền của giỏ hàng
                @endphp

                @foreach ($cart as $index => $item)
                @php
                    // Tính tổng tiền của từng sản phẩm
                    $itemTotal = $item->quantity * $item->price;
                    $grandTotal += $itemTotal; // Cộng dồn vào tổng tiền
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->codeProduct }}</td>
                    <td><img src="{{ $item->mainImage }}" width="80"></td>
                    <td>{{ $item->nameProduct }}</td>
                    <td>{{ number_format($item->price) }} VNĐ</td>
                    <td>
                        <!-- Form cập nhật số lượng -->
                        <form action="/cart/update/{{ $item->id }}" method="POST">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control text-center w-50 mx-auto">
                            <button type="submit" class="btn btn-sm btn-primary mt-1">Cập nhật</button>
                        </form>
                    </td>
                    <td>{{ number_format($itemTotal) }} VNĐ</td>
                    <td>
                        <a href="/cart/{{ $item->id }}" class="btn btn-sm btn-danger">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Hiển Thị Tổng Tiền và Nút Thanh Toán -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="total-amount">
                Tổng Tiền: {{ number_format($grandTotal) }} VNĐ
            </div>
            <a href="/cart/checkout" class="btn btn-success btn-lg">Thanh Toán</a>
        </div>
        @else
        <h4 class="text-center text-danger">Giỏ hàng của bạn đang trống!</h4>
        @endif
    </div>
</div>
@include('member/includes/footer')
</body>
