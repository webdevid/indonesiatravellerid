<?php

/**
 *  Add query filter
 */
add_filter('query_vars', 'add_state_var', 0, 1);
function add_state_var($vars){
    $vars[] = 'session_event';
    $vars[] = 'session_slug';
    $vars[] = 'event_id';
    $vars[] = 'bot_slug';
    return $vars;
}


/**
 * rewrite event
 * post_id = 45
 */
add_rewrite_rule(
    'event\/([a-z0-9\-]+)/([a-z0-9\-]+)/([a-z0-9\-]+)/?$',
    'index.php?post_type=event&name=$matches[1]&session_event=$matches[2]&session_slug=$matches[3]',
    'top'
);


/**
 * rewrite custome table BOT
 * post_name = board-of-trustees
 */
//$page_bot_id = get_id_by_slug('board-of-trustees');
$page_bot_id = get_id_by_slug('about/board-of-trustees');
add_rewrite_rule(
    'about/board-of-trustees/([a-z0-9\-]+)/?$',
    'index.php?page_id='.$page_bot_id.'&bot_slug=$matches[1]',
    'top'
);

