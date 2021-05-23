<?php
$blocks =   block_field($block);
$html_code =isset($block['text_html']) ? $block['text_html'] : '';
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section news -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block block-fullwidth-text">
    <?php
    wpe_block_part('_header',$blocks);
    ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $html_code; ?>
        </div>
    </div>
    <?php
    wpe_block_part('_linkmore',$blocks);
    ?>
</div>