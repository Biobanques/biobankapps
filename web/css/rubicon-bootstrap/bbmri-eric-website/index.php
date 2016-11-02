<?php get_header(); ?>

	
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- section -->
		
    
    
    <!-- ----------------------- Dropdowns ---------------------------- -->
    <section class="dropdowns">
      <!-- Dropdown1 -->
      <div class="btn-group dropdown">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Countries
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Austria</a>
          <a class="dropdown-item" href="#">Belgium</a>
          <a class="dropdown-item" href="#">Cyprus</a>
          <a class="dropdown-item" href="#">Estonia</a>
        </div>
      </div>

      <br /><br />
      <!-- Dropdown1 -->
      <div class="btn-group dropdown menu">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Researcher
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Austria</a>
          <a class="dropdown-item" href="#">Belgium</a>
          <a class="dropdown-item" href="#">Cyprus</a>
          <a class="dropdown-item" href="#">Estonia</a>
        </div>
      </div>
       <div class="btn-group dropdown menu">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Industry
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Austria</a>
          <a class="dropdown-item" href="#">Belgium</a>
          <a class="dropdown-item" href="#">Cyprus</a>
          <a class="dropdown-item" href="#">Estonia</a>
        </div>
      </div>
       <div class="btn-group dropdown menu">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Patient
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Austria</a>
          <a class="dropdown-item" href="#">Belgium</a>
          <a class="dropdown-item" href="#">Cyprus</a>
          <a class="dropdown-item" href="#">Estonia</a>
        </div>
      </div>
    </section>
    
    
    <!-- -----------------------  Text/Image Layouts ---------------------------- -->
    
    <section class="layout">
      <!-- Layout 1 -->
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>SCIENTIFIC COLLABORATIONS</h1>
            <p>
              To date, BBMRI-ERIC has been awarded €7 million additional funds through participation in the 
              EU’s 7th Framework Programme and Horizon 2020.

              As its main goal, BBMRI-ERIC aims to improve the accessibility and
              interoperability of the existing comprehensive collections, 
              either population-based or clinical-oriented, of biological
              samples from different (sub)populations of Europe. With 18 Members 
              it is today a globally unmatched, Europe-wide platform for translational
              medical research with the aim to develop personalised medicine and disease
              prevention for the benefit of European citizens.

              Ultimately, the additional capital will help BBMRI-ERIC, its National Nodes and partners to achieve our goal for a healthier life
              </p>
          </div>
          <div class="col-md-6">
            <img src="<?php bloginfo('template_directory'); ?>/images/man-biobanks.jpg" alt="" />
          </div>
        </div>
      </div>

      <!-- Layout 2 -->
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="<?php bloginfo('template_directory'); ?>/images/hand-biobanks.jpg" alt="" />
          </div>
          <div class="col-md-6">
            <h4>BBMRI-ERIC DIRECTORY TO FIND YOUR BIOBANKS</h4>
            <p>
              The BBMRI-ERIC Directory is the first IT service
              delivered by BBMRI-ERIC.

              It is available both for external users and internal
              BBMRI-ERIC purposes. The first two versions of the
              Directory have been jointly developed by the
              BBMRI-ERIC IT community, prior to the start of the
              Common Service IT. The Directory 2.0, covering 515
              biobanks with more than 60,000,000 samples.
              </p>
          </div>
        </div>
      </div>
    </section>

    
    <!-- -----------------------  Cards  ---------------------------- -->
    
    <section class="cards">
      <div class="card">
        <img class="card-img-right" src="<?php bloginfo('template_directory'); ?>/images/hansson.jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="mailto:" title="">
            <img src="<?php bloginfo('template_directory'); ?>/images/mail-icon.png" alt="Mail" class="icon">
          </a>
        </div>
      </div>
    </section>



    <!-- -----------------------  Masonry ---------------------------- -->
    
    <section class="masonry-columns">
      <div class="card-columns">

        <div class="card">
          <a href="#" title="">
            <img class="card-img-top" src="<?php bloginfo('template_directory'); ?>/images/card1.jpg" alt="Card image cap">
          </a>
          <div class="card-block">
            <div class="card-category-info">
              <span class="card-category">News</span>
              <span class="card-date">September 29th, 2016</span>
            </div>
            <h4 class="card-title">JAN-ERIC LITTON ABOUT THE EUROPE BIOBANK WEEK 2016</h4>
            <p class="card-text">
              The recent Europe Biobank Week in Vienna Biobanking for Health Innovation” conference concluded as a big success for the
              biobanking community bringing togeth
              <a href="" title="">
               ...read more
              </a>
            </p>
          </div>
        </div>
        <div class="card card-block">
          <div class="card-category-info">
            <span class="card-category">News</span>
            <span class="card-date">September 29th, 2016</span>
          </div>
          <h4 class="card-title">JAN-ERIC LITTON ABOUT THE EUROPE BIOBANK WEEK 2016</h4>
          <p class="card-text">
            The recent Europe Biobank Week in Vienna Biobanking for Health Innovation” conference concluded as a big success for the
            biobanking community bringing togeth
            <a href="" title="">
               ...read more
              </a>
          </p>
        </div>
        <div class="card">
          <a href="#" title="">
            <img class="card-img-top" src="<?php bloginfo('template_directory'); ?>/images/card1.jpg" alt="Card image cap">
          </a>
          <div class="card-block">
            <div class="card-category-info">
              <span class="card-category">News</span>
              <span class="card-date">September 29th, 2016</span>
            </div>
            <h4 class="card-title">JAN-ERIC LITTON ABOUT THE EUROPE BIOBANK WEEK 2016</h4>
            <p class="card-text">
              The recent Europe Biobank Week in Vienna Biobanking for Health Innovation” conference concluded as a big success for the
              biobanking community bringing togeth
              <a href="" title="">
               ...read more
              </a>
            </p>
          </div>
        </div>
        <div class="card">
          <a href="#" title="">
            <img class="card-img-top" src="<?php bloginfo('template_directory'); ?>/images/card1.jpg" alt="Card image cap">
          </a>
          <div class="card-block">
            <div class="card-category-info">
              <span class="card-category">News</span>
              <span class="card-date">September 29th, 2016</span>
            </div>
            <h4 class="card-title">JAN-ERIC LITTON ABOUT THE EUROPE BIOBANK WEEK 2016</h4>
            <p class="card-text">
              The recent Europe Biobank Week in Vienna Biobanking for Health Innovation” conference concluded as a big success for the
              biobanking community bringing togeth
              <a href="" title="">
               ...read more
              </a>
            </p>
          </div>
        </div>
        <div class="card card-block">
          <div class="card-category-info">
            <span class="card-category">News</span>
            <span class="card-date">September 29th, 2016</span>
          </div>
          <h4 class="card-title">JAN-ERIC LITTON ABOUT THE EUROPE BIOBANK WEEK 2016</h4>
          <p class="card-text">
            The recent Europe Biobank Week in Vienna Biobanking for Health Innovation” conference concluded as a big success for the
            biobanking community bringing togeth
            <a href="" title="">
               ...read more
              </a>
          </p>
        </div>
        <div class="card card-block">
          <div class="card-category-info">
            <span class="card-category">News</span>
            <span class="card-date">September 29th, 2016</span>
          </div>
          <h4 class="card-title">JAN-ERIC LITTON ABOUT THE EUROPE BIOBANK WEEK 2016</h4>
          <p class="card-text">
            The recent Europe Biobank Week in Vienna Biobanking for Health Innovation” conference concluded as a big success for the
            biobanking community bringing togeth
            <a href="" title="">
               ...read more
              </a>
          </p>
        </div>
        <div class="card card-block">
          <div class="card-category-info">
            <span class="card-category">News</span>
            <span class="card-date">September 29th, 2016</span>
          </div>
          <h4 class="card-title">JAN-ERIC LITTON ABOUT THE EUROPE BIOBANK WEEK 2016</h4>
          <p class="card-text">
            The recent Europe Biobank Week in Vienna Biobanking for Health Innovation” conference concluded as a big success for the
            biobanking community bringing togeth
            <a href="" title="">
               ...read more
              </a>
          </p>
        </div>
      </div>
    </section>


    <!-- ----------------------- Forms ---------------------------- -->
    
    <form>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"></button>
          </span>
      </div>
      <br /><br />
      <div class="form-group">
        <select class="form-control" id="exampleSelect1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <br />
      <fieldset class="form-group">
        <legend>Radio buttons</legend>
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
            Option one is this and that&mdash;be sure to include why it's great
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
            Option two can be something else and selecting it will deselect option one
          </label>
        </div>
        <div class="form-check disabled">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
            Option three is disabled
          </label>
        </div>
      </fieldset>
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input">
          Check me out
        </label>
      </div>
    </form>

    <!-- -----------------------  Tables  ---------------------------- -->
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Country</th>
            <th>Name</th>
            <th>Type</th>
            <th>Diagnosis</th>
            <th>Number of Collections</th>
            <th>Size</th>
            <th>Juristic Person</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>IT</td>
            <td>Biobank Graz</td>
            <td>biobank</td>
            <td>icd</td>
            <td>1</td>
            <td>1x10</td>
            <td>Medical Universitiy</td>
          </tr>
          <tr>
            <td>IT</td>
            <td>Biobank Graz</td>
            <td>biobank</td>
            <td>icd</td>
            <td>1</td>
            <td>1x10</td>
            <td>Medical Universitiy</td>
          </tr>
          <tr>
            <td>IT</td>
            <td>Biobank Graz</td>
            <td>biobank</td>
            <td>icd</td>
            <td>1</td>
            <td>1x10</td>
            <td>Medical Universitiy</td>
          </tr>
          <tr>
            <td>IT</td>
            <td>Biobank Graz</td>
            <td>biobank</td>
            <td>icd</td>
            <td>1</td>
            <td>1x10</td>
            <td>Medical Universitiy</td>
          </tr>
          <tr>
            <td>IT</td>
            <td>Biobank Graz</td>
            <td>biobank</td>
            <td>icd</td>
            <td>1</td>
            <td>1x10</td>
            <td>Medical Universitiy</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- -----------------------  Accordion  ---------------------------- -->
    
    <div id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          WHAT CAN BBMRI-ERIC HELP WITH?
        </a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          We facilitate collaboration in a very competitive field of biomedical science. While the funding sources of biomedical science
          and its supportive elements (e.g., biobanks) are scarce and the competition is intense, BBMRI-ERIC builds services
          for the common needs of the research community. BBMRI-ERIC facilitates collaboration in many levels (e.g., IT,
          ELSI and Quality) for the benefit of the whole research community in Europe.
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
          <h4 class="panel-title">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          WHAT CAN BBMRI-ERIC HELP WITH?
        </a>
          </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
          We facilitate collaboration in a very competitive field of biomedical science. While the funding sources of biomedical science
          and its supportive elements (e.g., biobanks) are scarce and the competition is intense, BBMRI-ERIC builds services
          for the common needs of the research community. BBMRI-ERIC facilitates collaboration in many levels (e.g., IT,
          ELSI and Quality) for the benefit of the whole research community in Europe.
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
          <h4 class="panel-title">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          WHAT CAN BBMRI-ERIC HELP WITH?
        </a>
          </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          We facilitate collaboration in a very competitive field of biomedical science. While the funding sources of biomedical science
          and its supportive elements (e.g., biobanks) are scarce and the competition is intense, BBMRI-ERIC builds services
          for the common needs of the research community. BBMRI-ERIC facilitates collaboration in many levels (e.g., IT,
          ELSI and Quality) for the benefit of the whole research community in Europe.
        </div>
      </div>
    </div>
    
    
    
    
    
    
    
		<?php endwhile; ?>

		<?php else: ?>
      <section>
        <!-- article -->
        <article>

          <h2>Nothing found</h2>

        </article>
        <!-- /article -->
      </section>
		<?php endif; ?>

		
		<!-- /section -->

<?php get_footer(); ?>
