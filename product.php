<?php
    require "..\\site_php\\inc\\config.inc.php";
    $sql_main = 'select p.name as product_name,  i.alt as image_main, i.path as image_main_path, c.id as category_id, c.name as category_name, p.price_now, p.price_full,
    p.price_promocode, p.description as product_description
    from product p
    join product_image_main pim on pim.product_id = p.id
    join image i on pim.image_id = i.id
    join product_category_main pcm on pcm.product_id = p.id
    join category c on pcm.category_id = c.id
    WHERE p.id = ?';

    $sql_cat = 'select c.id as category_id, c.name as category_name
    from category c
    join product_category pc on pc.category_id = c.id
    join product p on pc.product_id = p.id
    WHERE p.id = ?;';

    $sql_img = 'select i.alt as image, i.path as image_path
    from image i
    join product_image pi on pi.image_id = i.id
    join product p on pi.product_id = p.id
    WHERE p.id = ?;';

    
    $main = mysqli_fetch_assoc(sql($sql_main));
    if($main === false or $main === null)
    {
        http_response_code(404);
        include('..\\site_php\\404.php');
        die();
    }
    $add_cat = sql($sql_cat); #категории
    $add_img = sql($sql_img); #картинки

    $now = price($main["price_now"]);
    $full = price($main["price_full"]);
    $promocode = price($main["price_promocode"]);
    $id = $main['category_id'];
    if(!isset($_SERVER['HTTP_REFERER'])){ #прямой переход
        $url = "href=products.php?id=$id";
        $name = $main['category_name'];
    }
    else{
        $pars = $_SERVER['HTTP_REFERER'];
        $pars = explode('//', $pars);
        $url = array_pop($pars);
        $new = explode('?', $url);
        $new = explode('&', $new[1]);
        $new = substr($new[0], -1); 
        $cat_name = "select c.name as category_name from category c where c.id=$new";
        $name = mysqli_fetch_assoc(mysqli_query($link, $cat_name));
        $url="href=$url";
        $name = $name['category_name']; 
    }
    mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/product_css.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.6.1.js"></script>
    <script type="text/javascript" src="..\\js\\product_js.js" ></script>
    <script type="text/javascript" src="js/notify.js" ></script>
    <title><?php echo $main['product_name']?></title>
</head>
<body>
        <div class="hreff">
            <div class="hreff_bread">
                <a href="categories.php">Категории товаров</a>
                    /
                <a <?php echo $url;?>><?php echo $name;?></a>
                    /
                <a href="<?php 
                    echo ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
                    <?php echo $main['product_name'];?>
                </a>
            </div>
            <div class="hreff__back">
                <a <?php echo $url;?>>
                    Назад
                </a>
            </div>
        </div>
    <div class="wrap">
        <div class="product">
            <div class="product__preview">
                <div class="product__gallery">
                    <?php
                    while($img = mysqli_fetch_array($add_img))
                    {
                    ?>
                        <div class="product__gallery-image">
                            <img src="picture/<?php echo $img['image_path']?>" alt="<?php echo $img['image']?>">
                        </div>
                    <?php
                        }
                    ?>
                    <div class="product__gallery__down">
                        <div class="product__gallery__down-wrap">
                            <img src="picture/down-arrow.png" alt="#">
                        </div>
                    </div>    
                </div>
                <div class="product__picture">
                    <img src="picture/<?php echo $main['image_main_path']?>" alt="<?php echo $main['image_main']?>" class="product__picture--picture">
                </div>
            </div>
            <div class="product__info">
                <div class="product__title"> 
                    <?php echo $main['product_name'];?>
                </div>
                <div class="product__categories">
                    <a href="..\\products.php?id=<?php echo $main["category_id"];?>" class="product__categories product__categories--left">
                        <?php echo $main["category_name"];?></a>
                    <?php
                        while($cat = mysqli_fetch_array($add_cat))
                        {
                        ?>
                            <a href="..\\products.php?id=<?php echo $cat["category_id"];?>">
                                <?php echo $cat["category_name"];?>
                            </a>
                        <?php
                        }
                    ?>

                </div>
                <div class="product__price"> 
                    <div class="product__price-item product__price-item--left"> 
                        <span><?php echo substr($full, 0, 1);?> </span><?php echo substr($full, 1); ?>
                    </div>
                    <div class="product__price-item rub">
                        <span><?php echo substr($now, 0, 1);?> </span><?php echo substr($now, 1); ?> 
                    </div>
                    <div class="product__price-item product__price-item--black rub">
                        <span><?php echo substr($promocode, 0, 1);?> </span><?php echo substr($promocode, 1); ?>
                    </div>
                    <div class="product__price-item product__price-item--text">
                        - с промокодом
                    </div>
                </div>
                <div class="product__presence">
                    <div class="product__presence-icon">
                        <img src="picture/checkmark.png" alt="#" class="product__presence-icon--checkmark">
                        В наличии в магазине
                        <a href="#">Lamoda</a>
                    </div>
                    <div class="product__presence-icon">
                        <img src="picture/truck.png" alt="#" class="product__presence-icon--truck">
                        Бесплатная доставка
                    </div>
                </div>
                <div class="product__adding">
                    <div class="product__adding-minus">
                        −
                    </div>
                    <input type="text" class="product__adding-input" value="1">
                    <div class="product__adding-plus"> 
                        +
                    </div>
                </div>
                <div class="product__actions">
                    <button class="product__adding-button product__adding-button--blue">купить</button>
                    <button class="product__adding-button">в избранное</button>
                </div>
                <div class="product__description">
                    <p><?php
                            echo $main['product_description'];
                        ?>
                    </p>
                </div>
                <div class="product__sharing">
                    <div class="product__sharing-title">
                        поделиться:
                    </div>
                    <a href="#" class="product__sharing-link">
                        <img src="picture/vk.png" alt="#">
                    </a>
                    <a href="#" class="product__sharing-link">
                        <img src="picture/google.png" alt="#">
                    </a>
                    <a href="#" class="product__sharing-link">
                        <img src="picture/facebook.png" alt="#">
                    </a>
                    <a href="#" class="product__sharing-link">
                        <img src="picture/twitter.png" alt="#">
                    </a>
                    <div class="product__sharing-counter">
                        123
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>