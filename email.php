<!DOCTYPE html>
<html lang="en">

<head>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
        var _StatHat = _StatHat || [];
        _StatHat.push(['_setUser', 'Nzg5NyDY7uGiR9V9DajmNHN2N6GF']);
        (function() {
                var sh = document.createElement('script'); sh.type = 'text/javascript';
                sh.async = true;
                sh.src = '//www.stathat.com/javascripts/api.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(sh, s);
        })();
</script>
<?php
include 'stathat.php';
$zipcode = '30519';
$result = file_get_contents('http://weather.yahooapis.com/forecastrss?p=' . $zipcode . '&u=f');
$xml = simplexml_load_string($result);

//echo htmlspecialchars($result, ENT_QUOTES, 'UTF-8');

$xml->registerXPathNamespace('yweather', 'http://xml.weather.yahoo.com/ns/rss/1.0');
$location = $xml->channel->xpath('yweather:location');
$atmosphere = $xml->channel->xpath('yweather:atmosphere');
$wind = $xml->channel->xpath('yweather:wind');

if(!empty($location)){
    foreach($xml->channel->item as $item){
        $current = $item->xpath('yweather:condition');
        $forecast = $item->xpath('yweather:forecast');
        $current = $current[0];
    }
}

?>
<style>
body {
    background: #337AB7;
    color: #FFFFFF;
}
h4 {
    padding: 0px;
    margin: 0px;
}
.container {
    margin: 0px auto;
    max-width: 480px;
    text-align: center;
    width: 100%;
}

button {
    background-color: rgb(255,255,255);
    border-radius: 0;
    border: none;
    color: #333;
    padding: 8px 5px;
    margin: 0px 10px;
    width: 120px;
}
</style>

</head>

<body>
<div class="container">
<h1>Hair Type</h1>
<?php
print '<h4>Date: ' . $current['date'] . '</h4>';
print '<h4>Location: ' . $location[0]['city'] . '</h4>';
print '<h4>Current Temp: ' . $current['temp'] . '</h4>';
print '<h4>Code: ' . $current['text'] . '</h4>';
print '<h4>Humidity: ' . $atmosphere[0]['humidity'] . '</h4>';
print '<h4>Visibility: ' . $atmosphere[0]['visibility'] . '</h4>';
print '<h4>Pressure: ' . $atmosphere[0]['pressure'] . '</h4>';
print '<h4>Rising: ' . $atmosphere[0]['rising'] . '</h4>';
print '<h4>Wind Chill: ' . $wind[0]['chill'] . '</h4>';
?>
<br/><br/>
<a href="#" onClick="_StatHat.push(['_trackValue', 'HfNk2K2wDJj8zOYh90ZZhiBObXRwVA~~', 100]);"><button>Good hair day</button></a>
<a href="#" onClick="_StatHat.push(['_trackValue', 'HfNk2K2wDJj8zOYh90ZZhiBObXRwVA~~', 50]);"><button>Normal hair day</button></a>
<a href="#" onClick="_StatHat.push(['_trackValue', 'HfNk2K2wDJj8zOYh90ZZhiBObXRwVA~~', 0]);"><button>Bad hair day</button></a>
</div>

</body>
</html>