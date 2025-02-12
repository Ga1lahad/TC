<div id="destaques"
    style="background-image:url(/imgs/homebanner.png)">
    <span class="bd-blur"></span>
    <div class="Banner">
        <img src="/imgs/homebanner.png" alt="">
    </div>
</div>
<!-- <div id="filtro">
    <b>Filtros</b>
    <form action="">
        <p>Tipos de Serviços</p>
        <?php
        // foreach ($categorias as $categoria) {
        //     // Cria as checkbox para os filtros de serviços
        //     echo "
        // <div>
        //     <label for='" . $categoria->id . "'>" . $categoria->nome . "</label>
        //     <input type='checkbox' id='" . $categoria->id . "' name='" . $categoria->id . "'>
        // </div>";
        // }
        ?>
    </form>
</div> -->
<br>
<div id="lista">
    <?php
    foreach ($lista as $empresa) {
        echo "<br>";
        require "components/cards.empresas.php";
    } ?>
</div>