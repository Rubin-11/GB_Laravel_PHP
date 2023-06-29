<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class OrderNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testOrderForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://gb_laravel_php.test/admin/orderNews') // Замените '/order' на путь к вашей форме
            ->type('name', 'John Doe') // Введите имя заказчика
            ->type('phone', '1234567890') // Введите номер телефона
            ->type('email', 'example@example.com') // Введите адрес электронной почты
            ->type('info', 'This is test order information') // Введите информацию о заказе
            ->press('Отправить'); // Измените текст на кнопке отправки, если необходимо
        });
    }
}
