<section class="slider-wrapper relative">
  <img src="images/banner1.jpg" alt="banner 1" class="bannerimg img-responsive">
  <div class="banner absolute">
    <div class="flex">
      <div class="n8 text-left">
        <div class="icon-wrapper">
          <img src="images/logo.png" class="img-responsive" alt="maxine Blooms" title="Maxine Blooms" width="100%">
          <!-- <h1>Maxine Blooms</h1> -->
        </div>
      </div>
      <div class="n4 text-right relative">
        <div class="icons-wrapper flex justify-end">
          <div class="links">
            <a href="cart.php" class="relative">
              <i class="fas fa-shopping-cart icon"></i>
              <span class="absolute badge">3</span>
            </a>
            <a href="#" class="toggleCard">
              <i class="fas fa-bars"></i>
            </a>
          </div>
        </div>

        <div class="card relative has-shadow banner-card absolute hide">
          <i class="fas fa-times absolute close-icon"></i>
          <div class="card-heading">
            <h1>About Us</h1>
          </div>
          <div class="card-text">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
          </div>
          <div class="card-footer">

            <div class="top">

              <div class="block">
                <label>LANGUAGE</label>
                <select class="select-no-border" name="language">
                  <option value="eng">English</option>
                </select>
              </div>

              <div class="block">
                <label>CURRENCY</label>
                <select class="select-no-border" name="language">
                  <option value="usd">$ USD</option>
                  <option value="sgd">$ SGD</option>
                </select>
              </div>

            </div>

            <div class="socials">

              <ul>
                <li>
                  <i class="fas fa-phone icon"></i>
                  <span>(1245) 2468 012</span>
                </li>
                <li>
                  <i class="fas fa-envelope icon"></i>
                  <span>info@yourdomain.com</span>
                </li>
              </ul>

              <div class="social-icons">

                <a href="#" class="fb-icon">
                  <i class="fab fa-facebook-f"></i>
                </a>

                <a href="#" class="tw-icon">
                  <i class="fab fa-twitter"></i>
                </a>

                <a href="#" class="ln-icon">
                  <i class="fab fa-linkedin-in"></i>
                </a>

                <a href="#" class="yt-icon">
                  <i class="fab fa-youtube"></i>
                </a>

              </div>

            </div>

          </div>

        </div>

      </div>
    </div>
    <?php $categories = ['Fresh flowers', 'preserved flowers', 'personalized gifts', 'decor', 'greens', 'occassions', 'accessories']; ?>
    <?php $icons = ['1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png']; ?>
    <div class="flex">

      <div class="n8 text-left">

        <table class="category-list" id="categories_list">
          <?php $i=0; foreach( $categories as $cat ): ?>
          <?php $left = strlen($cat) < 11 ? strlen($cat) + (37 + 0.5) : ( strlen($cat) < 13 ? strlen($cat) + (37 + 1) : strlen($cat) + (39 + 5) ) ; ?>
          <tr>
            <td class="category-item" id="cat-main-<?=$i?>" subcatid="<?=$i?>">
              <div class="link-wrapper relative">
                <a href="" class="icon-label">
                  <div class="icon"><img src="images/bannericons/<?=$icons[$i]?>" alt="" width="32px" height="32px"></div>
                  <span class="catTitle"><?= $cat ?></span>
                </a>
                <ul id="subcats-<?=$i?>" class="subcats absolute <?=$i == 0 ? 'first' : ''?>" style="left: <?=$left?>%">
                  <li><a href="">Fruit Hamper/basket</a></li>
                  <li class="text-center"><a href="">hand bouquet</a></li>
                  <li><a href="">table arrangements</a></li>
                  <li><a href="">venue decors</a></li>
                  <span></span>
                  <div class="close close-subcats"><i class="far fa-times-circle"></i></div>
                </ul>
              </div>
            </td>
          </tr>
          <?php $i++; endforeach; ?>
        </table>

      </div>

      <div class="n4">

        <div class="flex justify-end">

          <div class="n12 flex justify-end">

          </div>
        </div>

      </div>

    </div>
  </div>

  <a class="absolute scroll hide-for-small-only" href="#scrolltarget"></a>

</section>
