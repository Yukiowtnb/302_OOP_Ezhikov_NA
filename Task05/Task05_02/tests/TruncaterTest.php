<?php

namespace App\Tests;

use App\Truncater;
use PHPUnit\Framework\TestCase;

class TruncaterTest extends TestCase
{
    public function testTruncate()
    {
        $defaultTruncater = new Truncater();
        $this->assertSame("Ежиков Никита Алексеевич", $defaultTruncater->truncate("Ежиков Никита Алексеевич"));
        $this->assertSame("Ежиков Ник...", $defaultTruncater->truncate(
            "Ежиков Никита Алексеевич",
            ['length' => 10]
        ));
        $this->assertSame("Ежиков Никита ...", $defaultTruncater->truncate(
            "Ежиков Никита Алексеевич",
            ['length' => -10]
        ));
        $this->assertSame("Ежиков Ник*", $defaultTruncater->truncate(
            "Ежиков Никита Алексеевич",
            ['length' => 10, 'separator' => '*']
        ));
        $this->assertSame("Ежиков Никита Алексеевич", $defaultTruncater->truncate("Ежиков Никита Алексеевич"));

        $overriddenTruncater1 = new Truncater(['length' => 14]);
        $this->assertSame("Ежиков Никита ...", $overriddenTruncater1->truncate("Ежиков Никита Алексеевич"));
        $this->assertSame("Ежиков Никита \\", $overriddenTruncater1->truncate(
            "Ежиков Никита Алексеевич",
            ['separator' => '\\']
        ));

        $overriddenTruncater2 = new Truncater(['length' => 14, 'separator' => '***']);
        $this->assertSame("Ежиков Никита ***", $overriddenTruncater2->truncate("Ежиков Никита Алексеевич"));
    }
}
