
<html> 
    <head>
      <!-- <script type="text/javascript">
          var q1="hello"; 

        
       </script> -->
       <script type='text/javascript' src='kdTree.js'></script>
   </head>
<body>
 </body> 



 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>



<?php
            //loop through every record , check if the distance is less than 1
            //if it is , increment  number of reports 
            // once thats done , update the number of reports for that pothole in firebase

            include('euclidean_distance.php');
            include('update_record.php');
            include('get_data.php');


            function reportcount($fetchdata){

                $corrdall=array();
                foreach ($fetchdata as $key => $row) {
                    $currenadd = array(
                        "x" => $row['latitude'],
                        "y" => $row['longitude'],
                      
                    );
                    // print_r ($currenadd);

                    array_push($corrdall,$currenadd);

                    // $corrdall[$key]=$currenadd;
                }   

                // print_r($corrdall) ;

                return $corrdall;
            }





?>

console.log("array of coord");
console.log(<?php echo json_encode(reportcount($fetchdata));?>)

// require(['kdTree.js'], function (ubilabs) {
    // Create a new tree from a list of points, a distance function, and a
    // list of dimensions.
    var distance = function(a, b){
  return Math.pow(a.x - b.x, 2) +  Math.pow(a.y - b.y, 2);
}

var t0 = performance.now();
    var tree = new kdTree(<?php echo json_encode(reportcount($fetchdata));?>, distance, ["x", "y"]);
    // console.log(tree);
    // console.log("tree");
    

    

    <?php

            foreach ($fetchdata as $key => $row) {
                $currenadd = array(
                    "x" => $row['latitude'],
                    "y" => $row['longitude'],
                
                );
    ?>
              
                $.ajax({
                    type: "POST",
                    url: 'update_dup.php',
                    data: {
                    no_reports:  tree.nearest(<?php echo json_encode($currenadd);?>, 5, 0.0009).length,
                    key: '<?php echo $key; ?>',
                    priority: '<?php echo $row['arterialPrio']+$row['severity'];?>'
                   
                    },
                    success: function(data)
                    {
                        // alert("success!");
                        console.log("data");
                        console.log(data);
                        console.log("making sure");

                     }
                });

                // need to figure out why its only keeping nearest value as 3 at all times


                // console.log("nearest result");
                // console.log(nearest);

                
    <?php
    // $ff ="<script>document.write(a)</script>";      
    
    // echo "value of ff".$ff;


    //   echo "<script>document.write(nearest)</script>"; //I want above javascript variable 'a' value to be store here
    
            }   

        
    ?>
// });



// doSomething();   // <---- The function you're measuring time for 

var t1 = performance.now();
console.log("Call to doSomething took " + (t1 - t0)/1000 + " seconds.");



</script>
<?php
    //   echo "<script>document.write((t1 - t0)/1000 + 'seconds.')</script>"; //I want above javascript variable 'a' value to be store here

?>

</html>

