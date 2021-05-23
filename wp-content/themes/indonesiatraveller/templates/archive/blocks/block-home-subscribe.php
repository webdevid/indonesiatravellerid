<?php
$blocks =   block_field($block);
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section subscription -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block section-subscription">
    <div class="row">
        <div class="col-lg-6">
            <div class="subscription-description">
            <h3><?php echo $block['block_title']; ?></h3>
            <p><?php echo $block['block_desc']; ?></p>
            </div>
        </div>
        <div class="col-lg-6 ms-auto align-self-center">
            <form action="<?php echo $block['subscribe_url']; ?>" method="get">
                <div class="input-group">
                    <input type="text" class="form-control form-control-lg" placeholder="<?php echo $block['subscribe_placeholder']; ?>" aria-label="<?php echo $block['subscribe_placeholder']; ?>">
                    <button class="btn btn-secondary form-control-lg" type="submit">Sign up</button>
                </div>
            </form>
        </div>
    </div>
</div>