<?php
// Procesa la categoría seleccionada
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 'ninguna';

$equipos = [
    'computadoras' => [
        ['nombre' => 'Laptop HP', 'imagen' => 'images/laptop_hp.jpg', 'referencia' => 'Ref: HP15-DW1002LA'],
        ['nombre' => 'MacBook Pro', 'imagen' => 'images/macbook_pro.jpg', 'referencia' => 'Ref: MacBookPro2020'],
        ['nombre' => 'Dell XPS', 'imagen' => 'images/dell_xps.jpg', 'referencia' => 'Ref: XPS13-7390']
    ],
    'camaras' => [
        ['nombre' => 'Canon EOS', 'imagen' => 'images/canon_eos.jpg', 'referencia' => 'Ref: EOS-4000D'],
        ['nombre' => 'Nikon D850', 'imagen' => 'images/nikon_d850.jpg', 'referencia' => 'Ref: D850-BODY'],
        ['nombre' => 'Sony Alpha', 'imagen' => 'images/sony_alpha.jpg', 'referencia' => 'Ref: Alpha7III']
    ],
    'audio' => [
        ['nombre' => 'Micrófono Shure', 'imagen' => 'images/microfono_shure.jpg', 'referencia' => 'Ref: SM58'],
        ['nombre' => 'Altavoces Bose', 'imagen' => 'images/altavoces_bose.jpg', 'referencia' => 'Ref: Bose-Audio'],
        ['nombre' => 'Audífonos Sony', 'imagen' => 'images/audifonos_sony.jpg', 'referencia' => 'Ref: WH-1000XM4']
    ],
    'video' => [
        ['nombre' => 'Cámara de Video Panasonic', 'imagen' => 'images/camara_video_panasonic.jpg', 'referencia' => 'Ref: HC-V770'],
        ['nombre' => 'Proyector Epson', 'imagen' => 'images/proyector_epson.jpg', 'referencia' => 'Ref: EH-TW7100'],
        ['nombre' => 'Grabadora GoPro', 'imagen' => 'images/grabadora_gopro.jpg', 'referencia' => 'Ref: HERO9']
    ]
];

$equipo_seleccionado = isset($equipos[$categoria]) ? $equipos[$categoria] : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta de Equipos</title>
    <style>
        body {
            font-family: Bahnschrift, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

      
        .sidebar {
            width: 0;
            background-color: blue;
            height: 100vh;
            padding: 0%;
            box-sizing: border-box;
            overflow-x: hidden;
            transition: 0.5s;
            position: fixed;
            left: 0;
            top: 0;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            background-color: #444;
            border-radius: 5px;
        }

        .sidebar ul li a:hover, .sidebar ul li .dropbtn {
            background-color: #575757;
        }

        /* Estilos para el botón que abre el menú */
        .open-btn {
            font-size: 20px;
            cursor: pointer;
            background-color: #333;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            margin: 20px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .open-btn:hover {
            background-color: #444;
        }

        /* Estilos para el contenido principal */
        main {
            flex-grow: 1;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            margin-left: 220px; /* Espacio para el menú lateral */
            transition: margin-left 0.5s;
        }

        .dropdown-content {
            display: none;
            background-color: #444;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin: 5px 0;
        }

        /* Estilos para el menú cuando se abre */
        .sidebar.open {
            width: 200px;
            padding: 75px 0;
        }

        main.open {
            margin-left: 240px;
        }

        /* Estilos para los productos */
        .product {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
            border-radius: 5px;
        }

        .product .info {
            text-align: left;
        }

        .product .info h3 {
            margin: 0 0 10px 0;
        }

        .product .info p {
            margin: 0;
            color: #555;
        }
    </style>
</head>
<body>
    <!-- Botón para abrir el menú -->
    <button class="open-btn" onclick="toggleMenu()">☰ Menú</button>

    <!-- Menú lateral -->
    <div id="sidebar" class="sidebar">
        <ul>
            <li><a href="#">Renta</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Equipos</a>
                <div class="dropdown-content">
                    <a href="index.php?categoria=computadoras">Computadoras</a>
                    <a href="index.php?categoria=camaras">Cámaras</a>
                    <a href="index.php?categoria=audio">Equipos de Audio</a>
                    <a href="index.php?categoria=video">Equipos de Video</a>
                </div>
            </li>
        </ul>
    </div>

    <!-- Contenido principal -->
    <main id="main-content">
        <?php if ($categoria !== 'ninguna'): ?>
            <h1>Equipos en la categoría: <?php echo ucfirst($categoria); ?></h1>
            <?php if (empty($equipo_seleccionado)): ?>
                <p>No hay equipos disponibles en esta categoría.</p>
            <?php else: ?>
                <?php foreach ($equipo_seleccionado as $equipo): ?>
                    <div class="product">
                        <img src="<?php echo $equipo['imagen']; ?>" alt="<?php echo $equipo['nombre']; ?>">
                        <div class="info">
                            <h3><?php echo $equipo['nombre']; ?></h3>
                            <p><?php echo $equipo['referencia']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php else: ?>
            <h1>Bienvenido a nuestro servicio de renta de equipos</h1>
            <p>Seleccione una opción del menú para comenzar.</p>
        <?php endif; ?>
    </main>

    <!-- JavaScript para manejar el menú -->
    <script>
        function toggleMenu() {
            var sidebar = document.getElementById("sidebar");
            var mainContent = document.getElementById("main-content");

            if (sidebar.classList.contains("open")) {
                sidebar.classList.remove("open");
                mainContent.classList.remove("open");
            } else {
                sidebar.classList.add("open");
                mainContent.classList.add("open");
            }
        }
    </script>
</body>
</html>
