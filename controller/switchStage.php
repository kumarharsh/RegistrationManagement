<?php
    session_start();
    if( (!isset( $_SESSION[ 'username' , 'type' ] )) || ($_SESSION[ 'tyoe' ] != "dean") )
    {
        echo "You are not authorized...";
        exit;
    }

    $newStage = $_POST['stage'];
    if($newStage < 1 || $newStage > 4) {
        $response = array("status" => "error", "message" => "You have selected an invalid stage");
        header('Content-type: application/json');
        echo json_encode($response);
        exit(1);
    }

    include("stageCodes.php");    

    $conf = fopen('processStage.conf','a+');
    fseek($conf, -1, SEEK_END);
    $currentStage = fgetc($conf);
    if($currentStage == false)
        $currentStage = 0;
    
    $diffStage = $newStage-$currentStage;
/*  Commenting this one out so that all the stages can be set
    easily. In the professional version (if ever implemented),
    uncomment this */
/*    if($diffStage < 0) {
 *       $response = array("status" => "error", "message" => "This stage has already passed.");
 *   }
 */
    if($diffStage == 0) {
        $response = array("status" => "error", "message" => "This stage is already active.");
    }
    else if($diffStage == 1) {
        $result = fwrite($conf,$newStage);
        if($result)
            $response = array("status" => "success", "stage" => $stageNames[$newStage] );
        else
            $response = array("status" => "error", "message" => "There was an error changing the stage. Please try again later.");
    }
    else {
        $response = array("status" => "error", "message" => "This stage can not be set");
    }

    fclose($conf);

    header('Content-type: application/json');
    echo json_encode($response);
    exit(0);

?>
