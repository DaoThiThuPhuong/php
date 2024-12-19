
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
            <h2 class="mb-4">Danh sách khách hàng</h2>
            
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
                        <td>{{++$index}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->created_at}}</td>
                        @if ($item->delUser==1)
                        <td><a href="/staff/user/restore/{{$item->id}}" class="btn btn-success">Mở Khóa</a></td>
                        @else
                        <td><a href="/staff/user/lock/{{$item->id}}" class="btn btn-danger">Khóa</a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    @include('staff/includes/footer')
  
