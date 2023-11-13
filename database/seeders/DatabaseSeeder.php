<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Jurnal;
use App\Models\Menfess;
use App\Models\News;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jurnal::create(
        //     [
        //         'title' => 'Judul Pertama',
        //         'author' => 'Muhammad Alam Basalamah',
        //         'slug' => 'judul-pertama',
        //         'excerpt'=> 'kenapa ya hidup gini amat dah',
        //         'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
        //         ]
        // );

        // Jurnal::create(
        //     [
        //         'title' => 'Judul Kedua',
        //         'author' => 'Basalamah Alam',
        //         'slug' => 'judul-kedua',
        //         'excerpt'=> 'stop itu berhenti ya',
        //         'body' => 'Lorem ipsum, dolor sit amet amet jabang bayi dadadada.',
        //         ]
        // );

        News::create(
            [
                'title' => 'Judul Pertama',
                'slug' => 'judul-pertama',
                'excerpt'=> 'kenapa ya hidup gini amat dah',
                'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
                ]
        );

        News::create(
            [
                'title' => 'Judul Kedua',
                'slug' => 'judul-kedua',
                'excerpt'=> 'stop itu berhenti ya',
                'body' => 'Lorem ipsum, dolor sit amet amet jabang bayi dadadada.',
                ]
        );
    }
}
