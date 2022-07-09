export function swiperHomePage(){

  const swiper = new window.Swiper('.swiper-homepage', {
    
    speed: 700,
    effect: "fade",
    loop:true,
  
    autoplay: {
      delay: 5000,
      pauseOnMouseEnter: false,
      disableOnInteraction: false,
    }

  });

}