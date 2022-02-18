<?php

namespace App\Models\Reports;

interface ReportBuilder extends Report
{
    public function getContent(): string;
}
