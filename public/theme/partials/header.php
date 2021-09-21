<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Maxine Blooms</title>

  <link rel="icon" href="/logosmall.ico" type="image/x-icon">

  <link rel="stylesheet" href="css/style.css?ver=4.1">
  <link rel="stylesheet" href="css/media.css?ver=4.1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="owlcarousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="owlcarousel/dist/assets/owl.theme.default.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>

<body>

  <!-- Login Modal -->
  <!-- The Modal -->
  <div id="loginModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
          <span class="close">&times;</span>
          <div class="modal-text">
              <h4 class="font-dark">Welcome! Please Login to continue.</h4>
              <span class="caption font-12 green">New member? <a href="" class="green">Register</a> here.</span>

              <div class="form-block">

              <form action="" method="post">
                    <div class="flex">
                        <div class="n6 left">

                          <div class="form-wrap flex">

                            <label class="font-12">Phone Number or Email*</label>
                            <input type="text" name="phone_or_email" class="font-12 font-light"
                                placeholder="Please enter your Phone Number or Email">

                            <label class="font-12">Password*</label>
                            <input type="password" name="password" class="font-12 font-light" placeholder="Please enter your password.">

                          </div>

                          <div class="text-right">
                            <a href="#" class="font-12 green">Forgot Password?</a>
                          </div>

                        </div>

                        <div class="n6 button-wraps right">

                          <input type="submit" name="submit" value="Login" class="button login-btn">

                          <span class="block font-12 font-light">or login with</span>

                          <div class="social-login">

                            <a href="#" class="button fb-login"><i class="fab fa-facebook-f"></i>Facebook</a>

                            <a href="#" class="button gl-login"><i class="fab fa-google-plus-g"></i>Google</a>

                          </div>

                        </div>
                    </div>
                  </form>

              </div>
          </div>
      </div>

  </div>

  <div id="dynamicModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content modal-large">
          <div class="modal-heading flex">
            <span class="close">&times;</span>
          </div>
          <div class="modal-text" id="appendHere">

            <div class="flex toprow">
              <div class="cart-product">
                <div class="alert success">
                  <i class="fas fa-check-circle"></i>
                  <span class="msg">1 new item has been added to your cart.</span>
                </div>
                <div class="flex main-block">
                  <figure class="image-wrap">
                    <img src="https://picsum.photos/90" alt="">
                  </figure>
                  <div class="prod">
                    <h4>Imported Fresh Decor</h4>
                    <small class="font-light font-12">No brand, Size M, Color: Emerald</small>
                    <span class="block">$45</span>
                  </div>
                  <div class="last font-12">Qty: 1</div>
                </div>
              </div>
              <div class="order-summary">
                <h4 class="bold">My Shopping Cart <small class="font-12 font-light">(6 items)</small></h4>
                <div class="flex">
                  <div class="left font-light">
                    <span class="font-12">Subtotal</span>
                  </div>
                  <div class="right">
                    <span>$45.00</span>
                  </div>
                </div>

                <div class="flex">
                  <div class="left font-dark">
                    <span class="bold">Total</span>
                  </div>
                  <div class="right">
                    <span class="default">$90.00</span>
                  </div>
                </div>

                <div class="flex buttons">
                  <a href="#" class="button proceed-to-pay">Your cart</a>
                  <a href="#" class="button proceed-to-pay alt">Order Now</a>
                </div>
              </div>
            </div>

          </div>
      </div>

  </div>
