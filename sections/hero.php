<?php
add_shortcode('hero', 'hero_init');
function hero_init()
{
  ob_start();
?>
  <div class="hero min-h-screen" style="background-image: url(&quot;https://picsum.photos/id/1005/1600/1400&quot;);">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="text-center hero-content text-neutral-content">
      <div class="max-w-md">
        <h1 class="mb-5 text-5xl font-bold">
          Directory test
        </h1>
        <p class="mb-5">
          Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.
        </p>
        <button class="btn btn-primary">Get Started</button>
      </div>
    </div>
  </div>
<?php
  // return the buffer contents and delete
  return ob_get_clean();
}
?>