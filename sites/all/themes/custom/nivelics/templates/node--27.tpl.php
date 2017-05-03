<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
acceso_usuario_registrado();
$var_pegar = '';
$var_pegar = (isset($_GET["pegar"])) ? $_GET["pegar"] : '';
//$var_pegar = variable_get('pegar');
//echo 'funciona ' . $var_pegar;
if ($var_pegar == "pegar"):
    //echo 'ejecutar pegada ';
    asociar_lamina_usuario(listado_para_pagar());
//listado_para_pagar();
endif;
if (isset($_POST['rechazar'])) {
    $registro = $_POST['registro'];
    rechazar_canje($registro);
}

if (isset($_POST["laminas_rep"])):
    $laminas = $_POST["laminas_rep"];
    $user_solicitante = $_POST['user_solicitante'];
    $user = $_POST['user_id'];
    $registro = $_POST['registro'];
    $lamina = $_POST['lamina'];

    if (isset($_POST['aceptar'])):
        procesar_canje($laminas, $lamina, $user_solicitante, $user, $registro);
    elseif (isset($_POST['contra'])):
        contrapropuesta_canje($registro, $_POST);
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
                <a id="boton-album" class="boton-album" href="/album">Ir a <span>"Álbum"</span></a>
            </div>
            <div>
                <a id="boton-mis-laminas" class="boton-mis-laminas" href="/mis-laminas">Ir a <span>"Mis Láminas"</span></a>
            </div>
        </div>
        <div class="mis-laminas"><h2>Mis láminas</h2>
        <?php print laminas_para_pegar();?>
        </div>
        <div class="notificaciones">
            <h3>Notificaciones</h3>  
            <?php print consulta_notificaciones(); ?>
        </div>
        <div class="laminas-obtenidas">
            <div class="laminas-cajas">
                <?php
                for ($i = 1; $i < 97; $i++):
                    echo resumen_album($i);
                endfor;
                ?>
            </div>
            <div class="indicadores">
                <span class="obtenidas"></span><p>Láminas que tengo</p>
                <span class="faltantes"></span><p>Láminas que no tengo</p>
                <span class="repetidas"></span><p>Número de láminas repetidas</p>
            </div>
            <div class="botones">
                <a class="boton-canje-laminas" href="/node/129">Canje de Láminas</a>
                <a class="boton-pegar-laminas" href="/node/27?pegar=pegar" id="pegar_laminas">Pegar Láminas</a>
            </div>
        </div>
    </div> <!-- /.content -->
</article> <!-- /.node -->

