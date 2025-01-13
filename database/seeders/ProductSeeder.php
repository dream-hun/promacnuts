<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Naturally Roasted Macadamia Nuts 1 Kg',
                'slug' => 'naturally-roasted-macadamia-1-kg',
                'description' => "Indulge in the irresistible crunch and buttery flavor of our Naturally Roasted Macadamia Nuts 1 Kg. Roasted to perfection without any added oils or preservatives, these premium nuts are a delicious and healthy treat, ideal for any time of day.

Key Features
Pure & Natural: Only the finest macadamia nuts, lightly roasted to bring out their rich, creamy flavor.
Nutrient-Rich: A powerhouse of heart-healthy fats, dietary fiber, and essential vitamins like Vitamin B1 and magnesium.
Convenient Size: The 1 kg pack is perfect for snacking on the go, sharing with friends, or adding to your favorite recipes.
Guilt-Free Snack: No added oils or artificial ingredients—just pure, wholesome goodness.
Sustainably Produced: Proudly grown and roasted by Promacnuts Ltd, ensuring eco-friendly and ethical practices.
Why Choose Our Roasted Macadamia Nuts?

Enjoy the perfect balance of flavor and nutrition in every bite. Whether you're looking for a satisfying snack, a nutritious addition to your meals, or a thoughtful gift, our Naturally Roasted Macadamia Nuts deliver premium quality you can trust.

Treat yourself to the taste of perfection—order now and experience the natural luxury of roasted macadamias!",
                'before_price' => 0,
                'price' => 20000,
                'stock' => 10,
                'status' => 'in-stock',

            ],
            [
                'name' => 'Naturally Roasted Macadamia Nuts 500 g',
                'slug' => 'naturally-roasted-macadamia-500-g',
                'description' => "Indulge in the irresistible crunch and buttery flavor of our Naturally Roasted Macadamia Nuts 500 g. Roasted to perfection without any added oils or preservatives, these premium nuts are a delicious and healthy treat, ideal for any time of day.

Key Features
Pure & Natural: Only the finest macadamia nuts, lightly roasted to bring out their rich, creamy flavor.
Nutrient-Rich: A powerhouse of heart-healthy fats, dietary fiber, and essential vitamins like Vitamin B1 and magnesium.
Convenient Size: The 500 g pack is perfect for snacking on the go, sharing with friends, or adding to your favorite recipes.
Guilt-Free Snack: No added oils or artificial ingredients—just pure, wholesome goodness.
Sustainably Produced: Proudly grown and roasted by Promacnuts Ltd, ensuring eco-friendly and ethical practices.
Why Choose Our Roasted Macadamia Nuts?

Enjoy the perfect balance of flavor and nutrition in every bite. Whether you're looking for a satisfying snack, a nutritious addition to your meals, or a thoughtful gift, our Naturally Roasted Macadamia Nuts deliver premium quality you can trust.

Treat yourself to the taste of perfection—order now and experience the natural luxury of roasted macadamias!",
                'before_price' => 0,
                'price' => 11000,
                'stock' => 10,
                'status' => 'out-of-stock',
            ],
            [
                'name' => 'Naturally Roasted Macadamia Nuts 200 g',
                'slug' => 'naturally-roasted-macadamia-200-g',
                'description' => "Indulge in the irresistible crunch and buttery flavor of our Naturally Roasted Macadamia Nuts. Roasted to perfection without any added oils or preservatives, these premium nuts are a delicious and healthy treat, ideal for any time of day.

Key Features
Pure & Natural: Only the finest macadamia nuts, lightly roasted to bring out their rich, creamy flavor.
Nutrient-Rich: A powerhouse of heart-healthy fats, dietary fiber, and essential vitamins like Vitamin B1 and magnesium.
Convenient Size: The 200g pack is perfect for snacking on the go, sharing with friends, or adding to your favorite recipes.
Guilt-Free Snack: No added oils or artificial ingredients—just pure, wholesome goodness.
Sustainably Produced: Proudly grown and roasted by Promacnuts Ltd, ensuring eco-friendly and ethical practices.
Why Choose Our Roasted Macadamia Nuts?

Enjoy the perfect balance of flavor and nutrition in every bite. Whether you're looking for a satisfying snack, a nutritious addition to your meals, or a thoughtful gift, our Naturally Roasted Macadamia Nuts deliver premium quality you can trust.

Treat yourself to the taste of perfection—order now and experience the natural luxury of roasted macadamias!",
                'before_price' => 0,
                'price' => 4500,
                'stock' => 10,
                'status' => 'in-stock',
            ],
        ];

        Product::insert($products);
    }
}
