<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //成功
    protected function success($data, $msg="ok", $code = 201){
        $this->parseNull($data);
        $result = [
            "success"=>true,
            "msg"=>$msg,
            "data"=>$data,
        ];
        return response()->json($result, $code );
    }


    //失敗
    // protected function error($data="", $msg="fail", $code = 400){
    protected function error($data="", $msg="fail", $code = 200){
        $result = [
            "success"=>false,
            "msg"=>$msg,
            "data"=>$data
        ];
        return response()->json($result, $code );
    }

    //如果返回的資料中有 null 則那其值修改為空 （安卓和IOS 對null型的資料不友好，會報錯）
    private function parseNull(&$data){
        if(is_array($data)){
            foreach($data as &$v){
                $this->parseNull($v);
            }
        }else{
            if(is_null($data)){
                $data = "";
            }
        }
    }
}
