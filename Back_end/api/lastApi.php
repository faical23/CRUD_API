<?php
include '../db.php';

// VERSION 2

$link = $_SERVER['PHP_SELF'];
$link_array = explode('/',$link); /// break the link by / and posted inside array
$methode_use = strtolower($_SERVER["REQUEST_METHOD"]); //// get the last index in arrays
// var_dump($methode_use);
// exit();

function methode($methode){
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    $response = [
        'value' => 0,
        'error' => 'All good',
        'data' => null,
    ];
    $contentType = 'application/json';
    if ($contentType === 'application/json') {
        $get_users = new CRUD("user_account");
        $arr_post['users'] = array();
        $content = file_get_contents('php://input'); //// get params centent body from fetch js
        ///////
            echo $content;
            exit;
        // ///////
        // $decoded = json_decode($content, true); //// convert this params to arrays or varaibles
        // if($methode === 'get'){
        //     if (is_array($decoded)){
        //         if($decoded !== []){ 
        //             reset($decoded); /// get the first key of arrays
        //             $first_key = key($decoded); /// stock this key in variable
        //             $condition = [$first_key =>$decoded[$first_key]]; // arrays assosiative with search key and values value search
        //             $resultat = $get_users->select("" ,$condition);
        //             foreach($resultat  as $value){
        //                 $article =array("first_name" => $value['Fname'] ,
        //                                 "last_name" => $value['Lname']
        //                                 ,"email" => $value['Email'] ,
        //                                 "number" => $value['PhoneNumber']
        //                                 , "id" => $value['ID_client']);
        //                 array_push($arr_post['users'],$article);
        //             }         
        //         }
        //         else {
        //             $resultat = $get_users->select();
        //             foreach($resultat  as $value){
        //                 $article =array("first_name" => $value['Fname'] ,
        //                                 "last_name" => $value['Lname']
        //                                 ,"email" => $value['Email'] ,
        //                                 "number" => $value['PhoneNumber']
        //                                 , "id" => $value['ID_client']);
        //                 array_push($arr_post['users'],$article);
        //             }
        //         }
        //     }
        //     else{
        //         $response['error'] = 'Bad JSON';
        //     }
        // }   
        // else if($methode == 'post'){
        //     try{
        //         $get_users->insert($decoded);
        //         methode("GET");
        //         exit();
        //     }
        //     catch(Exception $e) {
        //         echo "Connection failed: " . $e->getMessage();
        //     }
        // }
        // else if($methode == 'put'){
        //     try{
        //         $get_users->update($decoded,"ID_client",$decoded['ID_client']);
        //     }
        //     catch(Exception $e) {
        //         echo "Connection failed: " . $e->getMessage();
        //     }
        //     /// some code here
        // }
        // else if($methode == 'delete'){
        //     reset($decoded); /// get the first key of arrays
        //     $first_key = key($decoded); /// stock this key in variable
        //     $resultat = $get_users->delete($first_key,$decoded[$first_key]);
        //     methode("GET");
        //     exit();
        // }
        // $response['data'] = $arr_post ;
        // $response['value'] = 1;
        // $response['error'] = null;

    } else {
        $response['error'] = 'Content type is not "application/json"';
    }
     echo json_encode($response);
}


methode("get");






















