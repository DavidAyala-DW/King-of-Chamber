/**
 * imports
 */
import './css/main.scss';

import Alpine from 'alpinejs';

import Swiper from "swiper/bundle";
import 'swiper/css';

window.Alpine = Alpine;
window.Swiper = Swiper;

Alpine.store("m_open",{
  on: false,
  menu_drawer: false,
  toogle(){
    this.on = !this.on
  }
});

Alpine.data("hero_homepage",() => ({

  init(){

    const hero = new Swiper(".hero-slider",{
      slidesPerView: 1,
      loop: true,
      autoplay:{          
        delay: 2500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      }
    });

  }

}));

Alpine.data("menu_mobile",() => ({

  open: false,
  nav: "nav",
  toogle(){
    document.querySelector(".nav").classList.add("ease-[ease-in-out]","transition-transform");
    document.querySelector(".nav").classList.remove("invisible");
    this.open = !this.open;
    const body = document.querySelector("body");

    if(this.open){
      body.classList.add("overflow-hidden");  
      return;
    }

    body.classList.remove("overflow-hidden");

  }

}));


 
Alpine.start();
