# First Chapter
Početna stranica QuoteApp inicijalno prikazuje sve kreirane kartice, svih postojećih korisnika, sortirane od najnovije, ka starijim.

Život budućeg korisnika na QuoteApp nastavlja se pravljenjem ličnog naloga. Na stranicu predviđenu za ovu svrhu stiže se klikom na dugme JOIN US NOW, i ono je dostupno neautorizovanim korisnicima na početnoj stranici sajta, sli i kao dodatni link na stranici za logovanje.

Stranica za kreiranje korisničkog naloga se sastoji iz zaglavlja, centralnog dela sa dva dodatna linka u dnu, i podnožja stranice.

Zaglavlje je vidljivo korisniku samo u svrhe prikazivanja flashmessage, ukoliko ona postoji, (ovo je zajedničko za sve stranice na kojima se nalazi forma).

U centralnom delu se nalazi forma u koju korisnik upisuje svoje podatke. Obradu podataka sam uradila pomoću biblioteke form_validation, koja je učitana u konfiguracionom fajlu autoload. Ispis grešaka je ispod svakog polja ponaosob, adekvatno stilizovan. Nakon ispravno unesenih podataka, klikom na dugme CREATE ACCOUNT, kreira se korisnički nalog u bazi, i korisnik biva redirektovan na stranicu za logovanje, uz adekvatnu propratnu flashmessage.

Na stranici za logovanje se nalazi forma za upis korisničkog imena i lozinke. Ovde nisam iskoristila biblioteku form?validation, već se jednostavno, ukoliko korisnik ne postoji u bazi, ispisuje flashmessage koja upozorava na to. Ukoliko je logovanje uspešno, korisnik biva redirektovan na početnu stranicu, uz dodatne izmene u odnosu na ono kako ju je video kao neautorizovan. Dugme JOIN US NOW se više ne prikazuje, a umesto dugmeta LOGIN se prikazuje dugme LOGOUT. Takođe, dugme NEW CARD dobija svoju svrsishodnost, odnosno, klikom na njega korisnik stiže na stranicu na kojoj je u mogućnosti da kreira novu karticu, a koja mu je dok je bio neautorizovan bila nedostupna.

Dodatne promene na početnoj stranici koje se tiču statusa autorizovanog korisnika su i te da može da lajkuje i fleguje tuđe kartice, a svoje da obriše, ukoliko to želi. Kao neautorizovan je mogao samo da vidi broj lajkova, a ostale funkcije koje sam nabrojala su mu bile nedostupne. Takođe, pored dugmeta LOGOUT, autorizovani korisnik vidi i svoju profilnu sliku.

U dnu početne stranice, iznad podnožja, nalaze se linkovi za straničenje, koji su podjednako klikabilni za neautorizovane, kao i za autorizovane korisnike.

Forma za kreiranje nove kartice je urađena uz mnogo jQuery koda, koji pre svega proverava unos korisnika i ispisuje greške, ali i učestvuje u stilizovanju input[type=file], čiji sam podrazumevani izgled potpuno promenila i vizuelno prilagodila stilu sajta.

Nakon kreiranja kartice, korisnik je redirektovan na stranicu svog profila, gde može da je vidi, kao i sve ostale svoje kartice, poređanje on+d najnovije ka starijima.



