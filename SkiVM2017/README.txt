Prosjektoppgave 2017 Webprogrammering PHP Høgskolen i Oslo og Akershus

Oppgaven kan løses av en gruppestørrelse på 1-5 studenter.

Oppgaven må leveres til angitt frist i Fronter.

Oppgaven skal leveres som en samlet fil og inneholde kjørbare php filer og oppsett for database.

Løsningen skal også lastes opp til en server. URL til løsningen skal også oppgis.

Prosjektoppgave VM på ski, et register for å vise informasjon om renn.

Det skal lages et system for å holde rede på hvilke øvelser som avholdes under ski VM i en database. Det skal også lagres hvilke utøverne som deltar på de ulike øvelsene. Det skal også være mulig å kobles publikum til de ulike øvelsene. Publikum må kunne registrere seg med personlig informasjon. Det er ikke nødvendig å utvikle en bestillingsløsning for billetter, det holder med at publikum kan registrere seg på ulike øvelser. Annen funksjonalitet: • Vise hvilke øvelser som har hvilke utøvere • Vise hvilke publikum som har billetter til hvilke øvelser
    Videre skal det være mulig å registrere og endre på øvelse og løper-informasjonen (slette og oppdatere). Det skal bare være personer som er autorisert som skal kunne registrere/endre/slette løpere og øvelser. Det betyr at det må lages en registreringsfunksjon for administrative personer. Her skal navn osv. registreres sammen med brukernavn og passord. Passordet skal lagres kryptert i databasen. De sidene som man kan administrere øvelse og utøver-informasjon skal så sperres slik at man må logge inn på en egen side for å komme til disse. Innloggingen skal sjekkes mot de registrerte administrative personene


Lenke til nettstedet:
http://student.cs.hioa.no/~s315692/WebProgGruppeOblig/index.php

Nettstedet bruker skolen sin database.
Du kan logge inn med brukernavn: admin passord: admin 
Eller opprett en ny admin.
Vi var usikre på om koden vi skulle levere skulle ta i bruk localhost eller skolen sin database.

Vi leverer derfor to versjoner. De er helt like. Den eneste forskjellen er at mappen som heter WebProgGruppeObligLocalhost knytter seg til ("localhost", "root", "", "skivm") og SkoleDB til skolen sin database.