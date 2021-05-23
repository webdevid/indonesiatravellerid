<?php
function wpe_template_part($file,$data){
    require get_theme_file_path('/templates/parts/'.$file.'.php');
}

function wpe_event_template_part($file,$block){
    require get_theme_file_path('/events/parts/'.$file.'.php');
}

function wpe_left_menu($post_id){
    $vars       = $GLOBALS['wp_query']->query_vars;
    $leftnav = array();


    if($vars['post_type']=='event'){
        if(isset($vars['session_event'])){
            $leftnav = array(
                array(
                    'cf_link'=> '',
                    'cf_title'=> 'Menu',
                    'cf_class'=>''
                ),array(
                'cf_link'=> get_the_permalink(),
                'cf_title'=> 'Back to event',
                'cf_class'=>''
            )
            );
        }
        wpe_template_part('_left-menu',$leftnav);
    }else{

        $parent_id = wp_get_post_parent_id( $post_id);
        $sidemenu_child = carbon_get_post_meta($parent_id,'enable_sidemenu_child');
        $menu_left_page = carbon_get_post_meta($post_id,'enable_sidemenu_page');

        if($menu_left_page==1){
            $leftnav = carbon_get_post_meta($post_id,'sidemenu_list_page');
        }elseif($sidemenu_child==1){
            $leftnav = carbon_get_post_meta($parent_id,'sidemenu_list_page');
        }
        wpe_template_part('_left-menu',$leftnav);
    }

}

function wpe_event_time($cf_agenda_time_label,$cf_agenda_day_item_time,$cf_agenda_day_item_endtime){
    // handle time event
    if (!empty($cf_agenda_time_label)){
        $event_time = $cf_agenda_time_label;
    }else{
        $startTime  = $cf_agenda_day_item_time;
        $endTime    = $cf_agenda_day_item_endtime;

        $newStartTime = date('h:i A', strtotime($startTime));
        $newEndTime = date('h:i A', strtotime($endTime));

        if (date('A', strtotime($startTime)) == date('A', strtotime($endTime)))  {
            $event_time = substr($newStartTime,0,5).'-'.$newEndTime;
        }else{
            $event_time = $newStartTime.'-'.$newEndTime;
        }
    }

    return $event_time;
}

function wpe_share_link($title,$url,$style){
    $fb = 'https://www.facebook.com/sharer/sharer.php?u='.$url;
    $tw = 'https://twitter.com/intent/tweet?text='.$title.'&url='.$url;
    $in = 'http://www.linkedin.com/shareArticle?mini=true&amp;url='.$url.'&summary='.$title.'&title='.$title;
    $mail = 'mailto:?subject=Cifor Share '.$title.'&body= '.$title.'<br> source '.$url;
    $ig = 'https://www.instagram.com/cifor_forests/';

    if($style==1){

        echo '<a href="#" class="share-page"><i class="bi bi-share"></i> SHARE THIS PAGE</a>
        <div class="share-page_link">
                <a href="'.$fb.'" title="Share '.get_option( 'blogname' ).'"><img src="'.get_template_directory_uri().'/assets/images/icons/socmed/fb-white.svg" alt="Facebook '.get_option( 'blogname' ).'"></a>
                <a href="'.$tw.'" title="Share '.get_option( 'blogname' ).'"><img src="'.get_template_directory_uri().'/assets/images/icons/socmed/tw-white.svg" alt="Twitter '.get_option( 'blogname' ).'"></a>
                <a href="'.$in.'" title="Share '.get_option( 'blogname' ).'"><img src="'.get_template_directory_uri().'/assets/images/icons/socmed/in-white.svg" alt=" LinkedIn '.get_option( 'blogname' ).'"></a>
                <a href="'.$ig.'" title="Share '.get_option( 'blogname' ).'"><img src="'.get_template_directory_uri().'/assets/images/icons/socmed/ig-white.svg'.'" alt="Instagram '.get_option( 'blogname' ).'"></a>
                <a href="'.$mail.'" title="Share '.get_option( 'blogname' ).'"><img src="'.get_template_directory_uri().'/assets/images/icons/socmed/email-white.svg" alt="Email '.get_option( 'blogname' ).'"></a>
                <a href="#" class="close"><i class="bi bi-x"></i></a>
        </div>';

    }elseif($style==2){
        echo '<div class="sidebar-share">
            <label>Share this to</label>
            <!-- // icon socmed by font awesome  -->
            <a href="'.$fb.'" title="Share '.get_option( 'blogname' ).'"><img src="'.get_template_directory_uri().'/assets/images/icons/socmed/fb-white.svg'.'" alt="Facebook '.get_option( 'blogname' ).'"></a>
            <a href="'.$tw.'" title="Share '.get_option( 'blogname' ).'"><img src="'.get_template_directory_uri().'/assets/images/icons/socmed/tw-white.svg'.'" alt="Twitter '.get_option( 'blogname' ).'"></a>
            <a href="'.$in.'" title="Share '.get_option( 'blogname' ).'"><img src="'.get_template_directory_uri().'/assets/images/icons/socmed/in-white.svg'.'" alt=" LinkedIn '.get_option( 'blogname' ).'"></a>
            <a href="'.$ig.'" title="Share '.get_option( 'blogname' ).'"><img src="'.get_template_directory_uri().'/assets/images/icons/socmed/ig-white.svg'.'" alt="Instagram '.get_option( 'blogname' ).'"></a>
            <a href="'.$mail.'" title="Share '.get_option( 'blogname' ).'"><img src="'.get_template_directory_uri().'/assets/images/icons/socmed/email-white.svg'.'" alt="Email '.get_option( 'blogname' ).'"></a>
        </div>';
    }
}

// if(!function_exists('get_all_donor')){
//     function get_all_donor(){
//         if(isset($_GET['post'])){
//             global $wpdb;
//             $data = $wpdb->get_results("select * FROM wp__donor");
//             $donor_array = array();
//             foreach($data as $donor){
//                 $donor_array[$donor->id] = $donor->title;
//             }
//             return $donor_array;
//         }else{
//             return array();
//         }
//     }
// }

if(!function_exists('sosmed_list')){
    function sosmed_list(){
        $array = array(
            ''=>'--',
            'facebook.svg'=>'Facebook',
            'twitter.svg'=>'Twitter',
            'instagram.svg'=>'Instagram',
            'flickr.svg'=>'Flickr',
            'youtube.svg'=>'Youtube',
            'slideshare.svg'=>'Slideshare',
            'linkedin.svg'=>'Linkedin',
        );

        return  $array;
    }
}

function sosmed_each($data){

	if(isset($data)){
		foreach($data as $sl){
			echo '
			<div class="sosmed-list mb-5">
				<strong><span class="mb-2 d-inline-block">'.$sl['group_title'].'</span></strong>';
				echo '<ul class="list-unstyled">';
					foreach($sl['group'] as $sli){
						$sosmed_item = isset($sli['sosmed_item']) ? $sli['sosmed_item'] : 'facebook.svg';
						$class = str_replace('.svg','',$sosmed_item);
						echo '
						<li>
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <a href="#"><img class="sosmed-icon" src="'.site_url().'/wp-content/uploads/svg/'.$sosmed_item.'"></a>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    <div class="sosmed-title '.$class.'"><a href="'.$sli['source_link'].'">'.$sli['source_title'].'</a></div>
                                </div>
                            </div>
						</li>';
					}
				echo '</ul>';
			echo '
			</div>
			';
		}
	}
}
?>