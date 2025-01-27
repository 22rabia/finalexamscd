<?php
namespace App;
class ReviewManager
{
    private $reviews = [];

    public function addReview($name, $country, $suggestion)
    {
        $review = [
            'name' => $name,
            'country' => $country,
            'suggestion' => $suggestion,
        ];

        $this->reviews[] = $review;

        return $review;
    }

    public function getReviews()
    {
        return $this->reviews;
    }
}
