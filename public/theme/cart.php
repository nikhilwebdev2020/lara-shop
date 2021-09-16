<?php include('partials/header.php') ?>

<?php include('sections/top-nav.php') ?>

<main class="page">

    <?php include('sections/inner/page-banner.php') ?>

    <?php include('sections/inner/breadcrumb-alt.php') ?>

    <section class="product-detail fixed-width cart-detail mb-5">
        <div class="flex no-align">

            <div class="n8 cart-wrapper">

              <table class="table top has-border">
                <tr>
                  <th width="20px">
                    <input type="checkbox" name="select_all" value="1">
                  </th>
                  <th colspan="2" class="text-left">
                    <label class="input-block font-light font-12">
                      SELECT ALL (2 ITEM(S))
                    </label>
                  </th>
                  <th colspan="2" class="text-right">
                    <a href="" class="icon-block font-light font-12">
                      <i class="fas fa-trash-alt"></i>&nbsp;DELETE
                    </a>
                  </th>
                </tr>
              </table>

              <div class="table-responsive">

                <table class="table has-border">
                  <thead>
                    <tr>
                      <td>
                        <input type="checkbox" name="" value="" checked>
                      </td>
                      <td colspan="2">
                        <label class="font-dark">
                          <span>Hamsa</span>
                          <i class="fas fa-angle-right"></i>
                        </label>
                        <span class="font-dark font-12">Yay! Enjoy free shipping with specific products.</span>
                      </td>
                      <td colspan="2" class="font-12 text-right">
                        Estimated Time 3 Sep
                      </td>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>
                        <input type="checkbox" name="" value="" checked>
                      </td>
                      <td>
                        <img src="https://picsum.photos/90/90" alt="">
                      </td>
                      <td class="va-top about-product">
                        <h4><a href="" class="font-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</a></h4>
                        <span class="font-light font-12">Lorem ipsum dolor sit amet</span>
                      </td>
                      <td class="va-top product-rate text-center">
                        <div class="block">$45.00</div>
                        <div class="icons">
                          <a href="#" class="font-light"><i class="far fa-heart"></i></a>
                          <a href="#" class="font-light"><i class="far fa-trash-alt"></i></a>
                        </div>
                      </td>
                      <td class="va-top product-qty text-center">
                        <span class="order-count">
                            <a href="" class="change_qty" type="minus" data-target="product_qty_1">-</a>
                            <input id="product_qty_1" type="text" name="order_quantity" value="1">
                            <a href="" class="change_qty" type="plus" data-target="product_qty_1">+</a>
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <table class="table has-border">
                  <tr>
                    <td>
                      <input type="checkbox" name="" value="">
                    </td>
                    <td colspan="2">
                      <label class="font-dark">
                        <span>Blooms</span>
                        <i class="fas fa-angle-right"></i>
                      </label>
                      <span class="font-dark font-12">Enjoy free shipping with specific products.</span>
                    </td>
                    <td colspan="2">
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <input type="checkbox" name="" value="">
                    </td>
                    <td>
                      <img src="https://picsum.photos/90/90" alt="">
                    </td>
                    <td class="va-top about-product">
                      <h4><a href="" class="font-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</a></h4>
                      <span class="font-light font-12">Lorem ipsum dolor sit amet</span>
                    </td>
                    <td class="va-top product-rate text-center" width="140px">
                      <div class="block">$50.00</div>
                      <div class="icons">
                        <a href="#" class="font-light"><i class="far fa-heart"></i></a>
                        <a href="#" class="font-light"><i class="far fa-trash-alt"></i></a>
                      </div>
                    </td>
                    <td class="va-top product-qty text-center" width="140px">
                      <span class="order-count">
                        <a href="" class="change_qty" type="minus" data-target="product_qty_2">-</a>
                        <input id="product_qty_2" type="text" name="order_quantity" value="1">
                        <a href="" class="change_qty" type="plus" data-target="product_qty_2">+</a>
                      </span>
                    </td>
                  </tr>
                </table>

              </div>



            </div>
            <div class="n4 shipping-details">

              <div class="card has-border order-summary no-padding" style="padding: 0 8px;padding-bottom: 0.5em">
                <h2 class="font-dark bottom">Order Summary</h2>

                <table class="table">
                  <tr>
                    <td class="font-light">Subtotal (1 items)</td>
                    <td class="text-right bold">$95</td>
                  </tr>
                  <tr>
                    <td class="font-light">Shipping Fee</td>
                    <td class="text-right bold">$10</td>
                  </tr>
                  <tr>
                    <td class="font-light">Shipping Fee Discount</td>
                    <td class="text-right bold">-$10</td>
                  </tr>
                  <tr style="border-top: 1px solid gray;">
                    <td class="font-dark bold">Total:</td>
                    <td class="text-right">
                      <span>$95</span>
                      <small>(VAT included)</small>
                    </td>
                  </tr>
                </table>

                <a href="checkout.php" class="button proceed-to-pay">Proceed to Checkout</a>
              </div>

            </div>
        </div>
    </section>

</main>

<?php include('partials/footer.php') ?>
