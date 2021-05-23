<?php
/*
[knowledge_title] => Small entrepreneurs contribute to the local economy in Yangambi, DRC
[knowledge_label] => VIDEO
[knowledge_class] =>
[knowledge_button] =>  23:31
[knowledge_url] => #
[knowledge_image] =>
*/
$path_icon = get_template_directory_uri().'/assets/images/icons';
$label_icon = '';
switch (strtolower($block['knowledge_label'])) {
    case 'video':
        # code...
        $label_icon = '<img src="'.$path_icon.'/video.svg">';
        break;
    case 'podcast':
        $label_icon = '<img src="'.$path_icon.'/podcast.svg">';
        break;
    case 'website':
        $label_icon = '<img src="'.$path_icon.'/global.svg">';
        break;
    case 'database':
        $label_icon = '<img src="'.$path_icon.'/database.svg">';
        break;
    default:
        $label_icon = '<img src="'.$path_icon.'/global.svg">';
    break;
}
if(isset($block['knowledge_source'])){
    if($block['knowledge_source']!=''){
        switch($block['knowledge_source']){
            case 'cifor':
                $source_label = 'Center for International Forestry Research (CIFOR)';
                $source_logo  = get_template_directory_uri().'/assets/images/logo/CIFOR-white-logo.svg';
                break;
            case 'icraf':
                $source_label = 'World Agroforestry (ICRAF)';
                $source_logo  = get_template_directory_uri().'/assets/images/logo/World-Agroforestry-white-logo.svg';
                break;
            case 'glf':
                $source_label = 'Global Landscapes Forum';
                $source_logo  = get_template_directory_uri().'/assets/images/logo/GLF-logo-white-landscape.svg';
                break;
            case 'fta':
                $source_label = 'Forests, Trees and Agroforestry';
                $source_logo  = get_template_directory_uri().'/assets/images/logo/CGIAR-FTA-white-logo-en.svg';
                break;
            case 'rl':
                $source_label = 'Resilient Landscapes';
                $source_logo  = get_template_directory_uri().'/assets/images/logo/Resilient-Landscapes.svg';
                break;
            case 'ciforicraf':
                $source_label = 'CIFOR-ICRAF';
                $source_logo  = get_template_directory_uri().'/assets/images/logo/CIFOR-ICRAF-white-logo.svg';
                break;
        }

        echo '<div class="grid-item_source logo-'.$block['knowledge_source'].'">';
        echo '<img src="'.$source_logo.'" alt="'.$source_label.'"> ';
        echo '</div>';
    }
}
if(isset($block['knowledge_label'])){
    echo '<div class="grid-item_type">
            '.$label_icon.' '.$block['knowledge_label'].'
          </div>';
}
?>
<div class="grid-item_bottom">
    <div class="grid-item_title">
        <h1><?php if(isset($_GET['shownumber'])){ echo '<span class="shownumber">'.$block['no'].'</span>'; } echo $block['knowledge_title']; ?></h1>
    </div>
    <div class="grid-item_button"><a href="<?php echo $block['knowledge_url']; ?>" class="btn btn-light mt-4"><?php echo $block['knowledge_button']; ?></a></div>
</div>