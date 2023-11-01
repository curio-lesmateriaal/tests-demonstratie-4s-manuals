<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManualSmokeTest extends TestCase
{
    /**
     * Test of we überhaupt kunnen navigeren vanaf de homepage naar een brand,
     * en in de tests hierna vanaf daar naar een type, en vanaf daar naar een manual
     */
    public function test_that_we_can_navigate_to_a_brand(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSeeText('AT&T');

        $response = $this->get('/34/AT&T/');

        $response->assertStatus(200)
            ->assertSeeText('CRL81212');
    }

    public function test_that_we_can_navigate_to_a_type(): void
    {
        $response = $this->get('/34/AT&T/98/CRL81212/');

        $response->assertStatus(200)
            ->assertSeeText('Click here to download the manual')
            ->assertSee('http://manualsonline.com/manuals/mfg/ATT/CRL81212.html', false);
    }

    public function test_that_we_can_navigate_to_a_type_in_dutch(): void
    {
        // Hier stellen we de session in, zoals ook gedaan wordt in app/Http/Controllers/LocaleController.php
        // Dit verandert de locale van de applicatie, waardoor de vertalingen in het Nederlandse bestand worden gebruikt
        $response = $this->withSession([
            'locale' => 'nl',
        ])->get('/34/AT&T/98/CRL81212/');

        $response->assertStatus(200)
            ->assertSeeText('Klik hier om je handleiding te downloaden')
            ->assertSee('http://manualsonline.com/manuals/mfg/ATT/CRL81212.html', false);
    }
}
