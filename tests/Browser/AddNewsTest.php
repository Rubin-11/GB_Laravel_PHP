<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddNewsTest extends DuskTestCase
{
    use RefreshDatabase;
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://gb_laravel_php.test/admin/addNews')
                    ->type('title', 'test')
                    ->type('text','test')
                    ->press('Добавить')
                    ->assertPathIs('/admin/addNews');
        });
    }

    public function test2Example(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://gb_laravel_php.test/admin/addNews')
                ->type('title', '')
                ->type('text','test')
                ->press('Добавить')
                ->assertSee('Поле Название новости обязательно.')
                ->assertPathIs('/admin/addNews');
        });
    }
}
