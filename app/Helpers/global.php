<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


function checkPermission($permission_name)
{
    $auth_user =  Auth::user();

    if (!$auth_user) {
        return false;
    }

    if ($auth_user->hasPermissionTo($permission_name)) {
        return true;
    }
    return false;
}


function deleteImageWithPath($path_delete)
{

    if (File::exists($path_delete)) {
        File::delete($path_delete);
    }
}

function getVehicleCategories()
{
    return [
        1 => 'Cars/Wagon/Jeep',
        2 => 'Van/Pick-Up',
        3 => 'Lorry/Truck',
        4 => 'Minibus',
        5 => 'Big Bus',
        6 => 'Tanker',
        7 => 'Trailer',
        8 => 'Tipper',
        9 => 'Tractor',
        10 => 'SUVs'
    ];
}


function getVehicleCategoriesForPlateNumbers()
{
    return [
        1 => 'Govt. Motor Vehicle',
        2 => 'Govt. Articulated',
        3 => 'Private Motor Vehicle',
        4 => 'Commercial Motor Vehicle',
        5 => 'Articulated',
        6 => 'Fancy',
        7 => 'Out of Series',
        8 => 'Military/Paramilitary',
        9 => 'Diplomatic',
        10 => 'Dealer',
        11 => 'FG',
        12 => 'Comp',
        13 => 'Gov Fan',
        14 => 'Rep',
    ];
}

function getDriverLicenseClasses()
{
    return [
        1 => 'Class A',
        2 => 'Class B',
        3 => 'Class C',
        4 => 'Class D',
        5 => 'Class E',
        6 => 'Class H',
        7 => 'Class I',
    ];
}

function getTrafficViolations()
{
    return [
        'light/sign_violation' => 'Light/Sign Violation',
        'road_obstruction' => 'Road Obstruction',
        'route_violation' => 'Route Violation',
        'speed_limit_violation' => 'Speed Limit Violation',
        'vehicle_licence_violation' => 'Vehicle Licence Violation',
        'vehicle_number_plate_violation' => 'Vehicle Number Plate Violation',
        'driver_licence_violation' => 'Driver\'s Licence Violation',
        'wrongful_overtaking' => 'Wrongful Overtaking',
        'road_marking_violation' => 'Road Marking Violation',
        'caution_sign_violation' => 'Caution Sign Violation',
        'dangerous_driving' => 'Dangerous Driving',
        'driving_under_alcohol_or_drug_influence' => 'Driving Under Alcohol or Drug Influence',
        'operating_vehicle_with_forged_documents' => 'Operating a Vehicle with Forged Documents',
        'unauthorized_removal_of_or_tampering_with_signs' => 'Unauthorized Removal of or Tampering with Signs',
        'do_not_move_violation' => 'Do not Move Violation',
        'inadequate_construction_warning' => 'Inadequate Construction Warning',
        'construction_area_speed_limit_violation' => 'Construction Area Speed Limit Violation',
        'failure_to_move_over' => 'Failure to Move Over',
        'failure_to_cover_unstable_materials' => 'Failure to Cover Unstable Materials',
        'overloading' => 'Overloading',
        'driving_with_worn-out_tyre_or_without_spare_tyre' => 'Driving With Worn-Out Tyre or Without Spare Tyre',
        'driving_without_or_with_shattered_windscreen' => 'Driving Without or With Shattered Windscreen',
        'failure_to_fix_red_flag_on_projected_load' => 'Failure To Fix Red Flag On Projected Load',
        'failure_to_report_accident' => 'Failure To Report Accident',
        'medical_personnel_or_hospital_rejection_of_road_accident_victim' => 'Medical Personnel Or Hospital Rejection of Road Accident Victim',
        'assaulting_marshal_on_duty' => 'Assaulting Marshal on Duty',
        'obstructing_marshal_on_duty' => 'Obstructing Marshal On Duty',
        'attempting_to_corrupt_marshal' => 'Attempting To Corrupt Marshal',
        'driving_without_specified_fire_extinguisher' => 'Driving Without Specified Fire Extinguisher',
        'driving_a_commercial_vehicle_without_passenger_manifest' => 'Driving A Commercial Vehicle Without Passenger Manifest',
        'driving_without_seat_belt' => 'Driving Without Seat Belt',
        'use_of_phone_driving' => 'Use of Phone Driving',
        'driving_a_vehicle_while_under_18_years' => 'Driving A Vehicle While Under 18 Years',
        'riding_motorcycle_without_a_crash_helmet' => 'Riding Motorcycle Without A Crash Helmet',
        'excessive_smoke_emission' => 'Excessive Smoke Emission',
        'mechanically_deficient_vehicle' => 'Mechanically Deficient Vehicle',
        'failure_to_install_speed_limiting_device' => 'Failure To Install Speed Limiting Device',
    ];
}


function getAirports()
{
    return [
        'abuja' => 'Nnamdi Azikiwe International Airport',
        'lagos' => 'Murtala Muhammed International Airport',
        'kano' => 'Mallam Aminu Kano International Airport',
        'port_harcourt' => 'Port Harcourt International Airport',
        'enugu' => 'Akanu Ibiam International Airport',
        'ibadan' => 'Ibadan Airport',
        'owerri' => 'Sam Mbakwe Airport',
        'calabar' => 'Margaret Ekpo International Airport',
        'asaba' => 'Asaba International Airport',
        'akure' => 'Akure Airport',
        'uyo' => 'Akwa Ibom Airport',
        'kaduna' => 'Kaduna Airport',
        'jos' => 'Yakubu Gowon Airport',
        'ilorin' => 'Ilorin Airport',
        'maiduguri' => 'Maiduguri International Airport',
        'yola' => 'Yola Airport',
        'sokoto' => 'Sultan Abubakar III Airport',
        'katsina' => 'Umaru Musa Yar\'Adua Airport',
        'benin' => 'Benin Airport',
        'minna' => 'Minna Airport',
        'warri' => 'Warri Airport',
        'zaria' => 'Zaria Airport',
        'gusau' => 'Gusau Airport',
        'bauchi' => 'Sir Abubakar Tafawa Balewa Airport',
        'akwa_ibom' => 'Akwa Ibom Airport',
        'adamawa' => 'Adamawa Airport',
        'bayelsa' => 'Bayelsa Airport',
        'cross_river' => 'Cross River Airport',
        'ekiti' => 'Ekiti Airport',
        'niger' => 'Niger Airport',
        'ogun' => 'Ogun Airport',
        'ondo' => 'Ondo Airport',
        'osun' => 'Osun Airport',
        'plateau' => 'Plateau Airport',
        'rivers' => 'Rivers Airport',
        'taraba' => 'Taraba Airport',
        'jigawa' => 'Jigawa Airport',
        'kogi' => 'Kogi Airport',
        'ebonyi' => 'Ebonyi Airport',
        'imo' => 'Imo Airport',
        'kebbi' => 'Kebbi Airport',
        'kogi' => 'Kogi Airport',
        'sokoto' => 'Sokoto Airport',
        'zamfara' => 'Zamfara Airport',
        'abia' => 'Abia Airport',
    ];
}


function getStates()
{
    return [
        'abia' => 'Abia',
        'adamawa' => 'Adamawa',
        'akwa_ibom' => 'Akwa Ibom',
        'anambra' => 'Anambra',
        'bauchi' => 'Bauchi',
        'bayelsa' => 'Bayelsa',
        'benue' => 'Benue',
        'borno' => 'Borno',
        'cross_river' => 'Cross River',
        'delta' => 'Delta',
        'ebonyi' => 'Ebonyi',
        'edo' => 'Edo',
        'ekiti' => 'Ekiti',
        'enugu' => 'Enugu',
        'gombe' => 'Gombe',
        'imo' => 'Imo',
        'jigawa' => 'Jigawa',
        'kaduna' => 'Kaduna',
        'kano' => 'Kano',
        'katsina' => 'Katsina',
        'kebbi' => 'Kebbi',
        'kogi' => 'Kogi',
        'kwara' => 'Kwara',
        'lagos' => 'Lagos',
        'nasarawa' => 'Nasarawa',
        'niger' => 'Niger',
        'ogun' => 'Ogun',
        'ondo' => 'Ondo',
        'osun' => 'Osun',
        'oyo' => 'Oyo',
        'plateau' => 'Plateau',
        'rivers' => 'Rivers',
        'sokoto' => 'Sokoto',
        'taraba' => 'Taraba',
        'yobe' => 'Yobe',
        'zamfara' => 'Zamfara',
        'fct_abuja' => 'FCT Abuja'
    ];
}


function getSeaPorts()
{
    return [
        'apapa' => 'Apapa Port Complex',
        'tin_can_island' => 'Tin Can Island Port',
        'calabar' => 'Port of Calabar',
        'warri' => 'Port of Warri',
        'onne' => 'Port of Onne',
        'port_harcourt' => 'Port of Port Harcourt',
        'sapele' => 'Port of Sapele',
        'koko' => 'Port of Koko',
        'burutu' => 'Port of Burutu',
        'brass' => 'Port of Brass',
    ];
}

function getRoadRoutes()
{
    return [
        'abakaliki_afikpo' => 'Abakaliki-Afikpo',
        'abeokuta_ibadan' => 'Abeokuta-Ibadan',
        'abeokuta_sagamu' => 'Abeokuta-Sagamu',
        'abuja_keffi' => 'Abuja - Keffi',
        'abuja_kubwa' => 'Abuja-Kubwa',
        'abuja_lokoja' => 'Abuja-Lokoja',
        'agbor_asaba' => 'Agbor-Asaba',
        'akure_ipetu_ijesha' => 'Akure-Ipetu Ijesha',
        'akure_ondo' => 'Akure-Ondo',
        'akure_owo' => 'Akure-Owo',
        'akwanga_and' => 'Akwanga-And',
        'akwanga_keffi' => 'Akwanga-Keffi',
        'akwanga_lafia' => 'Akwanga-Lafia',
        'apapa_oshodi' => 'Apapa -Oshodi',
        'apapa_oshodi_express_way' => 'Apapa-Oshodi Express Way',
        'asaba_benin' => 'Asaba-Benin',
        'asaba_onisha' => 'Asaba-Onisha',
        'awka_enugu' => 'Awka-Enugu',
        'awka_onitsha' => 'Awka-Onitsha',
        'aya_nyanya' => 'Aya-Nyanya',
        'b_kebbi_kalgo' => 'B/Kebbi-Kalgo',
        'bauchi_das' => 'Bauchi-Das',
        'bauchi_jos' => 'Bauchi-Jos',
        'bauchi_mai' => 'Bauchi-Mai',
        'benin_agbor' => 'Benin-Agbor',
        'benin_ore' => 'Benin-Ore',
        'benin_sapele' => 'Benin-Sapele',
        'bida_kutugi' => 'Bida-Kutugi',
        'birnin_kudu_kano' => 'Birnin Kudu-Kano',
        'bishi_bauchi' => 'Bishi-Bauchi',
        'bode_saadu_ilorin' => 'Bode Saadu-Ilorin',
        'bode_saadu_jebba' => 'Bode Saadu-Jebba',
        'central_business_district' => 'Central Business District',
        'cham_kaltingo' => 'Cham-Kaltingo',
        'cham_numan' => 'Cham-Numan',
        'chiromawa_kano' => 'Chiromawa-Kano',
        'chiromawa_zaria' => 'Chiromawa-Zaria',
        'damaturu_dankuka' => 'Damaturu-Dankuka',
        'doka_kaduna' => 'Doka - Kaduna',
        'dutse_kiyawa' => 'Dutse Kiyawa',
        'dutse_gaya' => 'Dutse-Gaya',
        'enugu_9th_mile' => 'Enugu-9th Mile',
        'enugu_abakaliki' => 'Enugu-Abakaliki',
        'enuguportharcourt' => 'Enuguportharcourt',
        'epe_lekki_exp_way' => 'Epe-Lekki Express Way',
        'garaku_akwanga' => 'Garaku-Akwanga',
        'gboko_aliade' => 'Gboko-Aliade',
        'gbongan_ibadan' => 'Gbongan-Ibadan',
        'gbongan_osogbo' => 'Gbongan-Osogbo',
        'girei_song' => 'Girei-Song',
        'gombe_bauchi' => 'Gombe-Bauchi',
        'gombe_biu' => 'Gombe-Biu',
        'gombe_yola' => 'Gombe-Yola',
        'hawan_kibo_jos_road' => 'Hawan Kibo -Jos Road',
        'hawan_kibo_forest' => 'Hawan Kibo-Forest',
        'hong_gombe' => 'Hong-Gombe',
        'hong_mubi' => 'Hong-Mubi',
        'ibadan_metropolis' => 'Ibadan Metropolis',
        'ibadan_iwo' => 'Ibadan-Iwo',
        'ibadan_oyo' => 'Ibadan-Oyo',
        'ife_ilesha' => 'Ife-Ilesha',
        'ijebu_ode_ore' => 'Ijebu-Ode-Ore',
        'ijebu_ode_sagamu' => 'Ijebu-Ode-Sagamu',
        'ikare_isua' => 'Ikare-Isua',
        'ikare_owo' => 'Ikare-Owo',
        'ilesha_ipetu_ijesha' => 'Ilesha-Ipetu Ijesha',
        'jalingo_wukari' => 'Jalingo-Wukari',
        'jbp_bab' => 'Jbp-Bab',
        'jos_bypass_bab' => 'Jos Bypass-Bab',
        'jos_zaria' => 'Jos-Zaria',
        'kaduna_abuja' => 'Kaduna-Abuja',
        'kaduna_birnin_gwari' => 'Kaduna-Birnin Gwari',
        'kaduna_zaria' => 'Kaduna-Zaria',
        'kano_gwarzo' => 'Kano-Gwarzo',
        'kano_hadejia' => 'Kano-Hadejia',
        'katsina_ala_zaki_biam' => 'Katsina Ala-Zaki Biam',
        'katsina_metropolis' => 'Katsina Metropolis',
        'kef_bede' => 'Kef-Bede',
        'keffi_garaku' => 'Keffi-Garaku',
        'keffi_nasarawa' => 'Keffi-Nasarawa',
        'keffi_nyanya' => 'Keffi-Nyanya',
        'kubwa_express_way' => 'Kubwa Express Way',
        'lagosabeokuta' => 'Lagosabeokuta',
        'lagos_ibadan' => 'Lagos-Ibadan',
        'lagos_ore' => 'Lagos-Ore',
        'lambata_suleja' => 'Lambata -Suleja',
        'lekki_epe_exp_way' => 'Lekki-Epe Exp. Way',
        'lfa_mkd' => 'Lfa-Mkd',
        'lokoja_ajaokuta' => 'Lokoja-Ajaokuta',
        'lokoja_zariagi' => 'Lokoja-Zariagi',
        'makurdi_aliade' => 'Makurdi-Aliade',
        'malumfashi_funtua' => 'Malumfashi-Funtua',
        'maraban_rido_kachia' => 'Maraban Rido-Kachia',
        'maraban_rido_sabo' => 'Maraban Rido-Sabo',
        'minna_metropolis' => 'Minna Metropolis',
        'minna_township' => 'Minna Township',
        'minna_suleja' => 'Minna-Suleja',
        'mutum_biyu_jalingo' => 'Mutum Biyu-Jalingo',
        'nasarawa_eggon_lafia' => 'Nasarawa Eggon -Lafia',
        'nasarawa_eggon_akwanga' => 'Nasarawa Eggon-Akwanga',
        'nasarawa_keffi' => 'Nasarawa -Keffi',
        'numan_road' => 'Numan Road',
        'nyanya_aya' => 'Nyanya-Aya',
        'ogbomoso_ilorin' => 'Ogbomoso-Ilorin',
        'oji_awka' => 'Oji-Awka',
        'okene_lokoja' => 'Okene-Lokoja',
        'ollooru_okoolowo' => 'Ollooru-Okoolowo',
        'omu_aran_ilorin' => 'Omu Aran-Ilorin',
        'ondo_ore' => 'Ondo-Ore',
        'onitshaowerri' => 'Onitshaowerri',
        'oyo_ogbomosho' => 'Oyo-Ogbomosho',
        'portharcort_aba' => 'Portharcort-Aba',
        'sokoto_metropolis' => 'Sokoto Metropolis',
        'sokoto_gussau' => 'Sokoto-Gussau',
        'tafa_jare' => 'Tafa -Jare',
        'tarfa_jere' => 'Tarfa-Jere',
        'tashar_yarizaria' => 'Tashar Yarizaria',
        'toro_bauchi' => 'Toro-Bauchi',
        'umaru_musa_yaradua_exp_way' => 'Umaru Musa Yaradua Exp Way',
        'wudil_kano' => 'Wudil-Kano',
        'yola_numan' => 'Yola-Numan',
        'zaki_biam_wukari' => 'Zaki Biam-Wukari',
        'zariagi_okene' => 'Zariagi-Okene',
        'zuba_die_dei_front_of_mopol_barracks' => 'Zuba-Die Dei Front of Mopol Barracks',
        'zuba_madalla' => 'Zuba-Madalla',
        'zuba_tunga_maje' => 'Zuba-Tunga Maje',
        'zuru_ribah' => 'Zuru-Ribah',
        'nkalagu_enugu' => 'Nkalagu-Enugu',
        'makurdi_gboko' => 'Makurdi-Gboko',
        'portharcourt-mbiama' => 'Portharcourt-Mbiama',
        'njaba_owerri' => 'Njaba-Owerri',
        'benin_oluku' => 'Benin-Oluku',
        'illela_sokoto' => 'Illela-Sokoto',
        'sokoto_jega' => 'Sokoto-Jega',
        'maiduguri_bensheka' => 'Maiduguri-Bensheka',
        'mutum_biyu_wukari' => 'Mutum Biyu-Wukari'
    ];
}
