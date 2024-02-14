# Laravel Test Driven Development(LTDD)

# PHPunit Standard AAA (Arrange, Act, Assert)

# Arrange

    -> Essential Requirements write in Arrange
    -> These tests focus on testing the application's HTTP layer, including routes, controllers, and responses.

# Act

    -> These tests focus on testing individual methods or units of code directly, often without involving HTTP requests.

# Assert

    -> In the final step, you make assertions to verify that the outcome of the action in the "Act" step matches your expectations.

# How to setup and run a test case in Laravel -

<p>Go to phpunit.xml file in the project root and uncomment 2 lines </p>

`<server name="DB_CONNECTION" value="sqlite"/>`<br>
`<server name="DB_DATABASE" value=":memory:"/>`

<ul>
<li>Create a Feature Test - php artisan make:test ArticleControllerTest</li>
<li>Create a Unit Test - php artisan make:test ArticleTest --unit</li>
<li>Run your test - php artisan test</li>
<li>Single Test Run - php artisan test --filter=ArticleControllerTest</li>
<li>Use this trait for refresh database - use RefreshDatabase;</li>
<li>If you write unit test then use - use Tests\TestCase this instead of use PHPUnit\Framework\TestCase</li>
<li>You need to create a few things to write your test case.</li>
<li>-   Factory, State, scop Method, etc.</li>
</ul>
