@include('member/includes/header')
  <style>
    /* CSS chỉnh giao diện trang */
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .headerbn {
      position: relative;
      height: 300px;
      overflow: hidden;
    }

    /* CSS cho ảnh banner  */
    .header-image {
      width: 100%;
      opacity: 0.6;
    }

    /* CSS cho tiêu đề */
    .header-title {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 32px;
      font-weight: bold;
      text-align: center;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    /* CSS cho nút về trang chủ */
    .home-button {
      position: absolute;
      /* bottom: 20px;
            left: 20px; */
      text-align: center;
      padding: 10px 20px;
      color: #fff;
      text-decoration: none;
      font-family: Arial, sans-serif;
      font-size: 14px;
      text-shadow: none;
    }

    a {
      text-decoration: none;
    }

    a:hover {
      color: ffd1dcd2;
    }

    body {
      font-family: "Arial", sans-serif;
      margin: 0;
      padding: 0;
    }

    h1 {
      text-align: center;
      margin-top: 20px;
    }

    .product-list-container {
      display: grid;
      justify-content: center;
      grid-template-columns: 100%;
      grid-gap: 20px;
      padding: 20px;
    }

    .filter-container {
      background-color: #cccccc34;
      padding: 10px;
      color: rgb(97, 97, 97);
      border-radius: 10px;
    }
    .filter-container h3{
      font-weight: bold;
      font-size: 20px;
      font-family: "Arial", sans-serif;
    }

    #product-list {
      position: relative;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-gap: 20px;
    }

    .pagination {
      margin-top: 10px;
      text-align: center;
    }

    .pagination a {
      display: inline-block;
      margin-left: 5px;
      padding: 5px 10px;
      background-color: #f1f1f1;
      text-decoration: none;
      color: #333333;
    }

    .pagination a.current {
      background-color: #ccc;
      color: #fff;
    }

    /* Sản phẩm */
    .product {
      position: relative;
      border: 1px solid #fff;
      padding: 10px;
      /* text-align: center; */
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .product img {
      max-width: 100%;
      height: auto;
      transition: filter 0.3s ease-in-out;
      border-radius: 10px;
    }

    .product h3 {
      margin-top: 10px;
      font-size: 18px;
      color: #414141;
      font-weight: bold;
    }

    .product .price {
      /* font-weight: bold; */
      margin-top: 10px;
      font-size: 16px;
      color: #414141;
    }

    .product .price .original-price {
      text-decoration: line-through;
      color: #999999;
    }

    .add-to-cart {
      margin-top: 10px;
      padding: 10px 20px;
      background-color: #ffd1dc;
      color: #ffffff;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-align: center;
      /* width: fit-content; */
    }


    .quick-view {
      position: absolute;
      top: 45%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #ffd1dcd2;
      padding: 10px;
      display: none;
      cursor: pointer;
      z-index: 1;
      width: fit-content;
    }

    .product:hover .quick-view,
    .product:hover .add-to-cart {
      display: block;
    }

    .sale-badge {
      position: absolute;
      top: 5px;
      right: 5px;
      background-color: #ff0000;
      color: #fff;
      padding: 2px 5px;
      font-size: 12px;
      border-radius: 5px;
    }

    .product-item {
      flex: 0 0 auto;
      width: 300px;
      height: 300px;
      margin-right: 10px;
      scroll-snap-align: start;
      background-color: #fff;
      border: 1px solid #ffffff;
      border-radius: 5px;
      padding: 10px;
      /* text-align: center; */
      box-shadow: 0 2px 4px rgb(255, 255, 255);
    }

    .product-img {
      width: 200px;
      height: 200px;
      margin: 0 auto;
    }

    .product-item h3 {
      margin-top: 10px;
      font-size: 16px;
      color: black;
    }

    .product-item p {
      margin: 5px 0;
    }

    .product-item p.price {
      font-weight: bold;
      color: black;
      font-size: 14px;
    }

    /* code sửa */

    /* Sản phẩm nổi bật */
    .product-container {
      display: flex;
      overflow-x: scroll;
      scroll-snap-type: x mandatory;
      scrollbar-width: none;
      /* Ẩn thanh cuộn */
      -ms-overflow-style: none;
      /* Ẩn thanh cuộn trên Microsoft Edge */
      padding: 20px;
      background-color: #f1f1f1;
    }

    .product-item {
      flex: 0 0 auto;
      width: 300px;
      height: 300px;
      margin-right: 10px;
      scroll-snap-align: start;
      background-color: #fff;
      border: 1px solid #ffffff;
      border-radius: 5px;
      padding: 10px;
      text-align: center;
      box-shadow: 0 2px 4px rgb(255, 255, 255);
    }

    .product-item h3 {
      margin-top: 10px;
      font-size: 16px;
      color: black;
    }

    .product-item p {
      margin: 5px 0;
    }

    .product-item p.price {
      font-weight: bold;
      color: black;
      font-size: 14px;
    }

    /* phân trang */
    .page-link {
      margin-right: 5px;
    }

    /* CSS Xem nhanh */
    #product {
      display: flex;
      align-items: center;
    }

    .container {
      padding: 16px;
    }

    .modal {
      display: none;
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
      padding-top: 60px;
    }


    .modal-content {
      background-color: #fefefe;
      margin: auto;
      border: 2px solid #f4d2d2;
      width: 60%;
    }

    .product-image {
      flex: 0 0 200px;
      margin-right: 20px;
    }

    .product-image img {
      max-width: 100%;
      height: auto;
    }

    .close {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 28px;
      font-weight: bold;
      color: #888;
      cursor: pointer;
    }

    .close:hover,
    .close:focus {
      color: #000;
    }

    button {
      background-color: #ffd1dcd2;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      border-radius: 10px;
    }

    button:hover {
      opacity: 0.8;
    }
  </style>

  <div>
    <div class="headerbn">
      <img src="{{ asset('Trangchinh/images/bannerHong.jpgut.jpg')}}" alt="Banner" class="header-image">
      <h1 class="header-title" style="font-size: 50px;">Tất cả sản phẩm</h1>
    </div>
  </div>
  <main>
    <!--CRO-BT-->
    <div class="BT">
      <div class="cro-buttons">
        <a href="https://www.facebook.com/profile.php?id=61553810680047" class="facebook" target="_blank"><img
            src="../Trangchinh/images/facebook.jpg" alt="Facebook"></a>
        <a href="https://www.tiktok.com/@kinhmatVENUS" class="tiktok" target="_blank"><img
            src="../Trangchinh/images/tiktok.png" alt="TikTok"></a>
        <a href="https://www.instagram.com/kinhmat_VENUS/" class="instagram" target="_blank"><img
            src="../Trangchinh/images/ig.png" alt="Instagram"></a>
      </div>
    </div>
    <!--CRO-BT-->
    <div class="product-list-container">
          @if (isset($product_all) && count($product_all)>0)
        <div id="product-list">
              @foreach ($product_all as $item)
              <div class="product">
                <img style="filter: brightness(100%);" onmouseover="this.style.filter='brightness(80%)';"
                  onmouseout="this.style.filter='brightness(100%)';" src="{{$item->mainImage}}" alt="Sản phẩm 1">
                <div style="text-align: center;">
                  <a href="/detail/{{$item->id}}">
                    <h3>Mã sản phẩm: {{$item->codeProduct}}</h3>
                  </a>
                  <p class="price"><span class="original-price">{{$item->price*1.1}} VND</span> Giá: {{$item->price}} VND</p>
                  <p class="price">Danh mục: {{$item->nameCategory}}</p>
                  <button onclick="toggleModal('{{$item->id}}')" class="quick-view">Xem nhanh</button>
                  <a href="/detail/{{$item->id}}" class="add-to-cart">Xem chi tiết</a>
                  <div class="sale-badge">Sale</div>
                </div>
                <div id="{{$item->id}}" class="modal">
                  <form class="modal-content" method="post">
                    <span class="close" onclick="toggleModal('{{$item->id}}')">&times;</span>
                    <div id="product">
                      <img src="{{$item->mainImage}}" alt="Product Image" style="width: 200px; height: 200px;">
                      <div style="margin-left: 10px;">
                        <h4 style=" font-size: 18px; margin-top: 0;margin-left: 5px ;">{{$item->codeProduct}}</h4>
                        <h4 style=" font-weight: bold; margin-top: 5px;">Giá: {{$item->price}} VND</h4>
                        <h4 style=" font-weight: bold; margin-top: 5px;">Danh mục: {{$item->nameCategory}}</h4>
                        <p style="  margin-top: 5px; color: #999999;">Chất liệu: {{$item->material}}</p>
                        <a href="/detail/{{$item->id}}" class="add-to-cart">Xem chi tiết</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              @endforeach
        </div>
          @else
          <div class="" style="text-align: center">
            <h2 class="text-danger">Không có sản phẩm nào !</h2>
          </div>
          @endif
        {{-- <div class="pagination" style="margin-top: 10px;">
          <ul>
            <a href="#" class="page-link">1</a>
            <a href="#" class="page-link">2</a>
            <a href="#" class="page-link">3</a>
          </ul>
        </div> --}}
      </div>
    </div>
    <!-- Sản phẩm nổi bật -->
    <div>
    </div>
    <script>
      // // Pagination
      // document.addEventListener('DOMContentLoaded', function () {
      //   // Lấy danh sách các sản phẩm
      //   var productList = document.getElementById('product-list').children;

      //   // Lấy danh sách các link phân trang
      //   var pageLinks = document.getElementsByClassName('page-link');

      //   // Xử lý sự kiện khi nhấp vào một link phân trang
      //   for (var i = 0; i < pageLinks.length; i++) {
      //     pageLinks[i].addEventListener('click', function (e) {
      //       e.preventDefault();

      //       // Lấy số trang từ nội dung của link
      //       var page = parseInt(this.textContent);

      //       // Ẩn tất cả các sản phẩm
      //       for (var j = 0; j < productList.length; j++) {
      //         productList[j].style.display = 'none';
      //       }

      //       // Hiển thị các sản phẩm ở trang tương ứng
      //       var startIndex = (page - 1) * 8; // 8 là số sản phẩm hiển thị trên mỗi trang
      //       var endIndex = startIndex + 8;
      //       for (var k = startIndex; k < endIndex; k++) {
      //         if (productList[k]) {
      //           productList[k].style.display = 'block';
      //         }
      //       }
      //     });
      //   }
      // });
      // Filter sản phẩm
      // document.addEventListener("DOMContentLoaded", function () {
      //   var priceFilters = document.querySelectorAll(".price-filter input");
      //   var products = document.querySelectorAll(".product");

      //   for (var j = 0; j < priceFilters.length; j++) {
      //     priceFilters[j].addEventListener("click", handlePriceFilterClick);
      //   }

      //   function handlePriceFilterClick(event) {
      //     var selectedFilter = event.target;
      //     var selectedPriceRange = selectedFilter.value;

      //     // Xóa lớp ẩn/hiện tất cả các sản phẩm
      //     for (var k = 0; k < products.length; k++) {
      //       var product = products[k];
      //       var productPrice = parseInt(product.getAttribute("data-price"));

      //       if (selectedPriceRange === "all" || isProductWithinPriceRange(productPrice, selectedPriceRange)) {
      //         product.style.display = "block";
      //       } else {
      //         product.style.display = "none";
      //       }
      //     }
      //   }

      //   function isProductWithinPriceRange(price, range) {
      //     var priceRange = range.split("-");
      //     var minPrice = parseInt(priceRange[0]);
      //     var maxPrice = parseInt(priceRange[1]);
      //     return price >= minPrice && price <= maxPrice;
      //   }
      // });

      // const filterPriceCheckboxes = document.querySelectorAll('.filter-price');
      // const filterMaterialCheckboxes = document.querySelectorAll('.filter-material');
      // const filterShapeCheckboxes = document.querySelectorAll('.filter-shape');
      // const products = document.querySelectorAll('.product');

      // function filterProducts() {
      //   const selectedPrices = Array.from(filterPriceCheckboxes)
      //     .filter(checkbox => checkbox.checked)
      //     .map(checkbox => parseInt(checkbox.value));

      //   const selectedMaterials = Array.from(filterMaterialCheckboxes)
      //     .filter(checkbox => checkbox.checked)
      //     .map(checkbox => checkbox.value);

      //   const selectedShapes = Array.from(filterShapeCheckboxes)
      //     .filter(checkbox => checkbox.checked)
      //     .map(checkbox => checkbox.value);

      //   products.forEach(product => {
      //     const price = parseInt(product.dataset.price);
      //     const material = product.dataset.material;
      //     const shape = product.dataset.shape;

      //     const meetsPriceCriteria = selectedPrices.length === 0 || selectedPrices.includes(price);
      //     const meetsMaterialCriteria = selectedMaterials.length === 0 || selectedMaterials.includes(material);
      //     const meetsShapeCriteria = selectedShapes.length === 0 || selectedShapes.includes(shape);

      //     if (meetsPriceCriteria && meetsMaterialCriteria && meetsShapeCriteria) {
      //       product.style.display = 'block';
      //     } else {
      //       product.style.display = 'none';
      //     }
      //   });
      // }

      // filterPriceCheckboxes.forEach(checkbox => {
      //   checkbox.addEventListener('change', filterProducts);
      // });

      // filterMaterialCheckboxes.forEach(checkbox => {
      //   checkbox.addEventListener('change', filterProducts);
      // });

      // filterShapeCheckboxes.forEach(checkbox => {
      //   checkbox.addEventListener('change', filterProducts);
      // });
      // Sắp xếp sản phẩm
      // function sortProducts() {
      //   var sortCriteria = document.getElementById('sort').value;
      //   var productList = document.getElementById('product-list');
      //   var products = Array.from(productList.getElementsByClassName('product'));

      //   if (sortCriteria === 'price-high-low') {
      //     products.sort(function (a, b) {
      //       var priceA = parseInt(a.getAttribute('data-price'));
      //       var priceB = parseInt(b.getAttribute('data-price'));
      //       return priceB - priceA;
      //     });
      //   } else if (sortCriteria === 'price-low-high') {
      //     products.sort(function (a, b) {
      //       var priceA = parseInt(a.getAttribute('data-price'));
      //       var priceB = parseInt(b.getAttribute('data-price'));
      //       return priceA - priceB;
      //     });
      //   } else if (sortCriteria === 'newest') {
      //     products.sort(function (a, b) {
      //       var dateA = new Date(a.getAttribute('data-date'));
      //       var dateB = new Date(b.getAttribute('data-date'));
      //       return dateB - dateA;
      //     });
      //   } else if (sortCriteria === 'popularity') {
      //     products.sort(function (a, b) {
      //       var viewsA = parseInt(a.getAttribute('data-views'));
      //       var viewsB = parseInt(b.getAttribute('data-views'));
      //       return viewsB - viewsA;
      //     });
      //   }

      //   products.forEach(function (product) {
      //     productList.appendChild(product);
      //   });
      // }
      // Hiển thị sau khi lọc
      // var numberOfProducts = 8;

      // // Cập nhật chiều dài của filter-container
      // var filterContainer = document.querySelector('.filter-container');
      // filterContainer.style.height = numberOfProducts * 70 + 'px';

      // // Cập nhật vị trí sticky của filter-container
      // var productContainer = document.querySelector('.product-list-container');
      // var productContainerRect = productContainer.getBoundingClientRect();
      // filterContainer.style.top = productContainerRect.top + 'px';

      // // Cập nhật vị trí sticky của pagination-container
      // var paginationContainer = document.querySelector('.pagination');
      // paginationContainer.style.top = productContainerRect.bottom + 'px';

      // Hiện xem nhanh

      function toggleModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.style.display = modal.style.display === "block" ? "none" : "block";
      }

      // Đóng xem nhanh
      window.onclick = function (event) {
        var modals = document.getElementsByClassName("modal");
        for (var i = 0; i < modals.length; i++) {
          var modal = modals[i];
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
      }
    </script>
  </main>
  @include('member/includes/footer')