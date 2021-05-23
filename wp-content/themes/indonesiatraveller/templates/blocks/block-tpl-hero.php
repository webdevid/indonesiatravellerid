<?php
$blocks =   block_field($block);
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<div <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block section-hero">
    <div class="page-hero">
        <div class="page-hero_image">
            <!-- <img src="https://via.placeholder.com/1600x600/f8f8f8/dddddd/"> -->
        </div>
        <div class="page-hero_content -light d-flex align-items-center">
            <div>
                <div class="row">
                    <div class="col-lg-4 col-xl-4 col-12">
                        <div class="hero-thumb">
                            <img src="https://via.placeholder.com/400x300/f8f8f8/dddddd/">
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-7 col-12">
                        <span class="hero-label"><a href="#">Travel news</a></span>
                        <h1 class="hero-title mb-3">Kyoto and Nara 2 or 3-Day Bullet Train Tour from Tokyo</h1>
                        <div class="hero-description">
                            <p>Ex modi praesentium veritatis perferendis, voluptatem quod quos Ex modi praesentium
                                veritatis perferendis, voluptatem quod quos nulla corrupti nihil et architecto expedita.
                                nulla corrupti nihil et architecto expedita.</p>
                        </div>
                        <button type="button" class="btn btn-outline-light mt-3">Read more</button>
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <div class="col-12">
                        <span class="hero-label"><a href="#">Featured posts</a></span>
                    </div>
                </div>
                    <?php
                    //Columns must be a factor of 12 (1,2,3,4,6,12)
                    $numOfCols = 3;
                    $rowCount = 0;
                    $bootstrapColWidth = 12 / $numOfCols;
                    echo '<div class="row g-0">';

                    $blocks = array(
                        'post_type'=>array('post'),
                        'showposts'=>3,
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
                                'd_link'=> get_the_permalink()
                            );

                            echo '<div class="col-lg-'.$bootstrapColWidth,' d-flex align-items-stretch">';
                                    wpe_block_part('tpl-post', $result, '-hero shadow-sm', $block);
                            echo '</div>';

                            $rowCount++;
                            if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
                        }
                    } else {
                        // no posts found
                    }
                    echo '</div>';
                            ?>
            </div>
        </div>
    </div>
</div>