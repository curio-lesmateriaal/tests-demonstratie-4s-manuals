<?php

namespace Tests\Unit;

use App\Models\Manual;
use PHPUnit\Framework\TestCase;

class ManualTest extends TestCase
{
    /**
     * Behulpzame functie om makkelijk te testen of de filesize in de juiste eenheid wordt weergegeven
     * Maakt een Manual aan en stelt er de gewenste filesize aan in
     */
    private function getManualHumanReadableSize($size)
    {
        $manual = new Manual();
        $manual->filesize = $size;
        $result = $manual->getFilesizeHumanReadableAttribute();

        return $result;
    }

    public function test_getFilesizeHumanReadableAttribute_bytes()
    {
        $this->assertEquals('0 bytes', $this->getManualHumanReadableSize(0));
        $this->assertEquals('1 byte', $this->getManualHumanReadableSize(1));
        $this->assertEquals('512 bytes', $this->getManualHumanReadableSize(512));
        $this->assertEquals('1,023 bytes', $this->getManualHumanReadableSize(1023));
    }

    public function test_getFilesizeHumanReadableAttribute_kilobytes()
    {
        $this->assertEquals('1.00KB', $this->getManualHumanReadableSize(1024));
    }

    public function test_getFilesizeHumanReadableAttribute_megabytes()
    {
        $this->assertEquals('1.00MB', $this->getManualHumanReadableSize(1048576));
    }

    public function test_getFilesizeHumanReadableAttribute_gigabytes()
    {
        $this->assertEquals('1.00GB', $this->getManualHumanReadableSize(1073741824));
    }
}
