<?php
/**
 *
 *  @lucianodiisouza
 *
 */
function post_existe( $title, $content = '', $date = '', $type = '' ) {
    global $wpdb;

    $post_title   = wp_unslash( sanitize_post_field( 'post_title', $title, 0, 'db' ) );
    $post_content = wp_unslash( sanitize_post_field( 'post_content', $content, 0, 'db' ) );
    $post_date    = wp_unslash( sanitize_post_field( 'post_date', $date, 0, 'db' ) );
    $post_type    = wp_unslash( sanitize_post_field( 'post_type', $type, 0, 'db' ) );

    $query = "SELECT ID FROM $wpdb->posts WHERE 1=1";
    $args  = array();

    if ( ! empty( $date ) ) {
        $query .= ' AND post_date = %s';
        $args[] = $post_date;
    }

    if ( ! empty( $title ) ) {
        $query .= ' AND post_title = %s';
        $args[] = $post_title;
    }

    if ( ! empty( $content ) ) {
        $query .= ' AND post_content = %s';
        $args[] = $post_content;
    }

    if ( ! empty( $type ) ) {
        $query .= ' AND post_type = %s';
        $args[] = $post_type;
    }

    if ( ! empty( $args ) ) {
        return (int) $wpdb->get_var( $wpdb->prepare( $query, $args ) );
    }

    return 0;
}

$slices = json_decode(file_get_contents('http://colar.url.aqui/caminho.json'), true);

if ($slices) {
   foreach ($slices as $slice) {
       $conteudo = $slice[descricao];
       $idCurso = $slice[idcurso];
       $imagemIcone = $slice[imagemIcone];
       $titulo = $slice[nome];
       $precoBruto = $slice[precoBruto];
       $nomeLongo = $slice[nomeLongo];
       $codigo =  $slice[codigo];
       $linkVideo = $slice[linkVideo];
       $dataEstimadaProva  = $slice[dataEstimadaProva];
       $dataProva = $slice[dataProva];
       $dificuldade = $slice[dificuldade];
       $imagemTitulo = $slice[imagemTitulo];
       $materiais = $slice[materiais];

        $matPos = array_values($materiais);

       $meta0 = $matPos[0]['meta'];
       $meta1 = $matPos[1]['meta'];
       $meta2 = $matPos[2]['meta'];
       $meta3 = $matPos[3]['meta'];
       $meta4 = $matPos[4]['meta'];
       $meta5 = $matPos[5]['meta'];

       $material0 = $matPos[0]['nome'];
       $material1 = $matPos[1]['nome'];
       $material2 = $matPos[2]['nome'];
       $material3 = $matPos[3]['nome'];
       $material4 = $matPos[4]['nome'];
       $material5 = $matPos[5]['nome'];

        // echo $nomeLongo.' '.$meta0 .' '. $meta1.' '.$meta2.' '.$meta3.' '.$meta4.' '.$meta5;

    if( post_existe($nomeLongo, '', '', '')) {
      // código pra update do post
    }else{
      // Código para inserir um novo POST
      // Criar array com o conteúdo do post
      $my_post = array(
        'post_title'    => $nomeLongo,
        'post_content'  => $conteudo,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_category' => array($flags),
        'post_type'     => 'ConcursosDisponiveis',
        'linkVideo'     => $linkVideo,
        'cidadeEstado'  => 'Nulo',
        'imagem'        => $imagemTitulo,
      );

     // Inserir o conteúdo do array no DB e retornar o ID da ultima inserção
      $post_id = wp_insert_post( $my_post, true );
      if ($post_id!=0) {

        $videolink = $linkVideo;
        $cidade = 'Fortaleza';
        $banner = $imagemTitulo;
        $datadaProva = $dataProva;

        add_post_meta($post_id, 'linkVideo', $videolink );
        add_post_meta($post_id, 'cidadeEstado', $cidade );
        add_post_meta($post_id, 'linkImagem', $banner );
        add_post_meta($post_id, 'dataProva', $datadaProva );
        add_post_meta($post_id, 'precoBruto', $precoBruto );
        add_post_meta($post_id, 'linkEdital', $linkEdital);
        add_post_meta($post_id, 'materiais0', $material0);
        add_post_meta($post_id, 'materiais1', $material1);
        add_post_meta($post_id, 'materiais2', $material2);
        add_post_meta($post_id, 'materiais3', $material3);
        add_post_meta($post_id, 'materiais4', $material4);
        add_post_meta($post_id, 'materiais5', $material5);
      }
    }
  }
}

add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetch(){

   jQuery.ajax({
       url: '<?php echo admin_url('admin-ajax.php'); ?>',
       type: 'post',
       data: { action: 'data_fetch', keyword: jQuery('#inputFiltrarTitulo').val() },
       success: function(data) {
           jQuery('#datafetch').html( data );
           let $searchedValue = document.getElementById('inputFiltrarTitulo').value;
           console.log($searchedValue);
       }
   });
}
</script>

<?php
}

// Busca usando o liveAjax do WordPress
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

   $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['title'] ), 'post_type' => 'ConcursosDisponiveis' ) );
   if( $the_query->have_posts() ) :
       while( $the_query->have_posts() ): $the_query->the_post(); 
       $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
       ?>
           <div>
               <a href="<?php echo esc_url( post_permalink() ); ?>">
               <img src="<?php echo $featured_img_url ?>"/>
               <h2><?php the_title();?></h2>
                   <p>Cidade/Estado</p>
               </a>
           </div>

       <?php endwhile;
       wp_reset_postdata();  
   endif;

   die();
}

 ?>
<script>
    let $matAll = document.querySelectorAll('.elementor-clearfix');

    if($matAll[0].innerText == ''){
    document.getElementById('materialContainer01').style.display = 'none';
    }

    if($matAll[1].innerText == ''){
    document.getElementById('materialContainer02').style.display = 'none';
    }

    if($matAll[2].innerText == ''){
    document.getElementById('materialContainer03').style.display = 'none';
    }

    if($matAll[3].innerText == ''){
    document.getElementById('materialContainer04').style.display = 'none';
    }

    if($matAll[4].innerText == ''){
    document.getElementById('materialContainer05').style.display = 'none';
    }

    if($matAll[5].innerText == ''){
    document.getElementById('materialContainer06').style.display = 'none';
    }
</script>
 