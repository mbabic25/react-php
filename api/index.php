<?php 
    $action = isset($_GET["action"]) ? $_GET["action"] : '';

    if (strcmp($action, "insert") == 0) {
        projectUpdate();
    }

    elseif (strcmp($action, "delete") == 0) {
        projectDelete();
    }

    else {
        projects();
    }
    

function projects(){    
    require_once 'config.php';
    $query = "SELECT * FROM projects ";
    $result = $db->query($query); 

    $projectData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $projectData=json_encode($projectData);
    
    echo  $projectData ;
}

function projectUpdate(){  
    require_once 'config.php';
    $projName = $_GET["projName"];
    $query = "INSERT INTO projects (Name) VALUES ('$projName')";
    echo $db->query($query);
}

function projectDelete(){
    require_once 'config.php';
    $projName= $_GET["projName"];
    $query = "DELETE FROM projects (Name) VALUES ('$projName')";
   // echo $db _> query($query);
}


?>
