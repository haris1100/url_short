<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class settings extends Controller
{
    function login(Request $request)
    {
        if (DB::table('admin')->where('pass', $request->password)->exists()) {
            session()->put('adminLogin', true);
            return redirect('admin/Settings');
        } else return redirect()->back();
    }

    function settingsFormData(Request $request)
    {
        if ($request->hasFile('uploadFielForLandingBg')) {
            $rand = rand(1000, 100000);
            $rand = $request->CustomNameForBackgroundimage != '' ? $request->CustomNameForBackgroundimage . $rand : $rand;
            $request->uploadFielForLandingBg->storeAs('landingbg', $rand . '.jpg');
            $path = 'public/landingbg/' . $rand . '.jpg';
            DB::table('settings')->insert(['landingBg' => $path]);
        }

        DB::table('selectedsettings')->update([
            'landingBg' => $request->landingBg,
            'landingHeaderLogin' => $request->LandingPageHeaderLoginBtnColor,
            'landingHeader' => $request->LandingPageHeaderbgcolor,
            'landinHeaderText' => $request->LandingPageHeadertextcolor,
            'ltc' => $request->LandingPageHeaderLogintextcolor,
            'uhbgc' => $request->bgColorForUserHeader,
            'usbgc' => $request->BackgroundColorForUserSideBar,
            'ustc' => $request->UserSidebarTextColor,
            'scrollusoc' => $request->UserScrollBaroverflowColor,
            'uhbc' => $request->userHostingColorBoxes,
            'ultbc' => $request->UserLinkTableColor

        ]);

        return redirect()->back();

    }

    static function returnDataForDefault()
    {
        return DB::table('settings')->get();
    }

    static function returnselectedSettings()
    {
        return DB::table('selectedsettings')->first();
    }


    function get_data_for_allover_stats_for_clicks(Request $request)
    {
        $link = $request->link;
        $get_me_a_table = DB::table('stats_of_links_clicks');
        $link = str_replace('+', '', $link);
        if (DB::table('links')->whereRaw("BINARY lvirtual='$link'")->exists() && settings::checkIfstatsAreDisabled($link)) {
            if ($get_me_a_table->whereRaw("BINARY link_virtual='$link'")->exists()) {
                $stats = $get_me_a_table->whereRaw("BINARY link_virtual='$link'")->groupBy('date')->get('date');
                foreach ($stats as $stat) {
                    $count = DB::table('stats_of_links_clicks')->whereRaw("BINARY link_virtual='$link' and date='$stat->date'")->count();
                    $array_of_stats[] = array(
                        $stat->date, $count
                    );
                }
                return $array_of_stats;
            } else return 1; // for no click but link exists

        } else return 0; // link does not exist
        // return $link;


    }

    function send_link_name_to_set_device_detection(Request $request)
    {
        $link = $request->link;
        $get_me_a_table = DB::table('stats_of_links_clicks');
        $link = str_replace('+', '', $link);
        if (DB::table('links')->whereRaw("BINARY lvirtual='$link'")->exists() && settings::checkIfstatsAreDisabled($link)) {
            if ($get_me_a_table->whereRaw("BINARY link_virtual='$link'")->exists()) {
//                $stats= $get_me_a_table->whereRaw("BINARY link_virtual='$link'")->groupBy('date')->get('date');
//                foreach ($stats as $stat){
//                    $count=DB::table('stats_of_links_clicks')->whereRaw("BINARY link_virtual='$link' and date='$stat->date'")->count();
                $array_of_stats = array(
                    DB::table('stats_of_links_clicks')->whereRaw("BINARY link_virtual='$link' and device='mobile'")->count(),
                    DB::table('stats_of_links_clicks')->whereRaw("BINARY link_virtual='$link' and device='PC'")->count()

                );
//                }
                return $array_of_stats;
            } else return 1; // for no click but link exists

        } else return 0; // link does not exist
        // return $link
    }

    public function send_link_name_to_set_date_ip(Request $request)
    {
        $link = $request->link;
        $link = str_replace('+', '', $link);
        if (DB::table('links')->whereRaw("BINARY lvirtual='$link'")->exists() && settings::checkIfstatsAreDisabled($link)) {
            if (DB::table('stats_of_links_clicks')->whereRaw("BINARY link_virtual='$link'")->exists()) {
                $get_ips = DB::table('stats_of_links_clicks')->whereRaw("BINARY link_virtual='$link'")->get();
                if ($request->requestCode != '1') {
                    foreach ($get_ips as $get_ip) {
                        if (!DB::table('ip_info')->where('id', $get_ip->id)->exists()) {
                            try {
                                $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $get_ip->visitor_ip));
                                // 103.31.92.169
                                DB::table('ip_info')->insert([
                                    'id' => $get_ip->id,
                                    'vlink' => $link,
                                    'ip' => $get_ip->visitor_ip,
                                    'CountryName' => $ipdat->geoplugin_countryName,
                                    'City Name' => $ipdat->geoplugin_city,
                                    'ContinentName' => $ipdat->geoplugin_continentName,
                                    'Latitude' => $ipdat->geoplugin_latitude,
                                    'Longitude' => $ipdat->geoplugin_longitude,
                                    'Currency Symbol' => $ipdat->geoplugin_currencySymbol,
                                    'Currency Code' => $ipdat->geoplugin_currencyCode,
                                    'Timezone' => $ipdat->geoplugin_timezone,
                                    'device'=>$get_ip->device
                                ]);
                            } catch (\ErrorException $e) {

                            }
                        }
                    }
                }
                if ($request->requestCode == '1') {
                    $get_country_names = DB::table('ip_info')->whereRaw("BINARY vlink='$link'")->groupBy('ContinentName')->get('ContinentName');
                    foreach ($get_country_names as $cn) {
                        if ($cn->ContinentName != '')
                            $return_Continent_name[] = array(
                                $cn->ContinentName,
                                DB::table('ip_info')->whereRaw("BINARY vlink='$link' and ContinentName='$cn->ContinentName'")->count()
                            );
                    }
                    return $return_Continent_name;
                } else {
                    $get_country_names = DB::table('ip_info')->whereRaw("BINARY vlink='$link'")->groupBy('CountryName')->get('CountryName');
                    foreach ($get_country_names as $cn) {
                        if ($cn->CountryName != '')
                            $return_country_name[] = array(
                                $cn->CountryName,
                                DB::table('ip_info')->whereRaw("BINARY vlink='$link' and CountryName='$cn->CountryName'")->count()
                            );
                    }
                    return $return_country_name;
                }


            } else return 1; // for no click but link exists
        } else return 2;  // link does not exist

    }

    public function checkIfstatsAreDisabled($link)
    {
        if (DB::table('links')->whereRaw("BINARY lvirtual='$link'")->exists()) {
            if (session()->exists('people')) {
                $user_id = session()->get('people')->uid;
                if (DB::table('links')->whereRaw("BINARY lvirtual='$link' and uid='$user_id'")->exists()) {
                    return true;
                } else if (DB::table('links')->whereRaw("BINARY lvirtual='$link' and statsVisible='yes'")->exists()) {
                    return true;
                } else return false;
            } else if (DB::table('links')->whereRaw("BINARY lvirtual='$link' and statsVisible='yes'")->exists()) {
                return true;
            } else return false;
        } else return false;
    }

    function set_up_world_map(Request $link)
    {
        $link = $link->link;
        $link = str_replace('+', '', $link);
        if (DB::table('links')->whereRaw("BINARY lvirtual='$link'")->exists() && settings::checkIfstatsAreDisabled($link)) {
            if (DB::table('stats_of_links_clicks')->whereRaw("BINARY link_virtual='$link'")->exists()) {
                $get_country_names = DB::table('ip_info')->whereRaw("BINARY vlink='$link'")->groupBy('CountryName')->get('CountryName');
                foreach ($get_country_names as $cn) {
                    if ($cn->CountryName != '') {
                        $get_click_count_per_country = DB::table('ip_info')->whereRaw("BINARY vlink='$link' and CountryName='$cn->CountryName'")->count();
                        $get_mobile_device_count = DB::table('ip_info')->whereRaw("BINARY vlink='$link' and CountryName='$cn->CountryName' and device='mobile'")->count();
                        $return_country_name[] = array(
                            $cn->CountryName,
                            $get_click_count_per_country,
                            $get_mobile_device_count,
                            ($get_click_count_per_country- $get_mobile_device_count)
                        );
                    }
                }
                return $return_country_name;
            }
            else return 1;
        }else return 2;  // link does not exist


    }

    function checkLogout(){
        if (!session()->exists('people')) {
            return 0;
        }
        else return 1;
    }
}
