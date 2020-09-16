<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administartor = new \App\User;
        $administartor->username = "administartor";
        $administartor->name = "Site Administrator";
        $administartor->email = "administartor@toko-online.test";
        $administartor->roles = json_encode(["ADMIN"]);
        $administartor->password = \Hash::make("tokoonline");
        $administartor->avatar = "saat-ini-tidak-ada-file.png";
        $administartor->address = "cipondoh, Kota Tangerang";
        $administartor->phone = "085779811290";

        $administartor->save();

        $this->command->info("User admin berhasil di inset");
    }
}
