<?php
$blocks =   block_field($block);
$layout = isset($block['layout']) ? $block['layout'] : '';
$column = isset($block['column']) ? $block['column'] : 2;

?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?>  wpe-block">
        <?php
            wpe_block_part('tpl-block-header',$blocks);
            $class = '';
            switch ($layout) {
                case 'cover':
                    $class=" -grid -cover ";
                    break;
                case 'grid':
                    $class=" -grid ";
                    break;
                case 'list':
                    $class=" -list -right ";
                    break;
                default:
                    $class=" -list";
                    break;
            }

            //Columns must be a factor of 12 (1,2,3,4,6,12)
            $numOfCols = $column;
            $rowCount = 0;
            $bootstrapColWidth = 12 / $numOfCols;

            if($column > 3){

                echo '<div class="row post-items row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">';
            }else{
                echo '<div class="row post-items">';
            }


            $blocks = array(
                'post_type'=>array('post'),
            );

            $the_query = new WP_Query( $blocks);
            // The Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();

                    $result = array(
                        'd_id'=>get_the_ID(),
                        'd_title'=> get_the_title(),
                        'd_excerpt'=> get_the_excerpt(),
                        'd_label'=> '',
                        'd_date'=> get_the_date( 'd M Y' ),
                        'd_image'=> get_post_thumbnail_id(),
                        'd_author'=>get_the_author(),
                        'd_link'=> get_the_permalink()
                    );

                    if($column > 3){
                        echo '<div class="col d-flex align-items-stretch">';
                    }else{
                        echo '<div class="col-lg-'.$bootstrapColWidth,' d-flex align-items-stretch">';
                    }
                            wpe_block_part('tpl-post', $result, $class, $block);
                    echo '</div>';

                    $rowCount++;
                    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
                }
            } else {
                // no posts found
            }
            echo '</div>';

            /*

        ?>
        <div class="row">
            <?php for($i=1;$i<=4;$i++){ ?>
            <div class="col-lg-3 d-flex align-items-stretch">
                <?php
                $block_option = array(
                    'show_label'=>true,
                    'show_date'=>true,
                    'show_image'=>true,
                );
                wpe_block_part('tpl-post',array(),'-grid',$block_option);
                ?>
            </div>
            <?php } ?>
        </div>
        <?php
            wpe_block_part('tpl-block-header',$blocks);
        ?>
        <div class="row">
            <?php for($i=1;$i<=2;$i++){ ?>
                <div class="col-lg-6 col-xl-6 d-flex align-items-stretch">
                    <?php
                    $block_option = array(
                        'show_label'=>true,
                        'show_date'=>true,
                        'show_excerpt'=>true,
                        'show_image'=>true,
                    );
                    wpe_block_part('tpl-post',array(),'',$block_option);
                    ?>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-lg-6 col-xl-6">
                <?php
                    wpe_block_part('tpl-block-header',$blocks);
                ?>
                <?php for($i=1;$i<=4;$i++){ ?>
                    <?php
                    $block_option = array(
                        'show_label'=>true,
                        'show_date'=>true,
                        'show_image'=>true,
                    );
                    wpe_block_part('tpl-post',array(),'-list -right',$block_option);
                    ?>
                <?php } ?>
            </div>
            <div class="col-lg-6 col-xl-6">
                <?php
                    wpe_block_part('tpl-block-header',$blocks);
                ?>
                <?php for($i=1;$i<=4;$i++){ ?>
                    <?php
                    $block_option = array(
                        'show_label'=>true,
                        'show_date'=>true,
                        'show_image'=>true,
                    );
                    wpe_block_part('tpl-post',array(),'-list -right',$block_option);
                    ?>
                <?php } ?>
            </div>
        </div>

        */ ?>
</div>