# Felhasználó kezelő alkalmazás Laravel alapokon

## Crosssec Solution beugró feladata

A beugró feladat elérhető ezen a [GitHub linken](https://gist.github.com/laszloandras/47ea3daf9590efc3711cd158a5b25513) keresztül.

Az általam elkészített megoldás Laravel framework felhasználásával készült.


## A program használata
### Grafikus felület

A felhasználó átemelő modul csak bejelentkezés után látható. A felhasználói modul az alap Laravel/ui felület által kínált modul, azon nem történt változtatatás, mivel az nem volt feltétele a feladatnak. A regisztrációs felület kitöltése után az elkészült alklamazás felületére jutunk. A felület Bottstrap, JQuery frameworkök és Font-awesom 4 felhasználásával készült.
A felületen található <+ Add Users> gomb megnyomásával lehet elindítani a felhasználói adatok lekérését a [Randomuser API](https://randomuser.me/api)n keresztül, ahonnan 10 felhasználó adatát emeli át a rendszer ée szúrja be az adatbázisba.
A képernyő lapozható egyszerre 10 felhasználó adata látható.

### Parancssoros felület

A felhasználó átemelő funkció el lett készítve egy Artisan parancskibővítésre is, így az alkalmazás könyvtárából, telepített PHP melett a

```
php artisan randomuser:getUser
```

kiadásával is lehet kérni. Ezen a felületen lehetőség van eltérő számú felhasználó megadaására is. Pl. ha 5 felhasználót szeretnénk lekérni akkor, z alábbi formában kell kiadni a parancsot:

```
php artisan randomuser:getUsers 5
```

## A program tesztelése

### A teszt gépen található webszerver esetén

Agy alap Laravel telepítéssel és a a git repó klónozásása után egy cél adatbázis, adatbázis felhasználó megadása után a ``` .env ``` fájlban:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_user_password
```
Majd az alábbi parancsok kiadásával:

```
php artisan migration
```

Majd a böngészőn keresztül az alkalmazás elérhető.

### Konténer használatával

A program könyvtárában található ```docker-compose.yaml``` fájl segítségével létrehozzuk a [bitnami/laravel](https://hub.docker.com/r/bitnami/laravel) image-ből a futtató konténert, az alábbi parancsal (feltételezve, hogy van docker környezet a tesztgépen):

```
docker-compose up -d
```

Mivel a konténer, létrehozza és migrálja az adatbázist, így azokat már nem kell beállítani. Az alkalmazás futtatása a böngészőböl a ```http://localhost:3000``` vagy parancssorból a 
```
docker-compose exec crosssec php artisan randomuser:getUsers
```