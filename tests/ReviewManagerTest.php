// tests/ReviewManagerTest.php
<?php

use PHPUnit\Framework\TestCase;
//./vendor/bin/phpunit
class ReviewManagerTest extends TestCase
{
    public function testAddReview()
    {
        $reviewManager = new App\ReviewManager();

        $review = $reviewManager->addReview('John Doe', 'USA', 'Great service!');
        
        // Check if the returned review has the expected values
        $this->assertArrayHasKey('name', $review);
        $this->assertEquals('John Doe', $review['name']);
        
        $this->assertArrayHasKey('country', $review);
        $this->assertEquals('USA', $review['country']);
        
        $this->assertArrayHasKey('suggestion', $review);
        $this->assertEquals('Great service!', $review['suggestion']);
    }

    public function testGetReviews()
    {
        $reviewManager = new App\ReviewManager();

        // Add a review
        $reviewManager->addReview('Alice', 'Canada', 'Awesome experience!');

        // Get the reviews
        $reviews = $reviewManager->getReviews();

        // Check if the reviews array is not empty
        $this->assertNotEmpty($reviews);

        // You can add more specific checks based on your requirements
    }
}
