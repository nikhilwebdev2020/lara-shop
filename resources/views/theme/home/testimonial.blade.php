<section class="testimonial">

  <h1>What they're saying</h1>

  <div class="testimonial-carousel relative">
  <?php for ($i=0; $i < 2; $i++) { ?>
    <div class="single-item item-<?=$i?> <?= $i==0 ? 'active' : '' ?>">
      <img src="https://picsum.photos/id/<?=$i+5?>/100/100" alt="" width="100" height="100">
      <p class="message">
        <?= $i == 0 ? 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, commodi aut magnam tempore beatae mollitia animi similique accusamus, maiores.' : 'These guys have been absolutely outstanding. Perfect themes and the best of all that you have many options to choose!' ?>
      </p>
      <p class="client"><span><?= $i == 0 ? 'John Doe' : 'jane Doe' ?></span>- Customer <?=$i?></p>
    </div>
  <?php } ?>

    <a onclick="plusSlides(-1)" class="btn-arrow arrow-left absolute"><i class="fas fa-arrow-left icon"></i></a>
    <a onclick="plusSlides(1)" class="btn-arrow arrow-right absolute"><i class="fas fa-arrow-right icon"></i></a>
  </div>

</section>
