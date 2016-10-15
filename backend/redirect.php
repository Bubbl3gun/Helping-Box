<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$page = "/index.html";
if (isset($_POST["userlat"]) && isset($_POST("userlong"))) {
    if(isset($_POST["helfen"])) {
        $page= "../Frontend/helfen.php";
    } elseif(isset($_POST["orga"])) {
        $page = "../Frontend/orga.php";
    } else {
         header("Location: ../Frontend/index.html");
    }
}
 else {
    header("Location: ../Frontend/index.html");
}
?>
<form action='<?php echo $page; ?>' method='get' id="redirect" >
    <?php
        echo "<input type='hidden' name='userlat' value='".$_POST("userlat")."'>";
        echo "<input type='hidden' name='userlong' value='".$_POST("userlong")."'>";
    ?>
</form>
<script type="text/javascript">
    $("#redirect").submit();
</script>