<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    public function definition()
    {
        $lastNames  = ['田中', '鈴木', '佐藤', '山田', '伊藤', '中村', '小林', '加藤', '吉田', '山本'];
        $firstNames = ['太郎', '花子', '一郎', '美咲', '健太', '愛', '翔太', 'さくら', '大輔', '由美'];
        $prefectures = ['東京都', '大阪府', '神奈川県', '愛知県', '福岡県', '北海道', '京都府', '兵庫県'];
        $cities = ['渋谷区', '新宿区', '港区', '中央区', '豊島区', '文京区', '台東区', '墨田区'];

        $tel1 = $this->faker->numerify('0##');
        $tel2 = $this->faker->numerify('####');
        $tel3 = $this->faker->numerify('####');

        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'first_name'  => $this->faker->randomElement($lastNames),
            'last_name'   => $this->faker->randomElement($firstNames),
            'gender'      => $this->faker->numberBetween(1, 3),
            'email'       => $this->faker->unique()->safeEmail(),
            'tel'         => $tel1 . $tel2 . $tel3,
            'address'     => $this->faker->randomElement($prefectures) . $this->faker->randomElement($cities) . $this->faker->numberBetween(1, 9) . '-' . $this->faker->numberBetween(1, 20) . '-' . $this->faker->numberBetween(1, 30),
            'building'    => $this->faker->optional(0.6)->randomElement(['グランドハイツ101', 'サンシャインマンション202', 'ライオンズマンション305', 'パークハウス410', 'コーポ山田501']),
            'detail'      => $this->faker->randomElement([
                'ご注文した商品がまだ届いておりません。確認をお願いします。',
                '先日購入した商品に不具合がありました。交換をお願いしたいです。',
                'ショップの営業時間について教えていただけますか？',
                '返品手続きについて詳しく教えてください。',
                '商品の在庫について確認したいことがあります。',
            ]),
        ];
    }
}
