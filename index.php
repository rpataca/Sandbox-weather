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

stathat_value('ttQpTkUzsLq2ivM18MSc_CBYOGI4', 'Nzg5NyDY7uGiR9V9DajmNHN2N6GF', $current['temp']);
stathat_value('jRhUiOJQfCbiCxeF3tHfziA3a1Vo', 'Nzg5NyDY7uGiR9V9DajmNHN2N6GF', $atmosphere[0]['humidity']);
stathat_value('4oOOPgYO7kPXi6er1NgdeiA2cktz', 'Nzg5NyDY7uGiR9V9DajmNHN2N6GF', $atmosphere[0]['pressure']);
stathat_value('X_bwXn8__s8DHa-ODS5SKSBQUlRQ', 'Nzg5NyDY7uGiR9V9DajmNHN2N6GF', $current['text']);

?>
<html>
<head>
<title>Weather Tracker</title>
</head>
<body>

<?php 
print 'Date: ' . $current['date'] . '<br/>';
print 'Location: ' . $location[0]['city'] . '<br/>';
print 'Current Temp: ' . $current['temp'] . '<br/>';
print 'Code: ' . $current['text'] . '<br/>';
print 'Humidity: ' . $atmosphere[0]['humidity'] . '<br/>';
print 'Visibility: ' . $atmosphere[0]['visibility'] . '<br/>';
print 'Pressure: ' . $atmosphere[0]['pressure'] . '<br/>';
print 'Rising: ' . $atmosphere[0]['rising'] . '<br/>';
print 'Wind Chill: ' . $wind[0]['chill'] . '<br/>';
?>
</body>
</html>