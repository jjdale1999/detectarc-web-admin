<?php

include("../includes/header.php");
include("../includes/sidebar.php");
include("../includes/nav.php");
include("update_record.php");


?>

<div class="content" >
        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h3  class="register-heading"></h3>
            <form>
                <div class="row register-form justify-content-md">
                    <div class="input-group">
                        <div class="input-group prepend">
                            <span class="input-group-text">First Name</span>
                            <input type="text" aria-label="Longitude" class="form-control text-center" placeholder="Longitude">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group prepend">
                            <span class="input-group-text">Last Name</span>
                            <input type="text" aria-label="Longitude" class="form-control text-center" placeholder="Longitude">
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group prepend">
                            <span class="input-group-text">Email Address</span>
                            <input type="email" aria-label="Longitude" class="form-control text-center"  id="email" placeholder="Longitude">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-group prepend">
                            <span class="input-group-text">Password</span>
                            <input type="text" aria-label="Longitude" class="form-control text-center" id="password" placeholder="Longitude">
                        </div>
                    </div>
                   
                    <div>
                        <button  class="btn btnRegister float-right"  id="cancelbtn" value="Register">Cancel</button>
                        <button  class="btn btnRegister float-right"  id="createbtn" value="Register">Create</button>

                    </div>
                </div>
            </form>
        </div>
        
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>


  $("#createbtn").click(function(){

       var request= $.ajax({
                    type: "POST",
                    url: 'create_landsur.php',
                    data: {
                    email: document.getElementById("email").value,
                    password: document.getElementById("password").value
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

        
  });

  
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <!-- <script src="//maps.googleapis.com/maps/api/js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
<?php

include("../includes/footer.php");


?>