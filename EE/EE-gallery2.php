
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <link rel="stylesheet" type="text/css" href="http://coffeescripter.com/code/style.css">
  <link rel="stylesheet" type="text/css" href="http://coffeescripter.com/code/ad-gallery/jquery.ad-gallery.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <script type="text/javascript" src="http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="http://coffeescripter.com/code/ad-gallery/jquery.ad-gallery.js?rand=218"></script>
  <script type="text/javascript" src=".http://coffeescripter.com/code/common.js"></script>
  <script type="text/javascript">
  $(function() {
    $('img.image1').data('ad-desc', 'Whoa! This description is set through elm.data("ad-desc") instead of using the longdesc attribute.<br>And it contains <strong>H</strong>ow <strong>T</strong>o <strong>M</strong>eet <strong>L</strong>adies... <em>What?</em> That aint what HTML stands for? Man...');
    $('img.image1').data('ad-title', 'Title through $.data');
    $('img.image4').data('ad-desc', 'This image is wider than the wrapper, so it has been scaled down');
    $('img.image5').data('ad-desc', 'This image is higher than the wrapper, so it has been scaled down');
    var galleries = $('.ad-gallery').adGallery();
    $('#switch-effect').change(
      function() {
        galleries[0].settings.effect = $(this).val();
        return false;
      }
    );
    $('#toggle-slideshow').click(
      function() {
        galleries[0].slideshow.toggle();
        return false;
      }
    );
    galleries[0].addAnimation('wild',
      function(img_container, direction, desc) {
        var current_left = parseInt(img_container.css('left'), 10);
        var current_top = parseInt(img_container.css('top'), 10);
        if(direction == 'left') {
          var old_image_left = '-'+ this.image_wrapper_width +'px';
          img_container.css('left',this.image_wrapper_width +'px');
          var old_image_top = '-'+ this.image_wrapper_height +'px';
          img_container.css('top', this.image_wrapper_height +'px');
        } else {
          var old_image_left = this.image_wrapper_width +'px';
          img_container.css('left','-'+ this.image_wrapper_width +'px');
          var old_image_top = this.image_wrapper_height +'px';
          img_container.css('top', '-'+ this.image_wrapper_height +'px');
        };
        if(desc) {
          desc.css('bottom', '-'+ desc[0].offsetHeight +'px');
          desc.animate({bottom: 0}, this.settings.animation_speed * 2);
        };
        img_container.css('opacity', 0);
        return {old_image: {left: old_image_left, top: old_image_top, opacity: 0},
                new_image: {left: current_left, top: current_top, opacity: 1},
                easing: 'easeInBounce',
                speed: 2500};
      }
    );
  });
  function debug(str) {
    if(window.console && window.console.log && jQuery.browser.mozilla) {
      console.log(str);
    } else {
      $('#debug').show().val($('#debug').val() + str +'\n');
    }
  }
  </script>
  <style type="text/css">
  #gallery {
    padding: 30px;
    background: #e1eef5;
  }
  #comment-form {
    width: 100%;
  }
  #error {
    display: none;
    background: #FFF;
    position: absolute;
    left: 100px;
    top: 100px;
    width: 500px;
    height: 300px;
    padding: 10px;
    border: 1px solid #CCC;
  }
  </style>
  <title>A demo of AD Gallery - Coffeescripter.com</title>
</head>
<body>
  <div id="error">
    <p>Hi! This plugin doesn't seem to work correctly on your browser/platform.</p>
  </div>
  <div id="container">
    <h1>AD Gallery, gallery plugin for jQuery</h1>
    <p>A highly customizable gallery/showcase plugin for jQuery.</p>
    <p>Read more here: <a href="http://coffeescripter.com/2009/07/ad-gallery-a-jquery-gallery-plugin/" target="_blank">http://coffeescripter.com/2009/07/ad-gallery-a-jquery-gallery-plugin/</a> |
    <a href="http://coffeescripter.com/code/">More code at Coffeescripter.com</a><br>
    Latest blog post: <a href="http://coffeescripter.com/2012/01/working-with-the-mobile-web/">Working with the mobile web </a>
    </p>
    <div id="gallery" class="ad-gallery">
      <div class="ad-image-wrapper">
      </div>
      <div class="ad-controls">
      </div>
      <div class="ad-nav">
        <div class="ad-thumbs">
          <ul class="ad-thumb-list">
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/1.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t1.jpg" title="A title for 1.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 1.jpg" class="image0">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/10.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t10.jpg" title="A title for 10.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 10.jpg" class="image1">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/11.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t11.jpg" title="A title for 11.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 11.jpg" class="image2">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/12.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t12.jpg" title="A title for 12.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 12.jpg" class="image3">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/13.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t13.jpg" title="A title for 13.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 13.jpg" class="image4">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/14.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t14.jpg" title="A title for 14.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 14.jpg" class="image5">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/2.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t2.jpg" title="A title for 2.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 2.jpg" class="image6">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/3.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t3.jpg" title="A title for 3.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 3.jpg" class="image7">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/4.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t4.jpg" title="A title for 4.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 4.jpg" class="image8">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/5.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t5.jpg" title="A title for 5.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 5.jpg" class="image9">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/6.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t6.jpg" title="A title for 6.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 6.jpg" class="image10">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/7.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t7.jpg" title="A title for 7.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 7.jpg" class="image11">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/8.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t8.jpg" title="A title for 8.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 8.jpg" class="image12">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/9.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t9.jpg" title="A title for 9.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 9.jpg" class="image13">
              </a>
            </li>                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/6.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t6.jpg" title="A title for 6.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 6.jpg" class="image10">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/7.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t7.jpg" title="A title for 7.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 7.jpg" class="image11">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/8.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t8.jpg" title="A title for 8.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 8.jpg" class="image12">
              </a>
            </li>
                        <li>
              <a href="http://coffeescripter.com/code/ad-gallery/images/9.jpg">
                <img src="http://coffeescripter.com/code/ad-gallery/images/thumbs/t9.jpg" title="A title for 9.jpg" longdesc="http://coffeescripter.com/" alt="This is a nice, and incredibly descriptive, description of the image 9.jpg" class="image13">
              </a>
            </li>
                      </ul>
        </div>
      </div>
    </div>
    <p>Examples of how you can alter the behaviour on the fly;
    Effect: <select id="switch-effect">
      <option value="slide-hori">Slide horizontal</option>
      <option value="slide-vert">Slide vertical</option>
      <option value="resize">Shrink/grow</option>
      <option value="fade">Fade</option>
      <option value="wild">Wild</option>
      <option value="none">None</option>
    </select> |
    <a href="#" id="toggle-slideshow">Toggle slideshow</a>
    </p>
    <h2>Features</h2>
    <ul>
      <li>Choose effect, should the image slide in, or fade in?</li>
      <li>Show fifth image by adding <code>#ad-image4</code> to the url, this takes
      precedence over over <code>settings.start_at_index</code></li>
      <li>jQuery call returns gallery instances, which enables you to
      change settings on the fly like the "Change to fade effect" link above</li>
      <li>Keyboard arrows to move back and forth</li>
      <li>Click on the edge of the big image to go to the next/previous</li>
      <li>Images are preloaded, and if the aren't finished loading when
      they are supposed to be displayed, a loading image will appear</li>
      <li>Slideshow count down only begins when the image has loaded and is visible</li>
      <li>Image title, can either be set in the title attribute, or in
      <code>elm.data('ad-title', 'My title here')</code>. $.data takes precedence over
      the title attribute</li>
      <li>Image descriptions, can either be set in the longdesc attribute, or in
      <code>elm.data('ad-desc', 'My description here')</code>. $.data takes precedence over
      the longdesc attribute</li>
      <li>Callbacks on different events that has access to the internal object,
      which means that you can access all internal methods, etc</li>
      <li>Takes the dimensions of the image container div and scales down images
      that are larger than it</li>
      <li>Image is positioned in the middle if it's smaller than the container div</li>
      <li>Images that are larger than the container are scaled down to fit inside
      the container</li>
    </ul>

    <h3>Browser compatibility</h3>
    <p>The script has currently been tested in Firefox 3/Win, Firefox 3.5/Mac, IE6+7+8/Win, Chrome 2/Win,
    Safari 3/Win, Safari 4/Mac, Opera 9/Win, Opera 9/Mac. If you have seen it working correctly in some other browser,
    or on some other platform, please let me know.</p>

    <h4 onclick="$('#browser-shots').toggle();" style="cursor:pointer;">Browsershots &raquo;</h4>
    <div id="browser-shots" style="display:none;">
      <p>When checked at <a href="http://browsershots.org/" target="_blank">browsershots.org</a> Konqueror 4.2 and 3.5 on
      Debian Testing behaved really strange. IE 5.5 on Windows 2000 seems to cause some Javascript error. I tested it
      by setting the gallery to start at image 9, and made sure it displayed that image and that the thumbs scrolled
      to thumb 9. So the test isn't exactly complete, since all features aren't tested.</p>

      <p>Browsers where the plugin seems to work fine from browsershots are:</p>
      <ul>
        <li>SeaMonkey 1.1.9 Fedora 7</li>
        <li>Opera 10.00 Ubuntu 8.04 LTS</li>
        <li>Epiphany 2.22 Ubuntu 8.04 LTS</li>
        <li>Shiretoko 3.5 Debian Testing</li>
        <li>Opera 9.64 Debian Testing</li>
        <li>Firefox 3.1 Debian Testing</li>
        <li>Firefox 2.0.0.19 Ubuntu 8.04 LTS</li>
        <li>Firefox 3.0.10 Windows XP</li>
        <li>MSIE 7.0 Windows XP</li>
        <li>Safari 4.0 Windows XP</li>
        <li>SeaMonkey 1.1.14 Windows XP</li>
        <li>Opera 8.54 Windows XP</li>
        <li>Firefox 3.5 Windows XP</li>
        <li>SeaMonkey 2.0 Windows XP</li>
        <li>Shiretoko 3.5 Windows XP</li>
        <li>Firefox 3.0 Fedora 7</li>
        <li>Safari 3.2.1 Windows XP</li>
        <li>Chrome 2.0.172.33 Windows XP</li>
        <li>Opera 9.64 Windows XP</li>
        <li>Opera 8.0 Windows XP</li>
        <li>MSIE 6.0 Windows XP</li>
        <li>Firefox 1.5.0.12 Windows XP</li>
        <li>Firefox 2.0.0.18 Windows XP</li>
        <li>MSIE 8.0 Windows XP</li>
        <li>Firefox 3.1 Windows XP</li>
        <li>SeaMonkey 2.0 Ubuntu 8.04 LTS</li>
        <li>Firefox 3.5 Ubuntu 8.04 LTS</li>
        <li>Firefox 1.5.0.13 Ubuntu 8.04 LTS</li>
        <li>Firefox 1.0.8 Ubuntu 8.04 LTS</li>
        <li>Firefox 3.5 Mac OS X 10.5</li>
        <li>Safari 4.0 Mac OS X 10.5</li>
      </ul>
    </div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-1364373-3");
pageTracker._trackPageview();
} catch(err) {}</script>
    <h2>Downloads</h2>
    <p><a href="http://coffeescripter.com/code/ad-gallery/jquery.ad-gallery.js">The JS file</a></p>
    <p><a href="http://coffeescripter.com/code/ad-gallery/jquery.ad-gallery.css">The CSS file</a></p>
    <p><a href="http://coffeescripter.com/code/ad-gallery/jquery.ad-gallery.1.2.4.zip" onclick="pageTracker._setVar('downloaded-ad-gallery');">The whole kit and kaboodle</a></p>

    <h2>Example code</h2>
    <p>Don't worry, all of these options are optional.</p>
    <p>Javascript</p>
    <pre><code>var galleries = $('.ad-gallery').adGallery({
  loader_image: 'loader.gif',
  width: 600, // Width of the image, set to false and it will read the CSS width
  height: 400, // Height of the image, set to false and it will read the CSS height
  thumb_opacity: 0.7, // Opacity that the thumbs fades to/from, (1 removes fade effect)
                      // Note that this effect combined with other effects might be resource intensive
                      // and make animations lag
  start_at_index: 0, // Which image should be displayed at first? 0 is the first image
  description_wrapper: $('#descriptions'), // Either false or a jQuery object, if you want the image descriptions
                                           // to be placed somewhere else than on top of the image
  animate_first_image: false, // Should first image just be displayed, or animated in?
  animation_speed: 400, // Which ever effect is used to switch images, how long should it take?
  display_next_and_prev: true, // Can you navigate by clicking on the left/right on the image?
  display_back_and_forward: true, // Are you allowed to scroll the thumb list?
  scroll_jump: 0, // If 0, it jumps the width of the container
  slideshow: {
    enable: true,
    autostart: true,
    speed: 5000,
    start_label: 'Start',
    stop_label: 'Stop',
    stop_on_scroll: true, // Should the slideshow stop if the user scrolls the thumb list?
    countdown_prefix: '(', // Wrap around the countdown
    countdown_sufix: ')',
    onStart: function() {
      // Do something wild when the slideshow starts
    },
    onStop: function() {
      // Do something wild when the slideshow stops
    }
  },
  effect: 'slide-hori', // or 'slide-vert', 'resize', 'fade', 'none' or false
  enable_keyboard_move: true, // Move to next/previous image with keyboard arrows?
  cycle: true, // If set to false, you can't go from the last image to the first, and vice versa
  // All callbacks has the AdGallery objects as 'this' reference
  callbacks: {
    // Executes right after the internal init, can be used to choose which images
    // you want to preload
    init: function() {
      // preloadAll uses recursion to preload each image right after one another
      this.preloadAll();
      // Or, just preload the first three
      this.preloadImage(0);
      this.preloadImage(1);
      this.preloadImage(2);
    },
    // This gets fired right after the new_image is fully visible
    afterImageVisible: function() {
      // For example, preload the next image
      var context = this;
      this.loading(true);
      this.preloadImage(this.current_index + 1,
        function() {
          // This function gets executed after the image has been loaded
          context.loading(false);
        }
      );

      // Want slide effect for every other image?
      if(this.current_index % 2 == 0) {
        this.settings.effect = 'slide';
      } else {
        this.settings.effect = 'fade';
      }
    },
    // This gets fired right before old_image is about to go away, and new_image
    // is about to come in
    beforeImageVisible: function(new_image, old_image) {
      // Do something wild!
    }
  }
});

// Set image description
some_img.data('ad-desc', 'This is my description!');

// Change effect on the fly
galleries[0].settings.effect = 'fade';
</code></pre>
    <p>HTML</p>
    <pre><code>&lt;div class=&quot;ad-gallery&quot;&gt;
  &lt;div class=&quot;ad-image-wrapper&quot;&gt;
  &lt;/div&gt;
  &lt;div class=&quot;ad-controls&quot;&gt;
  &lt;/div&gt;
  &lt;div class=&quot;ad-nav&quot;&gt;
    &lt;div class=&quot;ad-thumbs&quot;&gt;
      &lt;ul class=&quot;ad-thumb-list&quot;&gt;
        &lt;li&gt;
          &lt;a href=&quot;images/1.jpg&quot;&gt;
            &lt;img src=&quot;images/thumbs/t1.jpg&quot; title=&quot;Title for 1.jpg&quot;&gt;
          &lt;/a&gt;
        &lt;/li&gt;
        &lt;li&gt;
          &lt;a href=&quot;images/2.jpg&quot;&gt;
            &lt;img src=&quot;images/thumbs/t2.jpg&quot; longdesc=&quot;http://www.example.com&quot; alt=&quot;Description of the image 2.jpg&quot;&gt;
          &lt;/a&gt;
        &lt;/li&gt;
      &lt;/ul&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;</code></pre>
    <p>These are the only elements required for it to work. If you want, you can add
    all sorts of crazy elements inside those elements, but I would advice you not
    to put stuff into <code>.ad-image-wrapper</code> for the simple reason that it's
    emptied on start up.</p>

    <h2>Customize</h2>
    <p>You can alter the way it looks by editing the CSS file, or overriding the
    default CSS rules.
    </p>

    <h3>Image sizes</h3>
    <p>You probably want some other image size than the one in the demo above,
    and the only thing you need to do for this is to add this pice of CSS.</p>

    <pre><code>.ad-gallery {
  width: YOUR-IMAGE-WIDTHpx;
}
.ad-gallery .ad-image-wrapper {
  height: YOUR-IMAGE-HEIGHTpx;
}</code></pre>
    <p>Or you can specify it in the <code>settings.width</code> and <code>settings.height</code>.
    If you do that though, the gallery might flicker on page load, since it might take a while before
    that code runs, so I would suggest that you set it with CSS.
    If you want bigger thumbnails, the height of the thumb list adjusts itself to that, but you
    might want to position the arrows next to the list of your thumbs.
    You do that by adding this CSS and modifying to fit your needs.</p>

    <pre><code>.ad-gallery .ad-back {
  left: -20px;
  width: 13px;
  background: url(your_back_button.png) no-repeat;
}
.ad-gallery .ad-forward {
  right: -20px;
  width: 13px;
  background: url(your_forward_button.png) no-repeat;
}</code></pre>

    <h3>Image descriptions</h3>
    <p>It's now possible (since 1.2.3) to have the image description somewhere else than on top of the
    big image. To to this, supply the <code>description_wrapper</code> config parameter, which should
    be a jQuery object, such as $('#descriptions'). Note that the old description isn't removed until the
    old image is removed. This to enable you to animate the descriptions. If you don't need it, just add
    <code>if(this.current_description) this.current_description.remove();</code> in the animations
    that you use.</p>

    <h3>Animations</h3>
    <p>You can now add your own animation, by doing something like this.</p>

<pre><code>// The first argument is the name of your animation, which you then set in
// galleries[0].settings.effect
// The second argument is the function that handles the animation and it takes
// three arguments. The first is a jQuery object to the div that holds the image
// element and the image description element of the image that should be displayed
// The second is the direction, either 'left' or 'right'
// The third is the jQuery object that holds the description
// Your function should return an object like this:
// {old_image: {}, new_image: {}, speed: 100, easing: 'swing'}
// 'speed' and 'easing' are optional
// 'old_image' and 'new_image' are sent to the jQuery animate-method
// so use it just like you would use the $.animate-method
// This function gets executed with the gallery instance as its context
// so 'this' points to the gallery instance
galleries[0].addAnimation('wild',
  function(img_container, direction, desc) {
    var current_left = parseInt(img_container.css('left'), 10);
    var current_top = parseInt(img_container.css('top'), 10);
    if(direction == 'left') {
      var old_image_left = '-'+ this.image_wrapper_width +'px';
      img_container.css('left',this.image_wrapper_width +'px');
      var old_image_top = '-'+ this.image_wrapper_height +'px';
      img_container.css('top', this.image_wrapper_height +'px');
    } else {
      var old_image_left = this.image_wrapper_width +'px';
      img_container.css('left','-'+ this.image_wrapper_width +'px');
      var old_image_top = this.image_wrapper_height +'px';
      img_container.css('top', '-'+ this.image_wrapper_height +'px');
    };
    if(desc) {
      desc.css('bottom', '-'+ desc[0].offsetHeight +'px');
      desc.animate({bottom: 0}, this.settings.animation_speed * 2);
    };
    if(this.current_description) {
      this.current_description.css('bottom', '-'+ this.current_description[0].offsetHeight +'px');
    };
    img_container.css('opacity', 0);
    return {old_image: {left: old_image_left, top: old_image_top, opacity: 0},
            new_image: {left: current_left, top: current_top, opacity: 1},
            easing: 'easeInBounce',
            speed: 2500};
  }
);</code></pre>

    <h2>Credits</h2>
    <p>Thanks to David Miles and Edward Gilbert for helping out catching bugs, and thanks to
    <a href="http://www.gevolve.se/" target="_blank">Fredrik Nicol-Carlsson</a>
    for help with the visual/design elements, and for feature ideas.</p>

    <h2>Feedback, feature requests, bug reports</h2>
    <p>If you have any feedback on this, please send it as a comment
    or email me at <span class="no-spam">andy at-no-spam coffeescripter dot-no-spam com</span>.</p>

    <p><a href="http://coffeescripter.com/2009/07/ad-gallery-a-jquery-gallery-plugin/#comments">Read comments</a></p>

    <div id="comment-form">
      <form action="http://coffeescripter.com/wp-comments-post.php" method="post" id="commentform">
        <div class="field">
          <label class="text">Name (required)</label>
          <input type="text" name="author" id="author" value="" class="textfield" tabindex="1" />
        </div>
        <div class="field">
          <label class="text">Email (required)</label>
          <input type="text" name="email" id="email" value="" class="textfield" tabindex="2" />
        </div>
        <div class="field">
          <label class="text">Website</label>
          <input type="text" name="url" id="url" value="" class="textfield" tabindex="3" />
        </div>
        <div class="field">
          <label class="text">Comment</label>
          <textarea name="comment" id="comment" class="commentbox" tabindex="4"></textarea>
        </div>
        <div class="formactions">
          <input type="submit" name="submit" tabindex="5" class="submit" value="Add your comment" />
        </div>
        <input type="hidden" name="comment_post_ID" value="122" />
      </form>
    </div>

    <h2>Upcoming features/fixes</h2>
    <ul>
      <li><strike>Make it possible to make the large image clickable</strike></li>
      <li><strike>Make it possible to have the image description somewhere other than on top of
      the image</strike></li>
      <li><strike>Rewrite the image-swapping code to make it easier to add effects, and make
      it possible to combine effects</strike></li>
      <li><strike>Fix the code so it's packable, and distribute a packed version of the plugin</strike></li>
      <li><strike>Make description slide in optional</strike></li>
      <li><strike>Keyboard press 's' toggles slideshow start/stop</strike></li>
      <li><strike>Add another effect that makes the old image shrink and the new image grow</strike></li>
      <li><strike>Add another slide effect that makes images come down from above</strike></li>
      <li><strike>Fix the bug that makes the thumbs split on two rows</strike></li>
      <li><strike>Make it work in Opera</strike></li>
      <li><strike>Make sure the arrows inside the big image are visible in IE8</strike></li>
    </ul>

    <h2>Changelog</h2>
    <ul>
      <li>2010.07.15 Added support for making the big image clickable. <strong>Note</strong> that this required
      a breaking change, where the image description is in the alt attribute now instead, and
      longdesc is used for the link - v1.2.4</li>
      <li>2010.07.12 Added support for placing description somewhere else than on top of an image - v1.2.3</li>
      <li>2009.08.02 Fixed a typo and fixed a bug in how the settings were extended - v1.2.2</li>
      <li>2009.08.01 Fixed a bug for when no description was given - v1.2.1</li>
      <li>2009.07.24 Refactored the animation code so they are in separate functions,
      and added ability to inject your own animation function. Also separated the slideshow
      into it's own class. Since the interface has changed a bit, this release is
      1.2.0 instead of 1.1.2 - v1.2.0</li>
      <li>2009.07.23 Fixed a bug for some Firefox 3 installations on Windows where the
      full image wasn't showing, and cleaned up some code - v1.1.1</li>
      <li>2009.07.14 Added a few image swap effects, added opacity effect to the thumbs,
      simplified some code, and fixed a bug for IE6 - v1.1.0</li>
      <li>2009.07.12 Made it work in Opera, fixed the next/previous buttons in IE8,
      and fixed a bug that made the thumbs spread on two rows - v1.0.1</li>
      <li>2009.07.10 Released - v1.0.0</li>
    </ul>

    <textarea rows="100" cols="80" id="debug" style="display:none"></textarea>
  </div>
</body>
</html>
