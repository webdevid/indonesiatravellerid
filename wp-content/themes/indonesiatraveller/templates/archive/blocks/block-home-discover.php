<?php
$blocks =   block_field($block);
$discover = isset($block['discover_items']) ? $block['discover_items'] : '';
$discover_image = isset($block['discover_image']) ? wpe_image_single($block['discover_image'])['url'] : '';
?>
<style>
    .section-discover::before{
        background-image:url(<?php echo $discover_image;?>);
        background-repeat:no-repeat;
        background-size:cover;
        background-position:center center;
        background-attachment:fixed;
    }
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section discover -->
<div <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block section-discover _overlay">
    <div class="row">
        <div class="col-lg-4">
            <div class="discover-box _featured">
                <div class="box-layer-3">
                    <h3><?php echo $blocks['block_title']?></h3>
                    <?php echo $blocks['block_desc'];?>
                </div>
            </div>
        </div>
        <?php
        foreach($discover as $di){
            ?>
            <div class="col-lg-4">
                <div class="discover-box">
                    <div class="box-layer-1">
                        <div class="discover-box-thumbnail d-flex flex-row">
                            <img src="<?php echo get_template_directory_uri();  ?>/assets/images/logo/<?php echo $di['discover_image']; ?>">
                        </div>
                        <div class="discover-box-center">
                            <div class="discover-box-title"><?php echo $di['discover_title']; ?></div>
                            <div class="discover-box-site"><?php echo $di['discover_website']; ?></div>
                        </div>
                        <div class="discover-box-url text-uppercase"><a href="<?php echo $di['discover_url']; ?>">Visit website <i class="bi bi-arrow-up-right-square  align-self-end"></i></a></div>
                    </div>
                    <div class="box-layer-2">
                        <div class="discover-box-description">
                            <div class="discover-box-title"><?php echo $di['discover_title']; ?></div>
                            <div class="discover-box-site"><?php echo $di['discover_website']; ?></div>
                            <p><?php echo $di['discover_desc']; ?></p>
                        </div>
                        <div class="discover-box-url text-uppercase"><a href="<?php echo $di['discover_url']; ?>">Visit website <i class="bi bi-arrow-up-right-square  align-self-end"></i></a></div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
</div>