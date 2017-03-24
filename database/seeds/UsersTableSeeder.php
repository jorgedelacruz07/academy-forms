<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $path = 'json/';
    $data = json_decode(File::get($path.'data.json'));
    foreach ($data as $table => $rows) {
      foreach ($rows as $row) {
        if ($table == 'users'){
          $row->password = bcrypt($row->password);
        }
        DB::table($table)->insert((array)$row);
      }
    }
  }
}
