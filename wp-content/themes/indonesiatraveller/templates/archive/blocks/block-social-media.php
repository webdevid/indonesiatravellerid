<?php
$blocks         =   block_field($block);
$block_id = isset($block['block_id']) ? $block['block_id'] : '';
$class    = isset($block['block_class']) ?  $block['block_class'] : '';
$block_css_code = isset($block['block_css_code']) ? $block['block_css_code'] : '';
$block_title = isset($block['block_title']) ? $block['block_title'] : '';
$block_desc = isset($block['block_desc']) ? $block['block_desc'] : '';
?>

<div id="<?php echo $block_id; ?>" class="section sosmed-section <?php echo $class; ?>">
    <div class="row mb-2">
        <div class="col-md-12">
            <h3 class="m-weight-700 lead-34"><?php echo $block_title; ?></h3>
            <?php 
              if ($block_desc) {
                ?>
                  <p><?php echo $block_desc; ?></p>
                <?php
              } 
            ?>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php
                sosmed_each($block['column_01']);
            ?>
        </div>
        <div class="col-md-6">
            <?php
                sosmed_each($block['column_02']);
            ?>
        </div>
    </div>
</div>