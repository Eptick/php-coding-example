<?php

namespace App\Models\Reports;

use App\Models\Armies\Army;

abstract class BasicReport implements ReportBuilder
{
    protected $base;
    protected $content = "";

    public function __construct()
    {
        $this->reset();
    }

    protected function reset(): void
    {
        $this->base = new \stdClass();
    }

    public function addText(string $tex)
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
        if (!empty($this->base->additional)) {
            foreach ($this->base->additional as $text) {
                $this->content .= " " . $text;
            }
        }
        if (strlen($this->content) > 0) {
            $this->content .= ".";
        }
        return trim($this->content);
    }
}
