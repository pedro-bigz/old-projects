<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\AdminUser::class, static function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => $faker->boolean(),
        'forbidden' => $faker->boolean(),
        'language' => $faker->sentence,
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\LojaLocal::class, static function (Faker\Generator $faker) {
    return [
        'logradouro' => $faker->sentence,
        'numero' => $faker->sentence,
        'bairro' => $faker->sentence,
        'cidade' => $faker->sentence,
        'uf' => $faker->sentence,
        'cep' => $faker->sentence,
        'activated' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Categoria::class, static function (Faker\Generator $faker) {
    return [
        'tipo' => $faker->sentence,
        'setor' => $faker->sentence,
        'activated' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Estoque::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'price' => $faker->randomFloat,
        'amount' => $faker->sentence,
        'places' => $faker->sentence,
        'category' => $faker->sentence,
        'cor' => $faker->sentence,
        'activated' => $faker->boolean(),
        'description' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Oferta::class, static function (Faker\Generator $faker) {
    return [
        'id_estoque' => $faker->sentence,
        'desconto' => $faker->randomFloat,
        'description' => $faker->text(),
        'min_user_lvl' => $faker->randomNumber(5),
        'activated' => $faker->boolean(),
        'data_inicio' => $faker->dateTime,
        'data_fim' => $faker->dateTime,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
        
        
    ];
});
