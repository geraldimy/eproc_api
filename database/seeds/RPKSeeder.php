<?php


use JeroenZwart\CsvSeeder\CsvSeeder;

class RPKSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->tablename = 'rpk';
        $this->file = '/database/seeds/csvs/rpk.csv';
        $this->delimiter = ',';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        parent::run();
    }
}
