<?php
if (isset($_GET['cod'])):
    $codigo = (int) $_GET['cod'];
    if($codigo == 1989):
        $resultado = 'correcto';
    elseif($codigo == 1205):
        $resultado = 'falso';
    endif;
endif;

?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <?php if ($user_picture || !$page || $display_submitted): ?>
        <header>
            <?php print $user_picture; ?>

            <?php print render($title_prefix); ?>
            <?php if (!$page): ?>
                <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
            <?php endif; ?>
            <?php print render($title_suffix); ?>

            <?php if ($display_submitted): ?>
                <p class="submitted">
                    <?php
                    print t('Submitted by !username on !datetime', array('!username' => $name, '!datetime' => $date));
                    ?>
                </p>
            <?php endif; ?>
        </header>
    <?php endif; ?>

    <div class="content"<?php print $content_attributes; ?>>
        <div class="botones-album">
            <div>
                <a class="boton-album" href="/album">Ir a <span>"Álbum"</span></a>
            </div>
            <div>
                <a class="boton-mis-laminas" href="/mis-laminas">Ir a <span>"Mis Láminas"</span></a>
            </div>
        </div>
        <div class="prepare-cambios">
            <div class="texto-penalty">
                <h2>Prepare sus cambios</h2>
                <p>¿CÓMO ANOTAR?</p>
				<p>1. Escoja una de las opciones de cambio y haga click sobre esta</p>
				<p>2. Gane 5 láminas por seleccionar la opción de cambio correcta</p>
            </div>
            <div class="juego-gol">
                <div id="cancha" class="cancha">
                    <?php if($resultado == 'correcto'):?>
                        <div class="correcto"><div class="mensaje"></div><a href="mis-laminas">Ir a "Mis Láminas"</a></div>
                    <?php elseif($resultado == 'falso'):?>
                        <div class="incorrecto"><div class="mensaje"></div><a href="mis-laminas">Ir a "Mis Láminas"</a></div>
                    <?php endif;?>
                </div>
            </div>
        </div>    
    </div> <!-- /.content -->
</article> <!-- /.node -->