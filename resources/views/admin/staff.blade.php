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

<div class="main-content mt-5">
    <div class="container mt-5">
        <h2 class="mb-4">Danh sách nhân viên</h2>

        <!-- Form tìm kiếm -->
        <form method="GET" action="{{ url('/admin/staff') }}" class="mb-3">
            <div class="input-group w-50">
                <input type="text" name="search" class="form-control" placeholder="Nhập tên nhân viên..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>

        <!-- Thông báo không tìm thấy -->
        @if ($notFound)
        <div class="alert alert-danger text-center">
            Không tìm thấy nhân viên với từ khóa "{{ request('search') }}"
        </div>
        @endif

        <form action="" method="post">
            @csrf
            <label for="Thêm nhân viên"> Thêm nhân viên: </label>
            <input class="form-control w-25 mt-2" type="text" placeholder="Tên nhân viên" name="name" required/>
            <input class="form-control w-25 mt-2" type="email" placeholder="Email nhân viên" name="email" required/>
            <input class="form-control w-25 mt-2" maxlength="10" type="text" placeholder="Số điện thoại" name="phone" required/>
            <input class="form-control w-25 mt-2" type="text" placeholder="Địa chỉ" name="address" required/>
            <input class="form-control w-25 mt-2" minlength="8" type="password" placeholder="Mật khẩu" name="password" required/>
            <button class="btn btn-primary mb-5 mt-2" type="submit">Thêm</button>
        </form>

        <table class="table table-bordered table-striped table-custom">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên Nhân Viên</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Ngày Đăng Ký</th>
                    <th>Hành Động</th>
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
                            <a href="{{ url('/admin/staff/restore/' . $item->id) }}" class="btn btn-success">Mở Khóa</a>
                        @else
                            <a href="{{ url('/admin/staff/lock/' . $item->id) }}" 
                               class="btn btn-danger"
                               onclick="return confirm('Bạn có chắc chắn muốn khóa nhân viên này không?')">
                               Khóa
                            </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin/includes/footer')
