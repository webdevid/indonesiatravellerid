<?php
if(count($data) > 0){
?>
<ul id="left-nav" class="left-menu js-sticky-widget">
    <?php
    $c = 1;
    foreach($data as $nav){
        if($c > 1){
            if (strpos($nav['cf_link'], '#') !== false OR strpos($nav['cf_link'], site_url()) !== false) {
                $title = $nav['cf_title'];
                $class = '';
            }else{
                $title = $nav['cf_title'].'<i class="bi bi-arrow-up-right-square float-end"></i>';
                $class = '_external';
            }
        }else{
            $title = $nav['cf_title'];
            $class = '';
        }


        echo '<li class="'.$nav['cf_class'].' " ><a href="'.$nav['cf_link'].'" class="'.$class.'">'.$title.' </a></li>';
        $c++;
    }
    ?>
</ul>
<?php
}
?>