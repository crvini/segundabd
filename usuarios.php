<?php
/**
 *  template name: Pruebas de usuarios
 *
 * 
 */

get_header();
?>

<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

            get_template_part( 'template-parts/entry-header');
            
            if(!is_search()){
                get_template_part('template-parts/featured-image');
            }
        $cu = wp_get_current_user();
        $cc = $cu->user_login;
        $mydb = new wpdb('root','','pruebas','localhost');
        $rows = $mydb->get_results("select nombre, apellido, email, cel from usuarios where ID = '$cc'");
        foreach($rows as $obj) :
	

	?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="">
                <fieldset>
                <legend class="tex-center header">Perfil de usuarios</legend>
                <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="name" type="text" placeholder="<?php echo $obj->nombre; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="lname" name="apellido" type="text" placeholder="<?php echo $obj->apellido; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="<?php echo $obj->email;?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" placeholder="<?php echo $obj->cel; ?>" class="form-control">
                            </div>

                
                </fieldset>
                
                </form>
            </div>

        </div>
    
    </div>

</main><!-- #site-content -->

<?php 
endforeach;

}
}
get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>