<?php include('partials/header.php') ?>

<?php include('sections/top-nav.php') ?>

<main class="page">

    <?php include('sections/inner/page-banner.php') ?>

    <?php include('sections/inner/breadcrumb-alt.php') ?>

    <section class="product-detail fixed-width">
        <div class="flex no-align">

            <div class="n6">
                <?php include('sections/product/product-images.php'); ?>
            </div>
            <div class="n6">
                <?php include('sections/product/details.php'); ?>
            </div>
        </div>
    </section>

    <section class="product-description fixed-width">
        <div class="block flex">
            <a href="" class="tabs button font-dark" data-target="#tab1">Description <i
                    class="fas fa-caret-down"></i></a>
            <a href="" class="tabs button font-dark active" data-target="#tab2">Disclaimer <i
                    class="fas fa-caret-down"></i></a>
            <a href="" class="tabs button font-dark" data-target="#tab3">Reviews <i class="fas fa-caret-down"></i></a>
        </div>
        <div class="block">
            <div class="tab" id="tab1">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente praesentium, blanditiis ratione fugit
                accusamus officia dignissimos explicabo molestias labore. Nulla, voluptatum. Nihil tempora suscipit
                minus dolore, accusantium quos molestias quibusdam.
            </div>
            <div class="tab active" id="tab2">
                <?php include('sections/product/disclaimer.php') ?>
            </div>
            <div class="tab review-tab" id="tab3">
                <?php include('sections/product/reviews.php') ?>
            </div>
        </div>
    </section>

      <?php include('sections/related-products.php') ?>

</main>

<script>
function clearActive(element) {
    for (i = 0; i < element.length; i++) {
        element[i].classList.remove('active');
    }
}

let tab = document.getElementsByClassName('tab');
let tabs = document.getElementsByClassName('tabs');
for (i = 0; i < tabs.length; i++) {

    tabs[i].addEventListener('click', function(e) {
        e.preventDefault();
        const target = this.getAttribute('data-target');
        clearActive(tab);
        clearActive(tabs);
        this.classList.add('active');
        document.querySelector(target).classList.add('active');
    });

}
</script>

<script>
const thumb = document.getElementsByClassName('thumb');
const main = document.getElementById('main-img');
for (i = 0; i < thumb.length; i++) {
    thumb[i].addEventListener('click', function(e) {
        e.preventDefault();
        clearActive(thumb);
        this.classList.add('active');
        const src = this.getAttribute('data-src');
        toappend = document.createElement('img');
        toappend.src = src;
        main.innerHTML = '';
        main.appendChild(toappend);
    });
}
</script>
<?php include('partials/footer.php') ?>
