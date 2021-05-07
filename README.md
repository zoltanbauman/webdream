# Webdream Otthoni feladat

## Termékek

Három termékosztályt határoztam meg `MobilePhoneProduct`, `ProjectProduct` és a `TvProduct`.

### Feladat

* Raktár létrehozása: `addStorage`
* Hozzáad terméket a raktár(ak)hoz: `putInProduct`, ami `NotEnoughStorageSpaceException` kivételt dob, ha összességében
  nincs hely a kívánt mennyiségnek. Ebben az esetben nem történik készlet változás.
* Elvesz terméket a raktár(ak)ból: `takeOutProduct`, ami `NotEnoughStorageQuantityException` kivételt dob, ha nincs
  elegendő mennyiség. Ebben az esetben nem történik készlet változás.
* Kiiratja a raktárak tartalmát: Erre egy kezdetleges index.php -t készítettem, ami egyszerűen betölti az adatokat a
  `resource/testBusines.php` fájlból, és egy tánlázatba kiiratja. Azért döntöttem emelett az egyszerű stuktúra melett,
  mert a megjelenítés az egy teljesen különálló alkalmazást igényel. Ettől függetlenül a unittestben is szerepel a
  megjelenítés. `displayBusinessSore`

### Tesztelés

Főbb modellekhez készítettem tesztelést, TDD elvek alapján. `BrandTest`, `PriceTest`, `ProductTest`, `StorageTest`.

A `BusinessTest` tartalmazza a lényegi tesztelést, ami a kívánt feltételeket tartalmazza.

* ...felvesz több terméket és kiíratja a raktár tartalmát: `testBusinessProductsList`
* ...felvesz több terméket, de nincs elég hely: `testHasNotEnoughStorageSpace`
* ...kikér több terméket, de a kérést csak több raktár együtt tudja kiszolgálni: `testTakeOutProductionSuccess`
* ...kikér több terméket, de nincs elég a raktáron: `testTakeOutProductionException`
* 
