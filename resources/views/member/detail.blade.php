@include('member/includes/header')
    <style>
        .color-circle {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 5px;
            border: 1px solid #ccc;
        }

        .pink-circle {
            background-color: pink;
        }

        .black-circle {
            background-color: black;
        }

        .gray-circle {
            background-color: gray;
        }

        .brown-circle {
            background-color: rgb(97, 38, 38);
        }

        .carousel-inner img {
            width: 100%;
            border-radius: 8px;
        }

        .product-info-container {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-pink {
            background-color: pink;
            color: white;
        }

        /* Custom styles for Section 2 */
        .product-detail-container {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
        }

        .product-detail-image {
            max-width: 100%;
            border-radius: 8px;
        }

        .product-detail-content {
            margin-top: 20px;
        }

        .product-detail-content h4 {
            color: #333;
        }

        /* Styling for the active content */
        .product-detail-content.active {
            display: block;
        }

        .product-info-container {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
            border-bottom: 2px dashed #ccc;
            /* Add dashed border */
        }

        .product-detail-container {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Optional: Add some spacing between sections */
        body {
            margin: 0;
            padding: 0;
        }

        /* Style for Section 3: Featured Products */
        .container.my-5 {
            background-color: #f8f9fa;
            /* Set a background color for the section */
            padding: 30px;
        }

        h3.text-center {
            color: #ff69b4;
            /* Set heading color to pink */
        }

        .row {
            display: flex;
            justify-content: center;
        }

        /* Style for Featured Product Cards */
        .card {
            transition: transform 0.2s;
            /* Add a smooth transition effect on hover */
        }

        .card:hover {
            transform: scale(1.05);
            /* Increase size on hover */
        }

        .card-img-top {
            max-height: 350px;
            /* Set a maximum height for the product images */
        }

        .card-title {
            font-size: 1.2em;
            /* Increase font size for the product title */
            margin-bottom: 0.5em;
        }

        .card-text {
            color: #6c757d;
            /* Set a color for the text */
        }

        .card-link {
            text-decoration: none;
            /* Remove underline from links */
            color: #000000;
            /* Set link color */
        }

        .card-link:hover {
            text-decoration: underline;
            /* Underline on hover */
        }

        /* Style for Rating Stars */
        .card-text .rating-star {
            color: #ffc107;
            /* Set rating star color to yellow */
        }

        .zoom {
            overflow: hidden;
            width: 100%;
            /* Thêm thuộc tính width để điều chỉnh kích thước ban đầu của figure */
        }

        .zoom img {
            transition: transform 0.5s ease;
            width: 100%;
            /* Thêm thuộc tính width để điều chỉnh kích thước ban đầu của ảnh */
        }

        .zoom:hover img {
            transform: scale(1.2);
        }
    </style>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <!-- Image Slider -->
                <div id="product-slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <figure class="zoom" onmousemove="zoom(event)">
                                <img src="{{$product_by_id->mainImage}}" alt="Pink Glass">
                            </figure>
                        </div>
                        @if (isset($product_image))
                    @foreach ($product_image as $item)
                    <div class="carousel-item">
                        <figure class="zoom" onmousemove="zoom(event)">
                            <img src="{{$item->linkImage}}" alt="">
                        </figure>
                    </div>
                    @endforeach
                    @endif
                    </div>
                    <a class="carousel-control-prev" href="#product-slider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#product-slider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 product-info-container">
                <!-- Product Details -->
                <h2>{{$product_by_id->nameProduct}}</h2>
                <p class="text-muted">Màu Sắc:</p>
                <p>
                    @if (isset($product_color))
                    @foreach ($product_color as $item)
                    <span class="color-circle" style="background-color: {{$item->codeColor}}"></span>
                    @endforeach
                    @endif
                </p>
                <p><strong>Mô tả:</strong>
                    <br>Mã sản phẩm: {{$product_by_id->codeProduct}}
                    <br>Danh mục: {{$product_by_id->nameCategory}}
                    <br>Mô tả: {{$product_by_id->descriptionProduct}}
                    <br>Chất liệu: {{$product_by_id->material}}
                    <br>Giá sản phẩm: {{$product_by_id->price}}
                </p>
                <p>
                    <strong>Giá:</strong>
                    <del class="text-muted">{{$product_by_id->price*1.1}}đ</del>
                    <span class="text-danger">{{$product_by_id->price}}đ (Giảm Giá)</span>
                </p>
                <div class="form-group">
                    <form action="" method="post">
                        @csrf
                    <label for="colorSelect">Chọn Màu:</label>
                    <select class="form-control" name="color_id" id="colorSelect" required>
                        @if (isset($product_color))
                        @foreach ($product_color as $index => $item)
                        @if ($index==0)
                        <option value="{{$item->id}}" selected>{{$item->nameColor}}</option>
                        @else
                        <option value="{{$item->id}}">{{$item->nameColor}}</option>
                        @endif
                        @endforeach
                        @endif
                    </select>
                    <!-- Rating Stars -->
                    <div class="mb-3">
                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                        <!-- Add more stars based on the rating -->
                    </div>
                    @if (Auth::check())
                    <button type="submit" class="btn btn-pink">Thêm Vào Giỏ Hàng</button>
                    @else
                        <a href="/auth" class="btn btn-pink">Đăng nhập để mua hàng</a>
                    @endif
                    @if(session('success'))
    <div class="alert w-50 mt-2 alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('fail'))
    <div class="alert w-50 mt-2 alert-danger">
        {{ session('fail') }}
    </div>
@endif
                </form>
                </div>
            </div>
        </div>
        <!-- Section 2: Product Details -->
        <section class="container my-5 product-detail-container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <!-- Product Detail Image -->
                    <img src="{{$product_by_id->mainImage}}" alt="Product Detail Image"
                        class="img-fluid product-detail-image">
                </div>
                <div class="col-md-6">
                    <!-- Content Description with Tabs -->
                    <h3> Một Số Thông Tin Thêm</h3>
                    <ul class="nav nav-tabs" id="productTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="information-tab" data-toggle="tab" href="#information"
                                role="tab" aria-controls="information" aria-selected="true">Thông Tin </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="privacy-tab" data-toggle="tab" href="#privacy" role="tab"
                                aria-controls="privacy" aria-selected="false">Chính Sách Đổi Trả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Chính Sách Vận Chuyển</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3">
                        <!-- Information Section -->
                        <div class="tab-pane fade show active" id="information" role="tabpanel"
                            aria-labelledby="information-tab">
                            <h4>Thông Tin</h4>
                            <p>Chịu trách nhiệm sản phẩm: Công Ty TNHH Dịch vụ và Thương mại VENUS Việt Nam
                            <div>Cảnh báo: Bảo quản trong hộp kính</div>
                            <div> Hướng dẫn sử dụng:</div>
                            <div>+ Tháo kính bằng 2 tay</div>
                            <div> + Không bỏ kính vào cốp xe hoặc những nơi có nhiệt độ cao làm biến dạng kính.</div>
                            <div> + Không bỏ kính vào túi sách nếu không có hộp kính, vật dụng nhọn như chìa khóa sẽ làm
                                xước kính.</div>
                            <div> + Không rửa kính lau kính bằng các chất có tính tẩy rửa mạnh làm bong tróc lớp váng
                                phủ</div>
                            </p>
                        </div>

                        <!-- Privacy Section -->
                        <div class="tab-pane fade" id="privacy" role="tabpanel" aria-labelledby="privacy-tab">
                            <h4>Chính Sách Đổi Trả</h4>
                            <p>
                            <div> 1. Bảo hành một đổi một trong vòng 180 ngày sau khi mua hàng nếu lớp váng dầu của
                                tròng kính gặp vấn đề về kỹ thuật như xô váng, mất váng mà không phải do nhiệt hay tác
                                động vật lý như trầy xước, nứt, vỡ.</div>

                            <div>2. Bảo hành lỗi người dùng nếu không may làm gẫy hoặc mất kính. Trợ giá 50% giá niêm
                                yết khi khách hàng sử dụng lại sản phẩm cũ. Trong trường hợp sản phẩm cũ hết hàng có thể
                                thay thế sang sản phẩm có giá trị bằng hoặc thấp hơn. Áp dụng một lần duy nhất trên tổng
                                hóa đơn trong 60 ngày kể từ khi mua hàng.

                                <div>3. Đổi mới sản phẩm hoặc thay thế phụ kiện trong 90 ngày nếu sản phẩm có lỗi do nhà
                                    sản xuất.</div>

                                <div>4. Trong 30 ngày đầu tiên, bảo hành 1 đổi 1 tròng kính cho tới khi bạn cảm thấy
                                    thoải mái với thị lực của mình.</div>

                                <div> 5. 7 ngày đầu sau khi mua hàng, VENUS hỗ trợ đổi màu gọng kính khi còn nguyên tem
                                    mác.</div>

                                <div>6. Đo mắt, kiểm tra thị lực miễn phí.</div>

                                <div>7. Miễn phí trọn đời sửa chữa, nắn chỉnh, vệ sinh kính, thay thế phụ kiện (nếu có),
                                    áp dụng ngay cả không phải sản phẩm.</div>

                                <div>8. Số điện thoại của bạn là voucher tặng gọng kính miễn phí khi cắt từ tròng kính
                                    450K cho những lần mua hàng sau. Voucher được sử dụng trọn đời.</div>

                                <div> 9. Bảo hành không áp dụng với các chương trình, khuyến mại khác.</div>
                                </p>
                            </div>
                        </div>

                        <!-- Contact Section -->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <h4>Chính Sách Vận Chuyển</h4>
                            <p>+ Miễn phí giao hàng toàn quốc.
                                <br>+ Thời gian giao hàng dao động từ 2-4 ngày đối với đơn gọng kính, 3-5 ngày đối với
                                đơn cắt cận.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Section 3: Featured Products -->
        <section class="container my-5">
            <h3 class="text-center mb-4">Sản Phẩm Liên Quan</h3>
            <div class="row">
                @if (isset($product_relation))
                    @foreach ($product_relation as $item)
                    <div class="col-md-4 mb-4">
                        <a href="/detail/{{$item->id}}" class="card-link">
                            <div class="card">
                                <img src="{{$item->mainImage}}" class="card-img-top" alt="Featured Product 1">
                                <div class="card-body">
                                    <h5 class="card-title">{{$item->codeProduct}}</h5>
                                    <p class="card-text">Giá: {{$item->price}}đ</p>
                                    <p class="card-text">Danh mục: {{$item->nameCategory}}</p>
                                    <p class="card-text">&#9733; &#9733; &#9733; &#9733; &#9734;</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @endif
            </div>
        </section>


        <!-- Bootstrap JS and Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- jQuery script -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script>
            // JavaScript for zoom effect
            function zoom(event) {
                var zoomer = event.currentTarget;
                var img = zoomer.querySelector('img');
                x = event.offsetX / zoomer.offsetWidth * 100;
                y = event.offsetY / zoomer.offsetHeight * 100;
                img.style.transformOrigin = x + '% ' + y + '%';
            }
        </script>
       @include('member/includes/footer')