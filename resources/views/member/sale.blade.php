@include('member/includes/header')
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            /* background-color: #87cac3; */
            margin: 10px;
        }

        h1 {
            color: #333333;
            margin-bottom: 20px;
        }

        .promotion {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .promotion h2 {
            color: #a55457;
            margin-top: 0;
        }

        .promotion p {
            color: #666666;
        }

        .promotion-images {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .promotion-images img {
            width: 300px;
            height: auto;
            margin: 10px;
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .promotion-images img.show {
            opacity: 1;
        }
    </style>

    <div class="promotion" >
        <h2>Khuyến mãi hấp dẫn!</h2>
        <p>Xin chào các khách hàng yêu quý của VENUS, chúng mình xin gửi đến các bạn các chương trình khuyến mãi đặc
            biệt:</p>
        <ul>
            <li>Giảm giá 20% cho tất cả các mẫu kính mắt trong cửa hàng.</li>
            <li>Tặng mã khuyến mãi giảm&nbsp;10% &nbsp;cho mỗi đơn hàng trị giá trên 1.000.000 đồng.</li>
            <li>Thu gọng kính cũ, đổi gọng kính mới.</li>
        </ul>
        <p>Hãy đến ngay cửa hàng VENUS để tận hưởng ưu đãi này. Chương trình kéo dài từ ngày 15/12 đến 20/1.</p>
        <p>Ngoài ra, VENUS cũng cung cấp các mã khuyến mãi cho các quý khách hàng mua sắm ngay tại website.</p>
        <div class="promotion-images"><img data-thumb="original" original-height="540" original-width="540"
                src="//bizweb.dktcdn.net/100/501/677/files/noel.png?v=1702231510348"
                style="width: 300px; height: 300px;" /> <img data-thumb="original" original-height="1080"
                original-width="1080" src="//bizweb.dktcdn.net/100/501/677/files/km3.png?v=1702230037133" /> <img
                data-thumb="original" original-height="540" original-width="540"
                src="//bizweb.dktcdn.net/100/501/677/files/km4.png?v=1702231536607"
                style="width: 300px; height: 300px;" /></div>
        <p>Các bạn nhớ&nbsp;thường xuyên ghé website nhé, VENUS sẽ cập nhật thật nhiều ưu đãi cho các bạn trong tương
            lai.</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.promotion-images img').each(function (index) {
                $(this).delay(300 * index).animate({ opacity: 1 }, 500);
            });
        });
    </script>
    @include('member/includes/footer')