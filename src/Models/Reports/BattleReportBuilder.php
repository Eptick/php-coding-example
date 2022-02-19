<?php

namespace App\Models\Reports;

use App\Models\Armies\Army;

class BattleReportBuilder implements ReportBuilder
{
    protected $base;

    public function __construct()
    {
        $this->reset();
    }

    protected function reset(): void
    {
        $this->base = new \stdClass();
    }

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

    public function addText(string $text): BattleReportBuilder
    {
        $this->addAdditionalText($text);
        return $this;
    }

    private function addAdditionalText($text)
    {
        if (!isset($this->base->additional)) {
            $this->base->additional = array();
        }
        $this->base->additional[] = $text;
    }

    public function getContent(): string
    {
        $content = "";
        $content .= $this->base->who;
        $content .= $this->base->damage;
        $content .= $this->base->to;
        if (strlen($content) > 0) {
            $content .= ".";
        }
        return $content;
    }
}
