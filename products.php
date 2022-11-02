<?php
    require "..\\site_php\\inc\\config.inc.php"; 
    $sql = "select c.name as category_name, c.description as category_description, p.id as product_id, p.name as product_name,
	c1.id as category_main_id, c1.name as category_main, i.alt as image_main, i.path as image_main_path
	from(select *
	from product_category_main pcm
	union ALL
	select *
	from product_category pc) ft
	join category c on ft.category_id = c.id
	join product p on ft.product_id = p.id
	join product_image_main pim on pim.product_id = p.id
	join image i on pim.image_id = i.id
	join product_category_main pcm on pcm.product_id = p.id
	join category c1 on c1.id = pcm.category_id
	WHERE c.id = ? and p.is_avaible = 1
	ORDER by p.id
    LIMIT ?, ?";
    $sq = "select COUNT(ft.product_id) as product_count
	from(select *
	from product_category_main pcm
	union ALL
	select *
	from product_category pc) ft
	join category c on ft.category_id = c.id
    join product p on ft.product_id = p.id
    where p.is_avaible = 1 and c.id = ? ";
    if (isset($_GET['page']))
    {
        $page = $_GET['page'];
    }else 
    {
        $page = 1;
    }
    $kol = 12;
    $art = ($page * $kol) - $kol;
    $a = sql($sq);
    $row = mysqli_fetch_row($a);
    if($row === false or $row === null
    ){
        http_response_code(404);
        include('..\\site_php\\404.php');
        die();
    }
    $total = $row[0];
    $str_pag = ceil($total / $kol);
    $id = $_GET['id'];
    if(intval($id)){
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, 'iii',$id, $art, $kol);
        mysqli_stmt_execute($stmt);
        $cat = mysqli_stmt_get_result($stmt);
    }
    else{
        http_response_code(404);
        include('..\\site_php\\404.php');
        die();
    }
    mysqli_close($link);
    $item = mysqli_fetch_assoc($cat);
    if($item === false or $item === null)
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
    <link href="..\\css\\products_css.css" rel="stylesheet" type="text/css">
    <title><?php echo $item['category_name']?></title>
</head>
<body>
    <div class="main_wrap">
    <div class="hreff">
            <div class="hreff_bread">
                <a href="categories.php">Категории товаров</a>
                    /
                <a href="<?php 
                    echo ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>">
                    <?php echo $item['category_name'];?>
                </a>
            </div>
            <div class="hreff__a">
                <a href="categories.php">
                    Назад
                </a>
            </div>
        </div>

        <div class="card_wrap">
            <div class="title">
                <?php echo $item['category_name']?>
            </div>
            <div class="text">
                <?php echo $item['category_description']?>
            </div>
        </div>
        <div class="wrap">
                <?php 
                $counter = 1;
                do
                {
                    if($counter % 3 == 1){
                        echo "<div class='row'>";
                    }
                ?>
                    <div class="card">
                        <div class="card__img">
                            <a href="..\\product.php?id=<?php echo $item["product_id"];?>">
                                <img src="picture/<?php echo $item['image_main_path']?>" alt="<?php echo $item['image_main']?>">
                            </a>
                        </div>
                        <div class="card__info">
                            <div class="card__name">
                                <a href="..\\product.php?id=<?php echo $item["product_id"];?>"><?php echo $item['product_name']?></a>
                            </div>
                            <div class="card__category">
                                <a href="..\\products.php?id=<?php echo $item["category_main_id"];?>">
                                    <?php echo $item['category_main']?>
                                </a>
                            </div>
                        </div> 
                    </div>
            <?php
                    if($counter % 3 == 0){
                        echo "</div>";
                    }
                    $counter++;
                }
                while($item = mysqli_fetch_assoc($cat));
            ?>
                    
        </div>
        <div class="hrefs">
        <?php 
            for($i = 1; $i <= $str_pag; $i++)
            {
                echo "<a href=products.php?id=".$id."&page=".$i."> Страница ".$i." </a>";
            }
        ?>
        </div>
    </div>
</body>
</html>