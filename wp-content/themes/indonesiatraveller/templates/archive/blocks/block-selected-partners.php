<?php
$blocks   =   block_field($block);
$block_id = isset($block['block_id']) ? $block['block_id'] : '';
$class    = isset($block['block_class']) ?  $block['block_class'] : '';
$css_code = isset($block['block_css_code']) ? $block['block_css_code'] : '';

$selected_id        = array();
$results_featured   = array();
$results_selected   = array();
global $wpdb;
$blog_id = get_current_blog_id();

if ( ! function_exists( 'print_partners' ) ) :
    function print_partners ($partner, $colType) {
        $html = '';
        $halfAmount = ceil(count($partner)/2);

        if ($colType == 'first') {
            $start = 0;
            $end = $halfAmount - 1;
        } else {
            $start = $halfAmount;
            $end = count($partner) - 1;
        }

        for ($i = $start; $i <= $end; $i++) {
            $image = $partner[$i]->image ? get_site_url()."/wp-content/uploads/donor/".$partner[$i]->image : get_template_directory_uri().'/assets/images/placeholder.svg';
            $date_update = strtotime($partner[$i]->date);
            $date = strtotime('2019/10/30');

            if($date_update > $date){
                $image = $partner[$i]->image;
            }

            $arg = array(
                'id'=>$partner[$i]->id,
                'title'=>$partner[$i]->title,
                'link'=>site_url('/partners').'/'.$partner[$i]->slug,
                'image'=>$image,
                'year'=> '',
                'type'=> '',
                'date'=> $partner[$i]->date,
            );

        $html .= '<ul class="mb-1">
                <li>
                    <span>'.$arg['title'].'</span>
                </li>
            </ul>';
        }

        return $html;
    }
endif;

// handle partner featured
$partner_featured = isset($block['partner_featured']) ? $block['partner_featured'] : array();
if(count($partner_featured) > 0){
    foreach($partner_featured as $pf){
        $selected_id[] = isset($pf['partner_item'][0]) ? $pf['partner_item'][0] : '';
    }
    $data_featured_id = implode(',',$selected_id);
    $data_featured_id = rtrim($data_featured_id, ",");
    if ( is_main_site( $blog_id ) ) {
        // display something special for the main site.
        $sql_featured = "SELECT * FROM {$wpdb->prefix}_donor WHERE id IN ($data_featured_id) ORDER BY FIELD(id,$data_featured_id)";
    }else{
        switch_to_blog( 1 );
            $sql_featured = "SELECT * FROM {$wpdb->prefix}_donor WHERE id IN ($data_featured_id) ORDER BY FIELD(id,$data_featured_id)";
        restore_current_blog();
    }

    $results_featured = $wpdb->get_results( "$sql_featured", OBJECT );
    //show($sql_featured);
}

// handle partner selected
$partner_selected = isset($block['content_type']) ? $block['content_type'] : array();
if(count($partner_selected) > 0){
    $data_in = implode(',',$partner_selected);
    $data_in = rtrim($data_in, ",");
    if ( is_main_site( $blog_id ) ) {
        // display something special for the main site.
        $sql_selected = "SELECT * FROM {$wpdb->prefix}_donor WHERE id IN ($data_in) ORDER BY title ASC";
    }else{
        switch_to_blog( 1 );
            $sql_selected = "SELECT * FROM {$wpdb->prefix}_donor WHERE id IN ($data_in) ORDER BY title ASC";
        restore_current_blog();
    }
    $results_selected = $wpdb->get_results( "$sql_selected", OBJECT );
}

$partner = array_merge($results_featured,$results_selected);

if($css_code){
echo '<style>'.$css_code.'</style>';
}
echo '<div id="'.$block_id.'" class="'.$class.'">';

$block_layout = isset($block['block_layout']) ? $block['block_layout'] : 'grid';
$hide_image = $block['hide_image'];

// var_dump($hide_image);
// var_dump($block['hide_image']);

$class = isset($block['hide_image']) ? 'hide-image' : '';

$n=1;
$numOfCols = $block['block_column'] !== '0' ? $block['block_column'] : 4;
$rowCount = 0;
$ColWidth = 12 / $numOfCols;


echo '<h3 class="mt-5">'.$block['block_title'].'</h3>';
echo '<div>'.$block['block_desc'].'</div>';



if($block_layout=='grid'){
    echo '<div class="row m-margin-bottom-20 partner-'.$block_layout.' '.$class.'">';

    foreach($partner as $row){

        $image = $row->image ? get_site_url()."/wp-content/uploads/donor/".$row->image : get_template_directory_uri().'/assets/images/placeholder.svg';
        $date_update = strtotime($row->date);
        $date = strtotime('2019/10/30');

        if($date_update > $date){
            $image = $row->image;
        }

        $arg = array(
            'id'=>$row->id,
            'title'=>$row->title,
            'link'=>site_url('/partners').'/'.$row->slug,
            'image'=>$image,
            'year'=> '',
            'type'=> '',
            'date'=> $row->date,
        );
        $html ='<div class="col-md-'.$ColWidth.' col-xs-6 col-sm-6">
                <div class="partner_loop_item">';
        //$html .= $arg['image'];



        if($hide_image!=TRUE){
            $html .= '
                        <a href="'.$arg['link'].'">
                            <div class="partner_loop_thumb">
                                <span class="helper"></span>
                                <img src="'.$arg['image'].'" class="img-fluid">
                            </div>
                        </a>';
        } // hide image true
        $html .='
                    <h4 class="m-weight-700 partner_loop_title">
                        <a href="'.$arg['link'].'" class="m-link-dark" title="'.$arg['title'].'" >
                            '.$arg['title'].'
                        </a>
                    </h4>
                </div>
            </div>';

        echo $html;

        $rowCount++;
        if($rowCount % $numOfCols == 0){
            echo '</div><div class="row m-margin-bottom-20">';
        }
    }
    echo '</div>';

}elseif($block_layout=='inline'){

    echo '<div class="columns-10 middle-md m-margin-bottom-30 partner-list-items" style="justify-content: flex-start;">';
    foreach($partner as $row){

        $image = $row->image ? get_site_url()."/wp-content/uploads/donor/".$row->image : get_template_directory_uri().'/assets/images/placeholder.svg';
        $date_update = strtotime($row->date);
        $date = strtotime('2019/10/30');

        if($date_update > $date){
            $image = $row->image;
        }

        $arg = array(
            'id'=>$row->id,
            'title'=>$row->title,
            'link'=>site_url('/partners').'/'.$row->slug,
            'image'=>$image,
            'year'=> '',
            'type'=> '',
            'date'=> $row->date,
        );

        echo '

        <div class="m-margin-xs-bottom-30 partner-item">
            <a href="'.$arg['link'].'">
                <img src="'.$arg['image'].'" alt="'.$arg['title'].'" class="logo-partner-on-team">
            </a>
        </div>';
    }
    echo '</div>';

}else{
    ?>
    <div class="row">
        <div class="col-md-6">
            <?php echo print_partners($partner, 'first'); ?>
        </div>
        <div class="col-md-6">
            <?php echo print_partners($partner, 'second'); ?>
        </div>
    </div>
    <?php

    
}

echo '</div>';

//show($results);