# Seminarski rad iz predmeta Softversko Inženjerstvo 2

Ovaj repozitorijum sadrži izvorni kod web aplikacije koja koristi PHP za upravljanje bazom podataka. Aplikacija uključuje tabelu i pogled pomoću kojih kreiramo baze podataka u PHP adminu. 

## Tehnologije
- **XAMPP**: Koristi se za lokalno hostovanje aplikacije.
- **PHP**: Omogućava rad sa bazom podataka.

## Funkcionalnosti
1. **Pristup stranici**: Pristup stranici se ostvaruje putem lokalnog hosta.
2. **Administracija**: Početna stranica je namenjena za prijavu admina (korisničko ime i lozinka su generisani u bazi podataka).
3. **CRUD operacije**: Nakon prijave, admin može:
   - Dodavati evidenciju elektrane
   - Brisati evidencije elektrane
   - Ažurirati evidencije elektrane
4. **Poslovno pravilo**: Pre svakog snimanja unosa, aplikacija proverava poslovno pravilo koje ograničava broj unetih elektrana sa istom vrstom pogona na maksimalno 2. Ova vrednost je definisana i zabeležena u XML fajlovima i proverava se prilikom svakog unosa.
5. **Parametarska štampa**: Mogućnost štampanja evidencije elektrane na osnovu njenog ID-a.
