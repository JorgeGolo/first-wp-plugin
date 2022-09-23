<?php
/**
* Plugin Name: simple-plugin
* Plugin URI: https://www.likonet.es/
* Description: Prueba de acceso 1.
* Version: 0.1
* Author: Jorge GL
* Author URI: https://www.likonet.es/
**/

add_filter( 'the_title', 'simpleplugin_nuevo_title');

function simpleplugin_nuevo_title( $title) {
  $title = $title.' Flat_101';
  return $title;
}

add_action('wp_head', 'addmetaogimage');


function addmetaogimage()
{
    if (is_single()) {
          
        if ( has_post_thumbnail() )
        {
            $idimagen = get_post_thumbnail_id($post->ID);
            
            $featuredimagen = wp_get_attachment_image_src($idimagen);
            
            echo '<meta property="og:image" content="'.$featuredimagen[0].'"/>';
            
        } 
    
}


function addmetaogimagepruebas()
{
    // si es una página de post
    if (is_single()) {
        // echo " Esto es un post";
        
        // si tiene imagen destacada asociada
        // aquí puedo plantear otra validación, con get_post_thumbnail_id
        // que sería 0 si no tuviera imagen descatada,
        // o null si no fuera un post (¿)
        
        
        if (has_post_thumbnail()) {
            // echo "Este post tiene imagen destacada";
            
            // aquí obtenemos la id de la imagen destacada del post mediante la id del post
            $idimagen = get_post_thumbnail_id($post->ID);
                        
            // si no le paso otro parámetro, la imagen obtenida es la imagen destacada
            // admite varios parámetros, por defecto thumbnail: 
            // https://developer.wordpress.org/reference/functions/wp_get_attachment_image_src/
            
            $featuredimagen = wp_get_attachment_image_src($idimagen);
            
            // la función devuelve un array, cuyo primer elemento es la url
            // echo $featuredimagen[0];
            
            echo '<meta property="og:image" content="'.$featuredimagen[0].'"/>';
            
        } else {
            
            // echo "Este post no tiene imagen destacada";
            
        }
        
    } else {
        
        // echo "no es un post";
        
    }
    
}