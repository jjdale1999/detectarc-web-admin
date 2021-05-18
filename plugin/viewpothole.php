<?php

include("../includes/header.php");
include("../includes/sidebar.php");
include("../includes/nav.php");
include("get_data.php");
include("update_record.php");



$key = $_GET['key'];


?>

<div class="content" id="content">

<div class="row">
  <div class="col-sm-6" >
    <div class="card">
      <div class="card-body">
      <button id="editbtn"class="btn btn-secondary"  >EDIT POTHOLE</button>

      <br><br>

      <img  class="card-img-top"  style="width: 35rem; height:19rem;" src="<?php echo  $fetchdata[$key]['image']; ?>" >
     <br>
      <li class="list-group-item list-group-item-danger" style="border-bottom-left-radius:10px; border-bottom-right-radius:10px;"><i class="fa"style="font-size:20px; "></i> Type:    <?php echo $fetchdata[$key]['type'] ?></li>

        <br>  
      </div>
    </div>
    <p> Date Created : <?php echo $fetchdata[$key]['date_added'];?> </p>
  </div>
  <div class="col-sm-6">
    <div class="card">
    <div class="card-body">
          <!-- <h5 class="card-title">Card title</h5> -->
          <ul class="list-group list-group-flush">
            <li class="list-group-item list-group-item-success"><i class="fa fa-briefcase"style="font-size:20px;"></i>   Reported By: <?php echo $fetchdata[$key]['userid'] ?></li>
            <li class="list-group-item list-group-item-success"><i class="fa fa-diamond"style="font-size:20px;"></i>   Priority <?php echo $fetchdata[$key]['priority']+$fetchdata[$key]['no_of_reports']+$fetchdata[$key]['arterialPrio'] ?></li>
            <li class="list-group-item list-group-item-success"><i class="fa fa-flash"style="font-size:20px;"></i>   Severity Level <?php echo $fetchdata[$key]['severity'] ?></li>
            <li class="list-group-item list-group-item-success"><i class="fa fa-flag"style="font-size:20px;"></i>   Road Priority <?php echo $fetchdata[$key]['arterialPrio'] ?></li>

            <li class="list-group-item list-group-item-success"><i class="fa fa-user"style="font-size:20px;"></i>   Number of Reports <?php echo $fetchdata[$key]['no_of_reports'] ?></li>
            <li class="list-group-item list-group-item-success"><i class="fa fa-map-marker"style="font-size:20px;"></i>   Location <?php echo $fetchdata[$key]['address'].", ".$fetchdata[$key]['parish'] ?></li>
            <li class="list-group-item list-group-item-success"><i class="fa fa-map-pin"style="font-size:20px;"></i>   Coordinates <?php echo $fetchdata[$key]['latitude'].", ".$fetchdata[$key]['longitude'] ?></li>
            <li class="list-group-item list-group-item-success"><i class="fa fa-clock-o"style="font-size:20px;"></i>   Contractor: <?php echo$contractor_fetchdata[$fetchdata[$key]['contractor']]['fname'].", ". $contractor_fetchdata[$fetchdata[$key]['contractor']]['lname'] ?></li>
            <li class="list-group-item list-group-item-success"><i class="fa fa-user-secret"style="font-size:20px;"></i>   Land Sureyor <?php echo $landsur_fetchdata[$fetchdata[$key]['land_surveyor']]['fname'].", ". $landsur_fetchdata[$fetchdata[$key]['land_surveyor']]['lname'] ?></li>
            <li class="list-group-item list-group-item-success"><i class="fa fa-language"style="font-size:20px;"></i>   Status <?php echo $fetchdata[$key]['status'] ?></li>

          </ul>
          
        </div>
    </div>
  </div>
</div>

<div class="card-footer">
          <button type="button" class="btn float-right" id="showmapbtn"  data-toggle="modal" data-target="#myModal" data-lat='<?php echo $fetchdata[$key]['latitude']?>' data-lng='<?php echo $fetchdata[$key]['longitude']?>'>SHOW ON MAP </button>
        </div>

</div>

 <!-- Modal -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 modal_body_map">
              <div class="location-map" id="location-map">
                <div style="width: 600px; height: 400px;" id="map_canvas"></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>





    <div class="content" id="updateform">
              <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading"></h3>

                                <!-- put the image of the  pothole -->
                                <div class="row register-form justify-content-md">
                                    
                                    <div class="input-group">

                                            <div class="input-group prepend">
                                            <span class="input-group-text">Contractor</span>
                                               <select class="form-control " id="contractorid">
                                               
                                                <option class="hidden"  value =<?php echo $fetchdata[$key]['contractor'];?>  selected disabled> 

                                                      <?php if($fetchdata[$key]['contractor']==""){
                                                          echo "Contractor";
                                                      }else{
                                                        echo $contractor_fetchdata[$fetchdata[$key]['contractor']]['fname'].", ". $contractor_fetchdata[$fetchdata[$key]['contractor']]['lname'];
                                                      }
                                                     ?>
                                                </option>
                                                <?php foreach ($contractor_fetchdata as $index => $row) { 
                                                  
                                                      if($fetchdata[$key]['contractor']!=$index){
                                                        ?>
                                                            <option value="<?php echo $index;?>"><?php echo $row['fname'].", ". $row['lname'];?></option>

                                                      <?php }  ?>


                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                     <div class="input-group">

                                            <div class="input-group prepend">
                                            <span class="input-group-text">Land Surveyor</span>
                                               <select class="form-control " id="landsurid">
                                               
                                                <option class="hidden"  value = <?php echo $fetchdata[$key]['land_surveyor'];?> selected disabled> 

                                                  <?php if($fetchdata[$key]['land_surveyor']==""){
                                                          echo "Land Surveyor";
                                                      }else{
                                                        echo $landsur_fetchdata[$fetchdata[$key]['land_surveyor']]['fname'].", ". $landsur_fetchdata[$fetchdata[$key]['land_surveyor']]['lname'];
                                                      }
                                                     ?>
                                                </option>
                                                <?php foreach ($landsur_fetchdata as $index => $row) { 
                                                  
                                                      if($fetchdata[$key]['land_surveyor']!=$index){
                                                        ?>
                                                            <option value="<?php echo $index;?>"><?php echo $row['fname'].", ". $row['lname'];?></option>

                                                      <?php }  ?>


                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                 
                                    <div>
                                        <button  class="btn btnRegister float-right"  id="cancelbtn" value="Register">cancel</button>
                                        <button  class="btn btnRegister float-right"  id="updatebtn" value="Register">update</button>

                                    </div>
                                </div>
</div>
</div>
</div>
</div>




<?php 
$Postdata=[
  'no_of_reports' => $fetchdata[$key]['no_of_reports'],
  'address' => $fetchdata[$key]['address'],
  'image' => $fetchdata[$key]['image'],
  'latitude' => $fetchdata[$key]['latitude'],
  'longitude' => $fetchdata[$key]['longitude'],
  'parish' => $fetchdata[$key]['parish'],
  'severity' => $fetchdata[$key]['severity'],
  'priority'=> $no_reports+$fetchdata[$key]['arterialPrio'],
  'arterialPrio'=> $fetchdata[$key]['arterialPrio'],
  'land_surveyor'=> $fetchdata[$key]['land_surveyor'],
  'contractor'=> $fetchdata[$key]['contractor']

];


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9etM9rqnYas63ypURAkvEFn_W_sU0NM4&callback=initMap">
    </script>
<script>

  $("#editbtn").click(function(){
    $("#content").toggle();
    $("#updateform").toggle();

  });

  $("#cancelbtn").click(function(){
    $("#content").toggle();
    $("#updateform").toggle();

  });

  $("#updatebtn").click(function(){

        <?php update_rec($Postdata,$key);?>
        var sel_contractor = document.getElementById("contractorid");
        var text_contractor= sel_contractor.options[sel_contractor.selectedIndex].value;
        var sel_landsur = document.getElementById("landsurid");
        var text_landsur= sel_landsur.options[sel_landsur.selectedIndex].value;
        var request= $.ajax({
                    type: "POST",
                    url: 'updatepotholerec.php',
                    data: {
                    
                    // latitude: $fetchdata[$key]['latitude'],
                    // longitude : $fetchdata[$key]['longitude'],
                    land_surveyor: text_landsur,
                    contractor: text_contractor,
                    old_contractor: <?php echo json_encode($fetchdata[$key]['contractor']); ?>,
                    old_landsur:<?php echo json_encode($fetchdata[$key]['land_surveyor']); ?>,
                    key: <?php echo json_encode($key);?>
                    },
                    success: function(data)
                    {
                        // alert("success!");
                        console.log("data");
                        console.log(data);
                        console.log("making sure");

                     }
        });

        request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

        // window.location.href = "main.php";

        
        window.location.href = "viewpothole.php?key=<?php echo $key ?>";

        
  });

  $(document).ready(function() {
  var map = null;
  var myMarker;
  var myLatlng;

  function initializeGMap(lat, lng) {
    myLatlng = new google.maps.LatLng(lat, lng);

    var myOptions = {
      zoom: 12,
      zoomControl: true,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    myMarker = new google.maps.Marker({
      position: myLatlng
    });
    myMarker.setMap(map);
  }

  // Re-init map before show modal
  $('#myModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    initializeGMap(button.data('lat'), button.data('lng'));
    $("#location-map").css("width", "100%");
    $("#map_canvas").css("width", "100%");
  });

  // Trigger map resize event after modal shown
  $('#myModal').on('shown.bs.modal', function() {
    google.maps.event.trigger(map, "resize");
    map.setCenter(myLatlng);
  });
});
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
<?php

include("../includes/footer.php");


?>