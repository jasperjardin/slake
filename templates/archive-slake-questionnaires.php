<?php
/**
 * The template for displaying all single Questionnaires
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Slake
 * @subpackage Slake/templates
 * @since 1.0.0
 */

slake_get_template_part('bd-questionnaires-header');
?>

<div class="cut cut-01 img-parallax" data-speed="0.25"></div>
<div class="cut cut-02 img-parallax" data-speed="-0.75"></div>
<div class="cut cut-03 img-parallax" data-speed="0.50"></div>

    <!-- HEADER -->
    <header id="main-header">
        <nav class="navbar navbar-expand-lg fixed-top container">
          <a class="navbar-brand" href="#"><img src="<?php echo esc_url( slake_get_public_images( 'logo-bd-icon-color.svg' ) ); ?>"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <img src="<?php echo esc_url( slake_get_public_images( 'menu.svg' ) ); ?>">
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- HEADER - Naviation -->
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="#">Introduction <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">About yourself</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Design Brief</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Content</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Current website</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link disabled" href="#">Final</a>
              </li>
            </ul>
            <!-- END HEADER - Naviation -->
          </div>
        </nav>
    </header>
    <!-- END HEADER -->
      <div class="wrapper">
        <!-- MAIN -->
        <main role="main">
          <div class="container">
            <section>
              <article>
                <div class="up-content">
                  <header class="header-page input-block">
                    <div class="row">
                      <div class="col-md-6">
                        <h1 class="header-page-title-icon header-page-title-icon-max" title="slake"><img src="<?php echo esc_url( slake_get_public_images( 'logo-bd-color.svg' ) ); ?>" alt="slake"></h1>
                      </div>
                    </div>
                  </header>
                  <div class="row">
                    <div class="col-lg-5 col-md-6">
                      <h2 class="intro-title">Visualiting <br />your website <strong>ins’t easy</strong></h2>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <?php if ( have_posts() ) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class('archive'); ?>>
                                	<header class="entry-header archive">
                                        <a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php echo esc_attr( the_title() ); ?>">
                                            <?php the_title( '<h5 class="entry-title">', '</h5>' ); ?>
                                        </a>
                                	</header>
                                </article><!-- #post-## -->
                            <?php endwhile; ?>
						<?php endif; ?>
                    </div>


                  </div>
                </div>
              </article>
            </section>
          </div>
        </main>
        <!-- END MAIN -->
      </div>

<?php
slake_get_template_part('bd-questionnaires-footer');
