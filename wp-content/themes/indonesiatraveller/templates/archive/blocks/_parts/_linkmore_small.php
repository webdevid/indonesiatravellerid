<?php
if($block['link_more_url']){
    ?>
    <div class="row">
        <div class="gap-2 col-lg-12 col-sm-12 d-flex justify-content-end">
            <a href="<?php echo $block['link_more_url']; ?>" class="link-more btn btn-outline-secondary"><?php echo $block['link_more_title']; ?></a>
        </div>
    </div>
    <?php
}
?>