<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace Controller;


use Faker\Factory;
use FastD\Http\JsonResponse;
use FastD\Http\ServerRequest;
use FastD\Utils\DateObject;

class NewestController
{
    /**
     * @param ServerRequest $request
     * @return JsonResponse
     */
    public function findNewest(ServerRequest $request)
    {
        $faker = Factory::create();
        $dateTimeObject = new DateObject();
        return json([
            [
                'title' => $faker->title,
                'type' => 'banner',
                'images' => [
                    $faker->imageUrl()
                ],
                'author' => $faker->name,
                'published_at' => $dateTimeObject->ago(),
                'is_top' => 1,
                'like_count' => $faker->randomNumber(),
                'discussion_count' => $faker->randomNumber(),
            ],
            [
                'title' => $faker->title,
                'type' => 'thumbnail',
                'images' => [
                    $faker->imageUrl(), $faker->imageUrl(), $faker->imageUrl()
                ],
                'author' => $faker->name,
                'published_at' => $dateTimeObject->ago(),
                'is_top' => 0,
                'like_count' => $faker->randomNumber(),
                'discussion_count' => $faker->randomNumber(),
            ],
        ]);
    }
}