<?php require_once "./mvc/view/include/header.php";?>

<div class="container">
    <div class="row">
        <div class="row show-product">
            <div class="col-12">
                <div class="row row-prodct-2">
                    <div class="col-12">
                        <div class="row product-2">
                            <div class="col-12 col-lg-4 col-md-6 title-product-2">
                                <h5>Các loại Laptop </h5>
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
                        <div class="col-12 content-laptop">
                            <div class="laptop-sell">
                                <div class="laptop-img">
                                    <a href="http://localhost:8080/shopping/Product/Detail/<?=$row["id"]?>"><img src="http://localhost:8080/shopping/public/image/<?=$row["image"]?>" alt="không hổ trợ trình duyệt này"/></a>
                                </div>
                                <div class="laptop-price">
                                    <div class="name-laptop"><a href="http://localhost:8080/shopping/Product/Detail/<?=$row["id"]?>"><?=$row["name"]?></a></div>
                                    <div class="price-laptop">
                                        <a href="http://localhost:8080/shopping/Product/Detail/<?=$row["id"]?>">
                                            <span class="price-sell"><?=$row["price"] - $row['discount']?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div> 
    </div>
    <!---------------- end show laptop ---------------->
</div>

<?php require_once "./mvc/view/include/footer.php" ?>