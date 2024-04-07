# CRUD MySQLi baasil

Õpilastega koos toimetamiseks õppe eesmärgil ettekujutuse saamiseks.

# Esmane seadistus

1. **config/simple.sql** importida phpmyadmin abil endale sobivasse andmebaasi
2. **config/mysqli.php** alguses seadistada andmebaasi ühenduseks vajalikud andmed. Lisaks saab määtara mitu kirjet on lehel.

 # Täisfunktsionaaluse lisamine

 Kogu veebilehe liiklus käib läbi **index.php** faili. Kui ta sellest läbi ei käi, siis veebilehe stiile ja andmebaasi infot kaasa ei saa. Sellepärast on ka hetkel faile üksikult vaadates stiilitu vaade, kuigi kõik on juba disainitud.

 Selleks et avalehel (**index.php** ilma argumentideta URL real) midagi oleks, tuleb seadistada **homepage.php**. Lisaks on vaja saada toimima ka leheküljendamine (fail **paginate.php**), 5 kirjet lehel. Tabelis on 15 kirjet. Sead võiks nimetada ka CRUD osas Read tegevust. Aga meil on selleks eraldi variant (otsing).

 Järgmiseks tuleb toima saada uue kirje lisamine ehk Create (**create.php**). Sellks on ainult üks fail. 

 Muutmine on järgmine. Siin on vaja kahte faili. Algselt **update.php**, mis näitab kogu tabeli sisu ja iga kirje juures on muutmis nupp. Kui muutmis nupul klikkida kutsutakse välja fail **update-by-id.php**, kus saab valitud kirjet muuta (vorm). Kui vajutatakse uuendamise nupule ehk andmete uuendamiseks tabelisse, siis suunatakse tagasi **update.php** lehele. Sellele tuleks arendada juurde leheküljendamine nagu avalehel (iseseisvalt). 

 Kustutamine Delete (fail **delete.php**) on jälle kõige lihtsam. Sarnaselt updatele tuleb kogu tabeli sisu ja iga kirje lõpus on kustutamise ikoon. Kui seda klikkid, siis Javascript küsib kas oled kindel ja Ok puhul kustutatakse ning suunatakse tagasi kustutamise lehele, kus on juba üks vähem. Kas siia lehele oleks vaja arendada leheküljendamine.

 Viimaseks jääb CRUD'i Read osa ehk otsing. Selleks on fail **read.php**. Vomile tuleb kirjutada fraas ja see otsib kas tabelis on sellist nime. Jah puhul näidatakse vastust/vastuseid. Või siis mitte midagi.

Igasuguse tegevusega (lisa, muuda kustuta) näidatakse ka teavitust kas asi õnnestus või mitte. Teavitus kaob 5 sek pärast.

# NB!

Avalikus internetis sellise koodi kasutamine pole turvaline!