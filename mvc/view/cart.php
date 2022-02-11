<?php require_once "./mvc/view/include/header.php" ?>

<?php 
$counter = 1;
$total_price = 0;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
             <b> My Cart Detail </b>
         </div>
         <div class="card-body">
            <div class="table-responsive-lg">
                <?php
                if(isset($_SESSION["shopping_cart"]) && !empty($_SESSION["shopping_cart"]) ){
                    ?>  
                    <table class="table v-set">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Tổng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION["shopping_cart"] as $key => $product){
                                ?>
                                <tr class="row_table">
                                    <th scope="row"><?php echo $counter; $counter++; ?></th>
                                    <td>
                                        <img src="<?php echo $product['image']; ?>" class="box-image-set-2">
                                    </td>
                                    <td><?php echo $product['name']; ?></td>
                                    <td>

                                        <select name='quantity' class='quantity' onchange="change()">
                                            <option <?php if ($product['quantity'] == 1) echo "selected"; ?> value="1">1</option>
                                            <option <?php if ($product['quantity'] == 2) echo "selected"; ?> value="2">2</option>
                                            <option <?php if ($product['quantity'] == 3) echo "selected";?> value="3">3</option>
                                            <option <?php if ($product['quantity'] == 4) echo "selected"; ?> value="4">4</option>
                                            <option <?php if ($product['quantity'] == 5) echo "selected"; ?> value="5">5</option>
                                        </select>
                                    </td>
                                    <td class = "price"><?php echo $product['price']; ?></td>
                                    <td class = "per_total_price"></td>
                                    <td>
                                        <button class="btn btn-sm btn-danger rm-val" data-dataval="<?php echo $key ?>">
                                            <span><i class="far fa-trash-alt"></i></span>
                                            <span>Bỏ sản phẩm</span>
                                        </button>
                                    </td>
                                </tr>
                            <?php } } else{ 
                                echo "<tr><td colspan='7'><h1 class='text-center' >Cart is Empty</h1></td></tr>"; } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7"><b> Total Amount :: <span id = "cart_total_price">0</span> </b> </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="col-md-12">
                            <a style="text-decoration: none" href="http://localhost:8080/shopping/Checkout"><button id="btn-checkout" type="button" class="btn btn-danger btn-lg btn-block">Checkout</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function change(){
            var cart_total_price = 0;
            $('.row_table').each(function(i){
                var quantity = Number($('.quantity:eq('+i+')').val());
                var price = Number($('.price:eq('+i+')').text());
                $(".per_total_price:eq("+i+")").text(quantity * price);
                cart_total_price = cart_total_price + Number($(".per_total_price:eq("+i+")").text());
                $("#cart_total_price").text(cart_total_price);
            });
        }

        $(document).ready(function (){
            $('.row_table').each(function(i){
                var quantity = Number($('.quantity:eq('+i+')').val());
                var price = Number($('.price:eq('+i+')').text());
                var cart_total_price = Number($("#cart_total_price").text());
                $(".per_total_price:eq("+i+")").text(quantity * price);
                cart_total_price = cart_total_price + Number($(".per_total_price:eq("+i+")").text());
                $("#cart_total_price").text(cart_total_price);

                $('.quantity:eq('+i+')').on('change', function(){
                    var id = $('.rm-val:eq('+i+')').data('dataval');
                    var quantity_change = $(this).val();

                    $.ajax({
                        type : "POST",
                        url: "http://localhost:8080/shopping/mvc/ajax/cart-process.php",
                        crossDomain : true,
                        data : { 'change' : id, 'quantity' : quantity_change},
                        dataType : 'text',
                    });

                });
            });

            $(".rm-val").click(function(){
                var rm_val = $(this).data('dataval');
                if(rm_val == ''){
                    alert('Data Value Not Found');
                }
                else{
                    $.ajax({
                        type: "POST",
                        url: "http://localhost:8080/shopping/mvc/ajax/cart-process.php",
                        crossDomain: true,
                        data: { 'rm_val' : rm_val },
                        dataType : 'text',
                        success: function (response) {
                            var get_val = JSON.parse(response);
                            if(get_val.status == 102){
                                console.log(get_val.msg);
                                location.reload();
                            }
                            else{
                                console.log(get_val.msg);
                            }
                        }
                    });
                }
            });

            $('#btn-checkout').click(function(){
                var total = $('#cart_total_price').text();
                $.ajax({
                    type : "POST",
                    url: "http://localhost:8080/shopping/mvc/ajax/cart-process.php",
                    crossDomain : true,
                    data : { 'total' : total},
                    dataType : 'text',
                });
            });

        });

    </script>
    <?php require_once "./mvc/view/include/footer.php" ?>