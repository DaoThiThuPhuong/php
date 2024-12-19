
@include('staff/includes/header')
<style>
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
    <!-- Main Content -->
    <div class="main-content mt-5">
        <div class="container mt-5">
            <h2 class="mb-4">Quản lý đơn hàng</h2>
        
            <!-- Tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($status_order as $index => $item)
                    @if ($index==0)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tab-{{$item->id}}-tab" data-bs-toggle="tab" data-bs-target="#tab-{{$item->id}}" type="button" role="tab" aria-controls="tab-{{$item->id}}" aria-selected="true">
                            {{$item->nameStatus}}
                        </button>
                    </li>
                    @else
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab-{{$item->id}}-tab" data-bs-toggle="tab" data-bs-target="#tab-{{$item->id}}" type="button" role="tab" aria-controls="tab-{{$item->id}}" aria-selected="false">
                            {{$item->nameStatus}}
                        </button>
                    </li>
                    @endif
                @endforeach
            </ul>
        
            <!-- Tab Content -->
            <div class="tab-content mt-4" id="myTabContent">
                <!-- Tab 1 -->

                @foreach ($status_order as $index => $item)
                @if ($index==0)
                <div class="tab-pane fade show active" id="tab-{{$item->id}}" role="tabpanel" aria-labelledby="tab-{{$item->id}}-tab">
                    <h4> {{$item->nameStatus}}</h4>
                        @csrf
                    <table class="table table-bordered table-striped table-custom">
                        <thead>
                            <tr>
                                <th>Mã Hóa Đơn</th>
                                <th>Tên Khách Hàng</th>
                                <th>Ngày Mua</th>
                                <th>Tổng Đơn</th>
                                <th>Phương Thức Thanh Toán</th>
                                <th>Mã giảm giá được áp dụng</th>
                                <th>Số tiền được giảm</th>
                                <th>Chuyển trạng thái</th>
                                <th>Lưu</th>
                                <th>Xem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item1)
                            @if ($item1->status==$item->id)
                    <form action="/staff/order/{{$item1->id}}" method="POST">
                        @csrf
                            <tr>
                                <td>{{$item1->id}}</td>
                                <td>{{$item1->name}}</td>
                                <td>{{$item1->dateOrder}}</td>
                                <td>{{$item1->totalOrder}}</td>
                                <td>{{$item1->nameMethod}}</td>
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
                                    <select class="form-control" name="status" id="">
                                        @foreach ($status_order as $item2)
                                        <option value="{{$item2->id}}">{{$item2->nameStatus}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary mt-2">Lưu</button>
                                </td>
                                <td>
                                    <a href="/staff/order/{{$item1->id}}">xem</a>
                                </td>
                            </tr>
                </form>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="tab-pane fade show" id="tab-{{$item->id}}" role="tabpanel" aria-labelledby="tab-{{$item->id}}-tab">
                    <h4> {{$item->nameStatus}}</h4>
                        @csrf
                    <table class="table table-bordered table-striped table-custom">
                        <thead>
                            <tr>
                                <th>Mã Hóa Đơn</th>
                                <th>Tên Khách Hàng</th>
                                <th>Ngày Mua</th>
                                <th>Tổng Đơn</th>
                                <th>Phương Thức Thanh Toán</th>
                                <th>Mã giảm giá được áp dụng</th>
                                <th>Số tiền được giảm</th>
                                <th>Chuyển trạng thái</th>
                                <th>Lưu</th>
                                <th>Xem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item1)
                            @if ($item1->status==$item->id)
                            <form action="/staff/order/{{$item1->id}}" method="POST">
                                @csrf
                                <tr>
                                    <td>{{$item1->id}}</td>
                                    <td>{{$item1->name}}</td>
                                    <td>{{$item1->dateOrder}}</td>
                                    <td>{{$item1->totalOrder}}</td>
                                    <td>{{$item1->nameMethod}}</td>
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
                                        <select class="form-control" name="status" id="">
                                            @foreach ($status_order as $item2)
                                            <option value="{{$item2->id}}">{{$item2->nameStatus}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary mt-2">Lưu</button>
                                    </td>
                                    <td>
                                        <a href="/staff/order/{{$item1->id}}">xem</a>
                                    </td>
                                </tr>
                    </form>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            @endforeach
            </div>
        </div>
    </div>
    @include('staff/includes/footer')
  
