<nav style='background-color: #191970; padding: 10px; color: white'>
  <ul style='display:flex; flex-direction:row; justify-content:center; gap:15px; list-style: none; margin: 0; padding: 0;'>
    <li>
      <a href='http://localhost/bank_php/read.php' class="btn btn-info">
        Accounts
      </a>
    </li>
    <?php   if (isset($_SESSION['login']) && $_SESSION['login'] == 'logIn') : ?>
    <li>
      <a href='http://localhost/bank_php/newAccount.php' class="btn btn-info">
        Add account
      </a>
    </li>

    <div style="margin-left: 150px; display:flex; flex-direction:row; gap:20px";>
      <span> <b>Banker name: </b> <?= $_SESSION['name'] ?> </span>
      <form action="http://localhost/bank_php/auth/logout.php" method="post">
        <button type="submit" class="btn btn-warning">Log Out</button>
      </form>
    </div>
    <?php endif ?>
    <?php   if (!isset($_SESSION['login'])) : ?>
      <form action="http://localhost/bank_php/auth/logout.php" method="post">
        <button type="submit" class="btn btn-warning">Log In</button>
      </form>
      <?php endif ?>

  </ul>
</nav>