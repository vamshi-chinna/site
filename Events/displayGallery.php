<?php
    // Retrieve the JSON string parameter
    if(isset($_POST['myArr'])){
        $myArr_json = $_POST['myArr'];
    } else {
        $myArr_json = "";
    }

    // Convert the JSON string to a PHP array
    $myArr = json_decode($myArr_json, true);

    // Retrieve the integer parameter
    if(isset($_POST['tracker'])){
        $tracker = $_POST['tracker'];
    } else {
        $tracker = 0;
    }
    
    if (isset($_POST['action'])) {
        global $myArr, $tracker;
        displayGallery($myArr, $tracker, FALSE);
    }
    
    function incrementTracker(){
        global $tracker;
        $tracker += 4;
    }

    function displayGallery($array, $tracker, $initial){       
        if($initial === TRUE){
            $displayCount = 3;
        }
        else{
            $displayCount = 7;
        }
        
        for($x = $tracker; $x <= $tracker+$displayCount; $x++){
            if(empty($array[$x])){
                break;
            } ?>
            <div class="col-sm-6 col-md-4 col-lg-3 p-3 item">
                <a href="<?php echo $array[$x][0]?>" data-lightbox="photos"><img class="max" src="<?php echo $array[$x][0]?>" alt="<?php echo $array[$x][1]?>"></a>
            </div>
    <?php
        }
        incrementTracker();      
        if($initial === FALSE){
            incrementTracker();
        }
    }
?>