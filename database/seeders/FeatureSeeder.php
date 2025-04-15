<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feature;
use Spatie\Permission\Models\Permission;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the permission first
        $permission = Permission::firstOrCreate(['name' => 'manage-relays']);

        // Create the feature and reference the permission name
        Feature::firstOrCreate([
            'name' => 'Relay',
            'permission_name' => $permission->name,
        ]);
    }
}
