<?php

namespace Database\Factories\Horensou;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Horensou\HorensouRequest;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HorensouRequest>
 */
class HorensouRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HorensouRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $department_id = $this->faker->numberBetween(5, 6);

        switch ($department_id) {
            case 5:
                $section_id = $this->faker->numberBetween(8, 12);
                break;
            
            case 6:
                $section_id = $this->faker->numberBetween(13, 14);
                break;
        }

        switch ($section_id) {
            case 8:
                $shop_id = $this->faker->numberBetween(9, 14);
                break;

            case 9:
                $shop_id = $this->faker->numberBetween(15, 30);
                break;

            case 10:
                $shop_id = $this->faker->numberBetween(31, 39);
                break;

            case 11:
                $shop_id = $this->faker->numberBetween(40, 43);
                break;

            case 12:
                $shop_id = $this->faker->numberBetween(44, 51);
                break;

            case 13:
                $shop_id = $this->faker->numberBetween(52, 57);
                break;

            case 14:
                $shop_id = $this->faker->numberBetween(58, 67);
                break;
        }

        $category_id = $this->faker->numberBetween(1, 5);
        $priority_id = $this->faker->numberBetween(1, 4);
        $point_problem = $this->faker->words(3, true);
        $detail_problem1 = $this->faker->paragraphs(1, true);
        $detail_problem2 = $this->faker->paragraphs(1, true);
        $detail_problem3 = $this->faker->paragraphs(1, true);
        $detail_problem = "<p>" . $detail_problem1 . "</p><p>" . $detail_problem2 . "</p><p>" . $detail_problem3 . "</p>";
        $part_name = $this->faker->randomElement(['3C1-3P', '3C1-5P', '1WD-AD', '1WD-AM']);
        $shop_status = $this->faker->randomElement(['submitted', 'rejected', 'approved']);
        $request_by = $this->faker->randomElement([1, 2, 3, 5, 7, 8, 9, 10, 12, 13, 14, 15, 16, 17, 18, 19, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31]);
        $approve_by = $this->faker->randomElement([4, 6, 11, 20, 32, 39, 43]);
        $doc_no = $this->faker->bothify('?????-#####');
        return [
            'doc_no' => $doc_no,
            'department_id' => $department_id,
            'section_id' => $section_id,
            'shop_id' => $shop_id,
            'category_id' => $category_id,
            'priority_id' => $priority_id,
            'point_problem' => $point_problem,
            'detail_problem' => $detail_problem,
            'part_name' => $part_name,
            'request_by' => $request_by,
            'approve_by' => $approve_by,
            'shop_status' => $shop_status,
        ];
    }
}
