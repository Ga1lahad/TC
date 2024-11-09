<?php
$conn = new Conexao();
?>
<link rel="stylesheet" href="css/home.css">
<div id="destaques"
    style="background-image:url(https://i.pinimg.com/564x/e7/20/39/e72039e3d6de0692816dad4841f440f3.jpg);">
    <span class="bd-blur"></span>
    <div class="Banner">
        <img src="https://i.pinimg.com/564x/e7/20/39/e72039e3d6de0692816dad4841f440f3.jpg" alt="">
    </div>
</div>
<div id="filtro">
    <b>Filtros</b>
    <form action="">
        <p>Tipos de Serviços</p>
        <?php
        $tags = new Tag();
        $tags = $tags->readAll($conn->conectar());
        foreach ($tags as $tag) {
            // Cria as checkbox para os filtros de serviços
            echo "
            <div>
            <label for='" . $tag->id . "'>" . $tag->nome . "</label>
            <input type='checkbox' id='" . $tag->id . "' name='" . $tag->id . "'>
            </div>";
        }
        ?>
    </form>
</div>
<div id="lista">
    <?php require "cards.empresas.html" ?>
</div>