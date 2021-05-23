<?php
$blocks         =   block_field($block);
$jobs_items    = isset($block['jobs_items']) ? $block['jobs_items'] : '';
?>
<style>
    <?php echo $blocks['block_css_code']; ?>
</style>
<!-- section  jobs -->
<div  <?php if($blocks['block_id']!=''){ echo 'id="'.$blocks['block_id'].'"'; } ?> class="<?php echo $blocks['block_class']; ?> wpe-block section-jobs">
    <?php
    wpe_block_part('_header',$blocks);
    $class = '';
    $class5 = 'row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5';
    $class4 = 'row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4';
    if(count($jobs_items)==4){
        $class = $class4;
    }else{
        $class = $class5;
    }
    ?>
    <div class="row <?php echo $class; ?> job-lists justify-content-center">
        <?php
        $j=1;
        foreach($jobs_items as $job){
            if($j<=5){
                ?>
                <div class="col">
                    <div class="job-box h-100">
                        <div class="job-group">
                            <div class="job-box-type"><?php echo $job['jobs_position']; ?></div>
                            <div class="job-box-position"><?php echo $job['jobs_title']; ?></div>
                        </div>
                        <div class="job-box-bottom">
                            <div class="job-box-location"><?php echo $job['jobs_location']; ?></div>
                            <div class="job-box-button"><a href="<?php echo $job['jobs_url']; ?>" class="btn btn-dark d-block mt-4"><?php if($job['jobs_button']){ echo $job['jobs_button']; }else{ echo 'Apply now'; }  ?></a></div>
                            <div class="job-box-date">Last updated on <?php echo wpe_date($job['jobs_date']); ?></div>
                        </div>
                    </div>
                </div>
                <?php
            }
            $j++;
        }
        ?>
    </div>
    <?php
    wpe_block_part('_linkmore',$blocks);
    ?>
</div>