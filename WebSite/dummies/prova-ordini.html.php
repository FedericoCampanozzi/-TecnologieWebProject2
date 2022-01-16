<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/reset.css" type="text/css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <style>
        .ordini-container {
            height: 165px;
            width: 300px;
            margin: 20px auto;
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
            font-size: 16px;
            padding-left: 30px;
            padding-top: 10px;
        }

        .ordini-container>.indirizzo>span {
            color: #A80004;
            font-size: 18px;
            font-weight: bold;
        }

        .ordini-container>.data-ordine {
            font-size: 16px;
            padding-left: 30px;
        }

        .ordini-container>.data-ordine>span {
            font-size: 20px;
            color: #2104C3;
        }

        .ordini-container>.data {
            font-size: 16px;
            padding-left: 30px;
        }

        .ordini-container>.data>span {
            font-size: 20px;
            color: #5034E8;
        }

        .ordini-container>.totale {
            padding-left: 15px;
            width: 110px;
            margin-right: 0!important;
            display: inline-table !important;
            padding-top: 5px;
        }

        .ordini-container>.totale>span {
            font-weight: bold;
            font-size: 30px;
            color: #2104C3;
            width: 20px;
            margin-right: 0;
        }

        .ordini-container>.pagamento {
            width: 50px;
            padding-left: 15px;
            display: inline-table !important;
        }


        .ordini-container>.carta {
            position: relative;
            bottom: 18.5px;
            width: 110px;
            padding-left: 15px;
            display: inline-table !important;
            overflow-x: hidden;
            font-size: 16px;
        }
        .ordini-container hr{
            border-radius: 10px;
            background-color: black;
            margin: 2px 0px;
            height: 2px;
            width: 90%;
            margin-left: 3%;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-lg-4">
            <div class="ordini-container ordine-consegnato">
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
                <div class="carta"> Numero carta <br> 124 </div>
            </div>
        </div>
        <div class="col-lg-4">
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
        </div>
        <div class="col-lg-4">
            <div class="ordini-container ordine-consegnato">
                <div class="indirizzo">
                    Indirizzo : <span> Via Prova 11,11 - Cesena</span>
                </div>
                <div class="data-ordine"> Ordinato il <span>2022-01-06 19:05:21</span></div>
                <div class="data"> Consegna prevista per il <span>2022-01-15</span></div>
                <hr>
                <div class="totale"> Totale : <span>54</span> &euro; </div>
                <div class="pagamento">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"></path>
                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"></path>
                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"></path>
                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"></path>
                    </svg>
                </div>
                <div class="carta"> Numero carta <br>2147483647</div>
            </div>
        </div>
    </div>
</body>

</html>