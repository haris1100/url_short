<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\False_;

class link extends Controller
{

    function sendOriginalLink(Request $request)
    {
       return link::addLinkToDBRestFull($request->link,'server');
    }

    static function addLinkToDBRestFull($hostLink,$status){
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($permitted_chars), 0, 5);
        while (DB::table('links')->whereRaw("BINARY lvirtual='$code'")->exists()) {
            $code = substr(str_shuffle($permitted_chars), 0, 5);
        }
        $getOLink = link::checkURLForValidity($hostLink);
        if ($getOLink != '0') {
            $get_title = link::get_title($getOLink);
            if (session()->exists('people')) {
                $id = DB::table('links')->insertGetId(['lvirtual' => $code, 'loriginal' => $getOLink, 'title' => $get_title, 'uid' => session()->get('people')->uid,'status'=>$status]);
                    link::sortMe(session()->get('people')->uid);
            } else
                $id = DB::table('links')->insertGetId(['lvirtual' => $code, 'loriginal' => $getOLink, 'title' => $get_title,'status'=>$status]);
            return response()->json(['code' => $code, 'title' => $get_title, 'secureId' => $id]);
        }
        else return False;
    }

    static function get_title($url)
    {
        try {
            $page = file_get_contents($url);
            if (strlen($page) > 0) {
                $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $page, $match) ? $match[1] : 'MyLink';
                return $title;
            } else return "MyLink";
        } catch (\ErrorException $e) {
            return "MyLink";
        }


    }

    function pickRoute($link)
    {
        if (DB::table('links')->whereRaw("BINARY lvirtual  = '$link' ")->exists()) {
            $originalLinkGuide = DB::table('links')->whereRaw("BINARY lvirtual  = '$link' ")->first();
            $clicks = $originalLinkGuide->clicks;
            DB::table('links')->where('lvirtual', $link)->update(['clicks' => ++$clicks]);
            link::setStatForLinkClicks($link);
            if ($originalLinkGuide->reqOTP == 'yes') {
                return redirect('secure/require-otp')->with('id', $originalLinkGuide->id);
            } else {
                header('Location: ' . $originalLinkGuide->loriginal);
                die();
            }
        } else if ($link[-1] == '+') {
            return redirect('stats-of-link-clicks-and-visits/' . $link);
        } else return redirect('/');

    }

    static function setStatForLinkClicks($link)
    {


        $stats_of_links_clicks = DB::table('stats_of_links_clicks');
        $fetch_visitor_ip = link::get_visitor_ip_statically();
        $get_Device='';
        if(link::isMobile()){$get_Device='mobile';}
        else $get_Device='PC';
        $stats_of_links_clicks->insert(['date' => date('Y-m-d'), 'link_virtual' => $link, 'visitor_ip' => $fetch_visitor_ip,'device'=>$get_Device]);


    }
    static  function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    function registerNewUser(Request $request)
    {
        if (!DB::table('people')->where('uEmail', $request->email)->exists()) {
//                $password=password_hash()
            $hashed_password = password_hash($request->pass, PASSWORD_DEFAULT);
            DB::table('people')->insert(['uEmail' => $request->email, 'uPass' =>$hashed_password]);
            session()->put('people', DB::table('people')->where('uEmail', $request->email)->first());
            return true;
        } else {
            return response()->json('alreadyExists');
        }
    }

    function checkLogin(Request $request)
    {
        if (DB::table('people')->where(['uEmail' => $request->email])->exists()) {
            $get_credentials=DB::table('people')->where('uEmail', $request->email)->first();
            if(password_verify($request->your_pass, $get_credentials->uPass)) {
                session()->put('people', DB::table('people')->where('uEmail', $request->email)->first());
                return true;
            }
            else return 'Password is incorrect';

        } else {
            return response()->json('notFound');
        }
    }

    function logout()
    {
        Session::flush();

        return redirect('/');
    }

    function addLinkByShiftingLinkFromLogin(Request $request)
    {
        if (session()->exists('people')) {
            DB::table('links')->where([
                'lvirtual' => $request->newVirtualLink,
                'title' => $request->newTitle,
                'loriginal' => $request->link
            ])->update(['uid' => session()->get('people')->uid]);
            link::sortMe(session()->get('people')->uid);
        }
    }

    function fetchLinksDataForTable()
    {
        if (session()->exists('people')) {
            $id = session()->get('people')->uid;
            return response()->json(DB::table('links')->where('uid', $id)->orderByRaw('CONVERT(sort, SIGNED) asc')->get());
        }
        else return null;
    }

    function checkifExistuserCustomLink(Request $request)
    {
        if (!DB::table('links')->whereRaw("BINARY lvirtual  = '$request->removeSpaces' ")->exists()) {
            return response()->json(1);
        } else {
            return response()->json(0);
        }

    }

    function editLinkDataBySecureId(Request $request)
    {
        $getoldlvirtual = DB::table('links')->where('id', $request->secureIdForVirturalLinks)->pluck('lvirtual')->first();
        $symbols = array(' ', '/', '\\', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '-', '+', '=', ',', '.', '?', '>', '<', "'", '"', ';', ':', '|', '~', '`');
        $removeSpace = str_replace($symbols, '', $request->newVirtualLink);
//            $removeSpace=str_replace('/','',$removeSpace);
//            $removeSpace=str_replace('\\','',$removeSpace);
        if ($getoldlvirtual == $removeSpace) {
            DB::table('links')->where(['id' => $request->secureIdForVirturalLinks, 'uid' => session()->get('people')->uid])->update([
                'title' => $request->newTitle,
            ]);
            return response()->json(['virtual' => $removeSpace, 'title' => $request->newTitle]);
        } elseif (!DB::table('links')->whereRaw("BINARY lvirtual  = '$removeSpace' ")->exists()) {
            DB::table('links')->where(['id' => $request->secureIdForVirturalLinks, 'uid' => session()->get('people')->uid])->update([
                'lvirtual' => $removeSpace,
                'title' => $request->newTitle,
            ]);
            link::linkUpdater($removeSpace,$getoldlvirtual);
            return response()->json(['virtual' => $removeSpace, 'title' => $request->newTitle]);
        }

    }

    function fetchSpecficRowDataintoTxtField(Request $request)
    {
        $getSpecRow = DB::table('links')->where(['id' => $request->secureIdPram, 'uid' => session()->get('people')->uid])->first();
        return response()->json($getSpecRow);
    }

    function advanceSettingForMyLinkForm(Request $request)
    {

        if ($request->switch1 == '1') {
            DB::table('links')->where('id', $request->secureIdCopy1)->update([
                'reqOTP' => 'yes',
                'OTP' => sha1($request->passwordForOTP)
            ]);
        } else {
            DB::table('links')->where('id', $request->secureIdCopy1)->update([
                'reqOTP' => 'no',
            ]);
        }
        DB::table('links')->where('id', $request->secureIdCopy1)->update([
            'statsVisible' => $request->statVisibility,
        ]);
        if ($request->sortyourlink) {
            if($request->sortyourlink!='')
            link::sortMeByChoice($request->secureIdCopy1,session()->get('people')->uid,$request->sortyourlink);
            //$no = DB::table('links')->where('uid', session()->get('people')->uid)->count();
//            switch ($request->sortyourlink) {
//                case "mot":
//                    DB::table('links')->where('id', $request->secureIdCopy1)->update([
//                        'sort' => $no
//                    ]);
//                    break;
//                case "mtb":
//                    DB::table('links')->where('id', $request->secureIdCopy1)->update([
//                        'sort' => 1
//                    ]);
//                    break;
//                case "mtc":
//                    $no = $no % 2 == 0 ? $no : $no - 1;
//                    DB::table('links')->where('id', $request->secureIdCopy1)->update([
//                        'sort' => $no / 2
//                    ]);
//                    break;
//                default :
//                    break;
//            }
        }
    }

    function reqOTPforsecureLinkSinglePageOtpIDpassUrlRequest(Request $request)
    {
        if (DB::table('links')->where(['id' => $request->secureIdCopy2, 'reqOTP' => 'yes'])->exists()) {
            $getPassword = DB::table('links')->where(['id' => $request->secureIdCopy2, 'reqOTP' => 'yes'])->first();
            if ($getPassword->OTP == sha1($request->reqOTPforsecureLinkSinglePageOtpIDpass)) {
                return response()->json($getPassword->loriginal);
            } else return response()->json(0);

        }
    }

    function fetchDataFroAdvanceSecurityControl(Request $request)
    {
        if (DB::table('links')->where(['id' => $request->secureIdPrams, 'uid' => session()->get('people')->uid])->exists()) {
            $getValToReturn = DB::table('links')->where('id', $request->secureIdPrams)->first();
           // $getValToReturn->OTP=sha1($getValToReturn->OTP);
            return response()->json($getValToReturn);
        }
        return response()->json(0);
    }
//----------------------------------------API SECTION -----------------------------------------------------//
//
///
/// //////
/// ///////////////////////
/// ////////////////////////////////////


//----------------------------------------API SECTION END-----------------------------------------------------//
//
///
/// //////
/// ///////////////////////
/// ////////////////////////////////////


    function generateToken()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($permitted_chars), 0, 30);
        DB::table('apitokens')->updateOrInsert(['user_id' => session()->get('people')->uid], [
            'token' => $code,

        ]);
        return $code;
    }

    static function checkURLForValidity($host_URL)
    {
        $symbols = array('htt://', 'htp://', 'https://', 'http://');
        $removeSpaceFromC_Link = str_replace($symbols, '', $host_URL);
        $developedUrl = $removeSpaceFromC_Link;

        if (strpos($developedUrl, '.') !== False) {
            $checkDomainExtension = explode('.', $developedUrl);
            if (end($checkDomainExtension))
                return 'https://' . $developedUrl;
            else return '0';
        } else if (strpos($developedUrl, 'localhost') !== False) {
            return 'http://' . $developedUrl;
        } else {
            return '0';
        }

    }


    static function get_visitor_ip_statically()
    {

        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;

    }

    public static function linkUpdater($new,$old){
        DB::table('stats_of_links_clicks')->whereRaw("BINARY link_virtual='$old'")->update([
            'link_virtual'=>$new
        ]);
        DB::table('ip_info')->whereRaw("BINARY vlink='$old'")->update([
            'vlink'=>$new
        ]);

    }
    public static function linkDeleter($link){
        if (session()->exists('people')) {
            DB::table('stats_of_links_clicks')->whereRaw("BINARY link_virtual='$link'")->delete();
            DB::table('ip_info')->whereRaw("BINARY vlink='$link'")->delete();
        }
    }

    public function deleteMyPersonalLinkFromLinkManager(Request $id){
        if (session()->exists('people')) {
            if(DB::table('links')->where(['id'=>$id->id,'uid'=>session()->get('people')->uid])->exists()){
                $shortLink=DB::table('links')->where(['id'=>$id->id,'uid'=>session()->get('people')->uid])->pluck('lvirtual')->first();
                DB::table('links')->where(['id'=>$id->id,'uid'=>session()->get('people')->uid])->delete();
                link::linkDeleter($shortLink);
                link::sortMe(session()->get('people')->uid);
                return true;
            }
            else return 0;
        }
        else return 0;
    }

    public function starMyLink(Request $id){
        if (session()->exists('people')) {
            if(DB::table('links')->where(['id'=>$id->id,'uid'=>session()->get('people')->uid])->exists()){
                //$shortLink=DB::table('links')->where(['id'=>$id->id,'uid'=>session()->get('people')->uid])->pluck('lvirtual')->first();
                DB::table('links')->where(['id'=>$id->id,'uid'=>session()->get('people')->uid])->update([
                    'stared'=>$id->starValue
                ]);
             //   link::linkDeleter($shortLink);
                return 1;
            }
            else return 0;
        }
        else return 0;

    }

    static function sortMe($uid){
        $getAllLinks=DB::table('links')->where('uid',$uid)->orderByRaw('CAST(sort as DECIMAL(65,1)) asc')->get();
        $query='UPDATE links SET `sort` = (case ';

        foreach ($getAllLinks as $key=>$link){
            $query .=" WHEN `id` = '".$link->id."' THEN '".++$key."' ";
        }
        $query .="  end)  where uid='$uid' ";
   // else `--`
        DB::statement($query);

    }

    static function sortMeByChoice($id,$uid,$position){
        $getAllLinks=DB::table('links')->where('uid',$uid)->orderByRaw('CONVERT(sort, SIGNED) asc')->get();
        $query='UPDATE links SET `sort` = (case ';
        $sort=1;
        foreach ($getAllLinks as $key=>$link){

            if($link->id==$id){
                if($sort>$position){
                  $pos=$position-0.5;
                }
                else if($sort<$position){
                    $pos=$position+0.5;
                }
                else{
                    $pos=$sort;
                }
            }
            else
                $pos=$sort;
            $sort++;
//            if($position==$sort)
//                $pos=$sort++;

            $query .=" WHEN `id` = '".$link->id."' THEN '".$pos."' ";
        }
        $query .="  end)  where uid='$uid' ";
        // else `--`
        DB::statement($query);
        self::sortMe($uid);

    }



}


