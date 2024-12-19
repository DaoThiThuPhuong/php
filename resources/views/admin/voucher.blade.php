
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
            <h2 class="mb-4">Danh sách voucher</h2>

            <label for="">Thêm voucher:</label>
            <form action="" method="post">
                @csrf
            <input class="form-control mb-2 mt-2 w-25" type="text" value="" placeholder="Mã voucher" required name="nameVoucher"/>
            <input class="form-control mb-2 mt-2 w-25" type="number" min="1000" value="" placeholder="Số tiền được giảm" required name="discount"/>
            <button class="btn btn-primary mb-5" type="submit">Thêm</button>
            </form>

            <table class="table table-bordered table-striped table-custom">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã Voucher</th>
                        <th>Số tiền giảm</th>
                        <th>Lưu</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($voucher_all as $index => $item)
                    <form action="/admin/voucher/{{$item->id}}" method="post">
                        @csrf
                    <tr>
                        <td>{{++$index}}</td>
                        <td><input class="form-control" type="text" value="{{$item->nameVoucher}}" name="nameVoucher" required></td>
                        <td><input class="form-control" type="number"  min="1000" value="{{$item->discount}}" name="discount" required></td>
                        <td><button class="btn btn-primary" type="submit">Lưu</button></td>
                        @if ($item->delVoucher==1)
                        <td><a href="/admin/voucher/restore/{{$item->id}}" class="btn btn-success">Khôi Phục</a></td>
                        @else
                        <td><a href="/admin/voucher/lock/{{$item->id}}" class="btn btn-danger">Xóa</a></td>
                        @endif
                    </tr>
                </form>
                    @endforeach
                </tbody>
            </table>
    </div>
    @include('admin/includes/footer')

