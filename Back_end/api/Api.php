<?php
include '../db.php';
/////////// VESRION 3

class API{
    function get(){
                $get_users = new CRUD("clients");
                $url = parse_url($_SERVER['REQUEST_URI']);
                if(isset($url['query'])){
                    $params =  explode("=",$url['query']);
                    $condition =[$params[0] =>  $params[1]];
                    $resultat = $get_users->select("" ,$condition);
                }else{
                    $resultat = $get_users->select();
                }
                return $resultat;
    } 
    function post($para){
        $get_users = new CRUD("clients");
        $get_users->insert($para);
    }
    function delete($param){
        $get_users = new CRUD("clients");
        reset($param);
        $first_key = key($param); 
        $where_id =$first_key;
        $condition = $param[$first_key];
        $get_users->delete($where_id , $condition);
    }
    function put($param){
        $get_users = new CRUD("clients");
        $get_users-> update($param,"ID_client",$param['ID_client']);
    }
}
function Data($res){
    $arr_post['users'] = array();
    foreach($res  as $value){
    $article = array("FirstName" => $value['Fname'],
                "LastName" => $value['Lname'],
                "TotalPrix" => $value['Total_Prix'],
                "IdClient" => $value['ID_client']);
                array_push($arr_post['users'],$article);
    }
     return $arr_post['users'];
}
function Api($contentType,$method,$params){
    $get_users = new API();
    $response = [
        'value' => 0,
        'error' => 'All good',
        'data' => null,
    ];
    if($contentType ==='application/json'){
        $data = $get_users->$method($params);
        if($method == "get"){
            $response['data'] = Data($data);
        }
        $response['value'] = 1;
    }
    else{
        $response['error'] = "Content is not Json Data";
    }
    
    echo json_encode($response);
}
$method = strtolower($_SERVER["REQUEST_METHOD"]);
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$params = json_decode(file_get_contents('php://input'),true);
Api($contentType,$method,$params);


