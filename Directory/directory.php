<?php
require_once("../config/database.php");
require_once("../Public/header.php");
?>

<section id="directory" class="section-bg">
  <div class="container" data-aos="fade-up">
    <header class="section-header">
      <h3>Directory</h3>
    </header>

    <div class="row justify-content-center text-center pb-5  ">
      <div class="col-lg-12 col-md-12 col-sm-12 mt-5  text-center"  data-aos="fade-up" data-aos-delay="100">
        <input  align="center" type="text" class="form-control " placeholder="Search for names.." name="search_key" id="myInput"
              style="height: calc(1.7em + 1rem + 2px);
                   padding: 0.5rem 1rem;
                   font-size: 1.25rem;
                   line-height: 1.5;
                   border-radius: 0.3rem;
                   border: 2px solid #007BFF;
                   color: #007BFF;">
      </div>
    </div>

    <div class="row" id="content-desktop">
      <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
        <h1 id="noRecordTR" style="display:none">No Record Found</h1>
        <table class="table-responsive">
         <tbody id="myTable">
            <?php $sql = "SELECT * FROM team where Name!='' order by substring_index(TRIM(Name), ' ', -1)  ";
            $query = $conn->query($sql);
            while($forms=$query->fetch(PDO::FETCH_ASSOC)){?>
              <tr>
                <td  width="20%" class="p-4"><?php  if ($forms['Display']>0) {?> <a  href="../Teams/team_details.php?TeamID=<?php echo $forms['ID']; ?>"> <?php }?>
                  <?php echo htmlspecialchars_decode(nl2br($forms['Name']));?></a>
                </td>
                <td  width="20%" class="p-4" style="color: #fff;font-family: 'Open Sans', sans-serif;"><?php echo htmlspecialchars_decode(nl2br($forms['email']));?></td>
                <td  width="40%" class=" p-4" style="color: #fff; font-family: 'Open Sans', sans-serif;"><?php echo htmlspecialchars_decode(nl2br($forms['Position_directory']));?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>  
    </div>

    <div class="row" id="content-mobile">
      <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
        <h1 id="noRecordTR1" style="display:none">No Record Found</h1>
       
            <?php $sql = "SELECT * FROM team where Name!='' order by substring_index(TRIM(Name), ' ', -1)";
            $query = $conn->query($sql);
            while($forms=$query->fetch(PDO::FETCH_ASSOC)){?>
              <div class="col-sm-12 p-4 textbox">
                <div class="card border-primary">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $forms['Name'];?></h5>
                    <h6 class="card-subtitle mb-2"><?php echo $forms['email'];?></h6>
                    <p class="card-text pb-1"><?php echo $forms['Position_directory'];?></p>
                    <?php if ($forms['Display']>0) {?><h4 class="text-right text-bottom"><a  href="../Teams/team_details.php?TeamID=<?php echo $forms['ID']; ?>" >View Profile<i class="fas fa-chevron-right"></i></a></h4> <?php }?>
                  </div>
                </div>
              </div>
            <?php } ?>
          
      </div>  
    </div>
  </div>
</section><!-- End Forms Section -->

<script>
$(document).ready(function(){
  
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    var trSel =  $("#myTable tr:not('.no-records'):visible")

    $("table tr:visible").each(function( index ) {  
    $(this).css("background-color", ( index % 2 ? "#000" : "#007BFF" ));
    });
    // Check for number of rows & append no records found row
    if(trSel.length == 0){
         document.getElementById('noRecordTR').style.display = "";
    }
    else{
      document.getElementById('noRecordTR').style.display = "none";
    }
  });
});
$(document).ready(function(){
  $('#myInput').on("keyup", function() {
    var i, title1,head,cardContainer;
    var value = $(this).val().toLowerCase();
    
    $(".textbox").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });

    var trSel =  $(".textbox :not('.no-records'):visible")
    // Check for number of rows & append no records found row
     if(trSel.length == 0){
         document.getElementById('noRecordTR1').style.display = "";
    }
    else{
      document.getElementById('noRecordTR1').style.display = "none";
    }
  });
});
</script>

<?php require_once("../Public/footer.php");?>
