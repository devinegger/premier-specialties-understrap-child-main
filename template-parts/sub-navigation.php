<?php

/**
 * Template Part for displaying Page Sub Navigation
 * 
 * This template will check to see if the current page is a parent, and then find all of its children pages.
 * If it is a child page, it will grab the parent post object, and then find all of that page's children pages.
 * 
 * Once it has found all children pages, it will display those in a sub navigation with the current child page shown as active (if on a child page)
 * 
 */

$current_post_id = $post->ID;
$current_slug = $post->post_name;
$base_slug = "/";
$class_active = "";

if (has_post_parent($current_post_id)) { // current page is a child page
    $parent_id = wp_get_post_parent_id( $current_post_id );
    $parent_post = get_post($parent_id);
    $base_slug .= $parent_post->post_name;
} else { // current page is the parent page
    $parent_id = $current_post_id;
    $base_slug .= $current_slug;
}

// build child args array
$child_args = array(
    'post_parent' => $parent_id,
    'post_type' => 'page',
    'post_status' => 'publish'
);
// get array of child page objects
$children = get_children($child_args);
?>

<div class="page-sub-navigation d-flex justify-content-center py-2">
    <ul class="nav sub-nav text-uppercase nav-fill w-100">

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
}

?>
    </ul>
</div>