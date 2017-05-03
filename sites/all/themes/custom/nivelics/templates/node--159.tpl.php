<?php
    //print '<pre>'; var_dump($_SERVER); print '</pre>';
    $dia = date('l');
    $val = $_COOKIE['Drupal_visitor_val2'];
    $val0 = $_COOKIE['Drupal_visitor_val0'];

    
    if ($dia != 'Friday' || $val || !$val0):
        drupal_goto('<front>');
    endif;
    
    
    //print 'referer '.$referer;
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
        <div class="gol-de-oro">
            <div class="texto-gol">
                <h2>Gol de Oro</h2>
                <p>¿CÓMO ANOTAR?</p>
                <p>1. Escoja uno de los posibles jugadores que anotará el GOL de ORO y haga click sobre éste</p>
                <p>2. Gane 5 láminas escogiendo el jugador correcto</p>
            </div>
            <div class="juego-gol">
                <div id="cancha" class="cancha">
                    <span class="titulo-juego">GOL DE ORO</span>
                    <form id="gol-de-oro" action="gol-de-oro" method="post">
                        <div class="jugador-1">
                            <input type="radio" name="1" value="1"  />
                            <span class="jug-1">x</span>
                        </div>
                        <div class="jugador-2">
                            <input type="radio" name="1" value="2"  />
                            <span class="jug-1">x</span>
                        </div>
                        <div class="jugador-3">
                            <input type="radio" name="1" value="3" />
                            <span class="jug-1">x</span>
                        </div>
                        <div class="jugador-4">
                            <input type="radio" name="1" value="4" />
                            <span class="jug-1">x</span>
                        </div>
                        <div class="jugador-5">
                            <input type="radio" name="1" value="5"  />
                            <span class="jug-1">x</span>
                        </div>
                        <div class="jugador-6">
                            <input type="radio" name="1" value="6"  />
                            <span class="jug-1">x</span>
                        </div>
                        <div class="jugador-7">
                            <input type="radio" name="1" value="7" />
                            <span class="jug-1">x</span>
                        </div>
                        <div class="jugador-8">
                            <input type="radio" name="1" value="8" />
                            <span class="jug-1">x</span>
                        </div>
                    </form>
                    <div class="logo-boton">
                        <div class="balon-gol" id="patear-balon"></div>
                    </div>
                </div>
            </div>
            <script>
                jQuery('input[type=radio]').click(function() {
                    jQuery('#gol-de-oro').submit();
                });
                /*jQuery('#patear-balon').click(function() {
                 jQuery('#gol-de-oro').submit();
                 });*/
            </script>
        </div>    
    </div> <!-- /.content -->
</article> <!-- /.node -->

<?php
if (isset($_POST[1])):
    $jugador = (int) $_POST[1];
    $elegido = (int) rand(1, 8);
    if ($jugador == $elegido):
        $codigo = array('cod' => '1989');
        asociar_lamina_regalo_para_pegar(generar_lamina());
        asociar_lamina_regalo_para_pegar(generar_lamina());
        asociar_lamina_regalo_para_pegar(generar_lamina());
        asociar_lamina_regalo_para_pegar(generar_lamina());
        asociar_lamina_regalo_para_pegar(generar_lamina());
        drupal_goto('respuesta-gol-de-oro', array('query' => array('cod' => '1989')));
    else:
        $codigo = array('cod' => '1205');
        //$codigo = 'cod=1205';
        drupal_goto('respuesta-gol-de-oro', array('query' => array('cod' => '1205')));
    endif;
endif;
?>
