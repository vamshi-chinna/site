<?php
require_once("../config/database.php");
require_once("../Public/header.php");

?>
 <section id="portfolio" class="section-bg">
    <div class="container" data-aos="fade-up">
       <header class="section-header">
           <h3 class="section-title">Our Projects</h3>
           <h6 class="text-center sub-text">Walk With Web Inc. is currently supporting the following research projects for its clients</h6>
      </header>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class=" col-lg-12 d-flex text-center justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*"  class="filter-active allcategory">All</li>
              <?php
                $stmt = $conn->query('SELECT DISTINCT `category_name` FROM project_category');
                while ($row = $stmt->fetch()) {
                echo ' <li class="text" data-filter=".filter-' . str_replace(' ', '', $row['category_name']) . '">' . $row['category_name'] . '</li>';
              }?>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container  justify-content-center text-center category" data-aos="fade-up" data-aos-delay="100" style="display:none;">
        <?php
        $team_q="select project_category.project_code, projects.project_code, project_category.category_name, projects.ID,projects.Img, projects.Title
                FROM projects, project_category
                WHERE projects.project_code=project_category.project_code
                ORDER BY projects.listorder";

        $stmt = $conn->query($team_q);
        $images = $stmt->fetchAll();

        foreach ($images as $key => $row) {

          echo '
          <div class="col-lg-4 col-md-6 p-3 text-center  portfolio-item filter-' . str_replace(' ', '', $row['category_name']) . '"  >
            <a  href="project-details.php?ProjectID='.$row['ID'].'">
            <div class="portfolio-wrap">
              <figure>
                <img src="' . $row['Img'] . '" class="img-fluid" alt="Project '.$row['Title'].'">
              </figure>
              <div class="portfolio-info">
                <h4> ' . $row['Title']. '</h4>
              </div>
            </div></a>
          </div>';
        }?>
      </div>

      <div class="row portfolio-container  justify-content-center text-center all" data-aos="fade-up" data-aos-delay="100" >
        <?php
        $team_q="select project_category.project_code, projects.project_code,  category_name, projects.ID,projects.Img,projects.Title, projects.Project_type  FROM projects,project_category where projects.project_code=project_category.project_code and projects.Project_type!=1  group by projects.project_code  ORDER BY projects.listorder";
        $stmt = $conn->query($team_q);
        $images = $stmt->fetchAll();

        foreach ($images as $key => $row) {
          echo '
          <div class="col-lg-4 col-md-6 p-3 mt-4 text-center  portfolio-item filter-' . str_replace(' ', '', $row['category_name']) . '"  >
            <a  href="project-details.php?ProjectID='.$row['ID'].'">
            <div class="portfolio-wrap">
              <figure>
                <img src="' . $row['Img'] . '" class="img-fluid" alt="Project '.$row['Title'].'">
              </figure>
              <div class="portfolio-info">
                <h4> ' . $row['Title'] . '</h4>
              </div>
            </div></a>
          </div>';
        } ?>
      </div>

      <!-- ======= For Collaborators Project ======= -->

      <div class="row justify-content-center text-center category"  style="display:none;">
          <header class="section-header">
           <h3 class="section-title mt-5">Collaborators' Projects</h3>
          </header>
      </div>

      <div class="row portfolio-container1  justify-content-center text-center category" data-aos="fade-up" data-aos-delay="100" style="display:none;">

        <?php
        $team_q="select project_category.project_code, projects.project_code, project_category.category_name, projects.ID,projects.Img, projects.Title, projects.Project_type, projects.link
                FROM projects, project_category
                WHERE projects.project_code=project_category.project_code and projects.Project_type!=0
                ORDER BY projects.listorder";
        $i=1;
        $stmt = $conn->query($team_q);
        $images = $stmt->fetchAll();
        foreach ($images as $key => $row) {
          echo '
          <div class="col-lg-4 col-md-6 p-3 mt-5  text-center  portfolio-item1 filter-' . str_replace(' ', '', $row['category_name']) . '"  >
            <a target="_blank" href="'.$row['link'].'">
            <div class="portfolio-wrap">
              <figure>
                <img src="' . $row['Img'] . '" class="img-fluid" alt="Project '.$row['Title'].'">
              </figure>
              <div class="portfolio-info">
                <h4> ' . $row['Title']. '</h4>
              </div>
            </div></a>
          </div>';

        }?>
      </div>


      <div class="row mt-5 justify-content-center text-center all">
          <header class="section-header">
           <h3 class="section-title">Collaborators' Projects</h3>
          </header>
      </div>
      <h4 class="mt-4" id="messageDisplay" style="display:none">No Result Found</h4>
      <div class="row portfolio-container1  justify-content-center text-center all" data-aos="fade-up" data-aos-delay="100" >

        <?php
        $team_q="select project_category.project_code, projects.project_code,  category_name, projects.ID,projects.Img,projects.Title,projects.link  FROM projects,project_category where projects.project_code=project_category.project_code and projects.Project_type!=0  group by projects.project_code  ORDER BY projects.listorder";
        $stmt = $conn->query($team_q);
        $images = $stmt->fetchAll();

        foreach ($images as $key => $row) {

          echo '
          <div class="col-lg-4 col-md-6 p-3 mt-5 text-center portfolio-item1 filter-' . str_replace(' ', '', $row['category_name']) . '"  >
            <a target="_blank" href="'.$row['link'].'">
            <div class="portfolio-wrap">
              <figure>
                <img src="' . $row['Img'] . '" class="img-fluid" alt="Project '.$row['Title'].'">
              </figure>
              <div class="portfolio-info">
                <h4> ' . $row['Title'] . '</h4>
              </div>
            </div></a>
          </div>';
        } ?>
      </div>
    </div>
  </div>
</div>
</section><!-- End Portfolio Section -->

<script type="text/javascript">
$('.text').on('click', function () {
  $('.category').show();
  $('.all').hide();
});
$('.allcategory').on('click', function () {
  $('.category').hide();
  $('.all').show();
});
</script>

<?php require_once("../Public/footer.php");?>
