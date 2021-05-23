<?php
$blocks         =   block_field($block);
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block _section">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="wpe-section-title"><?php echo $block['block_title']; ?></h2>
        </div>
    </div>
    <?php
    global $wpdb;
    $sql = "SELECT * FROM {$wpdb->prefix}_bot ORDER BY order_bot";
    $results = $wpdb->get_results(  $sql , OBJECT );

    $numOfCols = 4;
    $rowCount = 0;
    $bootstrapColWidth = 12 / $numOfCols;
    echo '
    <div class="block-bot">
        <div class="row">';
            foreach($results as $bot){
                echo '
                    <div class="col-lg-'.$bootstrapColWidth.' col-6 bot-grid">
                        <a href="'.site_url().'/about/board-of-trustees'.'/'.$bot->slug.'/">
                            <div class="bot-box">
                                <div class="bot-image">
                                    <img src="'.$bot->image.'" width="200">
                                </div>
                                <div class="clearfix"></div>
                                <div class="bot-text">
                                    <div class="bot-name">'.$bot->name.'</div>
                                    <div class="bot-position">'.$bot->position.'</div>
                                    <div class="bot-profession">'.$bot->profession.'</div>
                                </div>
                            </div>
                        </a>

                    </div>';
                $rowCount++;

            }

            $num_posts = count($results);
            $loop = $num_posts % $numOfCols;//$length - $num_posts;

            // handle if content item in one row lest than 4
            // 8/14/2019, 1:29:27 PM
            if($loop > 0){
                for($i=1;$i<=($numOfCols-$loop);$i++){
                    echo '<div class="col-'.$bootstrapColWidth.'">
                            </div>';
                }
            }


        echo
        '</div>
    </div>
        ';


?>
</div>