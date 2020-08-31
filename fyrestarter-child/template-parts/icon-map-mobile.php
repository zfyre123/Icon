<div id="map2" class="hidden-md-up"><div>
    <script type="text/javascript">
    
      function createMap2(){
        var opts2 = {  
          center: {
            lat: 47.5266664,
            lng: -122.2952284,
          },
          zoom: 12,
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

        
        opts2.clickableIcons = true;
        opts2.disableDoubleClickZoom = true;
        opts2.draggable = true;
        opts2.keyboardShortcuts = true;
        opts2.scrollwheel = false;
        

        
        var setControlOptions = function(key, enabled, position, style, mapTypeIds){
          opts2[key + 'Control'] = enabled;
          opts2[key + 'ControlOptions'] = {
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
        

        var map2 = new google.maps.Map(document.getElementById('map2'), opts2);
   
        var points = [
          <?php if( have_rows('map_locations') ): ?>
          <?php $counter = 0; ?>
            <?php while( have_rows('map_locations') ): the_row(); ?>
            <?php $counter++; ?>
              ['location<?php echo $counter; ?>', <?= get_sub_field('latitude') ?>, <?= get_sub_field('longitude') ?>, <?php echo $counter; ?>],
            <?php endwhile; ?>
          <?php endif; ?>
        ];
      
        var icon2 = {
          url: '/wp-content/uploads/2020/07/flag.png', // url
          scaledSize: new google.maps.Size(37, 46), // scaled size
          origin: new google.maps.Point(0,0), // origin
          anchor: new google.maps.Point(-20, 35) // anchor
        };

         var marker, i;

        for (i = 0; i < points.length; i++) {  
            marker = new google.maps.Marker({
            position: new google.maps.LatLng(points[i][1], points[i][2]),
            map: map2,
            icon: icon2
          });
        }
              
        
         
      }

    </script>

       

