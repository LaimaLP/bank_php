<?php

$menu = "   
<nav style='background-color: grey; padding: 10px;'>
  <ul style='display:flex; flex-direction:row; justify-content:center; gap:15px; list-style: none; margin: 0; padding: 0;'>
    <li>
      <a href='http://localhost/bank_php/index.php' style='text-decoration: none; color: white; font-weight: bold; padding: 5px 10px; border-radius: 5px; background-color: #333;'>
        Saskaitu sarasas
      </a>
    </li>
    <li>
      <a href='http://localhost/bank_php/newAccount.php' style='text-decoration: none; color: white; font-weight: bold; padding: 5px 10px; border-radius: 5px; background-color: #333;'>
        Prideti saskaita
      </a>
    </li>
  </ul>
</nav>";

function renderMenu()
{
    echo "   
     <nav>
    <ul>
        <li><a href='#'>Prideti lesu</a></li>
        <li><a href='#'>Nuskaiciuoti lesas</a></li>
    </ul>
</nav>";
}
