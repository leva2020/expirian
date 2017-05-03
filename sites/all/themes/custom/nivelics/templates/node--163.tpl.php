<?php
    //print '<pre>'; var_dump($_SERVER); print '</pre>';
    $dia = date('l');
    $val = $_COOKIE['Drupal_visitor_val2'];
    
    if ($dia != 'Wednesday' || $val):
        drupal_goto('<front>');
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
                <a id="boton-pregunta" class="boton-album" href="/trivia">Ir a <span>"PREGUNTA GANADORA"</span></a>
            </div>
            <div>
                <a id="boton-referidos" class="boton-mis-laminas" href="/referidos">Ir a <span>"REFERIDOS"</span></a>
            </div>
            <div>
                <a id="boton-canje" class="boton-mis-laminas" href="/canje">Ir a <span>"¡CANJE!"</span></a>
            </div>
        </div>
        <div class="prepare-cambios">
            <div class="texto-cambios">
                <h2>Prepare sus cambios</h2>
                <p>¿CÓMO ANOTAR?</p>
				<p>1. Escoja una de las opciones de cambio y haga click sobre esta</p>
				<p>2. Gane 5 láminas por seleccionar la opción de cambio correcta</p>
            </div>
            <div class="juego-gol">
                <div id="cancha" class="cancha">
                    <span class="titulo-juego">PENALTY</span>
                    <form id="cambios" action="prepare-cambios" method="post">
                        <input type="radio" name="1" value="1"  />
                        <input type="radio" name="1" value="2"  />
                        <input type="radio" name="1" value="3" />
                        <input type="radio" name="1" value="4" />
                        <input type="radio" name="1" value="5"  />
                        <input type="radio" name="1" value="6"  />
                        <input type="radio" name="1" value="7" />
                        <input type="radio" name="1" value="8" />
                        <input type="radio" name="1" value="9" />
                        <input type="radio" name="1" value="10" />
                        <input type="radio" name="1" value="11" />
                    </form>
                    <span class="jug-1">x</span>
                    <div class="logo-boton">
                        <div class="balon-gol" id="patear-balon"></div>
                    </div>
                </div>
            </div>
            <script>
                jQuery('input[type=radio]').click(function() {
                    jQuery('#cambios').submit();
                });
                /*
                jQuery('#patear-balon').click(function() {
                    jQuery('#cambios').submit();
                });
                */
            </script>
        </div>    
    </div> <!-- /.content -->
</article> <!-- /.node -->

<?php
if (isset($_POST[1])):
    $jugador = (int) $_POST[1];
    $elegido = (int) rand(1, 8);
    if($jugador == $elegido):
        $codigo = array('cod' => '1989');
        asociar_lamina_regalo_para_pegar(generar_lamina());
		asociar_lamina_regalo_para_pegar(generar_lamina());
		asociar_lamina_regalo_para_pegar(generar_lamina());
		asociar_lamina_regalo_para_pegar(generar_lamina());
		asociar_lamina_regalo_para_pegar(generar_lamina());
        drupal_goto('respuesta-prepare-cambios',array('query' => array('cod' => '1989')));
    else:
        $codigo = array('cod' => '1205');
        //$codigo = 'cod=1205';
        drupal_goto('respuesta-prepare-cambios',array('query' => array('cod' => '1205')));
    endif;
endif;
?>