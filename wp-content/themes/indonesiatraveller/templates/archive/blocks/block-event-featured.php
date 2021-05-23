<?php
$blocks =   block_field($block);
$event = isset($block['event_items']) ? $block['event_items']: '';
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section event -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block">
    <?php
        wpe_block_part('_header',$blocks);
    ?>
    <div class="row g-0">
        <div class="col-lg-12">
            <?php
            if(isset($event[0])){
                wpe_block_part('_post-box-event-featured',$event[0]);
            }
            ?>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-6 d-flex align-items-stretch">
            <?php
            if(isset($event[1])){
                wpe_block_part('_post-box-event',$event[1]);
            }
            ?>
        </div>
        <div class="col-lg-6 d-flex align-items-stretch">
            <?php
            if(isset($event[2])){
                wpe_block_part('_post-box-event',$event[2]);
            }
            ?>
        </div>
    </div>
</div>