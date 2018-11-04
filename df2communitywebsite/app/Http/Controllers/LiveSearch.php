<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearch extends Controller
{
    function index()
    {
        return view('live_search');
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('posts')
                    ->where('title', 'like', '%'.$query.'%')
                    ->orWhere('body', 'like', '%'.$query.'%')
                    ->get()->where('hidden', 'false');
            }
            else
            {
                $data = DB::table('posts')
                    ->orderBy('title', 'desc')
                    ->get()->where('hidden', 'false');
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= "
                    <tr>
                        <td><a href='http://df2communitywebsite.test/posts/".$row->id."'>".$row->title."</a></td>
                        <td>".$row->body."</td>
                    </tr>
                    ";
                }
            }
            else
            {
                $output = '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}