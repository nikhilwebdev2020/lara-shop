<div class="details">

    <h1>passionate Blooms <small>(fifo80)</small></h1>
    <p class="caption">Lush Pink Oriental Lilies in a glass vase.</p>

    <div class="bottom flex">
        <div class="left">
            <div class="block orange flex">
                <div class="icon-wrap">
                    <i class="fas fa-gift icon fa-3x"></i>
                </div>
                <div class="price-type">
                    <h4>Regular Price</h4>
                    <span class="price">$40.00</span>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="block green flex">
                <div class="icon-wrap">
                    <i class="fas fa-gift fa-3x"></i>
                </div>
                <div class="price-type">
                    <h4>Combo Price</h4>
                    <span class="price">$40.00</span>
                </div>
            </div>
        </div>
    </div>

    <div class="delivery-date">
        <label class="font-12 font-light">Choose Delivery Date</label>
        <input type="date" name="delivery_date" value="<?=date('Y-m-d')?>">
    </div>

    <div class="order-actions flex">
        <span class="font-12 font-dark">Qty:</span>
        <span class="order-count">
            <a href="" class="change_qty" type="minus" data-target="product_qty_1">-</a>
            <input id="product_qty_1" type="text" name="order_quantity" min="1" step="1" value="1" pattern="[0-9]+" title="Please enter valid number">
            <a href="" class="change_qty" type="plus" data-target="product_qty_1">+</a>
        </span>
        <a href="order-now.php" class="button order-now"><i class="fas fa-shopping-cart"></i> Order Now</a>
        <a href="" class="button add-to-cart"><i class="fas fa-shopping-bag"></i>Add to cart</a>
        <a href="" class="add-to-wishlist"><i class="fas fa-heart"></i></a>
    </div>

    <div class="share-options flex">
        <span class="font-12 font-dark">Share:</span>
        <a href="" class="fb-color"> <i class="fab fa-facebook-square"></i> </a>
        <a href="" class="tw-color"> <i class="fab fa-twitter-square"></i> </a>
        <a href="" class="ln-color"> <i class="fab fa-linkedin"></i> </a>
        <a href="" class="pi-color"> <i class="fab fa-pinterest-square"></i> </a>
    </div>

    <div class="card-options">
        <span><i class="fab fa-cc-visa"></i></span>
        <span><i class="fab fa-cc-paypal"></i></span>
        <span><i class="fab fa-ebay"></i></span>
        <span><i class="fab fa-amazon-pay"></i></span>
    </div>

</div>
