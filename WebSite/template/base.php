<!DOCTYPE html>
<html lang="it">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["titolo"]; ?></title>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/dynamicFooter.js"></script>
    <link rel="stylesheet" href="css/reset.css" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/mainStyle.css" type="text/css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <?php
    if (isset($templateParams["usaTabelle"]) && $templateParams["usaTabelle"]) :
    ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css" />
        <script src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    <?php
    endif;
    if (isset($templateParams["usaGrafici"]) && $templateParams["usaGrafici"]) :
    ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <?php
    endif;
    ?>
</head>

<body>
    <header>
        <div>
            <h1><?php echo $templateParams["titoloHeader"] ?></h1>
            <h2><?php echo $templateParams["sottotitoloHeader"] ?></h2>
        </div>
    </header>
    <?php
    if (isset($templateParams["specificNavbar"])) {
        require($templateParams["specificNavbar"]);
    }
    ?>
    <main>
        <?php
        if (isset($templateParams["specificTemplate"])):
            require($templateParams["specificTemplate"]);
        endif;
        if(isset($templateParams["modals"])):
            foreach($templateParams["modals"] as $m):
                check_modals($m);
            endforeach;
        endif;
        ?>
    </main>
    <footer>
        <div>
            <p>Federico Campanozzi</p>
            <p>Matr.: 0000895693</p>
            <p>Alma Mater Studiorum Bologna - Sede di Cesena</p>
        </div>
    </footer>
</body>

</html>