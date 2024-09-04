<link href="../assets/css/style.css" rel="stylesheet">
<?php
require_once("../config/database.php");

if(isset($_POST['id'])){
$id=$_POST['id'];
}
$sql = "SELECT  * FROM offer  where offer.id='".$id."'";
$query = $conn->query($sql);
$row = $query->fetch(PDO::FETCH_ASSOC);
?>

 <section id="" class="modalo">
    <div class="container-fluid">
    	<div class="bg11 ">
          <a  href="../public/index.php" class="logo"><img class="img-fluid" alt="Project: <?php echo $row['Title'];?>" src="../assets/img/logo-white.png"></a>
      </div>
    </div>
    <div class="container-fluid h-100">
      <div class="row d-flex align-items-center justify-content-center">

        <div class="col-lg-5 col-md-6 col-sm-12 p-5 text-center borderline box">
            <img class="img-fluid p-5" alt="Services Walk With Web Provides - <?php echo $row['Title'];?>" src="../assets/img/icons/<?php echo $row['Img'];?>">
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 p-5 box">
          <h4 class="pb-5"><?php echo $row['Title'];?></h4>
          <h6><?php echo $row['Main_Text'];?></h6>
        </div>




        </div>
        </div>
      </div>
    </div>
  </section>
