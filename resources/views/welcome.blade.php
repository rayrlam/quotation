<x-site-layout>
    <x-slot name="header">
        <div class="flex justify-center sm:justify-start sm:pt-0">
            <h1 class="ml-4">
                {{ __('Technical Test - Development Task') }}    
            </h1>
        </div>
    </x-slot>

    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            
        <div class="ml-4 text-xl mt-4 font-semibold text-gray-900 dark:text-white">
            <p>
                If you are reasonably familiar with Symfony, this task should take approximately 3 hours (but don't worry if it takes more or less time than that).
            </p>
            <p>
                Create a Symfony project (either Symfony 4 or 5) for an API endpoint using DRY and SOLID object-oriented PHP, following PSR-12. The endpoint should accept a JSON payload containing the following fields: age, postcode, regNo. For example, the body of the request might look like this:
            </p>
            <p>
                {
                    "age": 20,
                    "postcode": "PE3 8AF",
                    "regNo": "PJ63 LXR"
                }        
            </p>
        </div>


        <div class="ml-4 text-xl mt-4 font-semibold text-gray-900 dark:text-white">
            <p>
                Your code should make a call to a third party API to look up the vehicle registration number and return an ABI code. Note this does not need to be a real API call - you can mock the response, but still show an example of how you could go about connecting to a third party API.
            </p>
            <p>    
                Use the attached quotation.sql to create a MySQL database which contains rating factors for various ages, postcode areas, and vehicle ABI codes. When a request hits your API, it should start with a base premium of £500 (this can be hard-coded), then find the rating factors to apply for age, postcode area, and ABI code (assume a rating factor of 1 if the value is not in the database). Multiply the premium by each rating factor in turn to obtain a total premium and return an appropriate JSON response. 
            </p>
            <p>    
                Please write the code in such a way that the quoting engine could be used with a different set of rating factors - for example, to allow re-use of the quoting engine with a different insurance product that uses additional or different rating factors, without breaking the existing implementation (bear in mind the open/closed principle here).
            </p>    
        </div>

        <h2>
            What we are looking for:
        </h2>
 
        <div class="ml-4 text-xl mt-4 font-semibold text-gray-900 dark:text-white">
            <ul>        
                <li>SOLID principles observed</li>
                <li>PSR-12 followed</li>
                <li>Good separation of concerns (especially between controller and model layers)</li>
                <li>Rating factors extendable (hint: allow the rating factors to be specified in the dependency injection container)</li>
                <li>No security vulnerabilities</li>
                <li>No commented out code except where used to demonstrate a point (eg. for the mock API call)</li>
                <li>Code should be executable (no mis-typed variable names, missing use statements, etc.)</li>
                <li>Code should be concise and well laid out - no excessive use of blank lines, unused use statements, etc.</li>
            </ul>
        </div>
        
        <h2>
            Remarks
        </h2>
 
        <div class="ml-4 text-xl mt-4 font-semibold text-gray-900 dark:text-white">
            <ul>
                <li>Laravel Installation - <a class="text-gray-700" href="https://laravel.com/docs/9.x/installation" target="_blank">https://laravel.com/docs/9.x/installation</a></li>
                <li>Create Database quotation</li>
                <li>Edit .env at DB_DATABASE, DB_USERNAME & DB_PASSWORD for database connection</li>
                <li>Run Laravel Command
                    <div style="margin-top:20px; background-color:#091e42; color:#fefefe; width:90%; padding: 10px 20px">
<pre>
/*
** Create all tables for this app
*/ 
php artisan migrate</pre>        
                    </div>
                    <div style="margin-top:20px; background-color:#091e42; color:#fefefe; width:90%; padding: 10px 20px">
<pre>
/*
** Create the dumpy data for this app
*/    
php artisan db:seed</pre>        
                    </div>
                    <div style="margin-top:20px; background-color:#091e42; color:#fefefe; width:90%; padding: 10px 20px">
<pre>
/*
** Run the QuoteTest to check for errors
*/    
php artisan test</pre>        
                    </div>
                </li>
                <li style="margin-top:20px">
                    Main File
                    <ul>
                        <li>
                            Controller: App\Http\Controllers\Api\V1\QuoteV1Controller
                        </li>
                        <li>
                            Interface: App\Http\Controllers\Api\V1\RatingInterface
                        </li>
                        <li>
                            Classes: 
                            <ul>
                                <li>App\Http\Controllers\Api\V1\Abicode</li>
                                <li>App\Http\Controllers\Api\V1\Age</li>
                                <li>App\Http\Controllers\Api\V1\Postcode</li>
                                <li>App\Http\Controllers\Api\V1\Premium</li>
                                <li>App\Http\Controllers\Api\V1\RatingFactorHandler</li>
                            </ul>
                        </li>
                        <li>
                            Helpers: App\Helpers\QuoteHelper
                        </li>
                        <li>
                            Tests: Tests\Unit\QuoteTest
                        </li>
                    </ul>
                </li>
                <li>
                    Api Route: '/api/v1/quoting'
                </li>
            </ul>  
        </div>
    </div>
</x-site-layout>