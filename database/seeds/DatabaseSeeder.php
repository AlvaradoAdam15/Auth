<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        $this->seedUserTable();

        Model::reguard();
    }


    /**
     * Omplir taula users
     */
    private function seedUserTable()
    {
        $user = new User();
        $user->name = "Adam Alvarado";
        $user->email = "adamalvarado@iesebre.com";
        $user->password = bcrypt(env('PASSWORD_ESTIMAT', '123456'));
        $user->save();
    }
}
