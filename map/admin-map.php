
<?php
include_once '../header.php';
include_once 'locations_model.php';
?>

<div id="page-transitions" class="page-build light-skin highlight-blue">    
    <?php include '../header2.php';?>

    <div class="page-content header-clear-large"> <!-- Adding header-clear-large / small / medium -- will increase the size between the header and the content -->
    
        <!-- Content titles go outside of content classes-->
        <div class="content-title bottom-30 top-30">
            <span class="color-highlight">Let's start</span>
            <h1>Starter Page</h1>
			<p>
                Meet the starter page. This will make ti easy for you to add your own features. It includes a  lot of comments in the code, so go ahead and open it in your favorite text editor.
            </p>
        
        <div class='content'></div>
        <div id="map"  style=' z-index: 3; height: 100%; width: 100%; padding-top: 100%; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;'></div>
            
        <script>
            var map;
            var marker;
            var infowindow;
            var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
            var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
            var locations = <?php get_all_locations() ?>;

            
                var france = {lat: 46.87916, lng: -3.32910};
                infowindow = new google.maps.InfoWindow();
                map = new google.maps.Map(document.getElementById('map'), {
                    center: france,
                    zoom: 7
                });


                var i ; var confirmed = 0;
                for (i = 0; i < locations.length; i++) {

                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        icon :   locations[i][4] === '1' ?  red_icon  : purple_icon,
                        html: document.getElementById('form')
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            confirmed =  locations[i][4] === '1' ?  'checked'  :  0;
                            $("#confirmed").prop(confirmed,locations[i][4]);
                            $("#id").val(locations[i][0]);
                            $("#description").val(locations[i][3]);
                            $("#form").show();
                            infowindow.setContent(marker.html);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            

            function saveData() {
                var confirmed = document.getElementById('confirmed').checked ? 1 : 0;
                var id = document.getElementById('id').value;
                var url = 'locations_model.php?confirm_location&id=' + id + '&confirmed=' + confirmed ;
                downloadUrl(url, function(data, responseCode) {
                    if (responseCode === 200  && data.length > 1) {
                        infowindow.close();
                        window.location.reload(true);
                    }else{
                        infowindow.setContent("<div style='color: purple; font-size: 25px;'>Inserting Errors</div>");
                    }
                });
            }


            function downloadUrl(url, callback) {
                var request = window.ActiveXObject ?
                    new ActiveXObject('Microsoft.XMLHTTP') :
                    new XMLHttpRequest;

                request.onreadystatechange = function() {
                    if (request.readyState == 4) {
                        callback(request.responseText, request.status);
                    }
                };

                request.open('GET', url, true);
                request.send(null);
            }


        </script>   
        
        <div style="display: none" id="form">
            <table class="map1">
                <tr>
                    <input name="id" type='hidden' id='id'/>
                    <td><a>Description:</a></td>
                    <td><textarea disabled id='description' placeholder='Description'></textarea></td>
                </tr>
                <tr>
                    <td><b>Confirm Location ?:</b></td>
                    <td><input id='confirmed' type='checkbox' name='confirmed'></td>
                </tr>

                <tr><td></td><td><input type='button' value='Save' onclick='saveData()'/></td></tr>
            </table>
        </div>
                
        
    </div>


</div>


<?php
include_once '../footer.php';
?>


<!------ Include the above in your HEAD tag ---------->


