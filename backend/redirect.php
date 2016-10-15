<?php
$page = "/index.html";
if (isset($_POST["userlat"]) && isset($_POST("userlong"))) {
    if(isset($_POST["helfen"])) {
        $page= "/helfen.php";
    } elseif(isset($_POST["benoetige"])) {
        $page = "";
    } else {
         header("Location: /index.html");
    }
}
 else {
    header("Location: /index.html");
}
?>
<form action='<?php echo $page; ?>' method='post' name="redirect" >
    <?php
        echo "<input type='hidden' name='userlat' value='".$_POST("userlat")."'>";
        echo "<input type='hidden' name='userlong' value='".$_POST("userlong")."'>";
    ?>
</form>
<script type="text/javascript">
    document.redirect.submit();
</script>