<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Requisicao>
 */
class RequisicaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return  [
            'paciente' => 'adriano',
            'paciente' => $this->faker->name,
            'sus' => rand(10000000000000000,999999999999999),
            'documento' => $this->faker->cpf,
            'endereco' => $this->faker->address,
            'bairro' => $this->faker->streetSuffix,
            'cidade' => $this->faker->city,
            'cep' => $this->faker->postcode,
               'datanascimento'=> $this->faker->date(),
            'datarecebido'=> $this->faker->date(),
            'documento' => $this->faker->cpf,
            'indicacao' => $this->faker->sentence,
            'procedimento' => $this->faker->word,
            'contato' => $this->faker->phoneNumber,
            'contato2' => $this->faker->phoneNumber,
            'user_id' => 1,
            'obs' => $this->faker->text,


        ];
    }
}
