<?php
function getArrayMenu(){

  function wp_get_menu_array_2($current_menu) {

    $array_menu = wp_get_nav_menu_items($current_menu);

    $menu = array();
    $submenu = array();
    if($array_menu){
        foreach ($array_menu as $m) {
            if (empty($m->menu_item_parent)) {
                $menu[$m->ID] = array();
                $menu[$m->ID]['ID']      =   $m->ID;
                $menu[$m->ID]['title']       =   $m->title;
                $menu[$m->ID]['url']         =   $m->url;
                $menu[$m->ID]['children']    =   array();
            }
    
            if ($m->menu_item_parent) {
                $submenu[$m->ID] = array();
                $submenu[$m->ID]['ID']       =   $m->ID;
                $submenu[$m->ID]['title']    =   $m->title;
                $submenu[$m->ID]['url']  =   $m->url;
                $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
            }
        }
    }

    return $menu;

  }

  $menu_name = 'primary';
  $locations = get_nav_menu_locations();
  //Get the id of 'primary_menu'
  $menu_id = $locations[ $menu_name ] ;
  //Returns a navigation menu object.
  $menuObject = wp_get_nav_menu_object($menu_id);
  // Retrieves all menu items of a navigation menu.
  $current_menu = $menuObject->slug;

  //$array_menu = wp_get_nav_menu_items($current_menu);

  $array_menu = wp_get_menu_array_2($current_menu);
  return $array_menu;
}