<?php

/**
 * Template Part for displaying Page Sub Navigation
 */

// will need to set this menu variable with ACF somehow..
$menu = "test-menu";

?>


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