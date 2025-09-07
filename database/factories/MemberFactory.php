<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;
use App\Enums\MemberEnums\Gender;
use App\Enums\MemberEnums\Status;
use App\Enums\MemberEnums\ChurchRole;
use App\Enums\MemberEnums\Ministry;
use App\Enums\MemberEnums\MinistryRole;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'age' => $this->faker->numberBetween(12, 80),
            'gender' => $this->faker->randomElement(Gender::cases())->value,
            'birth_date' => $this->faker->date(),
            'address' => $this->faker->address(),
            'contact' => $this->faker->numerify('09#########'),
            'status' => $this->faker->randomElement(Status::cases())->value,
            'invitedBy' => $this->faker->name(),
            'church_role' => $this->faker->randomElement(ChurchRole::cases())->value,
            'ministry' => $this->faker->randomElement(Ministry::cases())->value,
            'ministry_role' => $this->faker->randomElement(MinistryRole::cases())->value,
            'ministry_assignment' => $this->faker->word(),
            'network_leader' => $this->faker->name(),
            'isActive' => $this->faker->boolean(),
        ];
    }
}
