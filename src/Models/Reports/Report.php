<?php

namespace App\Models\Reports;

interface Report
{
    public function getContent(): string;
}
