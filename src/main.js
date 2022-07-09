/**
 * imports
 */
import './css/main.scss';

import Alpine from 'alpinejs';

import Swiper from "swiper/bundle";
import 'swiper/css';
import "swiper/css/effect-fade";

import {fadeIn, filename, createSlide} from "./helpers";

import {swiperBackground} from "./swiper-background";
import {swiperHomePage} from "./swiper-homepage";


window.Alpine = Alpine;
window.Swiper = Swiper;

Alpine.store("m_open",{
  on: false,
  menu_drawer: false,
  toogle(){
    this.on = !this.on
  }
});

Alpine.data("swiperBackground", ()  => ({
  init() {
    swiperBackground();
  }
}));

Alpine.data("swiperHomepage", ()  => ({
  init() {
    swiperHomePage();
  }
}));

window.addEventListener("DOMContentLoaded",() => {

  const fakeMenus = document.querySelectorAll(".fakeMenu");
  fakeMenus.forEach( menu => {

    menu.onclick = e => {

      e.preventDefault();
      window.scrollTo(0,0);
      fadeIn();
      const link = filename(e.target.href).replaceAll("-","_");
      const homepage = document.getElementById("homepage");
      const templatepage = document.getElementById("templatepage");

      if(link === ""){

        homepage.classList.remove("!hidden");
        templatepage.classList.add("!hidden");

        fakeMenus.forEach(menu => menu.classList.remove("text-primary","!text-primary"));

        const {title,subtitle,image,background} = window.pages["home"];

        const swiper = document.querySelector(".swiper-homepage");
        swiper.remove();

        const newSwiper = document.createElement("DIV");
        newSwiper.className = "min-h-screen  w-full overflow-hidden absolute brightness-[.3] inset-0 h-full object-cover swiper-homepage";
        newSwiper.innerHTML = `

          <div class="swiper-wrapper" id="wrapperSliderHomepage">
            
          </div>

        `;

        homepage.insertBefore(newSwiper,homepage.firstChild);

        const wrapperSlides = document.querySelector("#wrapperSliderHomepage");
        background.forEach( child =>  {
          const slide = createSlide(child);
          wrapperSlides.appendChild(slide);
        })
  
        swiperHomePage();
  

        document.querySelector(".homepageTitle").textContent = title;
        document.querySelector(".homepageSubtitle").textContent = subtitle;
        document.querySelector(".homepageImage").src = image;

        window.history.pushState({},title, e.target.href)
        document.title = "Home – Sinergia";
        return;
      }

      if(window.location.href.includes(e.target.href)) return;

      homepage.classList.add("!hidden");
      templatepage.classList.remove("!hidden");

      fakeMenus.forEach(menu => {

        if(menu.href == e.target.href){ 
          menu.classList.add("!text-primary");
          return;
        }

        menu.classList.remove("!text-primary","text-primary");

      });

      const {title, description, background, cta_link, description_width} = window.pages[link];

      const swiper = document.querySelector(".swiper-background");
      swiper.remove();

      const newSwiper = document.createElement("DIV");
      newSwiper.className = "min-h-screen  w-full overflow-hidden absolute brightness-[.4] inset-0 h-full object-cover swiper-background";
      newSwiper.innerHTML = `
        <div class="swiper-wrapper" id="wrapperSlider">
          
        </div>

      `;

      templatepage.insertBefore(newSwiper,templatepage.firstChild);

      const wrapperSlides = document.querySelector("#wrapperSlider");
      background.forEach( child =>  {
        const slide = createSlide(child);
        wrapperSlides.appendChild(slide);
      })

      swiperBackground();

      document.querySelector(".templatePageTitle").textContent = title;
      
      const descriptionNode = document.querySelector(".templatePageDescription");
      descriptionNode.className = "";
      descriptionNode.classList.add("templatePageDescription","block","w-full");
      descriptionNode.style.maxWidth = `${description_width}px`;
      descriptionNode.innerHTML = description;
      
      const actual_cta_link = document.getElementById("cta_link");
      actual_cta_link.href = cta_link;

      window.history.pushState({},title, e.target.href)
      document.title = ` Sinergia – ${title}`;
      
    };

  });

});
 
Alpine.start();
