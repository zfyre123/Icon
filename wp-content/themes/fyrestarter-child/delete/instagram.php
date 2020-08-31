<section id="insta" class="text-center pb-0">
  <div class="container">
    <div class="row section-header">
      <div class="col-12">
        <h2>FOLLOW Us <a class="gld-txt underlined" href="<?php echo get_option('ig_url'); ?>">@CULTURECANNABISCLUB</a></h2>
      </div>
    </div>
  </div>
<div id="instagram-feed" class="instagram_feed"></div>
</section>
<script>
    (function($){
        $(window).on('load', function(){
            $.instagramFeed({
                'username': "<?php echo get_option('ig_username'); ?>",
                'container': "#instagram-feed",
                'display_profile': false,
                'display_biography': false,
                'display_gallery': true,
                'callback': null,
                'styling': true,
                'items': 10,
                'items_per_row': 5,
                'margin': 0,
                'image_size': 480 
            });
        });
    })(jQuery);
</script>