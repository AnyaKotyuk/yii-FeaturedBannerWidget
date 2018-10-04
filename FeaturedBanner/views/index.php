<div class="featured-banner">
    <?php
    foreach ($banners as $k=>$banner) {
    $class = (!$k)?'active':''; ?>
    <div class="<?= $class ?>" style="background-image: url(<?= $banner['image'] ?>)">
        <div>
            <h2>
                <p>
                    <span><?= $banner['header'] ?></span>
                </p>
            </h2>
            <div class="details">
                <?= $banner['content']; ?>
            </div>
        </div>
        <span class="circle">
            <span></span>
        </span>
    </div>
    <?php } ?>
</div>
