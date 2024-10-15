<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Menu::create(
            [
                'name' => 'dashboard',
                'url' => 'admin.dashboard'
            ]
        );

        Menu::create(
            [
                'name' => 'Produit',
                'url' => 'admin.allproduct'
            ]
        );

        Menu::create(
            [
                'name' => 'Creation produit',
                'url' => 'admin.store.product'
            ]
        );
        
        Menu::create(
            [
                'name' => 'Configuration',
                'url' => 'admin.config.index'
            ]
        );

        Menu::create(
            [
                'name' => 'Chat',
                'url' => 'admin.chat.index'
            ]
        );

       
        Menu::create(
            [
                'name' => 'Gestion utilisateur',
                'url' => 'admin.user.index'
            ]
        );
        Menu::create(
            [
                'name' => 'Gestion categorie',
                'url' => 'admin.categorie.index'
            ]
        );
        

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Develloper']);
        Role::create(['name' => 'Repondeur']);
    }
}
