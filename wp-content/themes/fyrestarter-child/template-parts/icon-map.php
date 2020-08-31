<div id="map" class="hidden-sm-down"></div>
    <script type="text/javascript">

  var droppedCount = 0;
  var droppedInterval = null;
		
      function createMap(){
        var opts = {
			<?php $map_center = get_field('map_center');
				if( $map_center ): ?>
				  center: {
					lat: <?php echo $map_center['latitude']; ?>,
					lng: <?php echo $map_center['longitude']; ?>,
				  },			
			<?php endif; ?>			
//           center: {
//             lat: 47.5795109,
//             lng: -122.3110914,
//           },
          zoom: 13,
          styles: [
            {
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#f5f5f5"
                }
              ]
            },
            {
              "elementType": "labels.icon",
              "stylers": [
                {
                  "visibility": "off"
                }
              ]
            },
            {
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#616161"
                }
              ]
            },
            {
              "elementType": "labels.text.stroke",
              "stylers": [
                {
                  "color": "#f5f5f5"
                }
              ]
            },
            {
              "featureType": "administrative.land_parcel",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#bdbdbd"
                }
              ]
            },
            {
              "featureType": "poi",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#eeeeee"
                }
              ]
            },
            {
              "featureType": "poi",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#757575"
                }
              ]
            },
            {
              "featureType": "poi.park",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#e5e5e5"
                }
              ]
            },
            {
              "featureType": "poi.park",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#9e9e9e"
                }
              ]
            },
            {
              "featureType": "road",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#ffffff"
                }
              ]
            },
            {
              "featureType": "road.arterial",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#757575"
                }
              ]
            },
            {
              "featureType": "road.highway",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#dadada"
                }
              ]
            },
            {
              "featureType": "road.highway",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#616161"
                }
              ]
            },
            {
              "featureType": "road.local",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#9e9e9e"
                }
              ]
            },
            {
              "featureType": "transit.line",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#e5e5e5"
                }
              ]
            },
            {
              "featureType": "transit.station",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#eeeeee"
                }
              ]
            },
            {
              "featureType": "water",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#c9c9c9"
                }
              ]
            },
            {
              "featureType": "water",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#9e9e9e"
                }
              ]
            }
          ],
          maxZoom: 20,
          minZoom: 0,
          mapTypeId: 'roadmap',
        };

        
        opts.clickableIcons = true;
        opts.disableDoubleClickZoom = true;
        opts.draggable = true;
        opts.keyboardShortcuts = true;
        opts.scrollwheel = false;
        

        
        var setControlOptions = function(key, enabled, position, style, mapTypeIds){
          opts[key + 'Control'] = enabled;
          opts[key + 'ControlOptions'] = {
            position: google.maps.ControlPosition[position],
            style: google.maps.MapTypeControlStyle[style],
            mapTypeIds: mapTypeIds
          };
        };
        
          
        setControlOptions('fullscreen',false,'DEFAULT','',null);
        setControlOptions('mapType',false,'DEFAULT','DEFAULT',["roadmap","satellite","terrain"]);
        setControlOptions('rotate',false,'DEFAULT','',null);
        setControlOptions('scale',false,'','',null);
        setControlOptions('streetView',false,'DEFAULT','',null);
        setControlOptions('zoom',false,'DEFAULT','',null);
        

        var map = new google.maps.Map(document.getElementById('map'), opts);
   
		var locations = [
			<?php if( have_rows('map_locations') ): ?>
			<?php $counter = 0; ?>
				<?php while( have_rows('map_locations') ): the_row(); ?>
				<?php $counter++; ?>
				  new google.maps.LatLng(<?= get_sub_field('latitude') ?>, <?= get_sub_field('longitude') ?>),
				<?php endwhile; ?>
			<?php endif; ?>
		];
		  
		var icon = {
			url: '/wp-content/uploads/2020/07/flag.png', // url
			scaledSize: new google.maps.Size(75, 97), // scaled size
			origin: new google.maps.Point(0,0), // origin
			anchor: new google.maps.Point(-35, 45) // anchor
		};
		  
		  function drop() {
  		  if(droppedCount === locations.length){
  				clearInterval(droppedInterval);
  				return;
  			}
  			else if(droppedInterval === null)
  				droppedInterval = setInterval(drop,600);

			 var m = locations[droppedCount++];
			 addMarker(m);
		  }
      
		  function addMarker(m) {
			var marker, i;
  			for (i = 0; i < locations.length; i++) {  
  			  marker = new google.maps.Marker({
  				animation: google.maps.Animation.DROP,
  				position: m,
  				map: map,
  				icon: icon,
  				optimized: true
  			  });
  			}
		  }


        jQuery(document).ready(function($){

          $.fn.isInViewport = function() {
            var elementTop = $('#map').offset().top;
            var elementBottom = elementTop + $('#map').outerHeight();

            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height() / 3;

            return elementBottom > viewportTop && elementTop < viewportBottom;
          };

          var flag = 0;
          $(window).on('scroll', function() {
          if ($('#map').isInViewport()) {
            if(flag == 0){
              flag = 1;
				drop();
              } 
            }
          });

        });


        createMap2();
        
         
      }
    

    </script>

