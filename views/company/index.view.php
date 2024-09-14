 <?php
// Procesa la categoría seleccionada
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 'ninguna';

$equipos = [
    'computadoras' => [
        ['nombre' => 'Laptop HP', 'imagen' => '././assets/img/laptop_hp.jfif', 'referencia' => 'Ref: HP15-DW1002LA'],
        ['nombre' => 'MacBook Pro', 'imagen' => '././assets/img/macbook_pro.jfif', 'referencia' => 'Ref: MacBookPro2020'],
        ['nombre' => 'Dell XPS', 'imagen' => '././assets/img/dell_xps.jfif', 'referencia' => 'Ref: XPS13-7390']
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
        ['nombre' => 'Grabadora GoPro', 'imagen' => 'images/grabadora_gopro.jpg', 'referencia' => 'Ref: HERO9'],
        ['nombre' => 'Grabadora GoPro2', 'imagen' => 'images/grabadora_gopro.jpg', 'referencia' => 'Ref: HERO9']
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
    <link rel="stylesheet" href="././assets/css/styles.css">

</head>
<body>
    <!-- Botón para abrir el menú -->
    <button class="open-btn" onclick="toggleMenu()">☰ Menú</button>

    <!-- Menú lateral -->
    <div id="sidebar" class="sidebar">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="index.php">Renta</a></li>
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
    <script src="././assets/js/scripts.js">
     
    </script>
</body>
</html>
