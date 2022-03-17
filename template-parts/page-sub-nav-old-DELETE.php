<?php

/**
 * Template Part for displaying Page Sub Navigation
 */

// will need to set this menu variable with ACF somehow..
//$menu = $args['menu'];

$menu = $args['menu'];

$current_post_id = $post->ID;
$current_slug = $post->post_name;
$base_slug = "/";
$class_active = "";
//$sub_nav_items = array();

echo $current_slug;
echo "<br/>";


if (has_post_parent($current_post_id)) { // if current page is a child page
    $parent_id = wp_get_post_parent_id( $current_post_id );
    $parent_post = get_post($parent_id);
    $base_slug .= $parent_post->post_name;
} else { // current page is the parent page
    $parent_id = $current_post_id;
    $base_slug .= $current_slug;
}

echo $base_slug;
echo "<br/>";

$child_args = array(
    'post_parent' => $parent_id,
    'post_type' => 'page',
    'post_status' => 'publish'
);

$children = get_children($child_args);


//echo "<pre>";
//print_r($children);
//echo "</pre>";

//$child_id = 0;
//echo count($children) . "<br/>";

?>

<div class="page-sub-navigation d-flex justify-content-center py-2">
    <ul class="nav sub-nav text-uppercase">

<?php

foreach (array_reverse($children) as $child) {

    if($current_post_id === $child->ID) {
        $class_active = "active";
    } else { 
        $class_active = "";
    }

    echo '<li class="nav-item ' . $class_active . '">';
    echo '<a class="nav-link" aria-current="page" href="' . $base_slug . "/" . $child->post_name . '">' . $child->post_title . '</a>';
    echo '</li>';





    //echo $child->ID . "<br/>";
    //echo $child->post_title . "<br/>";
    //echo $base_slug . "/" . $child->post_name  . "<br/>";
    //echo $class_active  . "<br/>";

}

?>
    </ul>
</div>

<?php
wp_nav_menu(
    array(
        'theme_location'  => 'sub_nav',
        'container_class' => 'page-sub-navigation d-flex justify-content-center py-2',
        'container_id'    => '',
        'menu_class'      => 'nav sub-nav text-uppercase',
        'fallback_cb'     => 'false',
        'menu'            => $menu,
        'menu_id'         => 'sub-navigation',
        'depth'           => 2,
        'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
    )
);


?>





<!-- original HTML 
<div class="page-sub-navigation d-flex justify-content-center py-2">
    <ul class="nav sub-nav text-uppercase">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
    </ul>
</div>
-->