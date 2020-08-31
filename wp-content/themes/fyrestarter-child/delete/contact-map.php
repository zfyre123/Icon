<div id="map" style="position: relative; overflow: hidden;width: 100%; height: 500px;"></div>
    <script type="text/javascript">
      function createMap(){
        var opts = {
          center: {
            lat: 37.9794452,
            lng: -122.0493821,
          },
          zoom: 14,
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

        (function(){
          var markerOptions = {
            map: map,
            position: {
              lat: 37.9794452,
              lng: -122.0493821,
            }
          };
             
          var marker = new google.maps.Marker(markerOptions);

        })();
         
      }

    </script>

    <script defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsp2N-zgE9b50GUKFukK7drPtA7_5pMNM&amp;v=quarterly&amp;language=en&amp;libraries=places,geometry&amp;callback=createMap"></script>
