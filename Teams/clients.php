<?php
require_once("../config/database.php");
require_once("../Public/header.php");
?>

<section id="recent-sec" class="section-bg">
  <div class="container" data-aos="fade-up">
    <header class="section-header">
      <h3>Clients</h3>
    </header>

     <div class="row  justify-content-center mx-auto mt-5 p-3" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-5 col-md-5 col-sm-12 p-4" data-aos="fade-up" data-aos-delay="100">
          <h4 class="text-uppercase">Universities </h4>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12 p-4 tborderline ack-block" data-aos="fade-up" data-aos-delay="100">
          <?php $ack_q="SELECT * from `clients` order by 'listorder'";
          $ack_query = $conn->query($ack_q);
          while ($ack = $ack_query->fetch(PDO::FETCH_ASSOC)){ ?>
            <a style="text-decoration: none !important;" href="<?php echo $ack['link'];?> " target="_blank" class="text-white">
                      <h3 class="up-effect text-uppercase" style="color: #0ACFF3;font-weight:600;">
              <?php echo $ack['Display_Name'];?><br>
              <span style="color:white; font-size:16px;">
                <?php
                $txt = $ack['Additional'];
                if($txt == "0"){
                  $txt = "";
                }
                echo $txt;
                ?>
              </span>
            </h3></a>
          <?php }?>
        </div>
      </div>
    </div>
</section>

<?php
require_once("../Public/footer.php");
 ?>
