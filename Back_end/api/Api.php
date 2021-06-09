<?php
include '../db.php';
/////////// VESRION 3

class API{
    public function get($para,$get_Db){
        $url = parse_url($_SERVER['REQUEST_URI']);
        if(isset($url['query'])){
            $params =  explode("=",$url['query']);
            $condition =[$params[0] =>  $params[1]];
            $resultat = $get_Db->select("" ,$condition);
        }else{
            $resultat = $get_Db->select();
        }
            return $resultat;
    } 
    public function post($para,$get_Db){
        $get_Db->insert($para);
    }
    public function delete($para,$get_Db){
        reset($para);
        $first_key = key($para); 
        $where_id =$first_key;
        $condition = $para[$first_key];
        $get_Db->delete($where_id , $condition);
    }
    public function put($para,$get_Db){
        $get_Db-> update($para,"ID_client",$para['ID_client']);
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
    $get_Db = new CRUD("clients");
    $get_Api = new API();
    $response = [
        'value' => 0,
        'error' => 'All good',
        'data' => null,
    ];
    if($contentType ==='application/json'){
        $data = $get_Api->$method($params,$get_Db);
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


