<div class="product-images">

    <div class="flex no-align">

        <div class="thumbnails flex">
            <a class="thumb active" href="" data-src="https://picsum.photos/id/<?=isset($_GET['id']) ? $_GET['id'] : 1?>/440/440">
                <img src="https://picsum.photos/id/<?=isset($_GET['id']) ? $_GET['id'] : 1?>/100/100" alt="">
            </a>
            <a class="thumb" href="" data-src="https://picsum.photos/id/<?=isset($_GET['id']) ? $_GET['id']+2 : 2?>/440/440">
                <img src="https://picsum.photos/id/<?=isset($_GET['id']) ? $_GET['id']+1 : 2?>/100/100" alt="">
            </a>
            <a class="thumb" href="" data-src="https://picsum.photos/id/<?=isset($_GET['id']) ? $_GET['id']+3 : 3?>/440/440">
                <img src="https://picsum.photos/id/<?=isset($_GET['id']) ? $_GET['id']+1 : 3?>/100/100" alt="">
            </a>
            <a class="thumb" href="" data-src="https://picsum.photos/id/<?=isset($_GET['id']) ? $_GET['id']+4 : 4?>/440/440">
                <img src="https://picsum.photos/id/<?=isset($_GET['id']) ? $_GET['id']+4 : 4?>/100/100" alt="">
            </a>
        </div>

        <div class="main-image" id="main-img">
            <img src="https://picsum.photos/id/<?=isset($_GET['id']) ? $_GET['id'] : 1?>/440/440" alt="">
        </div>

    </div>

</div>
