<?

@$city = $_GET['city'];
$city = str_replace("", "-", $city);


// get content
@$f = file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
preg_match("/\"phrase\">(.*?)<\/span>/i", $f, $matches);
echo @$matches[1];

?>