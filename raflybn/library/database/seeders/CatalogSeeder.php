<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $catalog_matematika = new Catalog;
            $catalog_kimia = new Catalog;
            $catalog_fisika = new Catalog;
            $catalog_hukum = new Catalog;

            $catalog_matematika->name = 'Buku Perpustakaan Matematika';
            $catalog_kimia->name = 'Buku Perpustakaan kimia';
            $catalog_fisika->name = 'Buku Perpustakaan fisika';
            $catalog_hukum->name = 'Buku Perpustakaan hukum';
            
            $catalog_matematika->save();
            $catalog_kimia->save();
            $catalog_fisika->save();
            $catalog_hukum->save();    
    }
}
