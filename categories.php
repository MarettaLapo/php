<?php
    require "..\\site_php\\inc\\config.inc.php"; 
    $sql = "select ft.category_id, c.name as category_name, COUNT(ft.product_id) as product_count
	from(select *
	from product_category_main pcm
	union ALL
	select *
	from product_category pc) ft
	join category c on ft.category_id = c.id
    join product p on ft.product_id = p.id
    where p.is_avaible = 1
	GROUP by category_name
	ORDER by product_count DESC ";
    $cat = mysqli_query($link, $sql);
    $item = mysqli_fetch_array($cat);
    mysqli_close($link);
    if($cat === false or $cat === null)
    {
        http_response_code(404);
        include('..\\site_php\\404.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/categories_css.css" rel="stylesheet" type="text/css">
    <title>Категории товаров</title>
</head>
<body>
    <div class="wrap">
        <?php
            do
            {
        ?>
            <a href="products.php?id=<?php echo $item["category_id"];?>">
                <div class="card_wrap">
                    <div class="title"> <!--название категории-->
                        <?php echo $item['category_name']?>
                    </div>
                    <div class="text"> <!--описание категории-->
                        Товаров: <?php echo $item['product_count']?>
                    </div>
                </div>
            </a>
        <?php
            }
            while($item = mysqli_fetch_array($cat));
        ?>
    </div>
</body>
</html>