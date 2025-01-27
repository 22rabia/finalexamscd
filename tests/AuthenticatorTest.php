// tests/AuthenticatorTest.php
<?php



class AuthenticatorTest extends PHPUnit\Framework\TestCase
{
    public function testSignup()
    {
        $authenticator = new App\Authenticator();
        $userId = $authenticator->signup('abc', 'password123');

        // Check if the returned user ID is not empty
        $this->assertNotEmpty($userId);
    }

    public function testLogin()
    {
        $authenticator = new App\Authenticator();
        $result = $authenticator->login('abc', 'password123');

        // Check if the login is successful
        $this->assertTrue($result);
    }
}
