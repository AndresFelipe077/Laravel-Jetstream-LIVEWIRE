<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'   => $this->faker->sentence(),
            'content' => $this->faker->text(),          //RUTA                 ANCHO, ALTO, CATEGORIA, BOOLEAN DE RUTA  
            'image'   => 'posts/' . $this->faker->image('public/storage/posts', 640, 480, null, false),//Si se colocara true la ruta que mostraria es public/storage/posts con el nombre de la imagen al final
                                                                                                        //Si se desea que solo sea por ejemplo la carpeta donse se guarda se le concatena al principio la carpeta
        ];
    }
}
