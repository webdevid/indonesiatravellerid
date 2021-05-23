<?php

/**
 * Nav menu walker
 */
class Bridge_Walker_Nav_Menu extends Walker_Nav_Menu {

	/**
	 * Prepare item
	 *
	 * @param  object $item  Menu Item.
	 * @param  array  $args  Arguments passed to walk().
	 * @param  int    $depth Item's depth.
	 * @return array
	 */
	protected function prepare_item( $item, $args, $depth ) {



		$title   = apply_filters( 'the_title', $item->title, $item->ID );
		$title   = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
		$classes = apply_filters( 'nav_menu_css_class', array_filter( $item->classes ), $item, $args, $depth );

		global $wp;
		$current_url = home_url( add_query_arg( array(), $wp->request ) ).'/';

		$classx = isset($classes[0]) ? $classes[0] : '';
		$classes = $classx.' menu-'.$item->object.' menu-'.$item->object_id ;
		if($item->url==$current_url){
			$classes .= ' current-menu-item active';
		}

		return array(
			'id'          => absint( $item->ID ),
			'order'       => (int) $item->menu_order,
			'parent'      => absint( $item->menu_item_parent ),
			'title'       => $title,
			'url'         => $item->url,
			'attr'        => $item->attr_title,
			'target'      => $item->target,
			'classes'     => $classes,
			'xfn'         => $item->xfn,
			'description' => $item->description,
			'object_id'   => absint( $item->object_id ),
			'object'      => $item->object,
			'type'        => $item->type,
			'type_label'  => $item->type_label,
			'children'    => array(),
			//'crb_meta'    => get_post_meta($item->ID),
            // 'crb_megamenu'         		=> carbon_get_nav_menu_item_meta( $item->ID, 'crb_megamenu' ),
            // 'crb_megamenu_column'    	=> carbon_get_nav_menu_item_meta( $item->ID, 'crb_megamenu_column' ),
            // 'crb_megamenu_colval'    	=> carbon_get_nav_menu_item_meta( $item->ID, 'crb_megamenu_colval' ),
            // 'crb_megamenu_iconmenu'    	=> carbon_get_nav_menu_item_meta( $item->ID, 'crb_megamenu_iconmenu' ),
			// 'crb_megamenu_text'    		=> carbon_get_nav_menu_item_meta( $item->ID, 'crb_megamenu_text' ),
			// 'crb_megamenu_hide_title'   => carbon_get_nav_menu_item_meta( $item->ID, 'crb_megamenu_hide_title' ),
			// 'crb_megamenu_cptid'   		=> carbon_get_nav_menu_item_meta( $item->ID, 'crb_megamenu_cptid' ),
			// 'crb_megamenu_news'  		=> carbon_get_nav_menu_item_meta( $item->ID, 'crb_megamenu_news' ),
			// 'crb_megamenu_event'  		=> carbon_get_nav_menu_item_meta( $item->ID, 'crb_megamenu_event' ),
			// 'crb_megamenu_featured'  	=> carbon_get_nav_menu_item_meta( $item->ID, 'crb_megamenu_featured' ),


		);
	}


	/**
	 * Traverse elements to create list from elements.
	 *
	 * This method should not be called directly, use the walk() method instead.
	 *
	 * @param object $element           Data object.
	 * @param array  $children_elements List of elements to continue traversing.
	 * @param int    $max_depth         Max depth to traverse.
	 * @param int    $depth             Depth of current element.
	 * @param array  $args              An array of arguments.
	 * @param array  $output            Passed by reference. Used to append additional content.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element ) {
			return;
		}

		if ( ! is_array( $output ) ) {
			$output = array();
		}

		$id_field = $this->db_fields['id'];
		$id       = $element->$id_field;
		$item     = $this->prepare_item( $element, $args, $depth );





		if ( ! empty( $children_elements[ $id ] ) ) {

			global $wp;
			$current_url = home_url( add_query_arg( array(), $wp->request ) ).'/';


			foreach ( $children_elements[ $id ] as $child ) {

				if($child->menu_item_parent==$item['id']){
					if($current_url==$child->url){
						$item['classes'] .= ' current-child ';
					}

				}

				$this->display_element(
					$child,
					$children_elements,
					1,
					( $depth + 1 ),
					$args,
					$item['children']
				);
			}

			unset( $children_elements[ $id ] );
		}


		$output[] = $item;
	}
}

function walker_nav_array($current_menu){


    $locations = get_nav_menu_locations();
    $menux 	   = wp_get_nav_menu_object( $locations[ $current_menu ] );
    $menu_id   = $menux->term_id;
    $max_depth = 0; // All level.
    $walker    = new Bridge_Walker_Nav_Menu;
    $items     = $walker->walk( wp_get_nav_menu_items( $menu_id ), $max_depth );

	if($items!=''){
		$items = $items;
	}else{
		$items = array();
	}

    return $items;
}

function chil_menu_walker($arr_children,$sm){
    //$sm = $sm!=='' ? $sm+1 : 0;
    $menu ='';
    if(count($arr_children) > 0){
        $menu .=  '<span class="drop-icon">▾</span><label title="Toggle Drop-down" class="drop-icon" for="sm'.$sm.'">▾</label></a><input type="checkbox" id="sm'.$sm.'">';
        $menu .=    '<ul class="sub-menu">';
            foreach($arr_children as $lv){
				$class = isset($lv['classes']) ? $lv['classes'] : '';
				$xfn = isset($lv['xfn']) ? $lv['xfn'] : '';
				$urlx = wpe_custome_menu_link($lv['object_id'])!='' ? wpe_custome_menu_link($lv['object_id']) : $lv['url'];

                $menu .='<li class="'.$class.'" data-target="#'.$xfn.'">';
                    $menu .='<a href="'.$urlx.'">';
                        $menu .= wp_strip_all_tags($lv['title']);
                        if(isset($lv['children'])){
                            $menu .=chil_menu_walker($lv['children'],$sm*10);
                        }else{
                            $menu .= '</a>';
                        }
                    $menu .= '</a>';
                $menu .='</li>';
            }
        $menu .=    '</ul>';
    }else{
        $menu .= '</a>';
    }
    return $menu;
}

function wpe_custome_menu_link($object_id){

	$url = '';

	$custom_enable = carbon_get_post_meta($object_id,'custome_link_enable');
    $custom_link = carbon_get_post_meta($object_id,'custome_link_url');

	if ( $custom_enable ) {
        if($custom_link){
            $url = $custom_link;//$custom_link;
        }
    }

	return $url;
}

/* how to use
$menu = '';
$sm = 0;
foreach(walker_nav_array('menu-main') as $lv){
    $menu .='<li>';

                    $menu .= '<a href="'.$lv['url'].'">';
                    $menu .=  $lv['title'];

                    if(isset($lv['children'])){
                        $menu .=chil_menu_walker($lv['children'],$sm);
                    }else{
                        $menu .= '</a>';
                    }

                $menu .='
            </li>';
    $sm++;
}
echo $menu;
*/