<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//crea_tabla();
acceso_usuario_registrado();

$var_lamina = '';

if(isset($_POST["receptor"]) && isset($_POST["laminas_rep"])):
    $receptor = $_POST["receptor"];
    $uid_receptor = $_POST['uid_user_receptor'];
    $laminas_rep = $_POST['laminas_rep']; 
    $lamina = $_POST['lamina_req'];
    $uid_user = $_POST['uid_user'];
    //print_r($laminas);
    //print 'tabla';
    $time_start = microtime(true);
    $registro_tran = 'reg_' . $uid_user . '_' . $time_start;
    insertar_notificacion($uid_receptor, 'Tiene una invitación de intercambio', $receptor, '2', $registro_tran, 0);
    insertar_registro_canje($uid_receptor, $laminas_rep, $lamina, $registro_tran);
endif;
/*
$result = db_select('canje_laminas', 'c')
        //->condition('nid', $user->uid, '=')
        ->fields('c')
        ->execute();
    echo '<pre>';
    //var_dump($result->fetchAssoc());
    echo '</pre>';
 while($record = $result->fetchAssoc()) {
     print ' id ' . $record["id_registro"] . ' ';
     print 'solicitante ' . $record["uid_user"] . ' receptor ' . $record["uid_receptor"];
     print ' lamina ' . $record["lamina"] . ' cambio por: ' . $record["laminas_rep"];
     print '</br>';
 }*/
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
            print t('Submitted by !username on !datetime',
              array('!username' => $name, '!datetime' => $date));
          ?>
        </p>
      <?php endif; ?>
    </header>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
      <div class="laminas-canje">
          <div class="buscar-laminas">
              <div class="imagen-filtro"><img src="/sites/all/themes/custom/nivelics/images/imagen-laminas-canjear.jpg"></div>
              <h2>Láminas por canjear</h2>
              <form action="/node/129" method="post">
                  <p>Búsqueda de láminas<input type="text" name="lamina" /></p>
                  <input type="submit" value="Buscar"/>
              </form>
          </div>
          <div class="resultados-busqueda">
              <?php
              if(isset($_POST["lamina"])):
                  $var_lamina = $_POST["lamina"];
                  print filtro_laminas_canje($var_lamina);
              endif;
              ?>
          </div>
      </div>    
  </div> <!-- /.content -->
</article> <!-- /.node -->

