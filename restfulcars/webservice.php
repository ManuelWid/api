<?php

require_once("connect.php");

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $sql = "SELECT * FROM car";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($conn);

    if(count($rows) == 0){
        response(200, "No Data found", $rows);
    }
    else{
        response(200, "Data found", $rows);
    }
}
else {
   response(400, "Invalid request", NULL);
}


// Function for delivering a JSON response
function response($status,$status_message,$data){
     
   // $response array
   $response['status']=$status;
   $response['status_message']=$status_message;
   $response['data']=$data;

   //Generating JSON from the $response array
   $json_response=json_encode($response);

   // Outputting JSON to the client
   echo $json_response;
}

?>