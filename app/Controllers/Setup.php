<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Setup extends Controller
{
    public function index()
    {
        $migration = service('migrations');
        try {
            $migration->latest();
            echo "Migration setup is successful";
        } catch (\Throwable $e) {
            // Show detailed error
            echo "<h3>Migration Failed</h3>";
            echo "<p><b>Message:</b> " . $e->getMessage() . "</p>";
            echo "<p><b>File:</b> " . $e->getFile() . "</p>";
            echo "<p><b>Line:</b> " . $e->getLine() . "</p>";
            echo "<pre>" . $e->getTraceAsString() . "</pre>";
        }
    }

    public function dropTable()
    {
        $migration = service('migrations');
        try {
            $migration->regress(0);
            echo "Tables dropped successfully.";
        } catch (\Throwable $e) {
            echo "<h3>Drop Failed</h3>";
            echo "<p><b>Message:</b> " . $e->getMessage() . "</p>";
            echo "<p><b>File:</b> " . $e->getFile() . "</p>";
            echo "<p><b>Line:</b> " . $e->getLine() . "</p>";
            echo "<pre>" . $e->getTraceAsString() . "</pre>";
        }
    }
    public function userSeed(){
        //$seeder = service('seeder');
        $seeder = \Config\Database::seeder();
        try{
            $seeder->call('UserSeeder');
        }
        catch(\Throwable $e){
            echo "<h3>Seeding Failed</h3>";
            echo "<p><b>Message:</b> " . $e->getMessage() . "</p>";
            echo "<p><b>File:</b> " . $e->getFile() . "</p>";
            echo "<p><b>Line:</b> " . $e->getLine() . "</p>";
            echo "<pre>" . $e->getTraceAsString() . "</pre>";
        }

       
    }
}
