<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Intercambio;

class IntercambioSeeder extends Seeder
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
                'name' => 'Intercâmbio de Verão',
                'vacancies' => rand(5, 15),
                'destination' => 'Canadá',
                'registration_period_start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +1 month")),
                'registration_period_end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +2 months")),
                'exchange_period_start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +3 months")),
                'exchange_period_end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +4 months")),
                'description' => 'Intercâmbio de verão para estudantes universitários',
                'edital' => 'editais/edital_intercambio_verao.pdf',
            ],
            [
                'user_id' => 2,
                'name' => 'Intercâmbio de Inverno',
                'vacancies' => rand(5, 15),
                'destination' => 'Estados Unidos',
                'registration_period_start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +5 month")),
                'registration_period_end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +6 months")),
                'exchange_period_start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +7 months")),
                'exchange_period_end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +8 months")),
                'description' => 'Intercâmbio de inverno para estudantes universitários',
                'edital' => 'editais/edital_intercambio_verao.pdf',
            ],
            [
                'user_id' => 2,
                'name' => 'Intercâmbio de Verão',
                'vacancies' => rand(5, 15),
                'destination' => 'Canadá',
                'registration_period_start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -2 months")),
                'registration_period_end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -1 months")),
                'exchange_period_start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -2 weeks")),
                'exchange_period_end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -1 weeks")),
                'description' => 'Intercâmbio de verão para estudantes universitários',
                'edital' => 'editais/edital_intercambio_verao.pdf',
            ],
            [
                'user_id' => 2,
                'name' => 'Intercâmbio de Inverno',
                'vacancies' => rand(5, 15),
                'destination' => 'Estados Unidos',
                'registration_period_start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -2 months")),
                'registration_period_end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -1 months")),
                'exchange_period_start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -2 weeks")),
                'exchange_period_end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -1 weeks")),
                'description' => 'Intercâmbio de inverno para estudantes universitários',
                'edital' => 'editais/edital_intercambio_verao.pdf',
            ],
        ];
        foreach ($details as $detail) {
            Intercambio::create($detail);
        }
    }
}