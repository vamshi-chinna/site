<?php
require_once("../config/database.php");
require_once("../Public/header.php");
?>

<section id="forms" class="section-bg">
  <div class="container" data-aos="fade-up">
    <header class="section-header">
      <h3>Documents</h3>
    </header>


    <div class="row justify-content-center text-center pb-5 mr-3 ">
      <div class="col-lg-12 col-md-6 col-sm-6 mt-5  text-center"  data-aos="fade-up" data-aos-delay="100">
        <input  align="center" type="text" class="form-control " onkeyup="myFunction()" placeholder="Search" name="search_key" id="myInput"
              style="height: calc(1.7em + 1rem + 2px);
                   padding: 0.5rem 1rem;
                   font-size: 1.25rem;
                   line-height: 1.5;
                   border-radius: 0.3rem;
                   border: 2px solid #007BFF;
                   color: #007BFF;">
      </div>
    </div>

  <div id="myTable">
    <h1 id="noRecordTR" class="mt-5" style="display:none">No Record Found</h1>

     <div class="row  maintext pb-5" data-aos="fade-up">
      <div class="col-lg-12 col-md-12 col-sm-12 mt-4 head">
          <h2 class="border-bottom p-2 pb-4 head-title">Human Resources</h2>
      </div>
      <?php $sql = "SELECT * FROM Forms where Title='HR'";
      $query = $conn->query($sql);
      while($forms=$query->fetch(PDO::FETCH_ASSOC)){?>
      <div class="col-lg-4 col-md-6 col-sm-12 p-3 uvs">
        <div class="card border-primary aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" style="min-height:245px;height:100%;">
          <div class="card-body">
              <div class="row d-flex">
                <div class="col-3">
                  <h6><i class="fas fa-file-pdf fa-2x"></i></h6>
                </div>
                <div class="col-9">
                  <h6 class="text-left card-title"><?php echo $forms['SubTitle'];?></h6>
                </div>
              </div>
              <p class="card-text" style="margin-left:5px;">
                <span style="font-size:16px">Uploaded on: <?php echo $forms['Date'];?></span><br>
                <span style="font-size:14px"><em>Last updated on: <?php echo $forms['Last_updated'];?></em></span>
              </p>
              <p class="card-text "><?php // echo $forms['Log'];?></p>
              <h5 class="text-right text-bottom"><a target="_blank" href="../assets/files/<?php echo $forms['File'];?>" class="btn-get-started scrollto">download<i class="fas fa-chevron-right"></i></a></h5>
          </div>
        </div>
      </div>
      <?php }?>
    </div>

    <div class="row maintext"  data-aos="fade-up">
      <div class="col-lg-12 col-md-12 col-sm-12 mt-4 head">
          <h2 class="border-bottom p-2 pb-4 head-title">Finance</h2>
      </div>
      <?php $sql = "SELECT * FROM Forms where Title='Finance'";
      $query = $conn->query($sql);
      while($forms=$query->fetch(PDO::FETCH_ASSOC)){?>
     <div class="col-lg-4 col-md-6 col-sm-12 p-3 uvs">
        <div class="card border-primary aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" style="min-height:245px;height:100%;">
          <div class="card-body">
              <div class="row d-flex">
                <div class="col-3">
                  <h6><i class="fas fa-file-pdf fa-2x"></i></h6>
                </div>
                <div class="col-9">
                  <h6 class="text-left card-title"><?php echo $forms['SubTitle'];?></h6>
                </div>
              </div>
              <p class="card-text" style="margin-left:5px;">
                <span style="font-size:16px">Uploaded on: <?php echo $forms['Date'];?></span><br>
                <span style="font-size:14px"><em>Last updated on: <?php echo $forms['Last_updated'];?></em></span>
              </p>
              <p class="card-text"><?php //echo $forms['Log'];?></p>
              <h5 class="text-right text-bottom"><a target="_blank" href="../assets/files/<?php echo $forms['File'];?>" class="btn-get-started scrollto">download<i class="fas fa-chevron-right"></i></a></h5>
          </div>
        </div>
      </div>
      <?php }?>
    </div>

  </div>
</div>
</section><!-- End Forms Section -->

<?php require_once("../Public/footer.php");?>

 <script>
 $(document).ready(function(){
  $('#myInput').on("keyup", function() {
    var i, title1,head,cardContainer;
    var value = $(this).val().toLowerCase();
    var wordsArray = value.split(" ");
    var result = wordsArray[0];

    $(".maintext").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(result) > -1)
    });

    $(".uvs").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });



    var trSel =  $(".head :not('.no-records'):visible")
    // Check for number of rows & append no records found row
     if(trSel.length == 0){
         document.getElementById('noRecordTR').style.display = "";
    }
    else{
      document.getElementById('noRecordTR').style.display = "none";
    }


    var trSel =  $(".uvs :not('.no-records'):visible")
    // Check for number of rows & append no records found row
     if(trSel.length == 0){
         document.getElementById('noRecordTR').style.display = "";
    }
    else{
      document.getElementById('noRecordTR').style.display = "none";
    }
  });
});
</script>
