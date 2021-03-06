<?php

namespace Database\Seeders;

use App\Models\M_User;
use App\Models\M_Produk;
use App\Models\M_Warung;
use App\Models\M_Pencatatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        M_Warung::create([
            'nama' => 'Warung Aminah',
            'nohp' => '081234567890',
            'alamat' => 'Jalan Melati no 77 Surabaya'
        ]);
        
        M_Warung::create([
            'nama' => 'Warung Paijo',
            'nohp' => '081247710946',
            'alamat' => 'Jalan Anggrek no 10 Bogor'
        ]);
        
        M_User::create([
            'is_admin' => true,
            'username' => 'budi123',
            'password' => bcrypt('12345'),
            'nama' => 'Budi Saputra',
            'email' => 'budi@mail.com',
            'alamat' => 'Jalan Raden Patah no 81',
            'nohp' => '081234567890',
            // 'foto_profil' => 'https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80'
        ]);
        
        M_User::create([
            'is_admin' => false,
            'username' => 'andriyan',
            'password' => bcrypt('12345'),
            'nama' => 'Ahmad Andriyan',
            'email' => 'andriyan@mail.com',
            'alamat' => 'Jalan Kian Santang no 70 Padjajaran',
            'nohp' => '081234567890',
            // 'foto_profil' => 'https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80'
        ]);
        
        M_User::create([
            'is_admin' => false,
            'username' => 'handoko',
            'password' => bcrypt('12345'),
            'nama' => 'Rizky Handoko',
            'email' => 'handoko@mail.com',
            'alamat' => 'Jalan Merak no 39 Banjarmasin',
            'nohp' => '081234567890',
            // 'foto_profil' => 'https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80'
        ]);
        
        M_Pencatatan::create([
            'id_warung' => 1,
            'id_user' => 2,
            'produk_terbeli' => 20,
            'pemasukan' => 100000,
            'pengeluaran' => 30000,
            'minggu_ke' => 1
        ]);
        
        M_Pencatatan::create([
            'id_warung' => 1,
            'id_user' => 2,
            'produk_terbeli' => 35,
            'pemasukan' => 250000,
            'pengeluaran' => 40000,
            'minggu_ke' => 2
        ]);

        M_Produk::create([
            'nama' => 'Keripik Pelepah Pisang Rasa Balado',
            'harga' => 5000,
            'kuantitas' => 30,
            // 'foto' => 'https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070'
        ]);

        M_Produk::create([
            'nama' => 'Keripik Pelepah Pisang Rasa Original',
            'harga' => 4000,
            'kuantitas' => 50,
            // 'foto' => 'https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070'
        ]);
    }
}
