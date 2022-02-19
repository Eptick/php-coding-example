<?php

namespace App\Models\Reports;

use App\Models\Armies\Army;

class BattleReportBuilder extends BasicReport
{
    public function who(Army $army): BattleReportBuilder
    {
        $this->reset();
        $this->base->who = $army->getName();
        return $this;
    }

    public function dealtDamage(int $dmg): BattleReportBuilder
    {
        $this->base->damage = " dealt $dmg points of damage";
        return $this;
    }

    public function to(Army $army): BattleReportBuilder
    {
        $this->base->to = " to " . $army->getName();
        return $this;
    }

    public function soldiersLeft(Army $army): BattleReportBuilder
    {
        $this->base->soldiersLeft = " and it has "
            . max(0, $army->getHealth())
            . " soldiers left";
        return $this;
    }

    public function getContent(): string
    {
        $this->content .= $this->base->who;
        $this->content .= $this->base->damage;
        $this->content .= $this->base->to;
        $this->content .= $this->base->soldiersLeft;
        return parent::getContent($this->content);
    }
}
