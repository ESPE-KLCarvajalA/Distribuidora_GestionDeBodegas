<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRIKI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>
<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #ddd;
        color: #fff;
    }

    .content {
        padding-bottom: .75rem;
        padding-top: .75rem;
        color: #000;    
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
        text-align: center;
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

    img {
        height: 80%;
    }
</style>

<body>
    <div class="header">
        <h2>Distribuidora de Productos</h2>
        <div class="nav">
            <div class="col-12 justify-content-center">
                <a href="{{ url('/') }}">Inicio</a>
                <a href="{{ route('productos.index') }}">Productos</a>
                <a href="{{ route('proveedores.index') }}">Proveedores</a>
                <a href="{{ route('bodegas.index') }}">Bodegas</a>
                <a href="{{ route('clientesfinales.index') }}">Clientes</a>

                <a href="{{ route('distribuidores.index') }}">Distribuidores</a>

                
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/home') }}">Mi Cuenta</a>
                @else
                <a href="{{ route('login') }}">Iniciar Sesión</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}">Registrarse</a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </div>
    <div class="content">
        @yield('content')
    </div>
   <!-- <div class="footer">
        <p>Contacta con nosotros:</p>
        <p>Email: contacto@distribuidora.com</p>
        <p>Teléfono: +123 456 7890</p>
        <p>Dirección: Calle Falsa 123, Santo Domingo, Ecuador</p>
    </div> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+Or