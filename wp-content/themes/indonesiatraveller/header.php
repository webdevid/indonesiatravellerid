<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php
    wp_head();
    ?>
</head>

<body <?php body_class();?>>
<div id="wrapper">
    <div id="header" class="_fixed">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12 d-flex">
                    <div class="top-logo me-auto">
                        <a href="<?php echo site_url();?>" title="<?php echo get_option( 'blogname' ); ?>">
                            <img src="https://www.indonesiatraveller.id/wp-content/themes/indonesiatraveller-id/images/traveller/logo-indonesiatraveller.svg" alt="<?php echo get_option( 'blogname' ); ?>">
                        </a>
                    </div>
                    <div class="btn-menu-mobile">
                        <button type="button" class="btn btn-secondary" onclick="wpeToggleShow('menumobile')"><i class="bi bi-list"></i></button>
                    </div>
                    <?php /*
                    <div class="donate"><a href="#" class="btn  btn-donate">DONATE</a></div>
                    */ ?>
                </div>
                <div class="col-lg-9 col-md-12 d-lg-flex justify-content-end">

                    <nav id="menu" class="hide-desktop">
                        <ul class="main-menu cf " id="menumobile">
                            <?php
                                $menu = '';
                                $sm = 0;

                                    //show(walker_nav_array('menu-main'));
                                    foreach(walker_nav_array('menu-mobile') as $lv){
                                        $class = isset($lv['classes']) ? $lv['classes'] : '';
                                        if(isset($lv['children'])){ if(count($lv['children']) > 0){ $class .= ' has-children ';}}
                                        $xfn = isset($lv['xfn']) ? $lv['xfn'] : '';
                                        $menu .='<li class="'.$class.'" data-target="#'.$xfn.'">';
                                                        $urlx = wpe_custome_menu_link($lv['object_id'])!='' ? wpe_custome_menu_link($lv['object_id']) : $lv['url'];

                                                        $menu .= '<a href="'.$urlx.'">';
                                                        $menu .=  wp_strip_all_tags($lv['title']);

                                                        if(isset($lv['children'])){
                                                            $menu .=chil_menu_walker($lv['children'],$sm);
                                                        }
                                                        $menu .= '</a>';

                                                    $menu .='
                                                </li>';
                                        $sm++;
                                    }

                                echo $menu;
                            ?>
                        </ul>
                    </nav>

                    <nav id="menu" class="hide-mobile">
                        <label for="tm" id="toggle-menu">Menu <span class="drop-icon">▾</span></label>
                        <input type="checkbox" id="tm">
                        <ul class="main-menu cf">
                            <?php
                                $menu = '';
                                $sm = 0;

                                //var_dump(walker_nav_array('menu-main'));
                                foreach(walker_nav_array('menu-main') as $lv){
                                    $class = isset($lv['classes']) ? $lv['classes'] : '';
                                    if(isset($lv['children'])){ if(count($lv['children']) > 0){ $class .= ' has-children ';}}
                                    $xfn = isset($lv['xfn']) ? $lv['xfn'] : '';
                                    $menu .='<li class="'.$class.'" data-target="#'.$xfn.'">';
                                                    $urlx = wpe_custome_menu_link($lv['object_id'])!='' ? wpe_custome_menu_link($lv['object_id']) : $lv['url'];

                                                    $menu .= '<a href="'.$urlx.'">';
                                                    $menu .=  $lv['title'];

                                                    if(isset($lv['children'])){
                                                        $menu .=chil_menu_walker($lv['children'],$sm);
                                                    }
                                                    $menu .= '</a>';

                                                $menu .='
                                            </li>';
                                    $sm++;
                                }

                                echo $menu;
                            ?>
                            <li><a href="#" title="search"  class="search-menu" id="search-menu"><i class="bi bi-search"></i></a></li>

                        </ul>
                    </nav>

                    <div class="search-box-mobile">
                        <form action="<?php echo site_url();?>" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="s" placeholder="Search keyword" value="<?php if(isset($_GET['s'])){ echo $_GET['s'];};?>">
                                <button class="btn btn-outline-secondary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>


                </div>

            </div>

        </div>
    </div>
    <div class="search-box" style="display:none;">
        <form action="<?php echo site_url();?>" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="s" placeholder="Search keyword" value="<?php if(isset($_GET['s'])){ echo $_GET['s'];};?>">
                <button class="btn btn-outline-secondary" type="submit">Submit</button>
            </div>
        </form>
    </div>

    <?php
    $args = array(
        'post_type'=>'megamenu'
    );
    $the_query = new WP_Query( $args );
    // The Loop
    if ( $the_query->have_posts() ) {

    ?>
    <div class="megamenu-list">
        <?php
        $m=1;
         while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $link_title = carbon_get_post_meta(get_the_ID(),'custome_link_title');
            $link_url = carbon_get_post_meta(get_the_ID(),'custome_link_url');
        ?>
        <div id="megamenu-<?php echo get_the_ID();?>" class="megamenu-item megamenu-<?php echo $m;?>">
            <div class="megamenu-block">
                <div class="megamenu-content">
                    <?php
                    the_content();
                    ?>
                </div>
                <div class="megamenu-footer">
                    <?php if($link_url){
                    echo '<a href="'.$link_url.'">'.$link_title.'<i class="bi bi-arrow-right middle"></i></a>';
                    } ?>
                </div>
            </div>
        </div>
        <?php
            $m++;
         }
        ?>

    </div>
    <?php
    }
    ?>

