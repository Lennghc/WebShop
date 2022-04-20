<div class="bestselling">
  <div class="container">
    <div class="cat_header">
      <h2>Trending games</h2>
    </div>
    <div class="row">
      <?php

      foreach ($bestselling as $key => $value) {
        $image = 'view/assets/image/' . $value['product_thumbnail'];
        $image = ($value['product_thumbnail'] != '' ? $image : "https://via.placeholder.com/350x430");
        $link = $value['id'];
      ?>
        <div class=col-md-3>
          <form method='post'>
            <div class="bestseller">
              <!-- Image 3 -->
              <div class="content_img">
                <a href='?op=details&id= <?= $link ?> '>
                  <img class="bestSellerImage" src="<?= $image ?>" alt="">
                </a>
                <div>
                <a href='?op=details&id= <?= $link ?> '>Lees meer over dit product</a>
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
                  <!-- <input type='hidden' name='product_id' value='<?= $value['id'] ?>' id='<?= $value['id'] ?>'> -->
                  <button type="submit" name="add" class="rounded-circle roundbutton border-0 add_cart" id="<?= $value['id'] ?>"><i class="fas fa-plus fa-010" aria-hidden="true"></i></button>
                </div>
              </div>

            </div>
          </form>
        </div>
      <?php } ?>
    </div>
  </div>
</div>