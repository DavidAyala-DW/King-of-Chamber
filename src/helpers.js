export function filename(string){

  const url = string.split(window.location.host+"/")[1] ?? string.split(window.location.host+"/")[0];
  const absolutePath = url.substring(0,url.length - 1);
  const lastPosition = absolutePath.lastIndexOf("/");
  const relativePath = absolutePath.substring( lastPosition , absolutePath.length );
  return relativePath;

}

export function fadeIn(duration = 300) {

  const element = document.querySelector("BODY");

  element.style.display = '';
  element.style.opacity = 0;
  
  let last = +new Date();

  const tick = function() {
    element.style.opacity = +element.style.opacity + (new Date() - last) / duration;
    last = +new Date();
    if (+element.style.opacity < 1) {
      (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16);
    }
  };

  tick();
  
}

export  function createSlide(src){

  const slide = document.createElement('DIV');
  slide.className = "swiper-slide";

  const img = document.createElement('IMG');
  img.className = "w-full templatePageBackground h-full object-cover";
  img.src = src;
  img.alt = "backgroundImage.png";

  slide.appendChild(img);

  return slide;

}