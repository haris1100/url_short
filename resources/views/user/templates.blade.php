@include('layout.profileHead')@include('layout.profileSidebar')
@php
    $data=\App\Http\Controllers\settings::returnselectedSettings();

@endphp
<div class="wrapper ">
    <div class="main-panel " id="ain-panelm">
        @include('layout.profileHeader')
        <div class="content " style="overflow:auto;height: 80vh">
        @php
            $getHostings=\Illuminate\Support\Facades\DB::table('hosting1')->where('live','yes')->get();
        @endphp
            @foreach($getHostings as $host)
                @php
                    $getPageName=\Illuminate\Support\Facades\DB::table('extendpages')->
                    where('hostId',$host->id)->where('pageNo',1)->pluck('pageName')->first();
                    $url='http://localhost/fyp/host/'.$host->name.'/'.$getPageName;
                    $getPAgeTitle=\App\Http\Controllers\link::get_title($url);
                    $getPAgeTitle=mb_substr($getPAgeTitle, 0, 100);
                    $getImgLink=\Illuminate\Support\Facades\DB::table('hostimg')->
                    where('host',$host->name)->pluck('file')->first();
                    if(!$getImgLink){
                        $getImgLink='';
                    }
                    $getRating=\Illuminate\Support\Facades\DB::table('rating')->where('host',$host->name)->get();
                    $likes=0;
                    $dislikes=0;
                    if(count($getRating)!=0){
                        foreach ($getRating as $rate){
                            $likes+=$rate->likes;
                            $dislikes+=$rate->dislikes;
                        }
                    }

                @endphp
                <div class="card mr-2 ml-2 h-1" style="width: 18rem;">
                    <img class="card-img-top" src="{{$getImgLink}}"  onerror="this.onerror=null;this.src='../public/img/templateAlternative.jfif';" alt="My Template">
                    <div class="card-body">
                        <p class="card-text" >{{$getPAgeTitle}}  |  {{$getPageName}}</p>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="javascript:void(0)" onclick="downloadAndZipMe('{{$host->name}}')" style="font-size: 18px" class="text-dark mr-2"><i class="fas fa-download"></i></a>
                            <a href="{{$url}}" target="_blank" class="btn btn-sm btn-secondary mr-2">Demo</a>
                            <a href="javascript:void(0)" onclick="RateAnyTemplate(1,'{{$host->name}}')" style="font-size: 20px" class="text-success"><i id="likeThumb{{$host->name}}" class="fas fa-thumbs-up  mr-2"></i></a><span>({{$likes}})</span>
                            <a href="javascript:void(0)" onclick="RateAnyTemplate(0,'{{$host->name}}') "style="font-size: 20px" class="text-danger"> <i id="DislikeThumb{{$host->name}}" class="fas fa-thumbs-down  ml-2 mr-2"></i></a><span>({{$dislikes}})</span>
                        </div>
                    </div>
                </div>








            @endforeach
        </div>
    </div>
</div>
<input type="text" hidden value="{{csrf_token()}}" id="templateToken">
@yield('scripts')

