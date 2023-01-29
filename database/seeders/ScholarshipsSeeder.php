<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Scholarship;

class ScholarshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $details = [
            [
                'user_id' => 2,
                'name' => 'Bolsa de Estudos para Engenharia',
                'description' => 'Uma bolsa de estudos para estudantes de engenharia interessados em pesquisa e desenvolvimento.',
                'start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +2 months")),
                'end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +8 months")),
                'value' => '5000',
                'website' => 'https://www.bolsasdeestudo.com/engenharia',
            ],
            [
                'user_id' => 2,
                'name' => 'Bolsa de Estudos para Medicina',
                'description' => 'Uma bolsa de estudos para estudantes de medicina interessados em pesquisa e desenvolvimento.',
                'start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +2 months")),
                'end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +8 months")),
                'value' => '8000',
                'website' => 'https://www.bolsasdeestudo.com/medicina',
            ],
            [
                'user_id' => 2,
                'name' => 'Bolsa de Estudos para Artes',
                'description' => 'Uma bolsa de estudos para estudantes de artes interessados em pesquisa e desenvolvimento.',
                'start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -8 months")),
                'end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -2 months")),
                'value' => '3000',
                'website' => 'https://www.bolsasdeestudo.com/artes',
            ],
            [
                'user_id' => 2,
                'name' => 'Bolsa de Estudos para Ciências Sociais',
                'description' => 'Uma bolsa de estudos para estudantes de ciências sociais interessados em pesquisa e desenvolvimento.',
                'start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -8 months")),
                'end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -2 months")),
                'value' => '4000',
                'website' => 'https://www.bolsasdeestudo.com/ciencias-sociais',
            ],
        ];
        foreach ($details as $detail) {
            Scholarship::create($detail);
        }
    }
}