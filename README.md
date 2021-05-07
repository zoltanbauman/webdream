# Webdream Otthoni feladat

## Termékek
Három termékosztályt határoztam meg `MobilePhoneProduct`, `ProjectProduct` és a `TvProduct`.

### Tesztelés
Főbb modellekhez készítettem tesztelést, TDD elvek alapján. `BrandTest`, `PriceTest`, `ProductTest`, `StorageTest`.

A `BusinessTest` tartalmazza a lényegi tesztelést, ami a kívánt feltételeket tartalmazza. 
* Raktár létrehozása: `addStorage`
* Hozzáad terméket a raktár(ak)hoz: `putInProduct`, ami `NotEnoughStorageSpaceException` kivételt dob, ha összességében 
  nincs hely a kívánt mennyiségnek. Ebben az esetben nem történik készlet változás. 
* Elvesz terméket a raktár(ak)ból: `takeOutProduct`, ami `NotEnoughStorageQuantityException` kivételt dob, ha nincs
  elegendő mennyiség. Ebben az esetben nem történik készlet változás.
* Kiiratja a raktárak tartalmát

