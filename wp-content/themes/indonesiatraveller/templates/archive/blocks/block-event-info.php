<?php
$blocks =   block_field($block);
$info_items = isset($block['info_items']) ? $block['info_items']: '';
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- further info -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block section-info">
    <?php
        wpe_block_part('_header',$blocks);
    ?>
    <div class="row text-center">
        <?php
        foreach($info_items as $info){
            ?>
            <div class="col-lg-3">
                <h4 class="inquery-name"><?php echo $info['info_name'];?></h4>
                <div class="inquery-position"><?php echo $info['info_position'];?></div>
                <a href="" class="inquery-email"><?php echo $info['info_email'];?></a>
            </div>
            <?php
        }
        ?>
    </div>
</div>