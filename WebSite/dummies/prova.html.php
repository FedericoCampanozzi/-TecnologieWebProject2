<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/reset.css" type="text/css">
    <style>
        .container {
            width: 50%;
            height: 250px;
            margin: 10px 25%;
            background-color: aquamarine;
            border-radius: 50px;
        }

        .container>.titolo {
            position: relative;
            top: 10px;
            left: 25px;
            font-size: 22px;
            font-weight: bold;
        }

        .container>.immagine {
            position: relative;
            top: 10px;
            left: 25px;
            width: 156px;
            height: 156px;
        }

        .container>.prezzo {
            position: relative;
            top: 10px;
            left: 25px;
        }

        .container>.giacenza {
            position: relative;
            top: -176px;
            left: 186px;
        }

        .container>.descrizione {
            position: relative;
            top: -166px;
            left: 190px;
            width: 150px;
            font-size: 15px;
            height: 150px;
            overflow-y: hidden;
        }

        .container>.descrizione {
            position: relative;
            top: -166px;
            left: 190px;
            width: 150px;
            font-size: 15px;
            height: 150px;
            overflow-y: hidden;
        }

        .container>.acquista {
            position: relative;
            top: -146px;
            left: 25px;
        }

        .container>.dettaglio {
            position: relative;
            top: -166px;
            left: 150px;
        }

        /*-- ORDINI --*/
        .ordini-container {
            height: 125px;
            width: 40%;
            display: inline-block;
            margin: 25px 4%;
            border-radius: 20px;
            font-family: Lato;
            color: black;
        }

        .ordine-consegnato {
            background-color: #DCB000;
        }

        .ordine-non-consegnato {
            background-color: #FFCB00;
        }

        .ordini-container>.indirizzo {
            position: relative;
            top: 10px;
            left: 10px;
            width: 90%;
            font-size: 16px;
        }

        .ordini-container>.indirizzo>span {
            color: #A80004;
            font-size: 18px;
            font-weight: bold;
        }

        .ordini-container>.data-ordine {
            position: relative;
            top: 10px;
            left: 10px;
            font-size: 16px;
            width: 90%;
        }

        .ordini-container>.data-ordine>span {
            font-size: 20px;
            color: #FD0006;
        }

        .ordini-container>.data {
            position: relative;
            top: 10px;
            left: 10px;
            width: 90%;
            font-size: 16px;
        }

        .ordini-container>.data>span {
            font-size: 20px;
            color: #FE1C22;
        }

        .ordini-container>.pagamento {
            position: relative;
            top: -20px;
            left: 125px;
            width: 50px;
        }

        .ordini-container>.totale {
            position: relative;
            top: 10px;
            left: 10px;
        }

        .ordini-container>.carta {
            position: relative;
            top: -60px;
            left: 60%;
            width: 140px;
        }

        .ordini-container>.totale>span {
            font-weight: bold;
            font-size: 38px;
            color: #2104C3;
        }

        @media screen and (min-width: 0px) and (max-width: 700px) {
            .ordini-container {
                width: 85%;
                margin: 25px 7.5%;
                height: 135px;
            }

            .container {
                width: 80%;
                margin: 10px 10%;
            }

            .container>.immagine {
                position: relative;
                top: 20px;
                left: 55px;
                width: 96px;
                height: 96px;
            }                
            
            .container>.giacenza {
                position: relative;
                top: -120px;
                left: 155px;
            }

            .container>.descrizione{
                display: none;
            }
            
            .container>.prezzo{
                position: relative;
                top: 90px;
                left: 30px;
                font-weight: bold;
                font-size: 24px;
            }
            
            .container>.acquista{
                position: relative;
                top: 60px;
                left: 85px;
            }
            
            .container>.dettaglio {
                position: relative;
                top: 30px;
                left: 185px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="titolo"> Prodotto1 </div>
        <div class="immagine">
            <img alt="" width="156" height="156"> </img>
        </div>
        <div class="prezzo">
            3.5 &euro;
        </div>
        <div class="giacenza">
            Pezzi Rimanenti : 145
        </div>
        <div class="descrizione">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam eligendi, unde quisquam corrupti fugiat facere saepe debitis esse repellat praesentium pariatur tempore assumenda tempora eum facilis dignissimos quis mollitia quaerat?
        </div>
        <div class="acquista">
            <button>ACQUISTA</button>
        </div>
        <div class="dettaglio">
            <a href="#">dettaglio</a>
        </div>
    </div>
    <div class="ordini-container ordine-non-consegnato">
        <div class="indirizzo">
            Indirizzo : <span> Via Prova 11,11 - Cesena</span>
        </div>
        <div class="data-ordine"> Ordinato il <span>2022-01-06 19:05:21</span></div>
        <div class="data"> Consegna prevista per il <span>2022-01-15</span></div>
        <div class="totale"> Totale : <span>54</span> &euro; </div>
        <div class="pagamento">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"></path>
                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"></path>
                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"></path>
                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"></path>
            </svg>
        </div>
        <div class="carta"> Numero carta : 124</div>
    </div>
    <div class="ordini-container ordine-non-consegnato">
        <div class="indirizzo">
            Indirizzo : <span> Via Prova 11,11 - Cesena</span>
        </div>
        <div class="data-ordine"> Ordinato il <span>2022-01-06 19:05:21</span></div>
        <div class="data"> Consegna prevista per il <span>2022-01-15</span></div>
        <div class="totale"> Totale : <span>54</span> &euro; </div>
        <div class="pagamento">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"></path>
                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"></path>
                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"></path>
                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"></path>
            </svg>
        </div>
    </div>
</body>

</html>