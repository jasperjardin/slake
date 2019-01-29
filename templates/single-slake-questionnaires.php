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
<div class="cut cut-text img-parallax" data-speed="0.75">
  <h6>About <span>yourself</span></h6>
</div>

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
                <a class="nav-link" href="#">About yourself</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Design Brief</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Content</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Current website</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Final</a>
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
                  <div class="upform">
                    <form>
                      <div class="upform-main">
                        <header class="header-page input-block">
                          <div class="row">
                            <div class="col-md-6">
                              <h1 class="header-page-title-icon" title="slake"><img src="<?php echo esc_url( slake_get_public_images( 'logo-bd-color.svg' ) ); ?>" alt="slake"></h1>
                              <p><small>Visualiting your website <strong>ins’t easy</strong></small></p>
                            </div>
                          </div>
                        </header>
                        <!-- Q -->
                        <div class="input-block form-group">
                          <h3 class="form-title">We need to know a little bit about you and your business.</h3>
                          <div class="label"><strong>1 .</strong>What's your e-mail address? *</div>
                          <div class="input-control">
                            <input type="text" class="form-control required" autocomplete="off">
                          </div>
                        </div>
                        <!-- END Q -->
                        <!-- Q -->
                        <div class="input-block form-group">
                          <div class="label"><strong>2 .</strong>What's the name of your company?</div>
                          <div class="input-control">
                            <input type="text" class="form-control required" autocomplete="off">
                          </div>
                        </div>
                        <!-- END Q -->
                        <!-- Q -->
                        <div class="input-block form-group">
                          <div class="label"><strong>3 .</strong>What's the current or intended domain name for your website?</div>
                          <div class="input-control">
                            <input type="text" class="form-control required" autocomplete="off">
                          </div>
                        </div>
                        <!-- END Q -->
                        <!-- Q -->
                        <div class="input-block form-group">
                          <div class="label"><strong>4 .</strong>What does your company do? *</div>
                          <div class="input-control">
                            <input type="text" class="form-control required" autocomplete="off">
                          </div>
                        </div>
                        <!-- END Q -->

                        <!-- Q -->
                        <div class="input-block form-group">
                          <h3 class="form-title">Who is the main contact for this project and their role?</h3>
                          <div class="label"><strong>5 .</strong>Contact *</div>
                          <div class="input-control">
                            <input type="text" class="form-control required" autocomplete="off">
                          </div>
                        </div>
                        <!-- END Q -->
                        <!-- Q -->
                        <div class="input-block form-group">
                          <div class="label"><strong>6 .</strong>Position *</div>
                          <div class="input-control">
                            <input type="text" class="form-control required" autocomplete="off">
                          </div>
                        </div>
                        <!-- END Q -->

                        <!-- Q -->
                        <div class="input-block form-group">
                          <h3 class="form-title">Down to business...</h3>
                          <div class="label"><strong>7 .</strong>Are there any outside considerations that may affect the schedule?</div>
                          <div class="input-control">
                            <input id="toggle-on-q7" class="toggle toggle-left" name="q7" value="yes" type="radio">
                            <label for="toggle-on-q7" class="btn btn-q btn-q-y"><span>A</span> Yes</label>
                            <input id="toggle-off-q7" class="toggle toggle-right" name="q7" value="no" type="radio">
                            <label for="toggle-off-q7" class="btn btn-q btn-q-n"><span>B</span> No</label>
                          </div>
                        </div>
                        <!-- END Q -->
                        <!-- Q -->
                        <div class="input-block form-group">
                          <div class="label"><strong>8 .</strong>Do you have a specific budget already established for this project? *</div>
                          <div class="input-control">
                            <input id="toggle-on-q8" class="toggle toggle-left" name="q8" value="yes" type="radio">
                            <label for="toggle-on-q8" class="btn btn-q btn-q-y"><span>A</span> Yes</label>
                            <input id="toggle-off-q8" class="toggle toggle-right" name="q8" value="no" type="radio">
                            <label for="toggle-off-q8" class="btn btn-q btn-q-n"><span>B</span> No</label>
                          </div>
                        </div>
                        <!-- END Q -->
                        <!-- Q -->
                        <div class="input-block form-group">
                          <div class="label"><strong>9 .</strong>Would you like the project divided into phases to accommodate budget and timing constraints?</div>
                          <div class="input-control">
                            <input id="toggle-on-q9" class="toggle toggle-left" name="q9" value="yes" type="radio">
                            <label for="toggle-on-q9" class="btn btn-q btn-q-y"><span>A</span> Yes</label>
                            <input id="toggle-off-q9" class="toggle toggle-right" name="q9" value="no" type="radio">
                            <label for="toggle-off-q9" class="btn btn-q btn-q-n"><span>B</span> No</label>
                          </div>
                        </div>
                        <!-- END Q -->
                        <!-- Q -->
                        <div class="input-block form-group">
                            <div class="label"><strong>10 .</strong>What are your motivations?</div>
                            <div class="input-control">
                              <input type="text" class="form-control required" autocomplete="off">
                            </div>
                        </div>
                          <!-- END Q -->
                      </div>
                      <div class="upform-footer">
                        <blockquote>
                          <p>We would like to know the main reasons for commissioning a new website so that we can really understand the concept...</p>
                        </blockquote>
                        <div class="upform-buttons">
                            <button type="submit" class="btn btn-text btn-small btn-left"><i class="fas fa-chevron-left"></i> INTRODUCTION</button>
                            <button type="submit" class="btn btn-secondary btn-small btn-right">GO TO NEXT STEP <i class="fas fa-chevron-right"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
              </article>
            </section>
          </div>
        </main>
        <!-- END MAIN -->
      </div>

<?php
slake_get_template_part('bd-questionnaires-footer');
