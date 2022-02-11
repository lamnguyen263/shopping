<?php require_once "./mvc/view/include/header.php"; 
// foreach ($_SESSION["shopping_cart"] as $key => $product) {
//     echo $key;
// }
?>
<div class="container">
    <!--------------------------- Chi tiết sản phẩm ------------------------------>
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-xl-12 thongtin-chitiet">
            <div class="row">
                <div class="name-chitiet col-12 col-lg-12 col-xl-12 ">
                    <h3 id = "label_name"><?=$data["product"][0]["name"]?></h3>
                </div>
                <div class="col-12 col-lg-4  col-xl-4 col-md-6">
                    <div class="img-chitiet">
                        <img src="http://localhost:8080/shopping/public/image/<?=$data["product"][0]["image"]?>">
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-xl-4 col-md-6">
                    <div class="price-chitiet">
                        <h5 id = "label_price"><?=$data["product"][0]["price"] - $data["product"][0]["discount"]?></h5>
                    </div>
                    <p>
                        Giá trên đã bao gồm công thay và cài đặt vệ sinh bao trọn gói, Bảo Hành 5 Năm <br>

                        Cam kết lấy liền trước mặt linh kiện chính hãng có hóa đơn, Bán Thiếu Thu cũ đổi mới bù 50%
                        Tặng 500.000đ tiền mặt khi đặt, nếu mua online giá rẻ chỉ giao qua Shiper <br>

                        Hỗ trợ suốt đời không lo bị Hư
                    </p>
                    <div class="button-buy">
                        <button type="button" id ="buy-button" name ="buy" data-id = "<?=$data["product"][0]["id"]?>">MUA NGAY <i class="fa fa-shopping-cart"></i></button>
                    </div>
                </div>
                <div class="col-12 col-xl-4 col-lg-4 chi-tiet-don-hang">
                    <div class="chi-tiet">
                        <h5><i class="fa fa-check-circle"></i> Yên tâm khi mua sắm</h5>
                    </div>
                    <div class="check-hang">
                        <div class="list-check">
                           <p><i class="fa fa-star icon-star" aria-hidden="true"></i> Giao hàng miễn phí lên tới 150km</p>
                           <p><i class="fa fa-star icon-star" aria-hidden="true"></i> Thanh toán thuận tiện</p>
                           <p><i class="fa fa-star icon-star" aria-hidden="true"></i> Sản phẩm 100% chính hãng</p>
                           <p><i class="fa fa-star icon-star" aria-hidden="true"></i> Giá cạnh tranh nhất thị trường</p>
                       </div>
                   </div>
               </div>
           </div>
           <div class="row">
            <div class="col-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-6 product-description">
                         <h3>Mô tả về sản phẩm</h3>
                        <?=$data["product"][0]["description"]?>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-6 thongso-kythuat">
                        <h3>Thông số kỹ thuật</h3>
                        <div class="list-ts">
                            <ul><?php for ($i = 0; $i < count($data['specifications']) ; $i++){ ?>
                                <li><span><?=$data["specifications"][$i]["specifications_name"]?>:</span><div class="specifications_value"><?=$data["specifications"][$i]["specifications_value"]?></div></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!----------------------------- End chi tiết ---------------------
<!------------------------------ sản phẩm gợi ý ------------------>
<div class="row show-product">
    <div class="col-12">
        <div class="row row-prodct-2">
            <div class="col-12">
                <div class="row product-2">
                    <div class="col-12 col-lg-4 col-md-6 title-product-2">
                        <h5>Sản phẩm gợi ý</h5>
                    </div>
                    <div class="col-12 col-lg-8 menu-laptop">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php while ($row = mysqli_fetch_array($data["apriori"])) { ?>
        <div class="col-12 col-lg-3 col-md-3 padding-laptop">
            <div class="row">
                <div class="col-12 content-laptop">
                    <div class="laptop-sell">
                        <div class="laptop-img">
                            <a href="http://localhost:8080/shopping/Product/Detail/<?=$row['id']?>"><img src="http://localhost:8080/shopping/public/image/<?=$row['image']?>" alt="không hổ trợ trình duyệt này" /></a>
                        </div>
                        <div class="laptop-price">
                            <div class="name-laptop"><a href="#"><?=$row['name']?></a></div>
                            <div class="price-laptop">
                                <a href="#">
                                    <span class="price-sell"><?=$row['price']?></span>
                                    <!--                                        <span class="price-dis"><s>60.000.000đ</s></span>-->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!-------------------------------------- end sản phẩm gợi ý --------------------------------------->

<div class="row show-product">
    <div class="col-12">
        <div class="row row-prodct-2">
            <div class="col-12">
                <div class="row product-2">
                    <div class="col-12 col-lg-4 col-md-6 title-product-2">
                        <h5>Sản phẩm liên quan</h5>
                    </div>
                    <div class="col-12 col-lg-8 menu-laptop">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php while ($row = mysqli_fetch_array($data["recommend"])) { ?>
        <div class="col-12 col-lg-3 col-md-3 padding-laptop">
            <div class="row">
                <div class="col-12 content-laptop">
                    <div class="laptop-sell">
                        <div class="laptop-img">
                            <a href="http://localhost:8080/shopping/Product/Detail/<?=$row['id']?>"><img src="http://localhost:8080/shopping/public/image/<?=$row['image']?>" alt="không hổ trợ trình duyệt này" /></a>
                        </div>
                        <div class="laptop-price">
                            <div class="name-laptop"><a href="#"><?=$row['name']?></a></div>
                            <div class="price-laptop">
                                <a href="#">
                                    <span class="price-sell"><?=$row['price']?></span>
                                    <!--                                        <span class="price-dis"><s>60.000.000đ</s></span>-->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!-------------------------------------- end sản phẩm cùng loại --------------------------------------->

</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#buy-button').click(function(){
            var product_id = $('#buy-button').data('id');
            var product_name = $('#label_name').text();
            var product_image = $('.img-chitiet img').attr('src');
            var product_price = $('#label_price').text();
            if(product_id == ''){
                alert("Data Key Not Found");
                console.log("Data Key Not Found");
            }
            else{
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8080/shopping/mvc/ajax/cart-process.php",
                    crossDomain: true,
                    data: { 'product_id' : product_id, 'product_name' : product_name, 'product_image' : product_image, 'product_price' : product_price},
                    dataType : 'text',
                    success: function (response) {
                        var get_val = JSON.parse(response);
                        if(get_val.status == 100){
                            alert(get_val.msg);
                            console.log(get_val.msg);
                            location.reload();
                        }
                        else if(get_val.status == 103){
                            alert(get_val.msg);
                            console.log(get_val.msg);
                        }
                        else{
                            console.log(get_val.msg);
                        }
                    }
                });
            }
        });
    });
</script>

<?php require_once "./mvc/view/include/footer.php" ?>