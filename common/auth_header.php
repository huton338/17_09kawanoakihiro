<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="index.php">データ登録</a></div>
    <?php if($_SESSION["kanri_flg"]==1){ ?>
    <div class="navbar-header"><a class="navbar-brand" href="user_select.php">管理者画面</a></div>
    <?php } ?>
  </nav>
</header>