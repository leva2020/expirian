<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
acceso_usuario_registrado();
$var_lamina = '';
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
      <div class="solicitar-laminas">
          <?php
          //print 'solicitar laminas';
          if(isset($_POST["receptor"]) && isset($_POST["lamina"])):
                $receptor = $_POST["receptor"];
                $lamina = $_POST['lamina'];
                print solicitar_laminas($receptor, $lamina);
          endif;
          ?>
      </div>    
  </div> <!-- /.content -->
</article> <!-- /.node -->

