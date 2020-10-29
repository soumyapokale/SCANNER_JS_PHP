<?php

$insert = false;
if(isset($_POST['name'])){

  $server = "localhost";
  $username = "root";
  $password = "";

  // Create a database connection
  $con = mysqli_connect($server, $username, $password);
 

 
     // connectio check ke liye
     if(!$con){
         die("connection to this database failed due to" . mysqli_connect_error());
     }
     

     
     $name = $_POST['name'];
    
   
     
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $country = $_POST['country'];
    $scanhere = $_POST['scanhere'];
    
    $bdate = $_POST['bdate'];
    $email = $_POST['email'];
   
   



     $sql = "INSERT INTO `id`.`id` ( `name`, `address`, `city`, `state`, `zip`, `country`,  `bdate`, `email`) VALUES ( '$name', '$address', '$city', '$state', '$zip', '$country', '$bdate', '$email');";
     
     if($con->query($sql) == true){
  

      
      $insert = true;
  }
  else{
      echo "ERROR: $sql <br> $con->error";
  }

  
  $con->close();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title> Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, label { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 13px;
      color: #666;
      line-height: 22px;
      }
      legend { 
      color: #fff;
      background-color: #095484;
      padding: 3px 5px;
      font-size: 20px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 46px;
      color: #fff;
      z-index: 2;
	  text-shadow: 5px 5px  #333333;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 20px 0  #095484; 
      }
      .banner {
      position: relative;
      height: 320px;
   
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: #003d99; 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color:#095484;
      }
      .item input:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #095484;
      color:#095484;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .item span {
      color: red;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #095484;
      }
      .item i {
      right: 2%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #095484;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #4286f4;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .city-item input,.name-item div {
      width: calc(50% - 20px);
      }
      .name-item div input {
      width:97%;}
      .name-item div label {
      display:block;
      padding-bottom:5px;
      }
      }
      .ph{
        font-size : 1.5rem;
        align-items:center;
        justify-content: center;

      }

      #camera {
  width: 100%;
  height: 350px;
}
    </style>

  </head>
  <body>
    <div class="testbox">
    <form action="index.php" method = "POST">
      <div class="banner">
        <h1>Verification Form</h1>
      </div>
      <p>Please fill out with the information that is requested below and submit the verification form. Thank you!</p>
      <div class = "ph">
      <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. </p>";
        }
    ?>
      </div>
      <hr/>
      <fieldset>
        <legend>Basic Information</legend>
        <div class="item">
          <label for="name">Full Name<span>*</span></label>
          <input id="name" type="text" name="name" placeholder="name" required/>
		 
        </div>
        <div class="item">
          <label for="address">Parmanent Address<span>*</span></label>
          <input id="address" type="text" name="address" placeholder="Street Address" required/>
        </div>
        <div class="item">
          <div class="name-item">
            <div>
              <input type="text" name="city" placeholder="City" id="city"/>
            </div>
            <div>
              <input type="text" name="state" placeholder="State/region" id="state"/>
            </div>
          </div>
          <div class="item">
            <div class="name-item">
              <div>
                <input type="text" name= "zip" placeholder="ZIP Code" id="zip"/>
              </div>
              <div>
              <input type="text" name="country" placeholder="country " id="country"/>
                  
              
              </div>
            </div>
          </div>
      </fieldset>
      </br>
      <fieldset>
      <legend>Document Verification</legend>
      <div class="videoObject">
        <video id="videoElement" autoplay="true" width="700" height="500"></video>
    </div>
    
    <!--Now capture the Image-->
    
    <!--creating a button to capture the Image-->
         
    <button id="capture" class="btn"> SCAN NOW</button>
                                  
    <!--canvas to display the captured picture-->
    
    <canvas id="image" class="canvas"></canvas>
                
                            
    <script src="script.js"></script>
      <div class="item">
      <label for="bdate">Date of Birth<span>*</span></label>
      <input id="bdate" type="date" name="bdate" required/>
      <i class="fas fa-calendar-alt"></i>
      </div>
      <div class="item">
      <label for="email">Email<span>*</span></label>
      <input id="email" type="text" name="email" required/>
      </div>
      
      <fieldset>
      <div class="btn-block">
      <button type="submit" href="/">APPLY</button>
      </div>
      
    </form>
    
    </div>
    
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>
<script>
    var options = {
      shutter_ogg_url: "jpeg_camera/shutter.ogg",
      shutter_mp3_url: "jpeg_camera/shutter.mp3",
      swf_url: "jpeg_camera/jpeg_camera.swf",
    };
    var camera = new JpegCamera("#camera", options);
  
  $('#take_snapshots').click(function(){
    var snapshot = camera.capture();
    snapshot.show();
    
    snapshot.upload({api_url: "action.php"}).done(function(response) {
$('#imagelist').prepend("<tr><td><img src='"+response+"' width='100px' height='100px'></td><td>"+response+"</td></tr>");
}).fail(function(response) {
  alert("Upload failed with status " + response);
});
})

function done(){
    $('#snapshots').html("uploaded");
}
</script>

  </body>
</html>
    
