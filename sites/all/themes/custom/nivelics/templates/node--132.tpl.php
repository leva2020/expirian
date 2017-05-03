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
        <div class="laminas-codigo">
            <?php
            $codigo = (isset($_POST["codigo"]))?$_POST["codigo"]:'';
            if($codigo != ''):
                $resultado = canjear_laminas_codigo($codigo);
                if($resultado):
                    print $resultado;
                else:
                    header('Location: /node/27');
                endif;
            endif;
            print '<h2>LÁMINA CON CÓDIGO</h2>';
            print '<form action="/node/132" method="post">';
            print '<p><span>Ingrese código de la lamina</span><input type="text" name="codigo"" /></p>';
            print '<input type="submit" class="btn-aceptar" value="Aceptar"/>';
            print '</form>';
          ?>
      </div>    
  </div> <!-- /.content -->
</article> <!-- /.node -->

