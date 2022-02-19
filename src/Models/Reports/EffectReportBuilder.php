<?php

namespace App\Models\Reports;

use App\Models\Armies\Army;
use App\Models\Effects\Effect;

class EffectReportBuilder extends BasicReport
{
    public function who(Army $army): EffectReportBuilder
    {
        $this->reset();
        $this->base->who = $army->getName();
        return $this;
    }

    public function damageAffected($number): EffectReportBuilder
    {
        $this->base->damage = $number;
        return $this;
    }

    public function bodyCountAffected($number): EffectReportBuilder
    {
        $this->base->bodyCount = $number;
        return $this;
    }

    public function getContent(): string
    {
        $this->content .= $this->base->who;
        if (!empty($this->base->damage)) {
            $effect = $this->base->damage < 0 ? 'decresed' : 'incresed';
            $this->content .= " had it's damage $effect by " . $this->base->damage;
        }
        if (!empty($this->base->bodyCount)) {
            $effect = $this->base->bodyCount < 0 ? 'decresed' : 'incresed';
            $this->content .= " had it's body count $effect by "
            . $this->base->bodyCount;
        }
        return parent::getContent();
    }
}
