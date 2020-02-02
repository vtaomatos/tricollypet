<?php
function gera_menu($parametros=array()) {
?>

<div id="menu-interno" class="">
<?php
    foreach ($parametros as $indice => $botao) {    
        if (!empty($botao['novo'])) {
            $novoLink = !empty($botao['novoLink']) ? $botao['novoLink'] : "";
            $novoText = !empty($botao['novoText']) ? $botao['novoText'] : "Novo";
            ?>
            <a class="btn btn-success" href="<?php echo $novoLink; ?>"><?php echo $novoText; ?></a>
            <?php
        }
        if (!empty($botao['list'])) {
            $listText = !empty($botao['listText']) ? $botao['listText'] : "Selecione";
            ?>
            <button type="button" class="btn btn-light toggle" toggle="filhos-toggle-<?php echo $indice; ?>">V <?php echo $listText; ?></button>
            <ul id="filhos-toggle-<?php echo $indice; ?>" class="invisivel list">
            <?php
            foreach ($botao['listFilhos'] as $filho) {
                $text = !empty($filho['text']) ? $filho['text'] : "";
                $link = !empty($filho['link']) ? $filho['link'] : "";
            ?>
            <li class="list-item" onclick="window.location.href='<?php echo $link; ?>'"><span class="glyphicon glyphicon-chevron-right"></span><?php echo $text; ?></li>
            <?php
            }
            ?>
            </ul>
            <?php
        }
        if (!empty($botao['text']) || !empty($botao['link'])) {
            $link = !empty($botao['link']) ? $botao['link'] : "";
            $text = !empty($botao['text']) ? $botao['text'] : "";
            ?>
            <a class="btn btn-light" href="<?php echo $link; ?>"><?php echo $text; ?></a>
            <?php
        }
    }
?>
</div>

<?php
}
?>