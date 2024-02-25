<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Assassin\'s',
            'description' => 'The Assassin Brotherhood, also known as the Assassin Order and originally as the Hidden Ones, is a secret global peacekeeping organization dedicated to protecting humanity from abuses of power, coercive rule, and injustice. As the etymology of the term assassin, their traditional methods have revolved around stealth operations, selective violence, and the assassination of those deemed to be perpetrators of oppression under the belief that this minimizes collateral damage in accordance with their absolute prohibition against harming innocent lives.',
        ]);

        Category::create([
            'name' => 'Templar\'s',
            'description' => 'The Templar Order, also known as the Order of the Knights Templar or the Poor Fellow-Soldiers of Christ and the Temple of Solomon, is a secret transnational organization which for thousands of years has striven to seize control of humanity in the name of uplifting their condition and inaugurating lasting, world peace.',
        ]);
    }
}
