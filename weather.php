<?php
 if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
  }
$status="";
$msg="";
$city="";
if(isset($_POST['submit'])){
    $city=$_POST['city'];
    $url="http://api.openweathermap.org/data/2.5/weather?q=$city,ind&appid=49c0bad2c7458f1c76bec9654081a661";
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result=curl_exec($ch);
    curl_close($ch);
    $result=json_decode($result,true);
    if($result['cod']==200){
        $status="yes";
    }else{
        $msg="City Not Found";
        $status="no";
    }
}
?>

<html lang="en" class=" -webkit-">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <link rel="icon" type="image/ico" href="image/icon.ico">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="css/index1.css?rnd=132">
      <script src="https://kit.fontawesome.com/ab99e84824.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script type = "text/JavaScript">
         function AutoRefresh( t ) {
            setTimeout("location.reload(true);", t);
         }
      </script>
      <title>Weather 
         <?php
         if ($status=="yes") {
            echo " | ".$city;
         }?>
       </title>
      <style>
         
      </style>
   </head>
   <body onload = "JavaScript:AutoRefresh(30000);">
      <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
         <a class="navbar-brand" href="weather.php">
            <img src="image/icon.ico" width="30" height="30" class="d-inline-block align-top" alt="">
            Weather 
            <?php
               if ($status=="yes") {
               echo " | ".$city;
            }?>
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" onclick="window.open('https://adityapandey.me/')">
            <i class="fas fa-id-card-alt"></i>
         </button>
      </nav>
      <div class="block">
         <form method="Post">
            <input type="text" class="input-res" placeholder="Enter city name" name="city" value="<?php echo $city?>">
            <button type="submit" class="btn btn-info" name="submit" value="submit">Search</button>
         </form>
      </div>      
      <?php 
         if($status=="yes")
         {?>
            <div class="center-div">
               <div class="weatherIcon" style="background-color: #3399ff;">
                  <img src="http://openweathermap.org/img/wn/<?php echo $result['weather'][0]['icon']?>@4x.png"/>
               </div>
               <div class="temperature" >
                  <span>
                     <i class="fas fa-temperature-high"></i>&nbsp;
                     <?php echo round($result['main']['temp']-273.15)?>°
                  </span>
               </div>
               <div class="temperature" >
                  <span>
                     <i class="fas fa-cloud-sun"></i>&nbsp;
                     <?php echo $result['weather'][0]['main']?>
                  </span>
               </div>             
               <div class="temperature" >
                  <span>
                     <i class="fas fa-wind"></i>&nbsp;
                     <?php                      
                        echo round(3.6*($result['wind']['speed']));
                     ?> KM/H
                  </span>
               </div>
               <div class="date">
                  <?php echo date('d M Y',$result['dt'])?><br>
                  <?php echo date("h : i : s A");?>
               </div>                    
            </div>
         <?php } 
         elseif($status=="no")
         { ?>
            <script>
                  swal({
                     title: "Sorry, ",
                     text: "<?php echo $msg?>",
                     imageUrl: 'image/loader.gif'
                  });
            </script>
            <?php 
         }
      ?>
    <style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #e3f2fd;
   color: black;
   text-align: center;
}
</style>
    <div class="footer">
  <p>All Rights Reserved &copy; 2021</p>
</div>
   </body>
</html>
