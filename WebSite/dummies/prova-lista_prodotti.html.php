<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/reset.css" type="text/css">
    <style>
        .product-container {
            width: 200px;
            height: 270px;
            margin: 20px 20px;
            border-radius: 20px;
            display: inline-block;
            color: black;
            border: 2px solid black;
            background-color: #A80004;
        }

        .product-container>.nome-prodotto {
            font-size: 32px;
            font-weight: bold;
            width: 92%;
            margin: 4px 4%;
            font-size: 26px;
            text-align: center;
        }

        .product-container img {
            width: 156px;
            height: 156px;
            margin-left: 22px;
        }

        .product-container>.prezzo {
            font-size: 16px;
            font-weight: bold;
            padding-left: 10px;
        }

        .product-container>.prezzo>span {
            font-size: 24px;
            font-weight: bold;
            color: #140375;
        }

        .product-container button {
            display: inline-table;
            margin: 10px;
        }

        .product-container button {
            padding: 2px 6px;
            border: 2px solid #000;
            font-family: 'Lato', sans-serif;
            font-size: 24px;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            border-radius: 5px;
            box-shadow: 2px 2px 6px rgb(206, 201, 201);
            background-color: whitesmoke;
        }

        .product-container button:hover {
            background-color: rgb(221, 180, 44);
        }

        .product-container button:active {
            transform: translateY(4px);
        }

        .product-container a {
            display: inline-table;
            margin-left: 20px;
            font-size: 18px;
        }
        .product-container a:active,.product-container a::after {
            color: black;
        }
    </style>
</head>

<body>
    <div class="product-container">
        <div class="nome-prodotto"> Tiglio </div>
        <img alt=""> </img>
        <div class="prezzo">
            Prezzo : <span>3.5</span> &euro;
        </div>
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
            </svg>
        </button>
        <a href="#">more info >>></a>
    </div>
    <div class="product-container">
        <div class="nome-prodotto"> Tiglio </div>
        <img alt=""> </img>
        <div class="prezzo">
            Prezzo : <span>3.5</span> &euro;
        </div>
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
            </svg>
        </button>
        <a href="#">more info >>></a>
    </div>
    <div class="product-container">
        <div class="nome-prodotto"> Tiglio </div>
        <img alt=""> </img>
        <div class="prezzo">
            Prezzo : <span>3.5</span> &euro;
        </div>
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
            </svg>
        </button>
        <a href="#">more info >>></a>
    </div>
    <div class="product-container">
        <div class="nome-prodotto"> Tiglio </div>
        <img alt=""> </img>
        <div class="prezzo">
            Prezzo : <span>3.5</span> &euro;
        </div>
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
            </svg>
        </button>
        <a href="#">more info >>></a>
    </div>
</body>

</html>