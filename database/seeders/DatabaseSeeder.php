<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user1 = new User();
        $user1->name = 'montano';
        $user1->email= 'montanoa63@gmail.com';
        $user1->password = bcrypt('montano');
        $user1->save();

        $user2 = new User();
        $user2->name = 'zabach';
        $user2->email= 'zabach@gmail.com';
        $user2->password = bcrypt('zabach');
        $user2->save();

        $user3 = new User();
        $user3->name = 'javier';
        $user3->email= 'javier@gmail.com';
        $user3->password = bcrypt('javier');
        $user3->save();

        $user4 = new User();
        $user4->name = 'daniel';
        $user4->email= 'daniel@gmail.com';
        $user4->password = bcrypt('daniel');
        $user4->save();

        $user5 = new User();
        $user5->name = 'harold';
        $user5->email= 'harold@gmail.com';
        $user5->password = bcrypt('harold');
        $user5->save();
    }
}
