# Magyar animelista
    
    Informatika 2 – házi feladat
 
# Specifikáció
## Házifeladat leírása
A feladat lényege egy személyes anime lista létrehozása és kezelése. Az adatbázis tárolja az elérhető animéket, amik közül létre tud hozni a felhasználó egy saját listát, ami tartalmazza a már megnézett, valamint a megnézni kívánt animéket. Az elérhető animéket a felhasználó nem, csak az admin tudja szerkeszteni.

## Elérhető funkciók
A weboldal a következő funkciók használatára ad lehetőséget:
 * Számon tartott animék listája:
    * Animék listájának megtekintése, azok közötti keresés
    * Új anime felvétele a saját listára
    * Új anime felvétele a globális listára(csak admin)
    * Anime törlése a globális listából(csak admin)
 * Felhasználók kezelése
    * Új felhasználó regisztálása
    * Regisztrált felhasználó bejelentkezése
    * Felhasználó adatainak módosítása
    * Weboldal kinézetének megváltoztatása
 * Saját animelista kezelése
    * Új anime felvétele a személyes listába
    * Felvett elem adatainak módosítása
    * Felvett elem törlése
    * Eddig felvett animék megtekintése
## Adatbázis séma
Az adatbázisban a következő entitások és attribútumok találhatók:
 * Anime: id, cím, stúdió, epizódok száma
 * Felhasználó: id, név, jelszó
 * Nézés: animeid, felhasználóid(összetett kulcs a kettő), nézés típusa(befejezett, éppen nézett, szüneteltetett, abbahagyott), saját értékelés

Az adatok tárolására használt séma:
![Kep](./diagram_jo.PNG "diagram")
 