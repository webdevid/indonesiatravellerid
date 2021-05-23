<?php
$blocks =   block_field($block);
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section subscription -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block section-logo">
    <div class="row">
        <div class="col-lg-3">
            <div class="logo-text">
                <h3><?php echo $block['block_title']; ?></h3>
                <p><?php echo $block['block_desc']; ?></p>
            </div>
        </div>
        <div class="col-lg-9 ms-auto align-self-center">
            <div class="logo-list">
                <?php echo $block['html_code']; ?>
                <a href="" class="logo-cifor-icraf">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/CIFOR-ICRAF-logo.svg" alt=" cifor-icraf">
                </a>
                <a href="" class="logo-fta">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/CGIAR-FTA-green-logo-en.svg" alt=" cifor-icraf">
                </a>
                <a href="" class="logo-glf">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/GLF-logo-green-landscape.svg" alt=" cifor-icraf">
                </a>
                <a href="" class="logo-rl">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/Resilient-Landscapes-short-logo.svg" alt=" cifor-icraf">
                </a>
            </div>
        </div>
    </div>
</div>