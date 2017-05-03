<?php
//$ganadas = array('22');
//asociar_lamina_para_pegar($ganadas);
//print 'asociando';
/*
global $user;
$us = user_load($user->uid);
$valor = '16-' . $user->uid . '-001';
laminas_intercambiar($valor);
echo "<pre>"; var_dump($us); echo "</pre>";
*/

//db_drop_table('canje_laminas');
//db_drop_table('notificaciones');
//db_drop_table('mensajes_alertas');
//crea_tabla();

//echo "insertado campo";
//crea_campo_nuevo();

//echo 'brrando';

acceso_usuario_registrado();

//generar_lamina();

drupal_add_js('/sites/all/themes/custom/nivelics/js/jcarousel.js');

$diagramacion = $node->field_diagramacion['und'][0]['value'];
$laminas = $node->field_laminas['und'];
$url_anterior = '';
$url_siguiente = '';
$titulo = '';
$lead = '';
$segunto_titulo = '';
if($node->field_anterior):
    $anterior = $node->field_anterior['und'][0]['nid'];
    $options = array('absolute' => TRUE);
    $url_anterior = url('node/' . $anterior, $options);
endif;
if($node->field_siguiente):
    $siguiente = $node->field_siguiente['und'][0]['nid'];
    $options = array('absolute' => TRUE);
    $url_siguiente = url('node/' . $siguiente, $options);
endif;
$titulo = $node->field_lead_pagina['und'][0]['value'];
$segundo_titulo = '';
if($node->field_lead_pagina):
    $segundo_titulo = $node->field_lead_pagina['und'][1]['value'];
endif;
$lead = '';
if($node->field_lead_pagina):
    $lead = $node->field_lead_pagina['und'][2]['value'];
endif;
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> diagramacion_<?php print $diagramacion; ?> clearfix"<?php print $attributes; ?>>

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
      <?php if($node->nid==128):?>
          <div class="portada">
              <img src="/sites/all/themes/custom/nivelics/images/portada-album.jpg">
          </div>
      <?php else:?>
          <?php if($node->nid==112 || $node->nid==117 || $node->nid==119 || $node->nid==118):?>
          <div class="titulos-album">
              <?php if($titulo != 'null'):?><h2><?php print $titulo; ?></h2><?php endif; ?>
          </div>
          <div class="titulos-album-2">
              <?php if($segundo_titulo != 'null'):?><h2><?php print $segundo_titulo; ?></h2><?php endif; ?>
              <?php if($lead != 'null'):?><p><?php print $lead; ?></p><?php endif;?>
          </div>
          <?php else:?>
          <div class="titulos-album">
              <?php if($titulo != 'null'):?><h2><?php print $titulo; ?></h2><?php endif; ?>
              <?php if($lead != 'null'):?><p><?php print $lead; ?></p><?php endif;?>
              <?php if($segundo_titulo != 'null'):?><h2><?php print $segundo_titulo; ?></h2><?php endif; ?>
          </div>
          <?php endif;?>
          <?php if($node->nid==118): ?>
              <div class="titulos-album-3">
                  <h2>Digital Services: Soluciones de investigación con inteligencia</h2>
              </div>
          <?php endif;?>
          <?php
              $texto_lamina = '';
              $i = 0;
              foreach($laminas as $mona):
                $url_lamina = file_create_url($mona['node']->field_imagen['und'][0]['uri']);
                $id_lamina = $mona['nid'];
                $texto_lamina = '';
                if($mona['node']->body):
                    $texto_lamina = $mona['node']->body['und'][0]['value'];
                endif;
                $clase = laminas_album_pinta($id_lamina);
                if(($i==0 || $i==4 ) && $node->nid==114):
                    print '<div>';
                endif;
                ?>
                    <div class="<?php print $clase; ?>" id="lamina_<?php print $id_lamina; ?>">
                        <div>
                            <img src="<?php print $url_lamina?>"/>
                        </div>
                        <?php if($texto_lamina):?>
                            <?php if($id_lamina == 89 || $id_lamina == 91 || $id_lamina == 98 || $id_lamina == 107):?>
                                <?php print $texto_lamina; ?>
                            <?php else:?>
                                <p><?php print $texto_lamina; ?></p>
                            <?php endif;?>
                        <?php endif;?>
                    </div>
                <?php
                if(($i==3 || $i==7 ) && $node->nid==114):
                    print '</div>';
                endif;
                $i++;
            endforeach;
      endif;?>
  </div> <!-- /.content -->
  <?php if($url_anterior):?>
      <span class="anterior"><a href="<?php echo $url_anterior?>"><</a></span>
  <?php endif;?>
  <?php if($url_siguiente):?>
      <span class="siguiente"><a href="<?php echo $url_siguiente?>">></a></span>
  <?php endif;?>
  
  <a class="prev"><</a>
  <a class="next">></a>
  <div class="navega_album">
    <ul>
        <li><a href="/node/19">Qué es Experian</a></li>
        <li><a href="/node/20">Unidades de Negocio</a></li>
        <li><a href="/node/109">¿Qué hacemos por nuestros clientes?</a></li>
        <li><a href="/node/110">¿Por qué somos mejores?</a></li>
        <li><a href="/node/111">LATAM</a></li>
        <li><a href="/node/112">Credit Services (CS)</a></li>
        <li><a href="/node/113">¿Por qué somos mejores?</a></li>
        <li><a href="/node/114">Productos DataCrédito Experian</a></li>
        <li><a href="/node/117">Decisión Analytics (DA)</a></li>
        <li><a href="/node/118">Marketing Services (MS)</a></li>
        <li><a href="/node/119">Consumer Services (ECS)</a></li>
        <li><a href="/node/119">Productos MidataCrédito</a></li>
        <li><a href="/node/127">Premios</a></li>
    </ul>
  </div>
</article> <!-- /.node -->
<script>
    jQuery(".navega_album").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
        visible: 2,
    });
</script>