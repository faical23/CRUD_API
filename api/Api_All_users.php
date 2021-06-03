<?php
class CRUD{

    function get_user($search="",$Fname=""){
        include '../connexion.php';

        if($search == "search")
            $sql = "SELECT * FROM user_account WHERE 	ID_client  LIKE '$Fname%'";
        else 
            $sql = "SELECT * FROM user_account";

        $arr_post['users'] = array();
        try{
                $stmt = $dbh->prepare($sql);
                $stmt->execute(); 
                $result = $stmt->fetchAll();

                foreach($result as $value){
                    $article =array("first_name" => $value['Fname'] ,
                                    "last_name" => $value['Lname']
                                    ,"email" => $value['Email'] ,
                                    "number" => $value['PhoneNumber']
                                    , "id" => $value['ID_client']);
                    array_push($arr_post['users'],$article);
                }
        }
        catch(Exception $e) {
            return $e->getMessage();
        }
        return $arr_post;
    }

}



/////// SCRIPT V2
function check_Json($contentType){
    if ($contentType === 'application/json'){
        return "All good";
    }
    else{
        return 'Content type is not "application/json"';
    }
}
function get_Json(){
        $content = file_get_contents('php://input'); //// get params centent body from fetch js
        $decoded = json_decode($content, true); //// convert this params to arrays or varaibles
        if (is_array($decoded)){
            if($decoded == []){
                return "Empty";
            }
            else{
                return $decoded;
            }
        }
        else{
            return 'Bad JSON';
        }
}



function http_methodes($methode){
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    $response = [
        'value' => 0,
        'error' => 'All good',
        'data' => null,
    ];

    if($methode == 'GET'){
        $get_users = new CRUD();
        $resultat = "dssdsd";
        $check = check_Json($contentType);
        if($check == "All good"){
            $get_Json = get_Json();
            if($get_Json != 'Bad JSON'){
                if($get_Json != "Empty"){
                    $Fname = $get_Json['id']; // if not empty get id from this arrays
                    $resultat = $get_users->get_user("search",$Fname);
                }
                else{
                    $resultat = $get_users->get_user();
                }

                $response['data'] = $resultat ;
                $response['error'] = 'All Good';
            }
            else{
                $response['error'] = $get_Json;
            }
        }
        else{
            $response['error'] = check_Json($contentType);
        }
    }
    echo json_encode($response);
}
http_methodes("GET");















//////////////////////// script v1

function methode($methode){
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    $response = [
        'value' => 0,
        'error' => 'All good',
        'data' => null,
    ];

    if ($contentType === 'application/json') {
        $get_users = new CRUD();
        if($methode == 'GET'){
            $content = file_get_contents('php://input'); //// get params centent body from fetch js
            $decoded = json_decode($content, true); //// convert this params to arrays or varaibles
            if (is_array($decoded)){
                if($decoded !== []){ //// check if this arrays is empty 
                    $id = $decoded['id']; // if not empty get id from this arrays
                    $resultat = $get_users->get_user("search",$id);
                }
                else {
                    $resultat = $get_users->get_user();
                }
            }
            else{
                $response['error'] = 'Bad JSON';
            }
        }
        
        $response['data'] = $resultat ;
        $response['value'] = 1;
        $response['error'] = null;
    
    } else {
        $response['error'] = 'Content type is not "application/json"';
    }
    
    echo json_encode($response);
}


// methode("GET");












        // $content = trim(file_get_contents('php://input'));
        
        // $decoded = json_decode($content, true);
        
        // if (is_array($decoded)) {
            
        //     $id = $decoded['id'];
        //     $get_users = new CRUD("POST");
        //     $resultat = $get_users->get_user();
        //     // $resultat = $get_users->get_user("search",$id);
    
            
            // $response['data'] = $resultat ;
            // $response['value'] = 1;
            // $response['error'] = null;
    
        // } else {
        //     






       // $sql = "SELECT * FROM user_account WHERE ID_client = $id";
        // $arr_post['users'] = array();
        // try{
        //         $stmt = $dbh->prepare($sql);
        //         $stmt->execute(); 
        //         $result = $stmt->fetchAll();

        //         foreach($result as $value){
        //             $article =array("first_name" => $value['Fname'] ,
        //                             "last_name" => $value['Lname']
        //                             ,"email" => $value['Email'] ,
        //                             "number" => $value['PhoneNumber']
        //                             , "client_id " => $value['ID_client']);
        //             array_push($arr_post['users'],$article);
        //         }
        // }
        // catch(Exception $e) {
        //     return $e->getMessage();
        // }



// function get_users(){
//     include '../connexion.php';
//     $id = $_POST["id"];
//     $sql = "SELECT * FROM user_account WHERE ID_client = $id";
//     $arr_post['users'] = array();
//     try{
//             $stmt = $dbh->prepare($sql);
//             $stmt->execute(); 
//             $result = $stmt->fetchAll();

//             foreach($result as $value){
//                 $article =array("first_name" => $value['Fname'] ,
//                                 "last_name" => $value['Lname']
//                                 ,"email" => $value['Email'] ,
//                                  "number" => $value['PhoneNumber']
//                                 , "client_id " => $value['ID_client']);
//                 array_push($arr_post['users'],$article);
//             }
//     }
//     catch(Exception $e) {
//         return $e->getMessage();
//     }

//     $dataJsn = json_encode($arr_post);
//     echo $dataJsn;

// }

// get_users();

