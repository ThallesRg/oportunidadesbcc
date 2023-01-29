<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
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
                'name' => 'Feira de Tecnologia',
                'location' => 'São Paulo, Brasil',
                'start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +3 months")),
                'end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +4 months")),
                'description' => 'Uma feira de tecnologia que reúne os principais fabricantes e inovadores do setor.',
                'website' => 'https://www.nfeiras.com/tecnologia/brasil/',
            ],
            [
                'user_id' => 2,
                'name' => 'Conferência de Marketing Digital',
                'location' => 'Rio de Janeiro, Brasil',
                'start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +5 months")),
                'end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " +6 months")),
                'description' => 'Uma conferência sobre as últimas tendências e estratégias de marketing digital.',
                'website' => 'https://www.sympla.com.br/eventos/congresso-palestra?c=marketing-vendas',
            ],
            [
                'user_id' => 2,
                'name' => 'Fórum de Negócios',
                'location' => 'Belo Horizonte, Brasil',
                'start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -3 months")),
                'end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -2 months")),
                'description' => 'Um fórum de negócios que reúne líderes de empresas para discutir as principais tendências do mercado.',
                'website' => 'https://forumnegocios.com.br/',
            ],
            [
                'user_id' => 2,
                'name' => 'Festival de Inverno',
                'location' => 'Montanhas do Alasca',
                'start_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -3 months")),
                'end_date' => date("Y-m-d", strtotime(date("Y-m-d") . " -2 months")),
                'description' => 'Um evento de inverno cheio de atividades ao ar livre e shows musicais ao vivo.',
                'website' => 'https://festivaldeinvernobahia.com.br/',
            ],
        ];
        foreach ($details as $detail) {
            Event::create($detail);
        }
    }
}