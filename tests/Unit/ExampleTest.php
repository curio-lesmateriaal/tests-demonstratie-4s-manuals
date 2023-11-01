<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

// Voorbeeld functie om te testen
// Dit zou uiteraard niet de goeie plek zijn om deze functie te definiëren. Liever in een aparte file ergens in `app/
function sum(int $a, int $b): int
{
    return $a + $b;
}

class ExampleTest extends TestCase
{
    public function test_that_the_sum_of_two_numbers_is_correct(): void
    {
        $this->assertEquals(4, sum(2, 2));
    }
}
