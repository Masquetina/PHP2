# Uvod
## Korišćeni programski jezici
Dinamički web site QuoteApp je napisan u serverskom jeziku PHP, u framework-u Codeigniter, a od klijentrskih jezika korišćen je JavaScript u obliku AJAX-a i biblioteke jQuery. Markup jezik je HTML, uz dodatak lično kreiranih atributa u obliku ```data-[atribut]```, za potrebe dohvatanja podataka iz DOM-a preko jQuery selektora. Za stilizovanje je korišćen CSS3 , u obliku novijih tehnika stilizovanja i animacije. Dizajn sajta je osmišljen prema osnovnim standardima Material Design stila od Google-a, a koriščen je Material Design Icon font za ikonice. Inicijalno je upotrebljena tema Bootstrap.
## Opis funkcionalnosti
QuoteApp sadrži dinačko prikazivanje kartica iz baze, na početnoj stranici, kao i na stranicama profila svih korisnika, a svaka kartica kao gradivna jedinica sastoji se iz podataka koji čine nju samu, kao i podataka o njenom autoru. A u bazi se čuvaju i podaci o lajkovima, flegovima, kao i manipulaciji administratora nad karticom, ukoliko do toga dođe akcijom korisnika.

Administratorski panel, osim o flegovanim karticama, sadrži i dinamičke podatke o banovanim korisnicima, a administrator je u mogućnosti da jednim klikom upravlja i korisnicima i karticama. Ovde je korišćen AJAX.

Registrovani korisnici kreiraju kartice. Svoje mogu da obrišu, a tuđe mogu da lajkuju ukoliko im se dopadaju, ili fleguju (prijave administratoru), ukoliko ocene sadržaj kao nepodoban, a za realizaciju ovih funkcionalnosti sam koristila AJAX.

Posledica kreiranja nepodobnog sadržaja je banovanje, što zavisi od arbitraže administratora. Banovan korisnik se ne može ulogovati na sajt, sve dok mu to ponovo ne omogući administrator.

1. Sopstvena kartica koju je moguće izbrisati:

![](doc-images/own-card.png)

2. Tuđa kartica koju je moguće lajkovati ili flegovati, ali na drugoj slici prikazana onako kako je vidi neautorizovani korisnik i to nakon animacije na klik:

![](doc-images/other-card.png)![](doc-images/card-info.png)

3. Flegovana kartica kako je vidi administrator u svom panelu:

![](doc-images/dashboart-card.png)

Unutar footer-a se nalazi dinamički meni sa leve strane, koji se sastoji iz linkova ka društvenim mrežama, a prikazan je u vidu odgovarajućih ikonica.
## Template
Sama sam kreirala strukturu sajta, ne postoji tuđi templejt.
## Korišćeni CSS
Bootstrap CSS framework je korišćen mahom u svrhu responsivnosti, dok je sve ostalo restilizovano.