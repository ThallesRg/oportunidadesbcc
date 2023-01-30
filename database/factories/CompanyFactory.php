<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 2, //default author by user seeder class
            'company_category_id' => 1,
            'logo' => 'images/companies/logos/',
            'title' => 'Desenvolvedor web',
            'description' => 'Esta empresa Pvt Ltd é a empresa especializada em ajudar as organizações com soluções de tecnologia financeira. Nós fornecemos soluções abrangentes de pagamento móvel e online e serviços de facilitação de gateway. Facilitamos o serviço de liquidação de transações on-line para comerciantes e seus bancos para poder aceitar/adquirir pagamentos de fontes de pagamento de terceiros. Fornecemos tecnologia e soluções para adquirir pagamentos de carteiras de terceiros, soluções de carteiras inteligentes, soluções de gerenciamento de comerciantes e várias outras soluções.',
            'website' => 'https://www.empresa.com',
            'cover_img' => 'nocover',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
    }
}
