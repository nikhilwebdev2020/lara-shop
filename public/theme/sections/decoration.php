<section class="featured-products">

  <h1 class="section-title">
    <span class="before"></span>
    Decoration
    <span class="after"></span>
  </h1>

  <div class="products-carousel owl-carousel">

  <?php for ($i=8; $i < 15; $i++) { ?>
    <div class="single-product">
      <a href="">
        <img src="https://picsum.photos/id/<?=$i+8?>/220/220" alt="">
      </a>

      <div class="bottom">
        <div class="flex">
          <div class="n6">
            <div class="text-grp rprice text-center">
              <div class="block orange">
                <i class="fas fa-gift icon"></i>Regular Price
              </div>
              <div class="block">
                $14.99
              </div>
            </div>
          </div>
          <div class="n6">
            <div class="text-grp cprice text-center">
              <div class="block green">
                <i class="fas fa-gift"></i>Combo Price
              </div>
              <div class="block">
                $14.24
              </div>
            </div>
          </div>
        </div>

        <div class="flex btn-wraps">
          <a href="#" class="btn-order-now" title="Order now"><i class="fas fa-cart-plus"></i>Order now</a>
          <a href="#" class="add-to-wishlist" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
        </div>
      </div>

    </div>
  <?php } ?>

  </div>

</section>
