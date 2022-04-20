<head>
    <?php

//    echo "<pre>";
//    var_dump($items);
//    echo "</pre>";

    if (!isset($_SESSION)) {
        session_start();
    }

    $pageTitle = $_GET['select'];
    include "components/header.php";
    ?>
    <link rel="stylesheet" href="view/assets/Home.css">
    <link rel="stylesheet" href="view/assets/navbar.css">
    <link rel="stylesheet" href="view/assets/footer.css">
    <link rel="stylesheet" href="view/assets/bestselling.css">
    <link rel="stylesheet" href="view/assets/Categorieen.css">

</head>

<body class="d-flex flex-column min-vh-100">

<?php include "components/navbar.php"; ?>
<section style="padding-top: 20px;">
    <div class="container">
        <div class="row">
            <div style="height: 100%;" class="side shadow col-md-3">
                <div class="categories_header">
                    <h2><?= $_GET['select'] ?></h2>
                </div>
                <?= $list; ?>
                <div class="mt-3 categories_order">
                    <div class="sort_title">    
                        <h5>Sorteren op:</h5>
                    </div>
                    <div class="dropdown">
                    <?php
                        
                        if (isset($_GET['order'])) {
                            $order = $_GET['order'];
                        } else { 
                            $order = '';
                        }

                        switch($order) {
                            case "ASC":
                                $sortType = 'Laag - Hoog';
                                break;
                            case "DESC":
                                $sortType = 'Hoog - Laag';
                                break;
                            default:
                                $sortType = "orgineel";
                        }
                    
                    echo "<button class=\"dropbtn\" for=\"btnControl\">" . $sortType . " <div class=\"arrowdown\">▼</div></button>";
                    
                    ?>
                        <div class="dropdown-content">
                            <a href="<?php echo "index.php?op=categories&select=" . $_GET['select']?>">Orgineel</a>
                            <a href="<?php echo "index.php?op=categories&select=" . $_GET['select'] . "&order=ASC"?>">Laag - Hoog</a>
                            <a href="<?php echo "index.php?op=categories&select=" . $_GET['select'] . "&order=DESC"?>">Hoog - Laag</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                <?php
                foreach($items as $key=>$value){
                    $image = 'view/assets/image/' . $value['product_thumbnail'];
                    $image = ($value['product_thumbnail']!=''?$image:"https://via.placeholder.com/350x430");
                    $link = $value['id'];
                    ?>
                    <div class='col-md-4'>

                        <div class="bestseller">
                            <!-- Image 3 -->
                            <div class="content_img">
                                <a href='?op=details&id= <?=$link?> '>
                                    <img class="bestSellerImage" src="<?=$image?>" alt="">
                                </a>
                                <div>
                                    <a href="?op=details&id=<?=$link?>">Lees meer over dit product</a>
                                </div>
                            </div>
                            <div class="product_title">
                                <h4>
                                    <?= $value['product_name'] ?>
                                </h4>
                            </div>
                            <div class="bottom_bestseller">
                                <div class="price">

                                    <span><?= $value['product_price'] ?></span>
                                </div>

                                <div class="text-center d-md-inline">
                                <input type='hidden' name='product_id' value='<?=$value['id']?>' id='<?=$value['id']?>'>
                                    <button class="rounded-circle border-0 roundbutton add_cart" name="add" id="<?=$value['id']?>"><i class="fas fa-plus fa-010" aria-hidden="true"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>
                </div>


            </div>
        </div>

    </div>
</section>

<?php include 'components/footer.php'; ?>

</body>

</html>