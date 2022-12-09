<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/factory-display/assets/img/icons/jacobi-icon.png">
    <title>Voir les écrans</title>
    <script src="/factory-display/assets/js/section/header.js"></script>
    <script src="/factory-display/assets/js/section/footer.js"></script>
    <script src="/factory-display/assets/js/init.js"></script>
    
    <link rel="stylesheet" href="/factory-display/assets/css/section/header.css">
    <link rel="stylesheet" href="/factory-display/assets/css/scenes/view.css">
</head>
<body>
    <header></header>

    <?php 
        if ($handle = opendir('../../screens-side/screens/')) {

            while (false !== ($entryLink = readdir($handle))) {
        
                if ($entryLink != "." && $entryLink != "..") {
                    if ($entryLink == "cafeteria.html") {
                        $entry = "Cafétéria";
                    }
                    if ($entryLink == "locker-room.html") {
                        $entry = "Vestiaire";
                    }
                    echo "<div class='screen-container'>";
                    echo str_replace(".html","","<h1>$entry</h1>");
                    echo "<iframe src='../../screens-side/screens/$entryLink' frameborder='0'></iframe>";
                    echo "</div>";
                }
            }
            closedir($handle);
        }
    ?>

    <footer></footer>
</body>