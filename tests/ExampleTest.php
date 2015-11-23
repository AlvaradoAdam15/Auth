<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
            ->see('Hello');
    }
    /**
     * Check login page
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->visit(route('auth.getLogin'))
            ->see('LOGIN');
    }
    /**
     * Check that a user without access go to login page
     *
     * @return void
     */
    public function testUserWithoutAccessToResource()
    {
        $this->unlogged();
        $this->visit('/resource')
            ->seePageIs(route('auth.getLogin'))
            ->see('Login')
            ->dontSee('Logout');
        //->seePageIs('/login');
    }
    /**
     * Check that a user with access go to resource
     *
     * @return void
     */
    public function atestUserWithAccessToResource()
    {
        $this->logged();
        $this->visit('/resource')
            ->seePageIs('/resource');
    }

    private function logged()
    {
        Auth::loginUsingId(1);
    }

    private function unlogged()
    {
        Auth::logout();
    }

    /**
     * bla bla bla
     *
     * @return void
     */
    public function AtestLoginPageHaveRegisterLinkAndWorksOk()
    {
        $this->visit('/login')
            ->click('register')
            ->seePageIs('/register');
    }
    public function AtestPostLoginOk(){
        $this->visit('/login')
            ->type('adamalvarado@iesebre.com', 'email')
            ->type('123456', 'password')
            ->check('remember')
            ->press('login')
            ->seePageIs('/home');
    }
}