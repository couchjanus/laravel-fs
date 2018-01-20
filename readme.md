<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](http://patreon.com/taylorotwell):

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Pulse Storm](http://www.pulsestorm.net/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).


# Carbon – это пакет для работы со временем и датой в PHP. 
Пакет Carbon позволяет нам существенно упростить и ускорить работу со временем и датами в Laravel. Пакет обладает широкими возможностями получения и манипулирования датами. Данный пакет по умолчанию включен в состав Laravel.
[Официальный сайт Carbon](http://carbon.nesbot.com/) 
[Документация по Carbon](http://carbon.nesbot.com/docs/) 
## Основные функции Carbon:
- Работа с часовыми поясами
- Получение текущего времени
- Прибавление и вычитания даты

Для подключение Carbon необходимо импортировать Carbon из пространства имен Carbon:

```php

<?php
use Carbon;

```

- Получение текущей даты и времени
```

$date = Carbon::now();

```
- Другой способ получения текущей даты:
```
$current = new Carbon();

```
- Получение текущей даты
```

$date = Carbon::today();

```

- Получение завтрашней даты.
```
$date = Carbon::tomorrow();

```
- Получить последнюю пятницу в этом месяце.
```
$date = Carbon::now();
$lastFriday = new Carbon('last friday of '.$date);

```

- Создание даты из определенного количества аргументов:
```
Carbon::createFromDate($year, $month, $day, $tz);

```
Или время:
```
Carbon::createFromTime($hour, $minute, $second, $tz);

```
Или время и дату:

```
Carbon::create($year, $month, $day, $hour, $minute, $second, $tz);

```
если один из этих параметров передать как null, то будет подставлено текущее значение.

- Добавляем 3 дня к текущей дате.
```
$current = Carbon::now();
$date = Carbon::now()->addDays(3);

```
- Добавляем один день
```
$date = Carbon::now()->addDay();

```
- Вычитаем один день

```
$date = Carbon::now()->subDay();

```

- Вычитаем три дня
```
$date = Carbon::now()->subDays(3);

```
- Добавляем 5 лет к текущей дате
```
$date = Carbon::now()->addYears(5);

```
- Добавляем один год
```
$date = Carbon::now()->addYear();

```

- Вычитаем один год
```
$date = Carbon::now()->subYear();

```
- Вычитаем пять лет
```
$date = Carbon::now()->subYears(5);
```
- Манипулирование с месяцами

```
$date = Carbon::now()->addMonths(2);
$date = Carbon::now()->addMonth();
$date = Carbon::now()->subMonths(2);
$date = Carbon::now()->subMonth();

```
- Манипулирование с неделями

```
$date = Carbon::now()->addWeeks(3);
$date = Carbon::now()->addWeek();
$date = Carbon::now()->subWeeks(3);
$date = Carbon::now()->subWeek(3);

```
- Относительное время

```
$current = Carbon::now();
$date = Carbon::now();
$date->addHours(10);
echo $current->diffInHours($date, false);

```

