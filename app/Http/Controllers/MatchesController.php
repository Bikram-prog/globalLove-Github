<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersMeta;
use App\Models\UserPhotos;
use App\Models\Connectionsfinal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Pagination\LengthAwarePaginator;
use Request;
use DateTime;
use Mail;


class MatchesController extends Controller
{

    public $userss = [];
    public $usersMatch = [];
	
    public function algorithm(Request $request){

        $this->usersMatch = DB::Select("SELECT * FROM users_match WHERE users_match_id = '".Crypt::decryptString($_COOKIE['UserIds'])."'");

        $sex = $this->usersMatch[0]->match_seeking;
        $age_min = $this->usersMatch[0]->match_min_age;
        $age_max = $this->usersMatch[0]->match_max_age;
        $country = $this->usersMatch[0]->match_country;
        $drink = explode(',', $this->usersMatch[0]->match_drink);
        $drink = implode("','", $drink);
        $smoke = explode(',', $this->usersMatch[0]->match_smoke);
        $smoke = implode("','", $smoke);
        $height_min = $this->usersMatch[0]->match_min_height;
        $height_max = $this->usersMatch[0]->match_max_height;
        $weight_min = $this->usersMatch[0]->match_min_weight;
        $weight_max = $this->usersMatch[0]->match_max_weight;
        $body_type = explode(',', $this->usersMatch[0]->match_body_type);
        $body_type = implode("','", $body_type);
        $match_ethnicity = explode(',', $this->usersMatch[0]->match_ethnicity);
        $match_ethnicity = implode("','", $match_ethnicity);
        $match_appearance = explode(',', $this->usersMatch[0]->match_appearance);
        $match_appearance = implode("','", $match_appearance);
        $match_body_art = explode(',', $this->usersMatch[0]->match_body_art);
        $match_body_art = implode("','", $match_body_art);
        $match_marital_status = explode(',', $this->usersMatch[0]->match_marital_status);
        $match_marital_status = implode("','", $match_marital_status);
        $match_occupation = explode(',', $this->usersMatch[0]->match_occupation);
        $match_occupation = implode("','", $match_occupation);
        $match_emp_status = explode(',', $this->usersMatch[0]->match_emp_status);
        $match_emp_status = implode("','", $match_emp_status);
        $match_education = explode(',', $this->usersMatch[0]->match_education);
        $match_education = implode("','", $match_education);
        $match_eng_ability = explode(',', $this->usersMatch[0]->match_eng_ability);
        $match_eng_ability = implode("','", $match_eng_ability);
        $match_religion = $this->usersMatch[0]->match_religion;
        $match_religious_values = explode(',', $this->usersMatch[0]->match_religious_values);
        $match_religious_values = implode("','", $match_religious_values);
        $match_star_sign = explode(',', $this->usersMatch[0]->match_star_sign);
        $match_star_sign = implode("','", $match_star_sign);

        $query = '';
        //$query .= "SELECT t1.*,t2.* FROM users t1 LEFT JOIN users_metas t2 ON (t1.id=t2.user_id) WHERE t2.age BETWEEN ".$age_min." AND ".$age_max." AND t2.height BETWEEN ".$height_min." AND ".$height_max." AND t2.weight BETWEEN ".$weight_min." AND ".$weight_max . " AND t1.id NOT IN (SELECT b_who_id from block_users where b_whom_id = '".Crypt::decryptString($_COOKIE['UserIds'])."')";


        $query .= "SELECT t1.*,t2.* FROM users t1 LEFT JOIN users_metas t2 ON (t1.id=t2.user_id) WHERE t2.age BETWEEN ".$age_min." AND ".$age_max." AND t1.id NOT IN (SELECT b_who_id from block_users where b_whom_id = '".Crypt::decryptString($_COOKIE['UserIds'])."') AND t1.prfl_photo_path != 'https://www.globallove.online/images/male-user-placeholder.png' AND t2.age != '' AND t1.prfl_approve_status < 2";

        // if($height_min != 'All') {
        //     $query .= " AND t2.height BETWEEN ".$height_min." AND ".$height_max;
        // }

        // if($weight_min != 'All') {
        //     $query .= " AND t2.weight BETWEEN ".$weight_min." AND ".$weight_max;
        // }
        
        if($sex != 'All') {
            $query .= " AND t2.sex = '".$sex."'";
        }
        if($country != 'All') {
            $query .= " AND t2.country = '".$country."'";
        }
        if($drink != 'All') {
            $query .= " AND t2.drink IN ( '".$drink."' )";
        }
        if($smoke != 'All') {
            $query .= " AND t2.smoke IN ( '".$smoke."' )";
        }
        if($body_type != 'All') {
            $query .= " AND t2.body_type IN ( '".$body_type."' )";
        }
        if($match_ethnicity != 'All') {
            $query .= " AND t2.ethnicity IN ( '".$match_ethnicity."' )";
        }
        if($match_appearance != 'All') {
            $query .= " AND t2.appearance IN ( '".$match_appearance."' )";
        }
        if($match_body_art != 'All') {
            $query .= " AND t2.body_art IN ( '".$match_body_art."' )";
        }
        if($match_marital_status != 'All') {
            $query .= " AND t2.relationship IN ( '".$match_marital_status."' )";
        }
        if($match_occupation != 'All') {
            $query .= " AND t2.occupation IN ( '".$match_occupation."' )";
        }
        if($match_emp_status != 'All') {
            $query .= " AND t2.emplyment_status IN ( '".$match_emp_status."' )";
        }
        if($match_education != 'All') {
            $query .= " AND t2.education IN ( '".$match_education."' )";
        }
        if($match_eng_ability != 'All') {
            $query .= " AND t2.eng_lang_ability IN ( '".$match_eng_ability."' )";
        }
        if($match_religious_values != 'All') {
            $query .= " AND t2.religious_view IN ( '".$match_religious_values."' )";
        }
        if($match_star_sign != 'All') {
            $query .= " AND t2.star_sign IN ( '".addslashes($match_star_sign)."' )";
        }

        
        
        
        $data_matches = DB::Select($query . ' order by t1.name asc');
        $data_matches = $this->arrayPaginator($data_matches, $request);

       


        if (Request::ajax()) {
            $view = view('data_matches',compact('data_matches'))->render();
            return response()->json(['html'=>$view]);
        }
    

      return view('users.matchesalgo',compact('data_matches'));

        // return view('users.matchesalgo')->with(['users' => $this->users]);
    	
    }

    public function arrayPaginator($array, $request) {
    $page = Request::get('page', 1);
    $perPage = 40;
    $offset = ($page * $perPage) - $perPage;

    return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
        ['path' => Request::url(), 'query' => Request::query()]);
    }

    public function viewAddNewMessage($id){
        return view('users.login');
    }

    
}
