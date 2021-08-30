<section class="category-section">

  <!-- <div class="owl-carousel" data-flickity='{ "groupCells": 4, "freeScroll": false, "pageDots": false, "draggable": true, "wrapAround": true, "cellAlign": "center", "contain": false }'> -->
  <div class="main-carousel owl-carousel relative" id="scrolltarget">
      <?php for ($i=0; $i < 8; $i++) { ?>

        <div class="carousel-cell">
            <div class="single-category relative">

              <a href="https://picsum.photos/id/<?=$i+5?>/280/280">
                <img src="https://picsum.photos/id/<?=$i+5?>/280/280" alt="">
              </a>

              <div class="category-title absolute text-center">
                <h2><?=uniqid($i)?> sadwadw </h2>
              </div>

            </div>
        </div>

      <?php } ?>

  </div>

</section>
