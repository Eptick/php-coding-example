<?php

namespace App\Services;

use App\Enums\Weather;

class WeatherService implements Service
{
    public function getWeather(): int
    {
        /*
            WMO Weather interpretation codes (WW)
            Code Description
            0 Clear sky
            1, 2, 3 Mainly clear, partly cloudy, and overcast
            45, 48 Fog and depositing rime fog
            51, 53, 55 Drizzle: Light, moderate, and dense intensity
            56, 57 Freezing Drizzle: Light and dense intensity
            61, 63, 65 Rain: Slight, moderate and heavy intensity
            66, 67 Freezing Rain: Light and heavy intensity
            71, 73, 75 Snow fall: Slight, moderate, and heavy intensity
            77 Snow grains
            80, 81, 82 Rain showers: Slight, moderate, and violent
            85, 86 Snow showers slight and heavy
            95 * Thunderstorm: Slight or moderate
            96, 99 * Thunderstorm with slight and heavy hail
        */
        try {
            $url = "https://api.open-meteo.com/v1/forecast?latitude=45.47&longitude=16.39&hourly=weathercode&timeformat=unixtime&timezone=Europe%2FBerlin"; // phpcs:ignore
            $response = \file_get_contents($url);
            $weatherData = json_decode($response);
            $now = time();
            $time = $weatherData->hourly->time;
            $time = array_map(function ($elem) use ($now) {
                return abs($now - $elem);
            }, $time);
            $index = array_search(min($time), $time);
            $code = $weatherData->hourly->weathercode[$index];
            return $code;
        } catch (\Throwable $th) {
            return Weather::SUN;
        }
    }
}
