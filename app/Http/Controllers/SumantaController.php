<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class SumantaController extends Controller
{
    public function chat_top_bar_ajax()
    {
        $chatUsers = DB::Select("SELECT t1.*,t2.* FROM users_chat_rooms t1 RIGHT JOIN users t2 ON (t1.room_to_id=t2.id) RIGHT JOIN users_metas um ON t2.id = um.user_id WHERE t1.room_from_id = ".Crypt::decryptString($_COOKIE['UserIds']). " ORDER BY t1.timedate DESC");

        $offlinemsg= DB::Select("SELECT room_status FROM users_chat_rooms WHERE room_from_id = '".Crypt::decryptString($_COOKIE['UserIds'])."'AND room_status= '1'");


        $returnHTML = view('ajax_header_chat_top_bar', ['chatUsers' => $chatUsers, 'offlinemsg' => $offlinemsg])->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));

    }
}
