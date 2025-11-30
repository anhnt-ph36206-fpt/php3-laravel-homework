<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SanPham>
 */
class SanPhamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'   => $this->faker->word(3, true), // Tên sản phẩm có 3 từ, mỗi từ bắt đầu bằng chữ hoa
            'price'  => $this->faker->randomFloat(2, 10000, 2000000), // Giá từ 10k - 2tr
            'stock'  => $this->faker->numberBetween(0, 1000), // Số lượng tồn kho từ 0 - 1000 ngẫu nhiên
            'active' => $this->faker->boolean(90), // Trạng thái hoạt động ngẫu nhiên, 90% là true
            'category_id' => $this->faker->numberBetween(1, 5), // Id danh mục ngẫu nhiên từ 1 - 5
        ];
    }
}
