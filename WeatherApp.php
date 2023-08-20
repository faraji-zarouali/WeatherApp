
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Devoir 3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="" rel="stylesheet">
    </head>
    <style>
 @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);
    body {
	font-size: 18px;
    background-color: #778899;
}
    h1, h2, h3, h4, h5 {
	font-weight: normal;
	margin: 0;
	padding: 0;
}
    .form{
         position: absolute;
         top: 42%;
         left: 50%;
         display: flex;
         height: 300px;
         width: 350px;
         transform: translate(-50%, -50%);
         }
    .select{
         width: 70%;
         padding: 10px;
         border-radius:10px;
         font-family: 'Open Sans';
         font-size:16px;
         cursor:pointer;

         }
    .submit{
         padding: 10px 4px;
    	font-family: 'Open Sans';
        font-size:16px;
        cursor:pointer;
         width: 20%;
         border: none;
         border-radius:10px;
         }
         .widget {
	height: 300px;
	width: 450px;
	position: absolute;
    padding-left: 50px;
    left: 50%;
	top: 50%;
	transform: translate(-50%, -50%);
}

.weatherIcon{
	background-color: #f0f8fa;
	height: 70%;
	width: 100%;
	position: absolute;
    left: 0;
	top: 0;
    display: flex;
    justify-content: center;
}


.weatherData {
	background-color: #2e3336;
	height: 30%;
	width: 100%;
	position: absolute;
    left: 0;
	bottom: 0;
	border-bottom-left-radius: 10px;
	border-bottom-right-radius: 10px;
}

h1 {
	color: #c5cdcf;
	font-family: 'Open Sans';
  font-weight: 200;
	font-size: 2.9375em;
	line-height: 2.9375em;
	position: absolute;
	left: 6%;
	top: 50%;
	transform: translate(0, -50%);
}

h2 {
	color: #8f9b9d;
	font-family: 'Open Sans';
  font-weight: 200;
	font-size: 1.1875em;
	line-height: 1.1875em;
	position: absolute;
	top: 24%;
	left: 27%;
}

h3 {
	color: #c5cdcf;
	font-family: 'Open Sans';
  font-weight: 400;
	font-size: 0.8125em;
	line-height: 0.8125em;
	position: absolute;
	bottom: 25%;
	left: 27%;
}

h4 {
	color: #fff;
	font-family: 'Open Sans';
  font-weight: 700;
	text-transform: uppercase;
	font-size: 0.6875em;
	line-height: 0.6875em;
	position: absolute;
	top: 30%;
	left: 50%;
	transform: translate(-50%, 0);
}

h5 {
	color: #fff;
	font-family: 'Open Sans';
  font-weight: 500;
	font-size: 1.8125em;
	line-height: 28px;
	position: absolute;
	bottom: 24%;
	left: 50%;
	transform: translate(-50%, 0);
}

.date {
	background-color: #4dbde2;
	height: 30%;
	width: 22%;
	position: absolute;
    right: 0;
	bottom: 0;
	border-bottom-right-radius: 10px;
}
    </style>
    <body>


        
<div class="form">
    
    <form method="GET" action="" style="width:100%;">
    <select name="city"  class="select">
                   <option <?php echo (isset($_GET['city']) && $_GET['city'] == "Rabat") ? 'selected ="selected"': ''; ?>>Rabat</option>
                   <option <?php echo (isset($_GET['city']) && $_GET['city'] == "Casablanca") ? 'selected ="selected"': ''; ?>>Casablanca</option>
                   <option <?php echo (isset($_GET['city']) && $_GET['city'] == "Marrakech") ? 'selected ="selected"': ''; ?>>Marrakech</option>
                   <option <?php echo (isset($_GET['city']) && $_GET['city'] == "Agadir") ? 'selected ="selected"': ''; ?>>Agadir</option>
                   <option <?php echo (isset($_GET['city']) && $_GET['city'] == "Laayoune") ? 'selected ="selected"': ''; ?>>Laayoune</option>
                   <option <?php echo (isset($_GET['city']) && $_GET['city'] == "Dakhla") ? 'selected ="selected"': ''; ?>>Dakhla</option>
               </select>
               <input type="submit" value="Submit" name="submit" class="submit"/>
    </form>
</div> 
<?php 
if($_SERVER["REQUEST_METHOD"] === "GET"){
    if (isset($_GET['submit'])){
        $api_key = "32262e42aeccb79e48815e8581c481e0";
        $city = $_GET['city'];
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city&units=metric&APPID=$api_key";
        
        $response = file_get_contents($apiUrl, False);
        $data = json_decode($response);
    
        $nameofcity = $data->name; // city Weather Status
        $description = $data->weather[0]->description; // description
        $temp = $data->main->temp; // °C
        $windspeed = $data->wind->speed; // km/h
        $icon = $data->weather[0]->icon; // icon
        $data = $data->dt; // date
 
?>

<article class="widget">
  <div class="weatherIcon"><img src="http://openweathermap.org/img/wn/<?php echo $icon; ?>@4x.png"/></div>
  <div class="weatherData">
    <h1 class="temperature"><?php echo (int) $temp;?>&deg;</h1>
    <h2 class="description"><?php echo $description;?></h2>
    <h3 class="city">Wind Speed <?php echo $windspeed;?> km/h</h3>
  </div>
  <div class="date">
    <h4 class="month"><?php echo date('M',$data);?> </h4>
    <h5 class="day"><?php echo date('d',$data);?> </h5>
  </div>
</article>
<?php  

}
} ?>
    </body>
</html>