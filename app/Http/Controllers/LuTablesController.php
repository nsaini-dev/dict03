<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LuTablesController extends Controller
{
    function table_names()
    {
        return array(
            'lu_proficiency_levels' ,
            'lu_priority_levels'    ,
            'lu_difficulty_levels'  ,
            'lu_tags'               ,
            'lu_sources'            ,
            'lu_revision_decks'     ,
            'lu_word_cases'         ,
            'lu_word_types'         ,
            'lu_genders'            
        );
    }

    function show($table = 'lu_proficiency_levels')
    {
        $tableNames = $this->table_names();
        $records = DB::table($table)->orderBy('id')->get();
        $columns = array_keys(get_object_vars($records->first()));
        return view('lutables.show')->with(compact('tableNames', 'table', 'records', 'columns'));
    }
}
