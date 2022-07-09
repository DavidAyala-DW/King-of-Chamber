export function swiperBackground(){
  
  const swiper = new window.Swiper('.swiper-background', {
    
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
