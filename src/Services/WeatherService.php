<?php

namespace App\Services;

use App\Enums\Weather;
use App\Service;

class WeatherService extends Service
{
    private $weatherData;

    public function getWeather(): int
    {
        try {
            $code = $this->getWeatherCodeFromWeatherData();
            return $this->getWeatherFromWeatherCode($code);
        } catch (\Throwable $th) {
            return Weather::SUN;
        }
    }

    public function getTemperature()
    {
        try {
            $weatherData = $this->getWeatherData();
            $index = $this->getClosesTimeIndex();
            return $weatherData->hourly->temperature_2m[$index];
        } catch (\Throwable $th) {
            return rand(10, 28);
        }
    }

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
    private function getWeatherFromWeatherCode($code = 0)
    {
        if ($code < 4) {
            return Weather::SUN;
        } elseif ($code < 50) {
            return Weather::FOG;
        } elseif ($code < 70) {
            return Weather::RAIN;
        } elseif ($code < 90) {
            return Weather::SNOW;
        } else {
            return Weather::SUN;
        }
    }

    private function getWeatherCodeFromWeatherData()
    {
        $weatherData = $this->getWeatherData();
        $index = $this->getClosesTimeIndex();
        $code = $weatherData->hourly->weathercode[$index];
        return $code;
    }

    private function getWeatherData()
    {
        if (is_null($this->weatherData)) {
            $this->weatherData = $this->fetchWeatherData();
        }
        return $this->weatherData;
    }

    private function getClosesTimeIndex()
    {
        $weatherData = $this->getWeatherData();
        $now = time();
        $time = $weatherData->hourly->time;
        $time = array_map(function ($elem) use ($now) {
            return abs($now - $elem);
        }, $time);
        return array_search(min($time), $time);
    }

    private function fetchWeatherData()
    {
        $url = "https://api.open-meteo.com/v1/forecast?latitude=45.47&longitude=16.39&hourly=temperature_2m,weathercode&timeformat=unixtime&timezone=Europe%2FBerlin"; // phpcs:ignore
        return \json_decode(\file_get_contents($url));
    }
}
