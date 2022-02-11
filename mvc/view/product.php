<?php require_once "./mvc/view/include/header.php";?>

<div class="container">
    <div class="row">
        <div class="row show-product col-12">
            <div class="col-12">
                <div class="row row-prodct-2">
                    <div class="col-12">
                        <div class="row product-2">
                            <div class="col-12 col-lg-4 col-md-6 title-product-2">
                                <h5>Sản phẩm</h5>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            while ($row = mysqli_fetch_array($data["laptop"])){
                ?>
                <div class="col-12 col-lg-3 col-md-3 padding-laptop">
                    <div class="row">
                        <a href="http://localhost:8080/shopping/Product/Detail/<?=$row["id"]?>">
                            <div class="col-12 content-laptop">
                                <div class="laptop-sell">
                                    <div class="laptop-img">
                                        <a href="http://localhost:8080/shopping/Product/Detail/<?=$row["id"]?>"><img src="http://localhost:8080/shopping/public/image/<?=$row["image"]?>" alt="không hổ trợ trình duyệt này"/></a>
                                    </div>
                                    <div class="laptop-price">
                                        <div class="name-laptop"><a href="#"><?=$row["name"]?></a></div>
                                        <div class="price-laptop">
                                            <a href="http://localhost:8080/shopping/Product/Detail/<?=$row["id"]?>">
                                                <span class="price-sell"><?=number_format($row["price"] - $row["discount"],0,',','.')?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>         
            <?php } ?>
        </div>
        <!-------------------------------------------------- end laptop --------------------------------------------------->
        
        <!--------------------------------------------------- end mobile ---------------------------------------------->
        
        <!--------------------------------------------------- end gear ---------------------------------------------->
    </div>
</div>

<?php require_once "./mvc/view/include/footer.php" ?>