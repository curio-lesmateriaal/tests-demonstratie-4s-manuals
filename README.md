# 4S_Handleidingen

## Situatie

Dit is een 'legacy' project van Team 4S, uit de tijd dat het bedrijf nog 3S heette (simpelweg: Script Serpents Software). De website staat al jaren online, maar trekt nog steeds veel bezoekers. Daarom heeft 4S besloten om de applicatie toch te moderniseren. Ze hebben ook besloten om daarbij een modern framework te gebruiken, en de layout aan te pakken met Bootstrap.

Jij bent een beginnend stagiair bij 4S, en je eerste klus is het oplossen van een aantal tickets in dit project. Omdat de site niet tot de 'core bussiness' van het bedrijf behoort, is dit een heel geschikt project om mee te beginnen. Onder toeziend oog mag jij laten zien wat je kunt. Je krijgt een korte uitleg over hoe dit project in elkaar zit, en vervolgens mag je zelf een aantal opdrachten gaan uitvoeren om dit project af te maken.

Je krijgt toegang tot een GIT repository, waar een Laravel applicatie in klaar staat. De werkgever gaat ervan uit dat je weinig ervaring hebt met Laravel, dus je krijgt een gids (_hulpkaarten_) meegeleverd over hoe je de applicatie draaiend krijgt op jouw systeem, en je kunt altijd vragen stellen aan je stagebegeleider (_je docent_). Daarna is het aan jou om alle tickets aan te pakken en af te ronden.

## Ontwikkelomgeving

Dit project is getest op twee omgevingen:

| Laragon 5.0.0  | Laragon 6.0.0 |
| ------------- | ------------- |
| PHP 8.1.0 handmatig toegevoegd aan Laragon | PHP 8.1.0 included bij Laragon  |
| phpMyAdmin 5.2.0 handmatig toegevoegd aan Laragon  | phpMyAdmin 5.2.0 via Quick Add  |
| Composer 2.4.2, bij installeren ingesteld op php 8.1.0 | Composer 2.4.2, bij installeren ingesteld op php 8.1.0 |

### Repo werkend krijgen

1. Clone de repo naar je lokale pc, zorg dat de repo komt in C:\laragon\www\4s_manuals
1. Run in cmd `composer install`
1. Kopieer .env.example naar .env (niet hernoemen, want de .example moet je voor je teamgenoten blijven bestaan)
1. Run `php artisan key:generate`
1. Maak een database aan genaamd _4s_manuals_
1. Run `php artisan migrate`
1. Nu staat de structuur van je database. Je kunt nu een grote hoeveelheid testdata importeren om fatsoenlijk met de app te werken:
    * Ga in phpMyAdmin naar de database _4s_manuals_
    * Ga naar importeren en kies het .sql-bestand uit de map van je project
    * Vink het knopje "Controle externe sleutelvelden" UIT
    * Importeer de data
1. Ga naar 4s_manuals.test



## Uitleg mappen en bestanden

### Files

De pagina’s die aangepast moeten worden, zijn te vinden in `/resources/views`. **ELKE PAGINA** wordt opgebouwd in deze folder via `/layouts/default.blade.php`. Elke keer als je in die file een `@include` tag tegenkomt, importeert het een ander bestand van de views folder. Zo importeert `@include(‘includes.footer’)` het bestand `/views/includes/footer.blade.php`. Je ziet dus dat deze includes hetzelfde werken als mappen, maar ze gaan ervan uit dat ze altijd in de views folder moeten zijn, en in plaats van slashes (/) om dieper in folders te gaan, gebruiken ze punten (.), en het stukje `.blade.php` mogen we aan het einde weg laten. `@include(‘includes.footer’)` is dus vrijwel hetzelfde als `require_once(‘/resources/views/includes/footer.blade.php’)`

Eveneens vind je in `default.blade.php` de `@yield` tag, die samenwerkt met de `@section` tags in de bestanden die we vinden in `/resources/views/pages`. Bij het aanroepen van **ELKE** pagina op de site wordt ook **ALTIJD** een pagina uit de `/resources/views/pages` folder aangeroepen. Als we bijvoorbeeld de homepage openen, dan wordt `/resources/views/pages/homepage.blade.php` ingeladen. In de files van deze folder zie je vaak de `@section` tag terugkomen. Wat dit betekent is dat op het moment dat de pagina geladen wordt, alles wat tussen `@section` tags met een naam staat, terecht komt op de default.blade.php pagina bin de `@yield` tags met dezelfde naam.

Dus, als we de homepage laden, laad het systeem eerst `/resources/views/layouts/default.blade.php` in. Vervolgens laden we `/resources/views/pages/homepage.blade.php` in, en plaatsen we alles wat er tussen `@section(‘content)` en `@stop` staat, bij de `@yield(‘content’)` tag in default.blade.php. Dit geldt dus voor alle `@content` en `@yield` tags die je in deze bestanden vind.

Nu we dat weten, kunnen we er altijd achter komen waar het stukje HTML staat wat we aangepast willen hebben. Echter, we gaan het makkelijk houden, dus we gaan ons alleen bezighouden met de homepagina van deze site. We gaan ons dus vooral focussen op de bestanden in `/views/includes` en de bestanden `/resources/views/layouts/default.blade.php` en `/resources/views/pages/homepage.blade.php`. Vanaf week 2, gaan wij verder kijken naar de andere pages.

### CSS

CSS in dit project werkt _niet_ via NPM. In plaats daarvan werk je direct in de `/public/css/app.css`.
