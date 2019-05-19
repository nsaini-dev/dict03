<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Artisan;

class DictBootstrap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dict:bootstrap {target} {block} {--make} {--clean}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create migration & model files for specified tables';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $paths = array(
            'migrations' => 'database/migrations',
            'models' => 'app/Models'
        );

        $tables = array(
            'lu_tables' => [
                // LOOKUP TABLES
                'lu_proficiency_levels' ,
                'lu_priority_levels'    ,
                'lu_difficulty_levels'  ,
                'lu_tags'               ,
                'lu_sources'            ,
                'lu_revision_decks'     ,
                'lu_word_cases'         ,
                'lu_word_types'         ,
                'lu_genders'            
            ],

            'data_tables' => [
                // DATA TABLES
                'de_words'              ,
                'de_word_infos'         ,
                'en_words'              ,
                'de_sentences'          ,
                'de_sentence_infos'     ,
                'en_sentences'          ,
                'de_word_noun_infos'    ,
                'de_word_verb_infos'    ,
                'de_word_prepo_infos'   ,
                // MAP TABLES
                'map_deword_enword'             ,
                'map_desentence_ensentence'     ,
                'map_desentence_deword'         ,
                'map_ensentence_enword'         ,
                'map_deword_tag'                ,
                'map_deword_wordtype'           
            ]
        );

        $this->make_files($paths, $tables);
    }



    // ----------------------------------------
    // HANDLER FUNCTION
    // ----------------------------------------



    public function make_files($paths, $tables)
    {
        // VARIABLES
        $target = $this->argument('target'); // migrations , models
        $block = $this->argument('block'); // lu_tables , data_tables
        // FLAGS
        $make = $this->option('make'); 
        $clean = $this->option('clean');
        // OTHER VARIABLES

        if(!in_array($target, array_keys($paths))) 
        {
            $this->error(" Invalid Argument {make} // select - migrations or models  ");
        }
        else if(!in_array($block, array_keys($tables))) 
        {
            $this->error(" Invalid Argument {block} // select - lu_tables or data_tables  ");
        }
        else 
        {
            $path = $paths[$target];
            $this->make_dir($path);
            $this->clean_dir($clean, $path);
            $is_empty = $this->is_empty($path);
    
            if($make != true) {
                $this->info("use option {--make} to create files");
                return false;
            }
    
            if($is_empty && $make == true) 
            {
                foreach($tables[$block] as $table)
                {
                    if($target == 'migrations') $this->make_migration($table);
                    if($target == 'models') $this->make_model($table);
                    sleep(1);
                }
            }
        }
    }



    // ----------------------------------------
    // ARTISAN COMMANDS
    // ----------------------------------------



    public function make_migration($table)
    {
        $filename = 'create_' . $table . '_table';

        Artisan::call("make:migration", array(
            'name' => $filename
        ));

        $this->info("Migration : $filename");
    }


    public function make_model($table)
    {
        $filename = ucfirst(camel_case(str_singular($table)));

        Artisan::call("make:model", array(
            'name' => $filename
        ));

        $this->info("Model : $filename");
    }



    // ----------------------------------------
    // HELPER FUNCTION
    // ----------------------------------------



    public function make_dir($path)
    {
        $file = new Filesystem;

        if(!$file->exists($path))
        {
            $this->info("not exist // creating :: $path");
            $file->makeDirectory($path);
        }
        else
        {
            $this->info("exist :: $path");
        }
    }

    public function clean_dir($clean, $path)
    {
        $file = new Filesystem;

        if($clean == true) 
        {
            if($file->exists($path))
            {
                $this->info("cleaning :: $path");
                $file->cleanDirectory($path);
            }
        }
    }

    public function is_empty($path)
    {
        $no_files = count(scandir($path));
        $is_empty = $no_files <= 2;

        if( ! $is_empty ) {
            $this->warn("Not Empty :: $path // Clean before creating files. !! CAREFULL !!");
        }

        return $is_empty;
    }


}
