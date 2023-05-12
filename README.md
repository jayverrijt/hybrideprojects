# Hybride Projects

Hybride Projects is een project gemaakt voor de niveau 2 opleiding van het [Summa College](https://www.summacollege.nl/opleidingen/medewerker-ict-support-bol/) 

### Technologie
- PHP
- HTML5
- CSS3
- Apache Web Server
- phpMyAdmin

### Setup
Om te kunnen linken met een database moet je in [utils/php](https://github.com/jayverrijt/hybrideprojects/tree/main/utils/php) een bestand genaamt *connection.php* aanmaken.

In bestand *connection.php* hoef je alleen een *$server* variable en timezone toe te voegen dit ziet er zo uit: 
````
<?php
    date_default_timezone_set("Your/Timezone");

    $server = mysqli_connect('jou.ipv4.adres.hier', 'jouGebruikersnaam', 'jouWachtwoord', 'jouDatabase');
````
