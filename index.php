<?php

/**
 * mgmWeather - a fast and reliable weather library
 * Written by İsmail ÖZÇELİK & github.com/ismailozcelik1494
 */
class mgmWeather
{

    /**
     * Initial variables
     *
     *@param $location;
     *@param $locationId;
     *@param $latitude;
     *@param $longitude;
     *@param $currentDegree;
     *@param $currentCondition;
     *@param $currentHumidity;
     *@param $currentWindSpeed;
     *@param $currentPressure;
     *@param $currentSeaLevelPressure;
     *@param $sunrise;
     *@param $sunset;
     *@param $forecast;
     */



    public $location;
    public $locationId;
    public $latitude;
    public $longitude;
    public $currentDegree;
    public $currentConditionCode;
    public $currentHumidity;
    public $currentWindSpeed;
    public $currentPressure;
    public $currentSeaLevelPressure;
    public $sunrise;
    public $sunset;
    public $forecast;
    public $currentDayNameCode;


    /**
     * Getter and Setter Functions
     */
    function setCurrentDegree($degree)
    {
        $this->currentDegree = $degree;
    }

    function setCurrentConditionCode($condition)
    {
        $this->currentConditionCode = $condition;
    }

    function setCurrentHumidity($humidity)
    {
        $this->currentHumidity = $humidity;
    }

    function setCurrentWindSpeed($speed)
    {
        $this->currentWindSpeed = $speed;
    }

    function setCurrentPressure($pressure)
    {
        $this->currentPressure = $pressure;
    }

    function setCurrentSeaLevelPressure($seaLevelPressure)
    {
        $this->currentSeaLevelPressure = $seaLevelPressure;
    }

    function setSunrise($time)
    {
        $this->sunrise = $time;
    }

    function setSunset($time)
    {
        $this->sunset = $time;
    }


    function setForecast($data)
    {
        $this->forecast = $data;
    }

    /* Mevcut Derece */
    function getCurrentDegree()
    {
        return $this->currentDegree;
    }

    /* Mevcut Durum Kodu */
    function getCurrentConditionCode()
    {
        return $this->currentConditionCode;
    }

    /* Mevcut Nem */
    function getCurrentHumidity()
    {
        return $this->currentHumidity;
    }

    /* Mevcut Rüzgar Hızı */
    function getCurrentWindSpeed()
    {
        return $this->currentWindSpeed;
    }

    /* Mevcut Basınç */
    function getCurrentPressure()
    {
        return $this->currentPressure;
    }

    /* Mevcut Deniz Seviyesi Basıncı */
    function getCurrentSeaLevelPressure()
    {
        return $this->currentSeaLevelPressure;
    }

    /* Gün Doğumu */
    function getSunrise()
    {
        return $this->sunrise;
    }

    /* Gün Batımı */
    function getSunset()
    {
        return $this->sunset;
    }

    /* 5 Günlük Tahmin Bilgisi */
    function getForecast()
    {
        return $this->forecast;
    }

    /* Boylam Bilgisi */
    function getLongitude()
    {
        return $this->longitude;
    }

    /* Enlem Bilgisi */
    function getLatitude()
    {
        return $this->latitude;
    }

    function getCurrentDayNameCode($day)
    {
        return $this->currentDayNameCode = $day;
    }


    /**
     * Method for clearing Turkish characters from city name
     *
     * @param $cityName
     * 
     * @return string
     */

    function clearTrCharacter($cityName)
    {
        $cityName = strtolower($cityName);
        $cityName = str_replace("ı", "i", $cityName);
        $cityName = str_replace("ü", "u", $cityName);
        $cityName = str_replace("ğ", "g", $cityName);
        $cityName = str_replace("ş", "s", $cityName);
        $cityName = str_replace("ö", "o", $cityName);
        $cityName = str_replace("ç", "c", $cityName);
        return $cityName;
    }



    /**
     * Method for getting weather condition by using condition code
     * @return string
     */

    function getCurrentCondition()
    {

        $conditionCodes = array(
            "PB" => "Parçalı Bulutlu",
            "GSY" => "Gökgürültülü Sağanak Yağışlı",
            "HSY" => "Hafif Sağanak Yağışlı",
            "SY" => "Sağanak Yağışlı",
            "A" => "Açık",
            "AB" => "Az Bulutlu",
            "CB" => "Çok Bulutlu",
            "D" => "Duman",
            "HY" => "Hafif Yağmurlu",
            "HKY" => "Hafif Kar Yağışlı",
            "MSY" => "Yer Yer Sağanak Yağışlı",
            "KKY" => "Karla Karışık Yağmurlu",
            "GKR" => "Güneyli Kuvvetli Rüzgar",
            "SCK" => "Sıcak",
            "PUS" => "PUS",
            "Y" => "Yağmurlu",
            "K" => "Kar Yağışlı",
            "DY" => "Dolu",
            "R" => "Rüzgarlı",
            "KKR" => "Kuzeyli Kuvvetli Rüzgar",
            "SGK" => "Soğuk",
            "SIS" => "Sis",
            "KY" => "Kuvvetli Yağmurlu",
            "KSY" => "Kuvvetli Sağanak Yağışlı",
            "YKY" => "Yoğun Kar Yağışlı",
            "KF" => "Toz veya Kum Fırtınası",
            "KGY" => "Kuvvetli Gökgürültülü Sağanak Yağışlı"
        );

        return $conditionCodes[$this->getCurrentConditionCode()];
    }

    function getCurrentDayName($format, $datetime = 'now')
    {
        $dayName = date("$format", strtotime($datetime));
        $gun_dizi = array(
            'Monday'    => 'Pazartesi',
            'Tuesday'   => 'Salı',
            'Wednesday' => 'Çarşamba',
            'Thursday'  => 'Perşembe',
            'Friday'    => 'Cuma',
            'Saturday'  => 'Cumartesi',
            'Sunday'    => 'Pazar',
            'January'   => 'Ocak',
            'February'  => 'Şubat',
            'March'     => 'Mart',
            'April'     => 'Nisan',
            'May'       => 'Mayıs',
            'June'      => 'Haziran',
            'July'      => 'Temmuz',
            'August'    => 'Ağustos',
            'September' => 'Eylül',
            'October'   => 'Ekim',
            'November'  => 'Kasım',
            'December'  => 'Aralık',
            'Mon'       => 'Pts',
            'Tue'       => 'Sal',
            'Wed'       => 'Çar',
            'Thu'       => 'Per',
            'Fri'       => 'Cum',
            'Sat'       => 'Cts',
            'Sun'       => 'Paz',
            'Jan'       => 'Oca',
            'Feb'       => 'Şub',
            'Mar'       => 'Mar',
            'Apr'       => 'Nis',
            'Jun'       => 'Haz',
            'Jul'       => 'Tem',
            'Aug'       => 'Ağu',
            'Sep'       => 'Eyl',
            'Oct'       => 'Eki',
            'Nov'       => 'Kas',
            'Dec'       => 'Ara',
        );
        foreach ($gun_dizi as $en => $tr) {
            $dayName = str_replace($en, $tr, $dayName);
        }
        if (strpos($dayName, 'Mayıs') !== false && strpos($format, 'F') === false) $z = str_replace('Mayıs', 'May', $dayName);
        return $dayName;
    }



    /**
     * Method for getting weather condition icon URL
     *
     * @param $condition
     * 
     * @return string
     */

    function getConditionIcon($conditionCode)
    {
        return "https://www.mgm.gov.tr/Images_Sys/hadiseler/" . $conditionCode . ".svg";
    }


    /**
     * Simple method for making request without header.
     *
     * @param $url
     * 
     * @return string
     */

    function requestWithNoHeader($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($curl);
    }



    /**
     * Simple method for making request with setted header. 
     *
     * @param $url
     * 
     * @return string
     */
    function request($url)
    {

        $curl = curl_init($url);
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Host: servis.mgm.gov.tr",
                "Connection: keep-alive",
                "Accept: application/json, text/plain, */*",
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36",
                "Origin: https://www.mgm.gov.tr"
            )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($curl);
    }



    /**
     * Method that fetch all essential data from www.mgm.gov.tr and www.sunrise-sunset.org
     */
    function fetchData()
    {

        $cityDataJson = $this->request("https://servis.mgm.gov.tr/web/merkezler?il=" . $this->clearTrCharacter($this->location));
        $cityData = json_decode($cityDataJson, true);
        $this->locationId =  $cityData[0]["merkezId"];
        $this->longitude =  $cityData[0]["boylam"];
        $this->latitude =  $cityData[0]["enlem"];
        $cityCurrentWeatherJson = $this->request("https://servis.mgm.gov.tr/web/sondurumlar?merkezid=" . $this->locationId);
        $cityCurrentWeather = json_decode($cityCurrentWeatherJson, true);
        $this->currentPressure =  $cityCurrentWeather[0]["aktuelBasinc"];
        $this->currentSeaLevelPressure =  $cityCurrentWeather[0]["denizeIndirgenmisBasinc"];
        $this->currentConditionCode =  $cityCurrentWeather[0]["hadiseKodu"];
        $this->currentHumidity =  $cityCurrentWeather[0]["nem"];
        $this->currentWindSpeed =  $cityCurrentWeather[0]["ruzgarHiz"];
        $this->currentDegree =  $cityCurrentWeather[0]["sicaklik"];
        $sunsetAndSunriseInfoJson = $this->requestWithNoHeader("https://api.sunrise-sunset.org/json?lat=" . $this->latitude . "&lng=" . $this->longitude);
        $sunsetAndSunriseInfo = json_decode($sunsetAndSunriseInfoJson, true);
        $this->sunrise =  date("H:i", strtotime($sunsetAndSunriseInfo['results']["sunrise"]) + 10800);
        $this->sunset =  date("H:i", strtotime($sunsetAndSunriseInfo['results']["sunset"]) + 10800);
        $weatherDatas = array();
        $weatherInfoDayByDayJson = $this->request("https://servis.mgm.gov.tr/web/tahminler/gunluk?istno=" . $this->locationId);
        $weatherInfoDayByDay = json_decode($weatherInfoDayByDayJson, true);
        $date = date("d-m-Y");
        array_push($weatherDatas, array('lowestDegree' => $weatherInfoDayByDay[0]['enDusukGun1'], 'highestDegree' =>  $weatherInfoDayByDay[0]['enYuksekGun1'], 'lowestHumidity' =>  $weatherInfoDayByDay[0]['enDusukNemGun1'], 'highestHumidity' => $weatherInfoDayByDay[0]['enYuksekNemGun1'], 'condition' =>  $weatherInfoDayByDay[0]['hadiseGun1'], 'windSpeed' => $weatherInfoDayByDay[0]['ruzgarHizGun1'], 'date' => $date));
        array_push($weatherDatas, array('lowestDegree' => $weatherInfoDayByDay[0]['enDusukGun2'], 'highestDegree' =>  $weatherInfoDayByDay[0]['enYuksekGun2'], 'lowestHumidity' =>  $weatherInfoDayByDay[0]['enDusukNemGun2'], 'highestHumidity' => $weatherInfoDayByDay[0]['enYuksekNemGun2'], 'condition' =>  $weatherInfoDayByDay[0]['hadiseGun2'], 'windSpeed' => $weatherInfoDayByDay[0]['ruzgarHizGun2'], 'date' => date('d-m-Y', strtotime($date . "+1 days"))));
        array_push($weatherDatas, array('lowestDegree' => $weatherInfoDayByDay[0]['enDusukGun3'], 'highestDegree' =>  $weatherInfoDayByDay[0]['enYuksekGun3'], 'lowestHumidity' =>  $weatherInfoDayByDay[0]['enDusukNemGun3'], 'highestHumidity' => $weatherInfoDayByDay[0]['enYuksekNemGun3'], 'condition' =>  $weatherInfoDayByDay[0]['hadiseGun3'], 'windSpeed' => $weatherInfoDayByDay[0]['ruzgarHizGun3'], 'date' => date('d-m-Y', strtotime($date . "+2 days"))));
        array_push($weatherDatas, array('lowestDegree' => $weatherInfoDayByDay[0]['enDusukGun4'], 'highestDegree' =>  $weatherInfoDayByDay[0]['enYuksekGun4'], 'lowestHumidity' =>  $weatherInfoDayByDay[0]['enDusukNemGun4'], 'highestHumidity' => $weatherInfoDayByDay[0]['enYuksekNemGun4'], 'condition' =>  $weatherInfoDayByDay[0]['hadiseGun4'], 'windSpeed' => $weatherInfoDayByDay[0]['ruzgarHizGun4'], 'date' => date('d-m-Y', strtotime($date . "+3 days"))));
        array_push($weatherDatas, array('lowestDegree' => $weatherInfoDayByDay[0]['enDusukGun5'], 'highestDegree' =>  $weatherInfoDayByDay[0]['enYuksekGun5'], 'lowestHumidity' =>  $weatherInfoDayByDay[0]['enDusukNemGun5'], 'highestHumidity' => $weatherInfoDayByDay[0]['enYuksekNemGun5'], 'condition' =>  $weatherInfoDayByDay[0]['hadiseGun5'], 'windSpeed' => $weatherInfoDayByDay[0]['ruzgarHizGun5'], 'date' => date('d-m-Y', strtotime($date . "+4 days"))));
        $this->forecast = $weatherDatas;
    }
}


?>


<!DOCTYPE html>
<html lang="tr-TR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Hava Durumu Widget</title>
</head>

<body>
    <div class="container">
        <div class="weather-side">
            <div class="weather-gradient"></div>
            <div class="date-container">
                <h2 class="date-dayname">
                <?php $mgmWeather = new mgmWeather();
                    echo $mgmWeather->getCurrentDayName($format = "l", $datetime = 'now'); ?>
                    </h2><span class="date-day">
                    <?php $mgmWeather = new mgmWeather();
                        $mgmWeather->location = "Ankara";
                        $mgmWeather->fetchData();
                        echo $date = date("d-m-Y"); ?></span>
                        <i class="location-icon" data-feather="map-pin"></i>
                        <span class="location">Ankara</span>
            </div>
            <div class="weather-container"><i class="weather-icon" data-feather="sun"></i>
                <h1 class="weather-temp">
                <?php $mgmWeather = new mgmWeather();
                    $mgmWeather->location = "Ankara";
                    $mgmWeather->fetchData();
                    echo $mgmWeather->getCurrentDegree();
                    ?>°C</h1>
                <h3 class="weather-desc">
                <?php $mgmWeather = new mgmWeather();
                    $mgmWeather->location = "Ankara";
                    $mgmWeather->fetchData();
                    echo $mgmWeather->getCurrentCondition(); ?></h3>
            </div>
        </div>
        <div class="info-side">
            <div class="today-info-container">
                <div class="today-info">
                    <div class="precipitation"> <span class="title">Denize İndirgenme Basıncı</span><span class="value">
                    <?php $mgmWeather = new mgmWeather();
                        $mgmWeather->location = "Ankara";
                        $mgmWeather->fetchData();
                        echo $mgmWeather->getCurrentSeaLevelPressure(); ?> %</span>
                        <div class="clear"></div>
                    </div>
                    <div class="humidity">
                    <span class="title">Nem Oranı</span><span class="value">
                    <?php $mgmWeather = new mgmWeather();
                        $mgmWeather->location = "Ankara";
                        $mgmWeather->fetchData();
                        echo $mgmWeather->getCurrentHumidity(); ?> %</span>
                        <div class="clear"></div>
                    </div>
                    <div class="wind">
                    <span class="title">Rüzgar Hızı</span><span class="value">
                    <?php $mgmWeather = new mgmWeather();
                        $mgmWeather->location = "Ankara";
                        $mgmWeather->fetchData();
                        echo $mgmWeather->getCurrentWindSpeed(); ?> km/h</span>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="week-container">
                <ul class="week-list">
                    <?php $mgmWeather = new mgmWeather();
                    $mgmWeather->location = "Ankara";
                    $mgmWeather->fetchData();
                    foreach ($mgmWeather->getForecast() as $day) {
                        /* <i class='day-icon'></i> */
                        echo "<li><span class='day-name'>" . $day["date"] . "</span>";
                        echo "<span class='day-degre'> Sıcaklık: " . $day['highestHumidity'] . "</span>";
                        echo "<span class='day-temp'>Nem +: " . $day['lowestDegree'] . "</span></li>";
                    }
                    ?>
                    <div class="clear"></div>
                </ul>
            </div>
            <div class="location-container"><button class="location-button"><i data-feather="map-pin"></i><span>Lokasyon Ekle</span></button></div>
        </div>
    </div>
</body>

</html>