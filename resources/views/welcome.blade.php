<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Distribuidora de Productos</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #ddd;
            color: #fff;
        }

        .content {
            padding: 5%;
            padding-bottom: .75rem;
            padding-top: .75rem;
            background-color: black;
        }

        .header,
        .footer {
            background-color: #000;
            padding: 1rem;
            text-align: center;
        }

        .nav a {
            margin: 0 1rem;
            text-decoration: none;
            color: #fff;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }

        .product {
            border: 1px solid #ddd;
            padding: 1rem;
            border-radius: 8px;
            width: 200px;
            text-align: center;
        }

        .footer {
            margin-top: 2rem;
        }

        .images {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .images img {
            width: 30%;
            height: auto;
            border-radius: 8px;
        }

        .product img {
            width: 100%;
            height: 100%;
        }

        .cards {
            display: flex;
            justify-content: center; /* Centra las cards horizontalmente */
            flex-wrap: wrap; /* Permite que se envuelvan en múltiples líneas */
            gap: 20px; /* Espacio entre las cards */
            margin-top: 2rem;
        }

        .card {
            background-color: #333;
            color: #ddd;
            width: calc(50% - 50px);
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            transition: background linear 0.5s; 
        }

        .card:hover {
            background-color: green;
            color: #333;
        }

        .card a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="header">
            <h2>Distribuidora de Productos</h2>
        </div>
        <hr>
        <div class="images">
            <img src="https://media.istockphoto.com/id/1663889855/es/foto/camiones-blancos-con-contenedores-en-carretera.jpg?s=1024x1024&w=is&k=20&c=8KE7titm3VjQDafXl0hah0e-aQzIroJMX-DOmQdprf0=" alt="Logo de la distribuidora">
            <img src="https://media.istockphoto.com/id/1006499584/es/foto/paquete-recepci%C3%B3n-de-propietario-mujer.jpg?s=612x612&w=0&k=20&c=7g3D3odWXwW4jymQf3E9LVQo1Jfd0RotQeIIkFFRJ48=" alt="Entrega de paquetes">
        </div>
        <hr>

        <div class="cards">
            <div class="card">
                <a href="{{ route('productos.index') }}">
                    <h3>Productos</h3>
                    <p>Ver catálogo de productos disponibles</p>
                </a>
            </div>
            <div class="card">
                <a href="{{ route('proveedores.index') }}">
                    <h3>Proveedores</h3>
                    <p>Conoce nuestros proveedores asociados</p>
                </a>
            </div>
            <div class="card">
                <a href="{{ route('bodegas.index') }}">
                    <h3>Bodegas</h3>
                    <p>Ubicaciones de nuestras bodegas</p>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <h3>Distribuidores</h3>
                    <p>Encuentra nuestros distribuidores</p>
                </a>
            </div>
        </div>

        <br><br>
        <hr>
        <div class="footer">
            <p>Contacta con nosotros:</p>
            <p>Email: contacto@distribuidora.com</p>
            <p>Teléfono: +123 456 7890</p>
            <p>Dirección: Calle Falsa 123, Santo Domingo, Ecuador</p>
        </div>
    </div>
</body>

</html>
