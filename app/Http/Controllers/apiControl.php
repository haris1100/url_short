<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class apiControl extends Controller
{
    public function linkShortDevelopersApi()
    {
        if (isset($_GET['my-host-link']) && $_GET['my-host-link'] != '') {
            try {

                $currentUrl = (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
                $breakUrl = explode('my-host-link=', $currentUrl);
                if (count($breakUrl) != 0) {
                    //echo $breakUrl[1];
                    $O_link = urldecode($breakUrl[1]);
                    //$O_link=urldecode($O_link);
                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $code = substr(str_shuffle($permitted_chars), 0, 5);
                    while (DB::table('links')->where('lvirtual', $code)->exists()) {
                        $code = substr(str_shuffle($permitted_chars), 0, 5);
                    }
                    $get_title = link::get_title($O_link);
                    DB::table('links')->insert(['lvirtual' => $code, 'loriginal' => $O_link, 'title' => $get_title,'status'=>'by api']);
                    //echo $O_link . '<br>' . $code;
                    $staticCode = 'http://localhost/fyp/';
                    return response()->json(['short_link' => $staticCode . $code]);
                }
            } catch (\ErrorException $e) {
                echo $e->getMessage();
            }
        } else
            echo(abort(404));
    }

//    public function linkShortDevelopersApiCustom()
//    {
//        if (isset($_GET['my-host-link']) && $_GET['my-host-link'] != '' &&
//            isset($_GET['my-custom-link']) && $_GET['my-custom-link'] != '' &&
//            isset($_GET['api-token']) && $_GET['api-token'] != ''
//        ) {
//            $C_link = $_GET['my-custom-link'];
//            $token = $_GET['api-token'];
//            try {
//                $currentUrl = (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
//                $breakUrl = explode('my-host-link=', $currentUrl);
//                $O_link = urldecode($breakUrl[1]);
//                if (strpos($O_link, '&my-custom-link=')) {
//                    $breakUrl2 = explode('&my-custom-link=', $O_link);
//                    $O_link = urldecode($breakUrl2[0]);
//                }
//                if (strpos($O_link, '&api-token=')) {
//                    $breakUrl3 = explode('&api-token=', $O_link);
//                    $O_link = urldecode($breakUrl3[0]);
//                }
//                $symbols = array(' ', '/', '\\', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '-', '+', '=', ',', '.', '?', '>', '<', "'", '"', ';', ':', '|', '~', '`');
//                $removeSpaceFromC_Link = str_replace($symbols, '', $C_link);
//                // echo $removeSpaceFromC_Link.'<br>'.$token.'<br>'.$O_link;
//                if (DB::table('apitokens')->where('token', $token)->exists()) {
//                    $getID = DB::table('apitokens')->where('token', $token)->pluck('user_id')->first();
//                    if (!DB::table('links')->whereRaw("BINARY lvirtual= '$removeSpaceFromC_Link'")->exists()) {
//                        $get_title = $this->get_title($O_link);
//                        DB::table('links')->insert(['lvirtual' => $removeSpaceFromC_Link, 'loriginal' => $O_link, 'title' => $get_title, 'uid' => $getID]);
//                        return response()->json(['host_link' => $O_link, 'title' => $get_title, 'short_link' => 'http://localhost/fyp/' . $removeSpaceFromC_Link]);
//                    } else return response()->json(['error' => 'custom link already  exists!']);
//                } else return response()->json(['error' => 'Token error!']);
//
//                //   }
//            } catch (\ErrorException $e) {
//                $e->getMessage();
//            }
//
//        } else
//            echo(abort(404));
//    }

    public function linkShortDevelopersApiCustom(Request $api)
    {
        $C_link = $api->custom_link;
        $token = $api->api_token;
        $O_link=$api->host_link;
        if ($C_link != '' && $token != '' && $O_link != '') {
            try {
            $symbols = array(' ', '/', '\\', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '-', '+', '=', ',', '.', '?', '>', '<', "'", '"', ';', ':', '|', '~', '`');
            $removeSpaceFromC_Link = str_replace($symbols, '', $C_link);
            // echo $removeSpaceFromC_Link.'<br>'.$token.'<br>'.$O_link;
            if (DB::table('apitokens')->where('token', $token)->exists()) {
                $getID = DB::table('apitokens')->where('token', $token)->pluck('user_id')->first();
                if (!DB::table('links')->whereRaw("BINARY lvirtual= '$removeSpaceFromC_Link'")->exists()) {
                    $setUrl=link::checkURLForValidity($O_link);
                    $get_title = link::get_title($setUrl);
                    DB::table('links')->insert(['lvirtual' => $removeSpaceFromC_Link, 'loriginal' => $O_link, 'title' => $get_title, 'uid' => $getID,'status'=>'by api',]);
                    link::sortMe($getID);
                    return response()->json(['host_link' => $O_link, 'title' => $get_title, 'custom_link' => 'http://localhost/fyp/' . $removeSpaceFromC_Link]);
                }
                else return response()->json(['error' => 'custom link already  exists!']);
            }
            else return response()->json(['error' => 'Token error || token expired || token wrong!']);

            //   }
        } catch (\ErrorException $e) {
            $e->getMessage();
        }

        }

        else {
         return response()->json(['error ' => 'fill all input fields']);
         // echo(abort(404));
        }
    }
}
