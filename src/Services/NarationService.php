<?php

namespace App\Services;

use App\{Service, Output};
use App\Models\Army;
use App\Enums\{TimeOfDay, Weather};

class NarationService extends Service
{
    private Output $output;

    public function __construct()
    {
        $this->output = WebOutputService::getInstance();
    }

    public function write($content)
    {
        $this->output->write($content);
    }

    public function describeTimeOfDay($timeOfDay)
    {
        switch ($timeOfDay) {
            case TimeOfDay::MORNING:
                $this->output->write("The sun has just come up, the soldiers are waking up fresh, getting ready for a bloodbath. The air smells like morning dew and gunpowder"); // phpcs:ignore
                break;
            case TimeOfDay::DAY:
                $this->output->write("The day has started, the soldiers are agited and that makes them more dangerous. A perfect oportunity for the brawlers."); // phpcs:ignore
                break;
            case TimeOfDay::NIGHT:
                $this->output->write("Nightime. The perfect companion for the spec ops, the unseen soldiers of the night. Soldiers are sleeping and thinking everything has calmed down. They were wrong."); // phpcs:ignore
                break;
            default:
                $this->output->write("It's a day like any other. Except death is all around us. It smells. It gets into your clothes, something bad is afoot"); // phpcs:ignore
        }
    }

    public function describeWeather($weather)
    {
        switch ($weather) {
            case Weather::SUN:
                $this->output->write("The conditions are great for a battle, the skies are clear."); // phpcs:ignore
                break;
            case Weather::RAIN:
                $this->output->write("It's raining outside, it's muddy and about to get bloody."); // phpcs:ignore
                break;
            case Weather::SNOW:
                $this->output->write("The snow has covered the battlefield, about to get slippery up in this ****"); // phpcs:ignore
                break;
            case Weather::FOG:
                $this->output->write("The visibility is non existent, it's foggy, spec ops are having a blast."); // phpcs:ignore
                break;
            default:
                $this->output->write("The weather seems to shift from time to time, but it's about to rain bullets."); // phpcs:ignore
        }
    }

    public function describeTemperature($temperature)
    {
        $this->output->write("It's $temperature °C outside.");
    }

    public function declareStalemate()
    {
        $this->output->write("Everybody died. It's a stalemate");
    }

    public function declareWinner(Army &$army)
    {
        $name = $army->getName();
        $soldiersLeft = $army->getHealth();
        $this->write("$name wins with $soldiersLeft soldiers left");
    }
}
