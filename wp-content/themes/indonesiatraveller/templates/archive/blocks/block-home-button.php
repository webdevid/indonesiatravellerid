<?php
$blocks     =   block_field($block);
$html_code  =   isset($block['text_html']) ? $block['text_html'] : '';
$buttons    =   isset($block['button_items']) ? $block['button_items'] : '';

?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section news -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block block-fullwidth-text">
    <?php
    wpe_block_part('_header',$blocks);

    $numOfCols = 3;
    $rowCount = 0;
    $bootstrapColWidth = 12 / $numOfCols;

    echo '<div class="row justify-content-center">';
    foreach ($buttons as $btn){
        echo '  <div class="col-lg-'.$bootstrapColWidth.' d-grid gap-2">
                    <a href="'.$btn['button_url'].'" class="btn btn-outline-secondary btn-lg mb-4">'.$btn['button_title'].'</a>
                </div>';
        $rowCount++;
        if($rowCount % $numOfCols == 0) echo '</div> <div class="row justify-content-center">';
    }
    echo '</div>';

    wpe_block_part('_linkmore',$blocks);
    ?>
</div>