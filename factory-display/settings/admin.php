<?php 
// ADMINISTRATION PAGE

// Check if the user is logged in
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "admin") {
        $authorize = true;
    } else {
        $authorize = false;
        
    }
} else {
    $error[] = "Vous n'êtes pas autorisé à accéder à cette page.";
}
?>

<?php if ($authorize) { ?>
    <div class="leftside-admin-container" onclick=openAdmin()>
        <div class="leftside-text">
            <h2 class="title"> Administration</h2>
        </div>
        <div class="leftside-icons">
            <i class="fa-solid fa-tools"></i>
        </div>
    </div>
    <hr class="solid">
<?php } ?>