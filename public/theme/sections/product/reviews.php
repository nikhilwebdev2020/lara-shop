<div class="flex">

  <div class="n8">
    <div class="reviews-list">
      <?php $reviews = true; ?>
        <?php if( $reviews ): ?>
        <?php for ($i=0; $i < 2; $i++) { ?>

        <div class="single-review flex mt-1">
          <div class="user">
            <i class="far fa-user"></i>
            <div class="block">
              <p>John Doe</p>
              <div class="date-wrap font-12 font-light">Sep 12, 2022</div>
            </div>
          </div>
          <div class="review">
              <div class="block">
                <div class="review-title font-dark">This was nice.</div>
                <p class="font-12 font-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
              </div>
          </div>
        </div>

        <?php } ?>
      <?php else: ?>

        <div class="no-review text-center">
          <h3 class="font-dark">Not reviewed yet.</h3>
        </div>

      <?php endif; ?>

    </div>
  </div>

  <div class="n4">
    <div class="review-form">
      <h2 class="font-dark">Leave a Review:</h2>
      <?php if( $reviews ): ?>
      <form class="form-wrap" action="" method="post">

        <label>Review Title</label>
        <input type="text" name="Type a Title" value="" placeholder="Title">

        <label>Write your Review</label>
        <textarea name="review" rows="3" placeholder="Review.."></textarea>

        <input type="submit" name="submit_review" value="Submit" class="button submit-review">

      </form>
      <?php else: ?>

      <div id="respond" class="comment-respond">
          <p class="must-log-in">You must be <a href="">logged in</a> to post a review.</p>
      </div>

    <?php endif; ?>

    </div>
  </div>

</div>
