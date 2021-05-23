<?php
if($block['link_more_url']){
    ?>
    <div class="row">
        <div class="d-grid gap-2 col-lg-3 col-sm-12 mx-auto mt-5">
            <a href="<?php echo $block['link_more_url']; ?>" class="btn btn-outline-secondary btn-lg"><?php echo $block['link_more_title']; ?></a>
        </div>
    </div>
    <?php
}
?>