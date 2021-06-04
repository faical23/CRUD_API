<?php

include '../db.php';

function methode($methode){
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    $response = [
        'value' => 0,
        'error' => 'All good',
        'data' => null,
    ];

    if ($contentType === 'application/json') {
        $get_users = new CRUD("user_account");
        if($methode == 'GET'){
            $arr_post['users'] = array();
            $content = file_get_contents('php://input'); //// get params centent body from fetch js
            $decoded = json_decode($content, true); //// convert this params to arrays or varaibles
            if (is_array($decoded)){
                if($decoded !== []){ 
                    // $condition = ["Fname" =>$decoded['Fname']]; 
                    $condition = ["ID_client" =>$decoded['id']]; 
                    $resultat = $get_users->select("" ,$condition);
                    foreach($resultat  as $value){
                        $article =array("first_name" => $value['Fname'] ,
                                        "last_name" => $value['Lname']
                                        ,"email" => $value['Email'] ,
                                        "number" => $value['PhoneNumber']
                                        , "id" => $value['ID_client']);
                        array_push($arr_post['users'],$article);
                    }
                    
                }
                else {
                    $resultat = $get_users->select();
                    foreach($resultat  as $value){
                        $article =array("first_name" => $value['Fname'] ,
                                        "last_name" => $value['Lname']
                                        ,"email" => $value['Email'] ,
                                        "number" => $value['PhoneNumber']
                                        , "id" => $value['ID_client']);
                        array_push($arr_post['users'],$article);
                    }
                }
            }
            else{
                $response['error'] = 'Bad JSON';
            }
        }
        
        $response['data'] = $arr_post ;
        $response['value'] = 1;
        $response['error'] = null;
    
    } else {
        $response['error'] = 'Content type is not "application/json"';
    }
    
    echo json_encode($response);
}


methode("GET");





















