<?php
require_once("../config/database.php");
require_once("../Public/header.php");
?>

<section id="inventory">
  <div class="container" data-aos="fade-up">
    <header class="section-header">
      <h3 style="margin-bottom: 30px;">Digital Humanities List
        on
        Slavery and African Diaspora</h3>
    </header>

    <p class="inventoryP">Welcome to the “Digital Humanities List on Slavery and African
      Diaspora,” which is devoted to
      delving into
      slavery-related materials across various eras. Our database is a meticulous compilation housed within an Excel
      document, encompassing diverse websites and databases curated by experts in digital humanities. It contains a
      comprehensive array of primary documents, scholarly works, images, and additional resources.
      <br><br>
      Encompassing different cultures, geographies, and historical timelines, these materials are cataloged and
      organized, providing researchers, educators, and enthusiasts unparalleled access to invaluable information. This
      Excel-based repository facilitates exploration, enabling a deeper understanding of the multifaceted narratives
      surrounding slavery.
      <br><br>
      Our commitment lies in preserving and exploring the intricate facets of slavery's history, shedding light on often
      overlooked perspectives. We aspire to facilitate a deeper understanding of this crucial aspect of human history.
      As proponents of knowledge dissemination and academic inquiry, we warmly invite you to navigate this extensive
      database, embarking on a journey of discovery, contemplation, and learning.
    </p>

    <div id="bottom" class="back-to-bottom d-flex align-items-center justify-content-center" title="scroll to bottom">
      <span class="learn-more-text">Click To Learn More</span>
    </div>

    <div class="row justify-content-center text-center pb-5">
      <div class="col-lg-12 col-md-12 col-sm-12 mt-5 text-center" data-aos="fade-up" data-aos-delay="100">
        <input type="text" class="form-control" placeholder="Search for titles, descriptions, key words..."
          name="search_key" id="myInput" style="height: calc(1.7em + 1rem + 2px);
                   padding: 0.5rem 1rem;
                   font-size: 1.25rem;
                   line-height: 1.5;
                   border-radius: 0.3rem;
                   border: 2px solid #007BFF;
                   color: #007BFF;">
      </div>
    </div>

    <!-- <div class="accordion" id="accordionExample">
      <?php
      $sql = "SELECT * FROM dh_projects where Title!='' ORDER BY Title ASC";
      $query = $conn->query($sql);
      $index = 1;

      while ($forms = $query->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading<?php echo $index; ?>">
            <button class="accordion-button" style="font-weight: bold;" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false"
              aria-controls="collapse<?php echo $index; ?>">
              <?php echo htmlspecialchars_decode(nl2br($forms['Title'])); ?>
              <i class="fas fa-plus" id="icon<?php echo $index; ?>"></i>
            </button>
          </h2>
          <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse"
            aria-labelledby="heading<?php echo $index; ?>">
            <div class="accordion-body">
              <?php
              echo '<div class="row">';
              echo '<div class="col-6 align-self-start">';
              echo '<div class="row">';
              echo '<div class="col" style="margin-bottom: -15px;">';
              echo '<p class="column-value" style="margin-top: 0;">' . htmlspecialchars_decode(nl2br($forms['Description'])) . '</p>';
              echo '</div>';
              echo '<div class="w-100"></div>';
              echo '<div class="col d-flex ">';
              echo '<a d-flex align-items-center justify-content-center target="blank_" href="' . htmlspecialchars_decode(nl2br($forms['URL'])) . '" class="learn-more-btn"> Visit Site </a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<div class="col-6">';
              // Loop through all columns dynamically
              foreach ($forms as $columnName => $columnValue) {
                // Skip certain columns
                if ($columnName == 'ID' || $columnName == 'URL' || $columnName == 'Title' || $columnName == 'Display' || $columnName == 'Status' || $columnName == 'Date_of_Access' || $columnName == 'Description') {
                  continue;
                }

                // formatting headings and values
                $formattedColumnName = str_replace('_', ' ', $columnName);
                $formattedColumnValue = str_replace(';', ',', $columnValue);

                // Display column title and content
                ?>
                <strong class="column-value" style="font-weight: bold;">
                  <?php echo htmlspecialchars_decode(nl2br($formattedColumnName)); ?>:
                </strong>
                <span class="column-value">
                  <?php
                  if (empty($formattedColumnValue)) {
                    echo "Unavailable";
                  } else if ($formattedColumnName == 'URL') {
                    echo '<a target="_blank" href="' . htmlspecialchars_decode(nl2br($formattedColumnValue)) . '">' . htmlspecialchars_decode(nl2br($formattedColumnValue)) . '</a>';
                  } else
                    echo htmlspecialchars_decode(nl2br($formattedColumnValue)); ?>
                </span><br>
                <?php
              }
              echo '</div>';
              echo '</div>';
              ?>
            </div>
          </div>
        </div>
        <?php
        $index++;
      }
      ?>
    </div> -->

    <div class="accordion" id="accordionExample">
      <?php
      $sql = "SELECT * FROM dh_projects where Title!='' ORDER BY Title ASC";
      $query = $conn->query($sql);
      $index = 1;

      while ($forms = $query->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading<?php echo $index; ?>">
            <button class="accordion-button" style="font-weight: bold;" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false"
              aria-controls="collapse<?php echo $index; ?>">
              <?php echo htmlspecialchars_decode(nl2br($forms['Title'])); ?>
              <i class="fas fa-plus" id="icon<?php echo $index; ?>"></i>
            </button>
          </h2>
          <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse"
            aria-labelledby="heading<?php echo $index; ?>">
            <div class="accordion-body">
              <div class="row">
                <div class="col-6 align-self-start">
                  <div class="row">
                    <div class="col" style="margin-bottom: -15px;">
                      <p class="column-value" style="margin-top: 0;">
                        <?php echo htmlspecialchars_decode(nl2br($forms['Description'])); ?>
                      </p>
                    </div>
                    <div class="w-100"></div>
                    <div class="col d-flex ">
                      <a d-flex align-items-center justify-content-center target="blank_"
                        href="<?php echo htmlspecialchars_decode(nl2br($forms['URL'])); ?>" class="learn-more-btn"> Visit
                        Site </a>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <?php
                  // Loop through all columns dynamically
                  foreach ($forms as $columnName => $columnValue) {
                    // Skip certain columns
                    if ($columnName == 'ID' || $columnName == 'URL' || $columnName == 'Title' || $columnName == 'Display' || $columnName == 'Status' || $columnName == 'Date_of_Access' || $columnName == 'Description') {
                      continue;
                    }

                    // formatting headings and values
                    $formattedColumnName = str_replace('_', ' ', $columnName);
                    $formattedColumnValue = str_replace(';', ',', $columnValue);

                    // Display column title and content
                    ?>
                    <strong class="column-value" style="font-weight: bold;">
                      <?php echo htmlspecialchars_decode(nl2br($formattedColumnName)); ?>:
                    </strong>
                    <span class="column-value">
                      <?php
                      if (empty($formattedColumnValue)) {
                        echo "Unavailable";
                      } else if ($formattedColumnName == 'URL') {
                        echo '<a target="_blank" href="' . htmlspecialchars_decode(nl2br($formattedColumnValue)) . '">' . htmlspecialchars_decode(nl2br($formattedColumnValue)) . '</a>';
                      } else
                        echo htmlspecialchars_decode(nl2br($formattedColumnValue)); ?>
                    </span><br>
                    <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        $index++;
      }
      ?>
    </div>


    <div class="row" id="bestPracticesSection">
      <div class="col">
        <h2 class="section-title pt-5 pb-3">Best Practices<h2>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <p class="inventoryP">Walk With Web Inc. has developed the Digital Humanities List on Slavery and African
          Diaspora, an open-source, database-driven repository hosted on Excel. This repository adheres to established
          Best Practices refined during the website's creation process.
          <br><br>
          Websites have been confirmed on the date indicated and have been overseen by Distinguished Research Professor
          Paul E. Lovejoy. All sources integrated into the Excel-based repository are meticulously referenced with their
          respective URLs. Moreover, each source included in this repository is optimized for web accessibility and
          appropriately acknowledges the project directors and contributors.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <h2 class="section-title pt-3 pb-3">Acknowledgements<h2>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <p class="inventoryP">We extend our heartfelt appreciation and gratitude to the following individuals whose
          contributions were invaluable in the development and maintenance of this database:
          <br><br>
          Paul Lovejoy – Project Director
          <br>
          Leidy Alpízar – Coordinator
          <br>
          Naomi Ihejiahi – Research Assistant
          <br>
          Maria Yala - Lead Web Developer
          <br>
          Dvir Malka - Web Developer
          <br><br>
          We would like to express our special thanks to Kartikay Chadha for his continuous guidance and feedback
          throughout the creation of this database.
          <br>
          This website builds on the previous work of Klara Boyer-Rossol, whose preliminary listing is featured on
          <a target="_blank" href="https://www.dependency.uni-bonn.de/en/research/slavery-digital-humanities">University
            of Bonn’s Center for Dependency and Slavery Studies.</a>
          Additionally, we acknowledge the sources and references that have been instrumental in providing information
          and content for the database. We would also like to thank York University for their support.

        </p>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <h2 class="section-date pt-3 pb-3">Last Edited On January 20th, 2024<h2>
      </div>
    </div>

  </div>
</section>
<!-- End Forms Section -->

<script>
  $(document).ready(function () {
    $("#myInput").on("keyup", function () {
      var value = $(this).val().toLowerCase();

      $(".accordion-item").each(function () {
        var button = $(this).find('.accordion-button');
        var buttonText = button.text().toLowerCase();
        var descriptionText = $(this).find('.accordion-body').text().toLowerCase();

        // Check if the value is present in either button text or description
        var isMatch = buttonText.indexOf(value) > -1 || descriptionText.indexOf(value) > -1;

        $(this).toggle(isMatch);
      });

      // Check for the number of visible items & show/hide "No Record Found" message
      var visibleItems = $(".accordion-item:visible");
      if (visibleItems.length === 0) {
        document.getElementById('noRecordTR').style.display = "";
      } else {
        document.getElementById('noRecordTR').style.display = "none";
      }
    });
  });

  document.addEventListener("DOMContentLoaded", function () {
    var accordionButtons = document.querySelectorAll('.accordion-button');
    accordionButtons.forEach(function (button, index) {
      button.addEventListener('click', function () {
        var icon = document.getElementById('icon' + (index + 1));
        icon.classList.toggle('fa-plus');
        icon.classList.toggle('fa-minus');
      });
    });
  });

  $(".learn-more-text").on("click", function (e) {
    e.preventDefault();
    // Scroll to the "Best Practices" section
    $('html, body').animate({
      scrollTop: $("#bestPracticesSection").offset().top - 100
    }, 1000); // You can adjust the duration (in milliseconds) as needed
  });
</script>

<?php require_once("../Public/footer.php"); ?>