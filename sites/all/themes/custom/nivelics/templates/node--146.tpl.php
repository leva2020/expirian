<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
acceso_usuario_registrado();
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
      <div class="bienvenida">
          <h2>¡Felicitaciones!</h2>
          <h2>¡Usted ya es parte del mejor equipo!</h2>
          <h3>¡Ha ganado sus primeras 3 láminas!</h3>
          <p>Para asegurar que nuestras comunicaciones lleguen a su bandeja de entrada, incluya nuestra dirección electrónica en sus contactos</p>
          <a class="ingresar" href="/node/27">Ingresar</a>
      </div>    
  </div> <!-- /.content -->
</article> <!-- /.node -->

