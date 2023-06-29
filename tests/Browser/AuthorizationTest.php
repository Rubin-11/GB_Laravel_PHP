<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthorizationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testLoginForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://gb_laravel_php.test/authorization_page') // Замените '/login' на путь к вашей форме авторизации
            ->type('login', 'john@example.com') // Введите логин пользователя
            ->type('password', 'password') // Введите пароль пользователя
            ->check('remember') // Включите запоминание пользователя, если необходимо
            ->press('Войти'); // Измените текст на кнопке входа, если необходимо
        });
    }
}
