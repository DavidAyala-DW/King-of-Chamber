<?php 


function wp_get_menu_array($current_menu) {

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

$array_menu = wp_get_menu_array($current_menu);

global $wp;
$url_actual = home_url( add_query_arg( array(), $wp->request ) );

?>


<nav class="main-menu !hidden py-5 lg:block bg-white text-black fixed w-full z-40">

    <div class="c-container items-center flex justify-between">
        <div class="relative text-xl flex">

            <?php if ( has_custom_logo() ) { ?>
            <div class="logo flex items-center">
                <div class="max-w-[143px]">
                    <?php the_custom_logo(); ?>
                </div>

                <p class="text-sm font-light text-gray-600 pl-2">
                    <?php echo get_bloginfo( 'description' ); ?>
                </p>
            </div>
            <?php } ?>
        </div>


        <ul class="flex desktop items-center space-x-14">
            <?php foreach ($array_menu as $m):?>
                       <li class="hoverable font-light text-[16px]">
                
                    <span class="flex items-center">

                    <?php
                        if($m['title'] == 'Book A Room'){
                         echo Button([
                            "text" => "Book A Room",
                            "text_color" => "text-white",
                            "bg_color" => "bg-primary",
                            "bg_hover" => "bg-red-100",
                            "font_size" => "text-sm",
                            "link" =>  $m['url'],
                            "font_extracss" => "font-light",
                            "padding" => "py-2.5 px-4",
                            "font_extracss" => "w-32px"
                        ]);
                        } else {
                            ?>

                            
                            <a href="<?php echo $m['url']; ?>" class="relative block <?php echo $m["title"] == "Book A Room" ? "py-2.5 pl-6 pr-7" : "" ?>">
                            <?php echo $m['title']; ?>
                            </a>
                            <?php
                        }                        
                        ?>

                        <?php  if(sizeof($m['children']) > 0) :?>
                            <!-- <span class="inline-block pl-2 pt-1">
                                <svg class="" fill="none" stroke="currentColor" width="10" height="7"
                                    viewBox="0 0 10 7" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 1L5 5L1 0.999999" stroke="black" stroke-width="2"></path>
                                </svg>
                            </span> -->
                        <?php endif ?>

                    </span>

                    <?php if(sizeof($m['children']) > 0) : ?>

                        <div class="mega-menu bg-slate-200">
                            <div class="bg-slate-200 pt-7 mx-auto container grid grid-cols-4 gap-4"><?php
                                foreach ($m['children'] as $s) : ?>
                                    <a href="<?php echo $s['url']; ?>" class="flex p-2"><?php echo $s['title']; ?></a>
                                <?php endforeach ?>
                            </div>
                        </div>

                    <?php endif ?>

                </li>

            <?php endforeach ?>

            <!-- <li class="hoverable hover:text-[#0BC6E3] border-2 border-solid border-[#0BC6E3] px-6 py-2 relative leading-none  text-lg ">
                <span class="flex items-center">
                    <a href="" class="relative block">
                        Contact
                    </a>
                </span>
            </li> -->

            <!-- <li>
                <div class="container mx-auto">
                    <?php 
                        // echo do_shortcode( '[ivory-search id="5" title="Default Search Form"]' ); 
                    ?>
                </div>
            </li> -->
        </ul>
    </div>


</nav>

<?php //Mobile menu ?>

<div :class="{ 'body-menu-drawer-open':  $store.m_open.menu_drawer }"
    @click=" $store.m_open.on = !  $store.m_open.on; $store.m_open.menu_drawer = ! $store.m_open.menu_drawer">
</div>
<nav class="mobile-drawer max-w-[100vw] lg:hidden z-[100] fixed w-full bg-transparent" id="mobileMenu" :class="{ '!bg-black':  $store.m_open.menu_drawer }">
    <div class="p-2 flex w-full items-center justify-between">
        <?php the_custom_logo(); ?>
        <button aria-label="Toggle Mobile Menu Button"
            @click=" $store.m_open.on = !  $store.m_open.on; $store.m_open.menu_drawer = ! $store.m_open.menu_drawer"
            :class="{ 'mobile-drawer__open':  $store.m_open.on }" class="mobile-drawer__icon">
            <div class="!bg-white bar-one"></div>
            <div class="!bg-white bar-two"></div>
            <div class="!bg-white bar-three"></div>
        </button>

    </div>

    <ul :class="{ 'active': $store.m_open.on}" class=" h-full bg-black duration-300 z-20">
        <!-- <li>
            <div class="container mx-auto">
                <?php 
                    // echo do_shortcode( '[ivory-search id="5" title="Default Search Form"]' ); 
                ?>
            </div>
        </li> -->
        <?php foreach ($array_menu as $k => $m) : ?>

            <?php if(sizeof($m['children']) > 0) :?>

                <li @click="$store.isActive = <?php echo $k; ?>" class="pl-4 pb-3 mt-3 border-b text-gray-900 border-black">
                    <div class="flex items-center justify-between mr-4 "><span class="mr-3"><?php echo $m['title']; ?></span>
                        <span class="arrow-wrapper inline-block duration-500 transform"
                            :class="$store.isActive == <?php echo $k; ?> ? 'rotate-180' : ''">
                            <svg class="" fill="none" stroke="currentColor" width="10" height="7" viewBox="0 0 10 7"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 1L5 5L1 0.999999" stroke="black" stroke-width="2"></path>
                            </svg>
                        </span>
                    </div>
                    <div x-show="$store.isActive == <?php echo $k; ?>" class="flex flex-col">

                        <?php foreach ($m['children'] as $s) : ?>
                            <a href="<?php echo $s['url']; ?>" class="p-2"><?php echo $s['title']; ?></a>
                        <?php endforeach?>

                        <a href="/" class="fakeMenu">
                            Blog
                        </a>  

                    </div>
                </li>

            <?php endif ?> 

            <?php if(sizeof($m['children']) === 0) : ?>

                <!-- <?php if($m["title"] !== "Content") : ?>
                    <li @click=" $store.m_open.on = !  $store.m_open.on; $store.m_open.menu_drawer = ! $store.m_open.menu_drawer"  class="transition-colors duration-300 ease-[ease-in-out] pl-4 pb-3 mt-3 border-b border-white text-whit">
                        <a  class="fakeMenu text-white" href="<?php echo $m['url']; ?>">
                            <?php echo $m['title']; ?>
                        </a>
                    </li>
                <?php endif ?>

                <?php if($m["title"] === "Content") : ?>

                    <li @click=" $store.m_open.on = !  $store.m_open.on; $store.m_open.menu_drawer = ! $store.m_open.menu_drawer"  class="transition-colors duration-300 ease-[ease-in-out] pl-4 pb-3 mt-3 border-b border-white text-whit">
                        <a  target="_blank" rel="noopener noreferrer" class="text-white" href="<?php echo $m['url']; ?>">
                            <?php echo $m['title']; ?>
                        </a>
                    </li>
                    
                <?php endif ?>

            <?php endif ?> -->

            <li @click=" $store.m_open.on = !  $store.m_open.on; $store.m_open.menu_drawer = ! $store.m_open.menu_drawer"  class="transition-colors duration-300 ease-[ease-in-out] pl-4 pb-3 mt-3 border-b border-white text-whit">
                <a  class="fakeMenu text-white" href="<?php echo $m['url']; ?>">
                    <?php echo $m['title']; ?>
                </a>
            </li>

        <?php endforeach ?>

        <li  @click=" $store.m_open.on = !  $store.m_open.on; $store.m_open.menu_drawer = ! $store.m_open.menu_drawer" class=" transition-colors duration-300 ease-[ease-in-out] pl-4 pb-3 mt-3 border-b border-white text-white">
            <a href="https://blog.sinergia.uy/home" target="_blank" rel="nofollow  noopener noreferrer">
                Blog
            </a>  
        </li>

    </ul>
</nav>