<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Armies\{TacticalArmy};
use App\Models\Reports\{
    Report,
    ReportBuilder,
    BasicReport,
    BattleReportBuilder,
    EffectReportBuilder
};

final class ReportsTest extends TestCase
{
    public function testReportBuilderInterface(): void
    {
        $builder = new BattleReportBuilder();
        $this->assertInstanceOf(
            Report::class,
            $builder,
        );
        $this->assertInstanceOf(
            ReportBuilder::class,
            $builder,
        );
        $this->assertInstanceOf(
            BasicReport::class,
            $builder,
        );
    }
    public function testReturnString(): void
    {
        $army = new TacticalArmy("Testing army", 10);
        $builder = (new BattleReportBuilder())
            ->who($army)
            ->dealtDamage(10)
            ->to($army)
            ->soldiersLeft($army);
        $this->assertIsString($builder->getContent());
    }
}
