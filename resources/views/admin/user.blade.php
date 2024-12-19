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
</style>

<div class="main-content mt-5">
    <div class="container mt-5">
        <h2 class="mb-4">Danh sách khách hàng</h2>

        <!-- Form tìm kiếm -->
        <form method="GET" action="{{ url('/admin/user') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Nhập tên khách hàng..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>

        <!-- Bảng danh sách khách hàng -->
        @if (count($user_all) > 0)
            <table class="table table-bordered table-striped table-custom">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Người Dùng</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Ngày đăng ký</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_all as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                @if ($item->delUser == 1)
                                    <a href="/admin/user/restore/{{ $item->id }}" class="btn btn-success">Mở Khóa</a>
                                @else
                                    <a href="/admin/user/lock/{{ $item->id }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn khóa người dùng này không?')">Khóa</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info text-center">
                Không tìm thấy khách hàng nào.
            </div>
        @endif
    </div>
</div>

@include('admin/includes/footer')
