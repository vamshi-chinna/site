<?php
require_once("../config/database.php");
require_once("../Public/header.php");
include("../Events/displayGallery.php");

$sql = "SELECT * FROM events where ID=" . $_GET['EventID'] . " limit 1;";
$id=$_GET['EventID'];
$query = $conn->query($sql);
$events = $query->fetch(PDO::FETCH_ASSOC);
$events_code=$events['EventTag'];
?>
<!-- Below 2 lines are imported for the gallery -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>


<section id="portfolio" class="section-bg">
  <div class="container" data-aos="fade-up">
    <div class="row backbtn pb-5">
      <div class="col-lg-12 text-right ">
        <a href="javascript:history.go(-1)" class="btn-get-started scrollto"><i class="fas fa-chevron-left"></i>back</a>
      </div>
    </div>
    <header class="section-header">
      <h3 class="border-bottom p-3"><?php echo $events['Title']; ?></h3>
    </header>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 row">
         <h3><span class="badge badge-light mx-3" style="background-color:#17a2b8;color:white;">Event Type: <?php echo $events['EventTag']; ?></span></h3>
         <h3><span class="badge badge-light mx-3" style="background-color:#28a745;color:white;">Location: <?php echo $events['Location']; ?></span></h3>
         <?php $eventDate = $events['StartDate'];
            $newDate = str_replace('-"', '/', $eventDate);
            $date = date("d F Y", strtotime($newDate)); ?>
         <h3><span class="badge badge-light mx-3" style="background-color:#dc3545;color:white;">Date: <?php echo $date; ?></span></h3>
      </div>
    </div>
    <div class="row single-post mt-5 no-gutters">
      <div class="col-md-12 mt-5">
        <div class="image-wrapper float-right">
          <?php if($events['Img']!='0'){ ?>
            <a target="_blank" href="<?php echo $events['Link']; ?>">
              <img class="img-project img-fluid" src="../assets/img/events/<?php echo $events['Img']; ?>" style="width:550px;" alt="<?php echo $events['Title']; ?>">
            </a>
          <?php } ?>
        </div>
        <div class="single-post-content-wrapper">
          <div class="content-box">
            <h2 class="p-1" style="color: #fff;font-family: 'Open Sans', sans-serif;"><?php echo $events['Description']; ?></h2>
          </div>
        </div>
      </div>
    </div>
    <?php
    $sqlDocs="SELECT Distinct(Description) from `Upload_RegID` where `TableName`='events' AND `FileType` !='Quicklinks' AND `FileType` !='Sponsors' AND `FileType` !='Gallery' AND `Refid`= " . $_GET['EventID'] . " ORDER BY ID ASC";
    $queryDocs = $conn->query($sqlDocs);
    if($queryDocs->rowCount() > 0) {?>

          <?php if($events['Link']!='0'){ ?>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 center"  data-aos="fade-up" data-aos-delay="100">
            <a target="_blank" href="<?php echo $events['Link']; ?>">
              <button style="width: 100%;font-weight:bold; min-height: 3.5rem;" class="button btn-primary p-2">Walk With us to the Website<img src="../assets/img/man1.png"  style="width:2.2rem;" class="pl-1" alt="Walking Stick Man"/></button>
            </a>
            <div class="p-2 pt-5"></div>
          </div>
        </div>
          <?php } ?>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
          <h2 class="border-bottom p-3">Resources</h2>
          <div class="accordion" id="docsAccordion">
            <?php $dCnt = 0;
            while ($doc= $queryDocs->fetch(PDO::FETCH_ASSOC)): ?>
              <?php
              $sqlrows = "SELECT * from `Upload_RegID` where `TableName`='events' AND `Refid`= " . $_GET['EventID'] . " AND `Description` = '" . $doc['Description'] . "' ORDER BY listorder ASC";
              $queryRows = $conn->query($sqlrows); ?>
              <div class="accordion-item">
                <h5 class="inner-border-bottom p-3 accordion-header" id="docs<?php echo $dCnt;?>">
                  <button class="accordion-button docsAccordionBtn collapseable" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $dCnt;?>" aria-expanded="true" aria-controls="collapse<?php echo $dCnt;?>"><i class="bi bi-arrow-right"></i> <?php echo($doc['Description']); ?></button>
                </h5>
                <div id="collapse<?php echo $dCnt;?>" class="accordion-collapse collapse" aria-labelledby="#docs<?php echo $dCnt;?>" data-bs-parent="#docsAccordion">
                  <table class="table-responsive" style="display:table;">
                    <tbody id="myTable" style="color:#fff;">
                      <?php while ($row= $queryRows->fetch(PDO::FETCH_ASSOC)){ ?>
                        <tr>
                          <td class="p-4" style="color: #fff;">
                            <div class="row">
                              <div class="col-lg-7 col-md-7 col-sm-12 pb-2"><?php echo ($row['FileName']); ?></div>
                              <div class="col-lg-3 col-md-3 col-sm-12 pb-2"><?php echo ($row['FileCaption']); ?></div>

                              <div class="col-lg-2 col-md-2 col-sm-12 pb-2">
                                <a  <?php if($row['FileType'] == "Video-Soon"){?>class="button btn-warning disabled" aria-disabled="true" <?php } else {?> href="<?php echo $row['FileLink'];?>" class="button btn-primary"<?php } ?> target="_blank" style="padding:5px 15px;min-width:150px;display:block;text-align:center;">
                                  <?php
                                    $rFType = $row['FileType'];
                                    $rMsg = " File";
                                    if($rFType == "Video"){
                                      $rMsg = " Video";
                                      echo '<i class="fas fa-solid fa-play"></i>&nbsp;' . $rMsg;
                                    } else if($rFType == "Powerpoint") {
                                      $rMsg = " Powerpoint";
                                      echo '<i class="fas fa-solid fa-file-powerpoint"></i>&nbsp;' . $rMsg;
                                    }else if ($rFType == "PDF"){
                                      $rMsg = " PDF";
                                      echo '<i class="fas fa-file-pdf"></i>&nbsp;' . $rMsg;
                                    }else if ($rFType == "Video-Soon"){
                                      $rMsg = " Coming Soon";
                                      echo '<i class="fas fa-solid fa-play"></i>&nbsp;' . $rMsg;
                                      }
                                  ?>
                                </a>
                              </div>

                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php $dCnt += 1; ?>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php
    $links_sql = "SELECT * FROM Upload_RegID WHERE `FileType`='Quicklinks' AND `TableName`='events' AND `Refid`=" . $_GET['EventID'];
    $links_result = $conn->query($links_sql);
    if ($links_result->rowCount() > 0) {?>
      <div class="row justify-content-left" style="min-height: 15rem !important;">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-5 pb-4"  data-aos="fade-up" data-aos-delay="100">
          <h2 class="border-bottom p-3">Quick Links</h2>
          <div class="row justify-content-left mt-2 postList">

              <?php while ($links = $links_result->fetch(PDO::FETCH_ASSOC)) { ?>
                <?php $links_result = $conn->query($links_sql);
                $images = $links_result->fetchAll();?>
                <?php foreach ($images as $key => $row) { ?>
                  <div class="col-lg-3 col-md-4 text-center portfolio-item pb-2">
                    <a target="_blank" href="<?php echo $row['FileLink'];?>">
                      <div class="portfolio-wrap">
                        <figure>
                          <img src="<?php echo $row['FileName'];?>". class="img-fluid" alt="<?php echo $row['Description'];?>">
                        </figure>
                        <div class="portfolio-info">
                          <h4 class="p-3"><?php echo $row['Description'];?></h4>
                        </div>
                      </div>
                    </a>
                  </div>
                <?php }
                }?>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php
    $pics_sql = "SELECT * FROM pictures WHERE Refid =" . $_GET['EventID'];
    $pics_result = $conn->query($pics_sql);
    if ($pics_result->rowCount() > 0): ?>
    <div class="row justify-content-left" style="min-height: 15rem !important;">
      <div class="col-lg-12 col-md-12 col-sm-12 mt-5 pb-4" data-aos="fade-up" data-aos-delay="100">
        <h2 class="border-bottom p-3">Gallery</h2>
        <div class="row d-flex align-items-center" data-aos="fade-up" data-aos-delay="100">
          <!--New Gallery Should Go Here-->
          <div id="imageContainer" class="row overflow-auto">
          <?php
            $sqlGallery = "SELECT * FROM pictures WHERE Refid =" . $id;
            $queryGallery = $conn->query($sqlGallery);
            $GalleryCount = $queryGallery->rowCount();
            $myArr = []; //Array that will contain url of all images myArr[$x][0] being the FileLink and myArr[$x][1] being the FileCaption

            foreach($queryGallery as $galleryRow){?>
              <?php
                array_push($myArr, array($galleryRow['FileLink'], $galleryRow['FileCaption']));
            }

            displayGallery($myArr, 0, TRUE); //displays the gallery
            ?>

            <script>
            $(document).ready(function() { //waits for page to load
              var tracker = <?php echo $tracker; ?>;
              var galleryCount = <?php echo $GalleryCount ?>;
              var container = $("#imageContainer");
              var clicked = false;

              container.scroll(function() {
                if(clicked == true){ //checks to see if the button is clicked
                  var scrollHeight = container.prop("scrollHeight");
                  var scrollTop = container.prop("scrollTop");
                  var containerHeight = container.height();

                  if (scrollTop + containerHeight >= scrollHeight && tracker < galleryCount) { //Checks to see the position of the scrollHeight compares to total height
                    $.ajax({ //sends POST request
                          type: 'POST',
                          url: 'displayGallery.php',
                          data: {
                            action: 'displayGallery',
                            myArr: '<?php echo json_encode($myArr); ?>',
                            tracker: tracker
                          },
                          success: function(response) { //if successful,
                            $('#imageContainer').append(response); //adds the images from displayGallery function call to the imageContainer
                            tracker = tracker += 8; //Updates the tracker
                          }
                    });
                  }
                }
              });

              $("#loadMore").click(function(){ //checks to see if button is clicked
                  $.ajax({ //sends POST request
                        type: 'POST',
                        url: 'displayGallery.php',
                        data: {
                          action: 'displayGallery',
                          myArr: '<?php echo json_encode($myArr); ?>',
                          tracker: tracker
                        },
                        success: function(response) { //if successful,
                          $('#imageContainer').append(response); //adds the images from displayGallery function call to the imageContainer
                          tracker = tracker += 8; //Updates the tracker
                          $('#imageContainer').css('height', '800px'); //resizes container
                          $("#clicker").hide();  //hides button
                          clicked = true;
                        }
                    });
                });
            });
            </script>
          </div>
        </div>
         <?php if ($GalleryCount > 4): ?>
              <div id="clicker" class="text-center">
                <button style="width: 100%;font-weight:bold; min-height: 3.5rem;" id="loadMore" type="button" class="btn btn-primary">Load More</button>
              </div>
            <?php endif; ?>
      </div>
    </div>
    <?php endif;?>
    <?php
      $spons_sql = "SELECT * FROM Upload_RegID WHERE `FileType`='Sponsors' AND `TableName`='events' AND `Refid`=" . $_GET['EventID'];
      $spons_result = $conn->query($spons_sql);
      if ($spons_result->rowCount() > 0): ?>
        <div class="row justify-content-left" style="min-height: 15rem !important;">
          <div class="col-lg-12 col-md-12 col-sm-12 mt-5 pb-4 "  data-aos="fade-up" data-aos-delay="100">
            <h2 class="border-bottom p-3">Sponsors</h2>
            <div class="row d-flex align-items-center" data-aos="fade-up" data-aos-delay="100">
              <?php
              $sqlImgs="SELECT * from `Upload_RegID` where  `FileType`='Sponsors' AND `TableName`='events' AND `Refid`=" . $_GET['EventID'];
              $queryImgs = $conn->query($sqlImgs);
              while ($img= $queryImgs->fetch(PDO::FETCH_ASSOC)){ ?>
                <div class="col-4 col-md-2">
                  <img class="img-spon" src="<?php echo $img['FileLink'];?>" alt="<?php echo $img['FileName'];?>" style="margin-top:30px;">
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php endif; ?>

        </div>
      </div>
    </div>
  <!--End of container-->
  </div>
</section>

<style type="text/css">
  /* Arrow for the Documents */
  .collapseable:hover{
    color:#007bff;
  }
  /* Scrollbar CSS */
  ::-webkit-scrollbar{
    width:8px;
  }
  ::-webkit-scrolbar-track{
    -webkit-box-shadow: inset 0 0 6px rgba(200,200,200,1);
    border-radius:5px;
  }
  ::-webkit-scrollbar-thumb{
    border-radius:5px;
    background-color:#1A1C1C;
    -webkit-box-shadow: inset 0 0 6px rgba(90,90,90,0.7);
  }
  .max{
    height:100%;
    height:100%;
    object-fit:cover;
  }

  .overlay{
    position:absolute;
    height:inherit;
    width:inherit;
    opacity: 0;
    transition: 0.2s ease;
    background-color:white;
  }
  .link:hover .overlay{
    opacity: 0.2;
  }
  .item{
    height:300px;
  }
  .item img{
    opacity:0.7;
    width:100%;
  }
  .item img:hover{
    opacity:1;
  }
</style>
<?php require_once("../Public/footer.php"); ?>
