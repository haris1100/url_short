<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class hosting extends Controller
{
    function checkMYhostForHosting(Request $i){
        if(!DB::table('hosting1')->where('name',$i->name)->exists()){
            return response()->json(1);
        }
    }
    function saveMyNewHostingProject(Request $r){
        if(!DB::table('hosting1')->where('name',$r->projectHostName)->exists()){
        $id=DB::table('hosting1')->insertGetId([
            'name'=>$r->projectHostName,
            'page'=>$r->NoOfPages,
            'createdBy'=>session()->get('people')->uid
        ]);
        for($page=1;$page<=$r->NoOfPages;$page++){
            DB::table('extendpages')->insert([
                'hostId'=>$id,
                'pageNo'=>$page
            ]);
        }
        if (!file_exists(resource_path( 'views/hosts/'. $r->projectHostName  ))) {
            mkdir( resource_path( 'views/hosts/' . $r->projectHostName), 0777, true );
        }

        }
    }
    function getAllMyHostingProjects(){
        $projects=DB::table('hosting1')->where('createdBy',session()->get('people')->uid)->get();
        $color=DB::table('selectedsettings')->pluck('uhbc')->first();
        return response()->json(['projects'=>$projects,'color'=>$color]);
    }
    function returnViewForAdvanceHosting($name){
        try{
        if(DB::table('hosting1')->where(['createdBy'=>session()->get('people')->uid,'name'=>$name])->exists()){
           $page= DB::table('hosting1')->where(['createdBy'=>session()->get('people')->uid,'name'=>$name])->pluck('page')->first();
           $fileLinks= DB::table('hostImg')->where('host',$name)->get();
            return view('user.hostingAdvance',['page'=>$page,'name'=>$name,'fileLinksVirtual'=>$fileLinks]);
        }
        else echo abort(404);
    }
    catch(QueryException $e){

    }
    }
    function getAlldataIfSelectChangeForHostingADV(Request $request){
        $data=explode('[CuttmyEdge]',$request->data);
        if(DB::table('hosting1')->where(['createdBy'=>session()->get('people')->uid,'name'=>$data[0]])->exists()) {
          $hostedID=  DB::table('hosting1')->where(['createdBy'=>session()->get('people')->uid,'name'=>$data[0]])->pluck('id')->first();
            $pageData=DB::table('extendpages')->where(['hostId'=>$hostedID,'pageNo'=>$data[1]])->first();
            if (file_exists(resource_path( 'views/hosts/'.$data[0].'/'.$pageData->pageName.'.html'))) {
                $fp= file_get_contents( resource_path( 'views/hosts/'.$data[0].'/'.$pageData->pageName. '.html' ), 'w' );
                return response()->json(['pageName' => $pageData->pageName, 'textHost' => $fp, 'hostName' => $data[0]]);
            }
            else{
                return response()->json(['pageName' => $pageData->pageName, 'textHost' => '', 'hostName' => $data[0]]);
            }
        }
    }
    function ToSaveAllTextAndNameOfHostADV(Request $request){
        $data=explode('[CuttmyEdge]',$request->pageNo);
        if(DB::table('hosting1')->where(['createdBy'=>session()->get('people')->uid,'name'=>$data[0]])->exists()) {
            $hostedID=  DB::table('hosting1')->where(['createdBy'=>session()->get('people')->uid,'name'=>$data[0]])->pluck('id')->first();
            $oldName= DB::table('extendpages')->where(['hostId'=>$hostedID,'pageNo'=>$data[1]])->pluck('pageName')->first();
            if(!DB::table('extendpages')->where(['hostId'=>$hostedID,'pageName'=>$request->pageName])->exists()){
            DB::table('extendpages')->where(['hostId'=>$hostedID,'pageNo'=>$data[1]])->update([
                'pageName'=>$request->pageName,
                //'pageText'=>$request->textHost
            ]);
            }
           // else return response()->json(['alreadyExists'=>1]);
            if (file_exists(resource_path( 'views/hosts/'.$data[0].'/'.$oldName.'.html'))) {
                rename(resource_path( 'views/hosts/'.$data[0].'/'.$oldName.'.html'), resource_path( 'views/hosts/'.$data[0].'/'.$request->pageName. '.html' ));
                $fp= fopen( resource_path( 'views/hosts/'.$data[0].'/'.$request->pageName. '.html' ), 'w' );
                fwrite($fp, $request->textHost);
                fclose($fp);
            }
            else{
               $fp= fopen( resource_path( 'views/hosts/'.$data[0].'/'.$request->pageName. '.html' ), 'w' );
                fwrite($fp, $request->textHost);
                fclose($fp);
            }


        }
    }
    function uploadFilePicVidForADVHOST(Request $file,$data){
        if($file->uplaodPicVidFilForADVHOST=='jpg'||$file->uplaodPicVidFilForADVHOST=='mp4'||
        $file->uplaodPicVidFilForADVHOST=='js'||$file->uplaodPicVidFilForADVHOST=='css'){

        $type='.'.$file->uplaodPicVidFilForADVHOST;
        //echo $file->fileUplaodForADVOST;
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
             $rand=substr(str_shuffle($permitted_chars), 0, 120);
        if($file->fileNameFetchedByFile==''){
            $fileName=$rand;
        }
        else{
            $fileName=$file->fileNameFetchedByFile.'...'.substr(str_shuffle($permitted_chars), 0, 30);
        }
        if($file->fileUplaodForADVOST) {

             $vl=substr(str_shuffle($permitted_chars), 0, 8);
            $file->fileUplaodForADVOST->storeAs('temp', $fileName .$type);
            rename(public_path('temp/'.$fileName.$type),resource_path( 'views/hosts/'.$data.'/'.$fileName.$type));
            $path=url('/').'/resources/views/hosts/'.$data.'/'.$fileName.$type;
            DB::table('hostImg')->insert(['host'=>$data,'file'=>$path,'virtualLink'=>$vl]);
        }
    }
   // else if($file->uplaodPicVidFilForADVHOST=='html'){
        else if(strpos($file->uplaodPicVidFilForADVHOST, 'html') !== FALSE){
       if($file->fileNameFetchedByFile!=''){
        $extension=explode('.',$file->fileNameFetchedByFile);
            if(end($extension)=='html'){
                if($file->fileUplaodForADVOST) {
                   $getPage=explode('[',$file->fileNameFetchedByFile);
                   $pageName=$getPage[0];
                   $rand=rand(1000,9999999);
                   $file->fileUplaodForADVOST->storeAs('temp', $rand .'.html');
                   rename(public_path('temp/'.$rand.'.html'),resource_path( 'views/hosts/'.$data.'/'.$rand.'.html'));
                   if (file_exists(resource_path( 'views/hosts/'.$data.'/'.$pageName.'.html'))) {

                    $fpNew= file_get_contents( resource_path( 'views/hosts/'.$data.'/'.$rand. '.html' ));

                        if($file->uplaodPicVidFilForADVHOST=='Ahtml'){
                            $fpExisting= fopen( resource_path( 'views/hosts/'.$data.'/'.$pageName. '.html' ), 'a' );
                            fwrite($fpExisting, $fpNew);
                            fclose($fpExisting);
                        }
                        else{
                            $fpExisting= fopen( resource_path( 'views/hosts/'.$data.'/'.$pageName. '.html' ), 'w' );
                            fwrite($fpExisting, $fpNew);
                            fclose($fpExisting);

                        }
                    }
                        unlink(resource_path( 'views/hosts/'.$data.'/'.$rand.'.html'));

                }
            }

       }


    }

       return redirect()->back();
    }
    function findImgByVirtualLink($link){
        if(DB::table('hostImg')->where('virtualLink',$link)->exists()){
           $getLink= DB::table('hostImg')->where('virtualLink',$link)->pluck('file')->first();
           header('Location: ' .$getLink);
           die();
        }
        else echo abort(404);
    }
    function deleteMYEntireHOSTADVProject(Request $name){
        hosting::delete_directory(resource_path( 'views/hosts/'.$name->name));
        $hostedID=  DB::table('hosting1')->where(['createdBy'=>session()->get('people')->uid,'name'=>$name->name])->pluck('id')->first();

        DB::table('hostImg')->where('host',$name->name)->delete();
        DB::table('extendpages')->where('hostId',$hostedID)->delete();
        DB::table('hosting1')->where('name',$name->name)->delete();
//        array_map('unlink', glob("resource_path( 'views/hosts/'.$name->name)/*.*"));
//        rmdir(resource_path( 'views/hosts/'.$name->name));


    }
    static function delete_directory($dirname) {
        if (is_dir($dirname))
            $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                    unlink($dirname."/".$file);
                else
                    delete_directory($dirname.'/'.$file);
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }

    public function liveMyProjectPHP(Request$request){
        if($request->checked==1){
            $live='yes';
        }
        else if($request->checked==0) $live='no';
        if($live=='no'||$live=='yes')
        if(DB::table('hosting1')->where('name',$request->name)->exists()){
            DB::table('hosting1')->where('name',$request->name)->update([
                'live'=>$live
            ]);
        }


    }
    function GetliveMyProjectPHP(Request $request){
        if($request->tellMeAboutCheck==1){
            if(DB::table('hosting1')->where('name',$request->name)->exists()){
                $Getlives= DB::table('hosting1')->where('name',$request->name)->pluck('live')->first();
                return response()->json(['live'=>$Getlives]);
            }
        }

    }
    function RateMyTemplate(Request $request){
        if($request->rating==1){
            $like=1;
            $dislike=0;
        }
        else{
            $like=0;
            $dislike=1;
        }
        if(DB::table('hosting1')->where('name',$request->name)->exists()){
            DB::table('rating')->updateOrInsert(['host'=>$request->name,'user_id'=>session()->get('people')->uid],[
                'likes'=>$like,'dislikes'=>$dislike
            ]);
        }
    }

    public  function zipMe(Request $request){
//        $dir = resource_path( 'views/hosts/'.$request->name);
//        $zip_file = $request->name.'.zip';
//
//// Get real path for our folder
//        $rootPath = realpath($dir);
//
//// Initialize archive object
//        $zip = new \ZipArchive();
//        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
//
//// Create recursive directory iterator
//        /** @var SplFileInfo[] $files */
//        $files = new RecursiveIteratorIterator(
//            new RecursiveDirectoryIterator($rootPath),
//            RecursiveIteratorIterator::LEAVES_ONLY
//        );
//
//        foreach ($files as $name => $file)
//        {
//            // Skip directories (they would be added automatically)
//            if (!$file->isDir())
//            {
//                // Get real and relative path for current file
//                $filePath = $file->getRealPath();
//                $relativePath = substr($filePath, strlen($rootPath) + 1);
//
//                // Add current file to archive
//                $zip->addFile($filePath, $relativePath);
//            }
//        }
//
//// Zip archive will be created only after closing object
//        $zip->close();
//
//
//        header('Content-Description: File Transfer');
//        header('Content-Type: application/octet-stream');
//        header('Content-Disposition: attachment; filename='.basename($zip_file));
//        header('Content-Transfer-Encoding: binary');
//        header('Expires: 0');
//        header('Cache-Control: must-revalidate');
//        header('Pragma: public');
//        header('Content-Length: ' . filesize($zip_file));
//        readfile($zip_file);

    }

    public function addNewPageToMyADVHost(Request $page){
        if(DB::table('hosting1')->where('name',$page->name)->exists()){
            $getPageCount=DB::table('hosting1')->where('name',$page->name)->first();
            $newPage=$getPageCount->page+1;
            DB::table('hosting1')->where('name',$page->name)->update([
                'page'=>$newPage
            ]);
            DB::table('extendpages')->insert([
                'hostId'=>$getPageCount->id,
                'pageNo'=>$newPage
            ]);
            return 1;
        }
        else return 0;
    }

    public function deletePagePageFromMyADVHost(Request $page){
        $data=explode('[CuttmyEdge]',$page->data);
        $hostName=$data[0];
        $pageNo=$data[1];
        if(DB::table('hosting1')->where('name',$hostName)->exists()){
            $getPageCount=DB::table('hosting1')->where('name',$hostName)->first();
            DB::table('hosting1')->where('name',$hostName)->update([
               'page'=>--$getPageCount->page
            ]);


        $getAllPagesForDelOne=DB::table('extendpages')->where('hostId',$getPageCount->id)->get();
            $no=1;
            foreach ($getAllPagesForDelOne as $p){
                if($p->pageNo!=$pageNo)
                    $arrayDesign[]=array(
                    'hostId'=>$getPageCount->id,
                    'pageNo'=>$no++,
                    'pageName'=>$p->pageName
                );
                else{
                    if(file_exists(resource_path( 'views/hosts/'.$hostName.'/'.$p->pageName.'.html'))){
                        unlink(resource_path( 'views/hosts/'.$hostName.'/'.$p->pageName.'.html'));
                    }
                }


            }
        DB::table('extendpages')->where('hostId',$getPageCount->id)->delete();
        DB::table('extendpages')->insert($arrayDesign);

        return 1;
    }
        else return 0;
    }

    public function addHostingPageLinkToLinkManager(Request $link){
        return link::addLinkToDBRestFull($link->url,'by host');
    }

    public function returnHostingMain($hostName,$pageName){

        try {
            $getPremission=hosting::checkHostEligiblity($hostName);
            if($getPremission==1)
            return view('hosts.' . $hostName . '.' . $pageName);
            else
                echo "Project is not Live!!!";

        }
        catch (InvalidArgumentException $e){
            echo abort(404);
        }
    }

    static function checkHostEligiblity($hostName){
        if(DB::table('hosting1')->where('name',$hostName)->exists()){
            $getHost=DB::table('hosting1')->where('name',$hostName)->first();
            if (session()->exists('people')) {
               return $getHost->createdBy==session()->get('people')->uid?1:0;
            }
            else if($getHost->live=='yes')
                return 1;
            else return 0;
        }
        else return 0;
    }

    function returnTreeView($name){
        $host=$name;
           return redirect(route('file-manager', compact('host')));
    }

    static function treeView($name){
        if(DB::table('hosting1')->where(['createdBy'=>session()->get('people')->uid,'name'=>$name])->exists()){
            // $hostedID=  DB::table('hosting1')->where(['createdBy'=>session()->get('people')->uid,'name'=>$name])->pluck('id')->first();
            // $pageData=DB::table('extendpages')->where(['hostId'=>$hostedID])->get();
            // return $pageData;
            $html=array();
            $css=array();
            $js=array();
            $image=array();
            $video=array();
            $fileList = glob(resource_path( 'views/hosts/'.$name.'/*.html'));
            foreach($fileList as $filename){
                if(is_file($filename)){
                    $file=explode('/',$filename);
                   $html[]= end($file); 
                }   
            }
            $fileList = glob(resource_path( 'views/hosts/'.$name.'/*.js'));
            foreach($fileList as $filename){
                if(is_file($filename)){
                    $file=explode('/',$filename);
                   $js[]= end($file); 
                }   
            }
            $fileList = glob(resource_path( 'views/hosts/'.$name.'/*.css'));
            foreach($fileList as $filename){
                if(is_file($filename)){
                    $file=explode('/',$filename);
                   $css[]= end($file); 
                }   
            }
            $fileList = glob(resource_path( 'views/hosts/'.$name.'/*.jpg'));
            foreach($fileList as $filename){
                if(is_file($filename)){
                    $file=explode('/',$filename);
                   $image[]= end($file); 
                }   
            }
            $fileList = glob(resource_path( 'views/hosts/'.$name.'/*.mp4'));
            foreach($fileList as $filename){
                if(is_file($filename)){
                    $file=explode('/',$filename);
                   $video[]= end($file); 
                }   
            }
            $array=array($html,$css,$js,$image,$video);
            return $array;
            // $mydir = resource_path( 'views/hosts/'.$name);   
            // $myfiles = array_diff(scandir($mydir), array('.', '..'));   
            // print_r($myfiles); 
          
        }
        else die();
    }

}
