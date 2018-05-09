<html>
    <head>
    <title>
    </title>
        <script type="text/javascript">
            function valider_navn()
            {
                regEx = /^[a-zA-ZøæåØÆÅ. ]{2,50}$/;
                OK = regEx.test(document.skjema.navn.value);
                if(!OK)
                {
                    document.getElementById("feilNavn").innerHTML = "Feil i navnet";
                    return false;
                }
                document.getElementById("feilNavn").innerHTML = "";
                return true;
            }
            function valider_adresse()
            {
                regEx = /^[a-zA-ZøæåØÆÅ0-9. ]{2,50}$/;
                OK = regEx.test(document.skjema.adresse.value);
                if(!OK)
                {
                    document.getElementById("feilAdresse").innerHTML = "Feil i adresse";
                    return false;
                }
                document.getElementById("feilAdresse").innerHTML = "";
                return true;
            }
            function valider_telnr()
            {
                regEx = /^[0-9]{8}$/;
                OK = regEx.test(document.skjema.telefonnummer.value);
                if(!OK)
                {
                    document.getElementById("feilNummer").innerHTML = "Feil i telefonnummeret";
                    return false;
                }
                document.getElementById("feilNummer").innerHTML = "";
                return true;
            }
            function valider_postnr()
            {
                regEx = /^[0-9]{4}$/;
                OK = regEx.test(document.skjema.postnr.value);
                if(!OK)
                {
                    document.getElementById("PostNr").innerHTML = "Feil i postnummeret";
                    return false;
                }
                document.getElementById("PostNr").innerHTML = "";
                return true;
            }
            function valider_poststed()
            {
                regEx = /^[a-zA-ZøæåØÆÅ. ]{2,50}$/;
                OK = regEx.test(document.skjema.poststed.value);
                if(!OK)
                {
                    document.getElementById("feilPoststed").innerHTML = "Feil i poststed";
                    return false;
                }
                document.getElementById("feilPoststed").innerHTML = "";
                return true;
            }
            function valider_epost()
            {
                regEx = /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                OK = regEx.test(document.skjema.epost.value);
                if(!OK)
                {
                    document.getElementById("feilEpost").innerHTML = "Feil i E-post adresse";
                    return false;
                }
                document.getElementById("feilEpost").innerHTML = "";
                return true;
            }
            
            function valider_alle()
            {
                navnOK = valider_navn();
                adrOK = valider_adresse();
                telOK = valider_telnr();
                postnrOK = valider_postnr();
                poststOk = valider_poststed();
                epostOK = valider_epost();
                
                if(navnOK && adrOK && telOK)
                {
                    return true;
                }
                return false;
            }
        </script>
    </head>
        <body>
            <h2>Her kan du bestille billett</h2>
            <form action="side2.php" method="request" name="skjema" onsubmit="return valider_alle()">
            <table>
                <tr>
                 <td>Navn:<br/></td>
                 <td><input type="text" name="navn" onchange="valider_navn()"/><br/></td>
                 <td><div id="feilNavn">*</div></td>
                </tr>
              <tr>
                <td>Adresse:<br/></td>
                <td><input type="text" name="adresse" onchange="valider_adresse()"/><br/></td>
                <td><div id="feilAdresse">*</div></td>
              </tr>
               <tr>
                 <td>Postnr:<br/></td>
                 <td><input type="text" name="postnr" onchange="valider_postnr()"/><br/></td>
                 <td><div id="PostNr">*</div></td>
               </tr>
               <tr>
                 <td>Poststed:<br/></td>
                 <td><input type="text" name="poststed" onchange="valider_poststed()"/><br/></td>
                 <td><div id="feilPoststed">*</div></td>
               </tr>
               <tr>
                   <td>Telefonnummer:<br/></td>
                   <td><input type="text" name="telefonnummer" onchange="valider_telnr()"/><br/></td>
                   <td><div id="feilNummer">*</div></td>
               </tr>
               <tr>
                    <td>E-post adresse:<br/></td>
                    <td><input type="text" name="epost" onchange="valider_epost()"/><br/></td>
                    <td><div id="feilEpost">*</div></td>
              </tr>



            </table>
                <p>Hva slags billett ønsker du?</p>
                 <select name="type">
                    <option value="standard">Standard</option>
                    <option value="standard3D">Standard 3D</option>
                    <option value="komfort">Komfort</option>
                    <option value="komfort3D">Komfort 3D</option>
                  </select>

                <p>Hvor mange billetter ønsker du?</p>
                 <select name="antall">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                
                <p>Trykk for å sende bestilling
                    <input type="submit" name="send" value="Send bestilling"/>
                </p>
                    
               
            </form>
         </body>

</html>