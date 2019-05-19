<?php

use Illuminate\Database\Seeder;

class LuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        foreach(self::lookup_tables() as $tableName => $tableData)
        {
            if(self::hasRecords($tableName))
            {
                $this->command->info("SKIPPED :: TABLE {$tableName}");
            }
            else
            {
                DB::table($tableName)->insert($tableData);
                $this->command->info("INSERTED :: TABLE {$tableName}");
            }
        }
    }


    /**
     * Check if records exist
     */

    public static function hasRecords($tableName) 
    {
        return DB::table($tableName)->count();
    }


    /**
     * LuTables Data
     */

    public static function lookup_tables()
    {
        $tables = [];

        $tables['lu_sources'] = [
            ['value' => 'self'],
            ['value' => 'misc'],
            ['value' => 'work'],
            ['value' => 'herrProf'],
            ['value' => 'nLeicht'],
            ['value' => 'ndr'],
            ['value' => 'navya'],
            ['value' => 'movie'],
            ['value' => 'tvShow'],
            ['value' => 'letter'],
            ['value' => 'jobSearch']
        ];

        $tables['lu_tags'] = [
            ['value' => 'misc'],
            ['value' => 'dev'],
            ['value' => 'home'],
            ['value' => 'health'],
            ['value' => 'finance'],
            ['value' => 'travel'],
            ['value' => 'fun']
        ];

        $tables['lu_revision_decks'] = [
            ['value' => 'RD-U'],
            ['value' => 'RD-H'],
            ['value' => 'RD-M'],
            ['value' => 'RD-L'],
        ];

        $tables['lu_proficiency_levels'] = [
            ['value' => 'A0'],
            ['value' => 'A1'],
            ['value' => 'A2'],
            ['value' => 'B0'],
            ['value' => 'B1'],
            ['value' => 'B2'],
            ['value' => 'C0'],
            ['value' => 'C1'],
            ['value' => 'C2'],
        ];

        $tables['lu_difficulty_levels'] = [
            ['value' => 'Easy'      , 'short' => 'esy.'],
            ['value' => 'Moderate'  , 'short' => 'mod.'],
            ['value' => 'Confusing' , 'short' => 'cofu.'],
            ['value' => 'Hard'      , 'short' => 'hrd.']
        ];

        $tables['lu_priority_levels'] = [
            ['value' => 'Low'],
            ['value' => 'Medium'],
            ['value' => 'High'],
            ['value' => 'Urgent']
        ];

        $tables['lu_word_cases'] = [
            ['value' => 'Nominative'  , 'short' => 'nom.'],
            ['value' => 'Accusative'  , 'short' => 'acu.'],
            ['value' => 'Dative'      , 'short' => 'dat.'],
            ['value' => 'Genitive'    , 'short' => 'gen.'],
            ['value' => 'Two-way'     , 'short' => '2way']
        ];

        $tables['lu_word_types'] = [
            ['value' => 'Noun'          , 'short' => 'n.'],
            ['value' => 'Verb'          , 'short' => 'v.'],
            ['value' => 'Pronoun'       , 'short' => 'pron.'],
            ['value' => 'Adjective'     , 'short' => 'adj.'],
            ['value' => 'Adverb'        , 'short' => 'adv.'],
            ['value' => 'Preposition'   , 'short' => 'prep.'],
            ['value' => 'Conjunction'   , 'short' => 'conj.'],
            ['value' => 'Interjection'  , 'short' => 'interj.'],
        ];

        $tables['lu_genders'] = [
            ['value' => 'Maskulin'  , 'short' => 'mas.'     , 'article' => 'der'    , 'title' => 'Herr'],
            ['value' => 'Feminen'   , 'short' => 'fem.'     , 'article' => 'die'    , 'title' => 'Frau'],
            ['value' => 'Neuter'    , 'short' => 'neu.'     , 'article' => 'das'    , 'title' => 'Homo']
        ];
        
        return $tables;
    }
}
