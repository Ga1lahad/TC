<?php
echo '<iframe
        width=250px"
        height="150px"
        style="border:0"
        loading="lazy"
        allowfullscreen
        referrerpolicy="no-referrer-when-downgrade"
        src="https://www.google.com/maps/embed/v1/place?key=' . $_ENV["maps"] . '
          &q=' . $empresa->endereco["rua"] . ",+" . $empresa->endereco["numero"] . "+" . $empresa->endereco["cidade"] . "+" . $empresa->endereco["uf"] . '">
      </iframe>';
