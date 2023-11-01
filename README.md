# Demonstratie Geautomatiseerd Testen

Deze repository is enkel bedoeld om te demonstreren hoe geautomatiseerd testen in zijn werk gaat. De code in deze repository is niet bedoeld om te gebruiken voor het 4S_Manuals project.

## Opstarten

1. Clone deze repository naar je lokale machine
2. Open de repository in je favoriete IDE
3. Open de terminal en voer het volgende commando uit: `composer install`
4. Kopieer het bestand `.env.example` en hernoem deze naar `.env`
5. Voer het volgende commando uit: `php artisan key:generate`
6. Vul de `.env` met geschikte database gegevens
7. Voer het volgende commando uit: `php artisan migrate`
10. Voer de tests uit met: `php artisan test`
