<?php
require_once("../config/database.php");
require_once("../Public/header.php");
?>

<section id="policy" class="section-bg">
  <div class="container">

    <div class="row justify-content-center" style="position:relative; z-index:2;">
      <div class="col-12" style="position:fixed;background-color:black;padding-top:80px;">
        <header class="section-header">
          <h3 class="pb-2">Statements & Policies</h3>
        </header>
      </div>
    </div>
    <div class="forMobile"> <!--hide on mobile phones-->
      <div class="row justify-content-center pt-1 statsPolicies">
        <div class="col-lg-3 col-md-4 col-sm-12 borderline">
          <div style="width:100%; height: 50vh; overflow-y:scroll;position:fixed;overflow-y:auto;">
            <div class="sidebar">
              <?php $policy_q="SELECT * from `policy`";
              $policy_query = $conn->query($policy_q);
               while ($policy= $policy_query->fetch(PDO::FETCH_ASSOC)){ ?>
              <a href="#<?php echo $policy['id'];?>"><h5 class=" mt-4"><?php echo $policy['Title'];?> </h5></a>
              <?php }?>
            </div>
          </div>
        </div>

        <div class="col-lg-9 col-md-8 col-sm-12 paddingleft pt-2" data-aos="fade-up" data-aos-delay="100">
          <?php $policy_q="SELECT * from `policy`";
          $policy_query = $conn->query($policy_q);
          while ($policy= $policy_query->fetch(PDO::FETCH_ASSOC)){ ?>
            <div id="<?php echo $policy['id'];?>">
              <h4><?php echo $policy['Title'];?></h4>
              <div class="pt-5 pb-5 spHdr"><?php echo htmlspecialchars_decode($policy['Main_Text']);?></div>
            </div>
          <?php }?>
        </div>
      </div>
    </div>

    <div class="forLargeScreens"><!--hide on desktops-->
      <div class="row statsPolicies">
        <div class="col-12 text-center">
          <?php $policy_q="SELECT * from `policy`";
          $policy_query = $conn->query($policy_q);
          while ($policy= $policy_query->fetch(PDO::FETCH_ASSOC)){ ?>
          <a href="#<?php echo $policy['id'];?>policies"><h5 class=" mt-4"><?php echo $policy['Title'];?></h5></a>
          <?php }?>
        </div>
        <div class="col-12 pt-2" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
              <?php $policy_q="SELECT * from `policy`";
              $policy_query = $conn->query($policy_q);
              while ($policy= $policy_query->fetch(PDO::FETCH_ASSOC)){ ?>
                <div id="<?php echo $policy['id'];?>policies" class="policies">
                  <h4 class="pt-5"><?php echo $policy['Title'];?></h4>
                  <div class="pt-5 pb-3 spHdr"><?php echo htmlspecialchars_decode($policy['Main_Text']);?></div>
                </div>
              <?php }?>
            </div>
            <div class="col-1"></div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>


<script type="text/javascript">
$(document).on('click', 'a[href^="#"]', function(e) {
    // target element id
    var id = $(this).attr('href');

    // target element
    var $id = $(id);
    if ($id.length === 0) {
        return;
    }

    // prevent standard hash navigation (avoid blinking in IE)
    e.preventDefault();

    // top position relative to the document
    var pos = $id.offset().top -270;

    // animated top scrolling
    $('body, html').animate({scrollTop: pos});
});
</script>
<?php
require_once("../Public/footer.php");
 ?>
