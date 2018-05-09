<?php
session_start();
include "Klasser.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <script type="text/javascript">

            function hent_pub() {
                url = "HentPub.php?ovelseid=" + this.skjema.valgtid.value;
                $.get(url, function (data) {
                    data = JSON.parse(data);
                    console.dir(data);
                    if (data == "Feil i db")
                    {
                        $("#feil").html(data);
                    } else
                    {
                        $("#utpub").empty();
                        $("#utpub").append("<tr><th>Fornavn</th><th>Etternavn</th><th>Epost</th><th>Adresse</th><th>Telefonnummer</th></tr>");
                        for (x in data) {
                            $("#utpub").append("<tr>");
                            $("#utpub").append("<td>" + data[x].fornavn + "</td>");
                            $("#utpub").append("<td>" + data[x].etternavn + "</td>");
                            $("#utpub").append("<td>" + data[x].epost + "</td>");
                            $("#utpub").append("<td>" + data[x].adresse + "</td>");
                            $("#utpub").append("<td>" + data[x].telefonnummer + "</td>");
                            $("#utpub").append("</tr>");
                        }
                    }
                });
            }

            function hent_ovelse() {
                url = "HentOvelse.php?ovelseid=" + this.skjema.valgtid.value;
                $.get(url, function (data) {
                    data = JSON.parse(data);
                    console.dir(data);
                    if (data == "Feil i db")
                    {
                        $("#feil").html(data);
                    } else
                    {
                        $("#utovelse").empty();
                        $("#ovelseHeader").empty();
                        $("#utovelse").append("<tr><th>Sted</th><th>Dato</th><th>Tid</th></tr>");
                        for (x in data) {
                            $("#ovelseHeader").append(data[x].type);
                            $("#utovelse").append("<tr>");
                            $("#utovelse").append("<td>" + data[x].sted + "</td>");
                            $("#utovelse").append("<td>" + data[x].dato + "</td>");
                            $("#utovelse").append("<td>" + data[x].tid + "</td>");
                            $("#utovelse").append("</tr>");
                        }
                    }
                });
            }

            function hent_utover() {
                url = "HentUtover.php?ovelseid=" + this.skjema.valgtid.value;
                $.get(url, function (data) {
                    data = JSON.parse(data);
                    console.dir(data);
                    if (data == "Feil i db")
                    {
                        $("#feil").html(data);
                    } else
                    {
                        $("#ututov").empty();
                        $("#ututov").append("<tr><th>Fornavn</th><th>Etternavn</th><th>Epost</th><th>Adresse</th><th>Telefonnummer</th></tr>");
                        for (x in data) {
                            $("#ututov").append("<tr>");
                            $("#ututov").append("<td>" + data[x].fornavn + "</td>");
                            $("#ututov").append("<td>" + data[x].etternavn + "</td>");
                            $("#ututov").append("<td>" + data[x].epost + "</td>");
                            $("#ututov").append("<td>" + data[x].adresse + "</td>");
                            $("#ututov").append("<td>" + data[x].telefonnummer + "</td>");
                            $("#ututov").append("</tr>");
                        }
                    }
                });
            }

        </script>
        <style>
            table {
                table: table-striped table-inverse;
            }
            body {
                margin: 0;
                background: url("bakgrunn.jpg");
                background-size: 100%;
                background-repeat:no-repeat;
                background-attachment: fixed;
                display: compact;
                font: 13px/18px "Helvetica Neue", Helvetica, Arial, sans-serif;
            }
            .col-centered{
                float: none;
                margin: 2em auto;
                background:rgb(255,255,255);
                border-radius: 10px; 
                border: 3px solid black;

            }
            .col-md-8 {
                display: inline-block;
                float: none;
                margin: 2em auto;
                background:rgb(255,255,255);
                border-radius: 10px;

            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Ski VM!</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Hjem</a></li>
                    <li class="active"><a href="Side4.php">Se Øvelse Data!</a></li>
                    <?php
                    if (!isset($_SESSION["verifisering"])) {
                            echo '<li><a href="innlogging.php">Logg inn</a></li>';
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["verifisering"])) {
                        if ($_SESSION["verifisering"] == true) {
                            echo '<li><a href="OvelseRedigering.php">Rediger Øvelser</a></li>';
                        }
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["verifisering"])) {
                        if ($_SESSION["verifisering"] == true) {
                            echo '<li><a href="UtoverRedigering.php">Rediger Utøvere</a></li>';
                        }
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["verifisering"])) {
                        if ($_SESSION["verifisering"] == true) {
                            echo '<li><a href="PublikumRedigering.php">Rediger Publikum</a></li>';
                        }
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["verifisering"])) {
                        if ($_SESSION["verifisering"] == true) {
                            echo '<li><a href="loggut.php">Logg ut</a></li>';
                        }
                    }
                    ?>
                    <?php
                    if (!isset($_SESSION["verifisering"])) {
                            echo '<li><a href="Side3.php">Ny Administrator</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <div class="col-centered">    
            <div class="col-md-8">
                <?php
                $db = mysqli_connect("localhost", "root", "", "skivm");
                if (!$db) {
                    die("Kunne ikke knytte til server" . mysqli_error($db));
                }

                $sql = "SELECT type, ovelseid FROM ovelse";
                $resultat = mysqli_query($db, $sql);
                ?>

                <h2>Finne data om øvelsen!</h2>
                <h3>Velg en øvelse:</h3>
                <form name="skjema">
                    <select name ="valgtid"onChange="hent_pub();
                            hent_utover();
                            hent_ovelse();">
                                <?php
                                echo "<option>------</option>";
                                while ($row = mysqli_fetch_array($resultat)) {
                                    echo "<option value='" . $row['ovelseid'] . "'>" . $row['type'] . "</option>";
                                }
                                echo "</select>";
                                ?>
                    </select>
                </form>

                <table class="table table-striped">
                    <h2 id="ovelseHeader"></h2>
                    <tbody id="utovelse"> </tbody>
                </table>

                <table class="table table-striped">
                    <h2> Publikum</h2>
                    <tbody id="utpub"></tbody>
                </table>

                <table class="table table-striped">
                    <h2> Utøvere</h2>
                    <tbody id="ututov"></tbody>
                </table>
                </br>
            </body>
        </div>
    </div>
</html>