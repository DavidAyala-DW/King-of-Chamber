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

$header = get_field("header","options");
$socialMedias = $header["social_medias"];
$CTA_TEXT = $header["cta_text"];
$CTA_LINK = $header["cta_link"];

$address = $contact['address'];
$tel = $contact['tel'];
$email = $contact['email'];
$logo = get_field("logo","options");

?>

<header class="flex flex-col" x-data="menu_mobile" x-cloak>

    <nav class="max-w-[2500px] mx-auto w-full bg-white py-3 md:py-9 px-5 lg:px-[6.94%] flex justify-center z-[2]">

        <div class="flex items-center justify-between w-full">

            <div class="relative text-xl flex items-center">

                <button
                    aria-label="Toggle Mobile Menu Button"
                    class="mobile-drawer__icon md:hidden mr-5"
                    :class="open? 'mobile-drawer__open' : '' "
                    @click = "toogle()"
                >
                    <div class="bg-black bar-one"></div>
                    <div class="bg-black bar-two"></div>
                    <div class="bg-black bar-three"></div>
                </button>

                <?php if ( has_custom_logo() ) : ?>

                    <div class="logo flex items-center mr-12">
                        <div class="min-w-[143px] w-full logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    </div>

                <?php endif ?>

                <ul class="hidden md:flex item-center flex-wrap">

                    <?php foreach ($array_menu as $k => $m) : ?>
                        <li class=" text-black pr-8">
                            <a class="block text-xs leading-[20px] xl:leading-[60px] uppercase" href="<?php echo $m['url']; ?>">
                                <?php echo $m['title']; ?>
                            </a>
                        </li>
                    <?php endforeach ?>

                </ul>

            </div>

            <div class="hidden ml-5 md:flex items-center space-x-[22px]">

                <div class="flex items-center space-x-2.5">

                    <?php foreach($socialMedias as $socialMedia) :?>

                        <a href="<?php echo $socialMedia["link"]?>" class="h-[30px] w-[30px] bg-[#E0E0E0] rounded-full flex flex-col items-center justify-center">
                            <?php echo getSocialMediaIcon($socialMedia["social_media"]) ?>
                        </a>

                    <?php endforeach ?>

                </div>

                <?php echo Button([
                    "type" => "link",
                    "text_color" => "text-[#0C0C0C]",
                    "bg_color" => "bg-white",
                    "border" => "border border-[#0C0C0C]",
                    "text" => $CTA_TEXT,
                    "link" => $CTA_LINK            
                ]) ?>

            </div>

        </div>

    </nav>

    <?php //Mobile menu ?>

    <nav
        class="fixed invisible w-full h-full flex-col md:hidden bg-white px-5 py-5 nav border-x-[1.5px] border-black -translate-x-full z-[99]"
        :class="open ? '!visible !translate-x-0' : '' "
        x-cloak
    >

        <div class="h-[57px] w-max flex flex-col justify-center items-center">
            <button
                aria-label="Toggle Mobile Menu Button"
                class="mobile-drawer__icon"
                :class="open? 'mobile-drawer__open' : '' "
                @click = "toogle()"
            >
                <div class="bg-black bar-one"></div>
                <div class="bg-black bar-two"></div>
                <div class="bg-black bar-three"></div>
            </button>
        </div>

        <ul class="mb-5">

            <?php foreach ($array_menu as $k => $m) : ?>

                <li class="transition-colors duration-300 ease-[ease-in-out] pb-3 mt-3 border-b border-black text-black last:border-b-0">
                    <a  class="fakeMenu text-black" href="<?php echo $m['url']; ?>">
                        <?php echo $m['title']; ?>
                    </a>
                </li>

            <?php endforeach ?>
        </ul>

        <div class="flex items-center space-x-2.5">

            <?php foreach($socialMedias as $socialMedia) :?>

                <a href="<?php echo $socialMedia["link"]?>" class="h-[30px] w-[30px] bg-[#E0E0E0] rounded-full flex flex-col items-center justify-center">
                    <?php echo getSocialMediaIcon($socialMedia["social_media"]) ?>
                </a>

            <?php endforeach ?>

        </div>

        <?php echo Button([
            "type" => "link",
            "text_color" => "text-[#0C0C0C]",
            "bg_color" => "bg-white",
            "border" => "border border-[#0C0C0C]",
            "text" => $CTA_TEXT,
            "link" => $CTA_LINK,
            "className" => "mt-5 block max-w-max"            
        ]) ?>

    </nav>
    
</header>