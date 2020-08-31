<?php

$post_id = get_the_ID();
$date = get_the_date();
$taxonomy = get_queried_object();

$thumbnail_id = get_post_thumbnail_id();
$image_src = wp_get_attachment_image_src( $thumbnail_id, 'full' );

$terms = get_the_terms( $post->ID , 'sermon_series' );
$first_term = $terms[0];
$post_term = $first_term->slug;
$post_term_name = $first_term->name;

//CHECK IF CURRENT SERIES
$all_terms = get_terms( array(
    'taxonomy' => 'sermon_series',
    'hide_empty' => false,
    'orderby' => 'name',
    'order' => 'DESC',
    'number' => 1
) );
foreach ( $all_terms as $current_term ) {
  $current_term_slug = $current_term->slug;
} 

get_header();?>

<section class="sermon-podcast-top">
  <div class="container">

    <div class="row section-header text-center">
      <div class="col-lg-8 mx-auto">
        <?php if ( $post_term === $current_term_slug) { ?>
              <p class="uppercase futura-reg">Current sermon-podcast Series / <?php echo $post_term_name ?></p>
            <?php } else { ?>
              <p class="uppercase futura-reg"><?php echo $post_term_name ?></p>
            <?php } ?>
        <h1 class="grn-txt"><?php echo get_the_title(); ?></h1>
        <p><strong><?php echo $date; ?></strong><span> / <?php echo get_the_author(); ?></span></a></p>
      </div>
    </div>

    <div class="row sermon-podcast-content">
      <div class="col-lg-8 mx-auto">
        <?php the_content(); ?>
      </div>
    </div>

    <div class="row sermon-podcast-video section-header">
      <div class="col-lg-8 mx-auto">
        <div class="video_wrapper"><?= get_field('video'); ?></div>      
      </div>  
    </div>

    <div class="row sermon-podcast-audio">
      <div class="col-lg-8 mx-auto">
        <?= get_field('audio'); ?>  
        <!-- <div class="audio-player">
            <div class="timeline">
              <div class="progress"></div>
            </div>
            <div class="controls">
              <div class="time">
                <div class="current">0:00</div>
                <div class="length"></div>
              </div>
              <div class="play-container">
                <div class="toggle-play play"><i class="fas fa-play"></i></div>
              </div>
              <div class="volume-container">
                  <div class="volume-button">
                    <div class="volume icono-volumeMedium"><i class="fas fa-volume"></i></div>
                  </div>
                  <div class="volume-slider">
                    <div class="volume-percentage"></div>
                  </div>
              </div>
            </div>
        </div> -->
      </div>
    </div>

  </div>
</section>

<!-- <style type="text/css">
  

.audio-player {
    width: 100%;
}
.audio-player .timeline {
    background: #D4E3E8;
    width: 100%;
    position: relative;
    cursor: pointer;
    height: 6px;
    overflow: visible;
}
.audio-player .timeline .progress {
    background: #1C2933;
    width: 0%;
    height: 100%;
    transition: 0.25s;
    position: relative;
    overflow: visible;
    line-height: normal;
    padding: 0 12px;
}
.audio-player .timeline .progress::after {
    content: '';
    position: absolute;
    right: 0;
    height: 24px;
    width: 24px;
    border-radius: 50%;
    background-color: #1C2933;
    top: 50%;
    transform: translateY(-50%);
}
.audio-player .controls .time {
    display: flex;
    justify-content: space-between;
    width: 100%;
    font-family: futura-pt, sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 26px;
    line-height: 33px;
}
.play-container {
    display: flex;
    justify-content: center;
    width: 100%;
}
.toggle-play {
    width: 76px;
    height: 76px;
    background: #1C2933;
    color: #fff;
    display: flex;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    border-radius: 50%;
    font-size: 25px;
    cursor: pointer;
}
.volume-slider {
  display: none;
}
.volume-container {
    position: absolute;
    bottom: 20px;
    right: 0;
    font-size: 20px;
    line-height: 1;
    cursor: pointer;
}
.controls {
    position: relative;
    margin-top: 12px;
}

/*.audio-player .controls .toggle-play.play {
  cursor: pointer;
  position: relative;
  left: 0;
  height: 0;
  width: 0;
  border: 7px solid #0000;
  border-left: 13px solid white;
}
.audio-player .controls .toggle-play:hover {
  transform: scale(1.1);
}
.audio-player .controls .toggle-play.pause {
  height: 15px;
  width: 20px;
  cursor: pointer;
  position: relative;
}*/

/*.audio-player .controls .volume-container {
  cursor: pointer;
  position: relative;
  z-index: 2;
}
.audio-player .controls .volume-container .volume-button {
  height: 26px;
  display: flex;
  align-items: center;
}
.audio-player .controls .volume-container .volume-button .volume {
  transform: scale(0.7);
}
.audio-player .controls .volume-container .volume-slider {
  position: absolute;
  left: -3px;
  top: 15px;
  z-index: -1;
  width: 0;
  height: 15px;
  background: white;
  box-shadow: 0 0 20px #000a;
  transition: .25s;
}
.audio-player .controls .volume-container .volume-slider .volume-percentage {
  background: coral;
  height: 100%;
  width: 75%;
}
.audio-player .controls .volume-container:hover .volume-slider {
  left: -123px;
  width: 120px;
}
*/

</style>

<script type="text/javascript">

jQuery(document).ready(function($) {

//VIDEO
$('.video-play-icon').click(function(e){
  $(this).addClass("active");
  $(this).closest(".video-play-holder").addClass("active");
  var iframeEl = $('<iframe>', { src: $(this).data('url') });
  $('#youtubevideo').attr('src', $(this).data('url'));
}) 

//AUDIO
  $(".toggle-play").on('click', function() {
    $(".toggle-play i").toggleClass("fa-pause");
  });
  $(".volume").on('click', function() {
    $(".volume i").toggleClass("fa-volume-mute");
  });
  $(".volume").draggable();
  
});   

const audioPlayer = document.querySelector(".audio-player");
const audio = new Audio(
  "<?php echo get_field('mp3'); ?>"
);

//console.dir(audio);

audio.addEventListener(
  "loadeddata",
  () => {
    audioPlayer.querySelector(".time .length").textContent = getTimeCodeFromNum(
      audio.duration
    );
    audio.volume = 1;
  },
  false
);

//click on timeline to skip around
const timeline = audioPlayer.querySelector(".timeline");
timeline.addEventListener("click", e => {
  const timelineWidth = window.getComputedStyle(timeline).width;
  const timeToSeek = e.offsetX / parseInt(timelineWidth) * audio.duration;
  audio.currentTime = timeToSeek;
}, false);

//click volume slider to change volume
const volumeSlider = audioPlayer.querySelector(".controls .volume-slider");
volumeSlider.addEventListener('click', e => {
  const sliderWidth = window.getComputedStyle(volumeSlider).width;
  const newVolume = e.offsetX / parseInt(sliderWidth);
  audio.volume = newVolume;
  audioPlayer.querySelector(".controls .volume-percentage").style.width = newVolume * 100 + '%';
}, false)

//check audio percentage and update time accordingly
setInterval(() => {
  const progressBar = audioPlayer.querySelector(".progress");
  progressBar.style.width = audio.currentTime / audio.duration * 100 + "%";
  audioPlayer.querySelector(".time .current").textContent = getTimeCodeFromNum(
    audio.currentTime
  );
}, 500);

//toggle between playing and pausing on button click
const playBtn = audioPlayer.querySelector(".controls .toggle-play");
playBtn.addEventListener(
  "click",
  () => {
    if (audio.paused) {
      playBtn.classList.remove("play");
      playBtn.classList.add("pause");
      audio.play();
    } else {
      playBtn.classList.remove("pause");
      playBtn.classList.add("play");
      audio.pause();
    }
  },
  false
);

audioPlayer.querySelector(".volume-button").addEventListener("click", () => {
  const volumeEl = audioPlayer.querySelector(".volume-container .volume");
  audio.muted = !audio.muted;
  if (audio.muted) {
    volumeEl.classList.remove("icono-volumeMedium");
    volumeEl.classList.add("icono-volumeMute");
  } else {
    volumeEl.classList.add("icono-volumeMedium");
    volumeEl.classList.remove("icono-volumeMute");
  }
});

//turn 128 seconds into 2:08
function getTimeCodeFromNum(num) {
  let seconds = parseInt(num);
  let minutes = parseInt(seconds / 60);
  seconds -= minutes * 60;
  const hours = parseInt(minutes / 60);
  minutes -= hours * 60;

  if (hours === 0) return `${minutes}:${String(seconds % 60).padStart(2, 0)}`;
  return `${String(hours).padStart(2, 0)}:${minutes}:${String(
    seconds % 60
  ).padStart(2, 0)}`;
}

</script>

 -->
<?php get_footer(); ?>