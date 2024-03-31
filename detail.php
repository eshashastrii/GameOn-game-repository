<?php
$conn = mysqli_connect('localhost', 'root', '', 'sports');
if (!$conn) {
    echo 'Connection error' . mysqli_connect_error();
}
if (isset ($_GET['id']) && isset ($_GET['name'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $name = mysqli_real_escape_string($conn, $_GET['name']);
    $sql = "SELECT id, Title, country, status, size, tlimit, edetails, ephoto, cdetails, cphoto, fdetails, fphoto, rules, photo, vlink, terms, types, playerlist, artiphoto, artinfo FROM $name WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $records = mysqli_fetch_assoc($result);

    mysqli_close($conn);
}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details</title>
    <link rel="stylesheet" href="./css/detail.css">
</head>

<body>
    <div class="hero">
        <header id="navbar">
            <a class="logo">GameOn</a>
            <nav class="header">
                <ul>
                    <li class="item"><a href="index.php">Home</a></li>
                    <li class="item"><a href=""> About us</a></li>
                    <li class="item"><a href="">Contact us</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="container1">
        <div class="centre">
        <?php if (isset ($records)): ?>
            <h1 class="heading">
                <?php echo htmlspecialchars($records['Title']) ?>
            </h1>
            <img src="<?php echo $records['photo']; ?>" class='heading1'>
        </div>
        <div class="grid">
            <div>
            <?php if (!empty ($records['country'])): ?>
                <h2>Country of origin</h2>
                <p>
                    <?php echo htmlspecialchars($records['country']); ?>
                </p>
            <?php endif; ?>
            </div>
            <div>
            <?php if (!empty ($records['status'])): ?>
                <h2>National/International Status</h2>
                <p>
                    <?php echo htmlspecialchars($records['status']); ?>
                </p>
            <?php endif; ?>
            </div>
        </div>
        <div class="grid">
            <div>
            <?php if (!empty ($records['size'])): ?>
                <h2>Number of players</h2>
                <p>
                    <?php echo nl2br(htmlspecialchars($records['size'])); ?>
                </p>
            <?php endif; ?>
            </div>
            <div>
            <?php if (!empty ($records['tlimit'])): ?>
                <h2>Time limit</h2>
                <p>
                    <?php echo nl2br(htmlspecialchars($records['tlimit'])); ?>
                </p>
            <?php endif; ?>
            </div>
        </div>
        <div class="grid1">
            <?php if (!empty ($records['edetails'])): ?>
                <div>
                <h2>Equipment</h2>
                <p>
                    <?php echo nl2br(htmlspecialchars($records['edetails'])); ?>
                </p>
                </div>
            <?php endif; ?>
            <?php if ($records['ephoto'] !== 'Images/'): ?>
                <img src="<?php echo $records['ephoto']; ?>" class='drink1'>
            <?php endif; ?>
        </div>
        <div class="grid1">
            <?php endif; ?>
            <?php if ($records['cphoto'] !== 'Images/'): ?>
                <img src="<?php echo $records['cphoto']; ?>" class='drink1'>
            <?php endif; ?>
            <?php if (!empty ($records['cdetails'])): ?>
                <div>
                <h2>Costume</h2>
                <p>
                    <?php echo nl2br(htmlspecialchars($records['cdetails'])); ?>
                </p>
                </div>
            </div>
            <div class="grid1">
            <?php if (!empty ($records['fdetails'])): ?>
                <div>
                <h2>Footwear</h2>
                <p>
                    <?php echo nl2br(htmlspecialchars($records['fdetails'])); ?>
                </p>
                </div>
            <?php endif; ?>
            <?php if ($records['fphoto'] !== 'Images/'): ?>
                <img src="<?php echo $records['fphoto']; ?>" class='drink1'>
            <?php endif; ?>
            </div>
            <div class="elements">
            <?php if (!empty ($records['rules'])): ?>
                <h2>Rules</h2>
                <p>
                    <?php echo nl2br(htmlspecialchars($records['rules'])); ?>
                </p>
            <?php endif; ?>
            <?php if (!empty ($records['vlink'])): ?>
                <h2>Video links</h2>
                <p>
                    <?php echo nl2br(htmlspecialchars($records['vlink'])); ?>
                </p>
            <?php endif; ?>
            <?php if (!empty ($records['terms'])): ?>
                <h2>Terminologies</h2>
                <p>
                    <?php echo nl2br(htmlspecialchars($records['terms'])); ?>
                </p>
            <?php endif; ?>
            <?php if (!empty ($records['types'])): ?>
                <h2>Other related types</h2>
                <p>
                    <?php echo nl2br(htmlspecialchars($records['types'])); ?>
                </p>
            <?php endif; ?>
            <?php if (!empty ($records['playerlist'])): ?>
                <h2>Celebrity players list</h2>
                <p>
                    <?php echo nl2br(htmlspecialchars($records['playerlist'])); ?>
                </p>
            <?php endif; ?>
            </div>
            <div class="grid1">
            <?php if ($records['artiphoto'] !== 'Images/'): ?>
                <img src="<?php echo $records['artiphoto']; ?>" class='drink1'>
            <?php endif; ?>
            <?php if (!empty ($records['artinfo'])): ?>
                <div>
                <h2>Artifact</h2>
                <p>
                    <?php echo nl2br(htmlspecialchars($records['artinfo'])); ?>
                </p>
                </div>
            <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>
