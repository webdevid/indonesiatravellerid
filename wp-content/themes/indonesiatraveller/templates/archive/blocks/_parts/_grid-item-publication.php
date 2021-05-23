<?php
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
    case 'publication':
        $label_icon = '<img src="'.$path_icon.'/book-library.svg">';
        break;
    default:
        $label_icon = '<img src="'.$path_icon.'/global.svg">';
    break;
}

$image   = isset($block['knowledge_image']) ? wpe_image_single($block['knowledge_image'])['url'] : '';
if(isset($block['knowledge_source'])){

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
            $source_logo  = get_template_directory_uri().'/assets/images/logo/Resilient-Landscapes-short-white-logo.svg';
            break;
        case 'ciforicraf':
            $source_label = 'CIFOR-ICRAF';
            $source_logo  = get_template_directory_uri().'/assets/images/logo/CIFOR-ICRAF-white-logo.svg';
            break;
    }



}
?>
<div class="grid-item_publication align-self-center">
    <div class="row">
        <div class="col-lg-4">
            <div class="grid-item_pubthumb">
                <a href="<?php echo $block['knowledge_url'];?>" title="<?php echo $block['knowledge_title']; ?>">
                    <img src="<?php echo $image;?>" alt="<?php echo $block['knowledge_title']; ?>">
                </a>
            </div>
        </div>
        <div class="col-lg-8 position-relative">
            <div class="grid-item_title">
                <?php
                if(isset($block['knowledge_source'])){
                    if($block['knowledge_source']!=''){
                        echo '<div class="grid-item_source">';
                        echo '<img src="'.$source_logo.'" alt="'.$source_label.'"> ';
                        echo '</div>';
                    }
                }
                if(isset($block['knowledge_label'])){
                    $label = strtolower($block['knowledge_label'])=='publication' ? 'book' : $block['knowledge_label'];
                    echo '<div class="grid-item_type type-'.sanitize_title($label).'">
                            '.$label_icon.' '.$block['knowledge_label'].'
                          </div>';
                }
                ?>
                <a href="<?php echo $block['knowledge_url'];?>"  title="<?php echo $block['knowledge_title']; ?>">
                <h1><?php if(isset($_GET['shownumber'])){ echo '<span class="shownumber">'.$block['no'].'</span>'; }  echo $block['knowledge_title']; ?></h1>
                </a>
            </div>
            <div class="grid-item_pubyear">
                <?php echo $block['knowledge_year']; ?>
            </div>
        </div>
    </div>
</div>