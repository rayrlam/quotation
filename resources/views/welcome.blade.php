<x-site-layout>
    <div class="p-8 lg:border-2  lg:border-zinc-300">

        <div class="text-lg lg:mt-4 text-gray-900 dark:text-white">
            <p class="mb-4">
                If you are reasonably familiar with Symfony, this task should take approximately 3 hours (but don't worry if it takes more or less time than that).
            </p>
            <p class="mb-4">
                Create a Symfony project (either Symfony 4 or 5) for an API endpoint using DRY and SOLID object-oriented PHP, following PSR-12. The endpoint should accept a JSON payload containing the following fields: age, postcode, regNo. For example, the body of the request might look like this:
            </p>
         
<pre class="bg-blue-800 text-gray-100 p-4 rounded-lg">
    
{
    "age": 20,
    "postcode": "PE3 8AF",
    "regNo": "PJ63 LXR"
}</pre>        
        
        </div>

        <div class="mt-4   text-gray-900 dark:text-white">
            <p class="mb-4">
                Your code should make a call to a third party API to look up the vehicle registration number and return an ABI code. Note this does not need to be a real API call - you can mock the response, but still show an example of how you could go about connecting to a third party API.
            </p>
            <p class="mb-4">
                Use the attached quotation.sql to create a MySQL database which contains rating factors for various ages, postcode areas, and vehicle ABI codes. When a request hits your API, it should start with a base premium of £500 (this can be hard-coded), then find the rating factors to apply for age, postcode area, and ABI code (assume a rating factor of 1 if the value is not in the database). Multiply the premium by each rating factor in turn to obtain a total premium and return an appropriate JSON response. 
            </p>
            <p>    
                Please write the code in such a way that the quoting engine could be used with a different set of rating factors - for example, to allow re-use of the quoting engine with a different insurance product that uses additional or different rating factors, without breaking the existing implementation (bear in mind the open/closed principle here).
            </p>    
        </div>

        <h2 class="text-xl mt-8 font-bold">
            What we are looking for:
        </h2>
    
        <div class="mt-4  text-gray-900 dark:text-white">
            <ul class="lg:list-disc">        
                <li class="lg:ml-4">SOLID principles observed</li>
                <li class="lg:ml-4">PSR-12 followed</li>
                <li class="lg:ml-4">Good separation of concerns (especially between controller and model layers)</li>
                <li class="lg:ml-4">Rating factors extendable (hint: allow the rating factors to be specified in the dependency injection container)</li>
                <li class="lg:ml-4">No security vulnerabilities</li>
                <li class="lg:ml-4">No commented out code except where used to demonstrate a point (eg. for the mock API call)</li>
                <li class="lg:ml-4">Code should be executable (no mis-typed variable names, missing use statements, etc.)</li>
                <li class="lg:ml-4">Code should be concise and well laid out - no excessive use of blank lines, unused use statements, etc.</li>
            </ul>
        </div>
            
        <h2 class="text-xl mt-8 font-bold">
            Remarks
        </h2>
 
        <div class="mt-4   text-gray-900 dark:text-white">
            <ul class="break-all">
                <li class="ml-4">Laravel Installation - <a href="https://laravel.com/docs/9.x/installation" target="_blank" class="text-green-500 hover:text-blue-500">https://laravel.com/docs/9.x/installation</a></li>
                <li class="ml-4">Rename .env.example to .env</li>
                <li class="ml-4">
                    Create Database laravel
                </li>
                <li>
                    <div class="mt-4 bg-blue-800 text-gray-100 p-6 rounded-lg">
                        <div class="text-gray-400 mb-2">
                            /*<br>
                            ** Create by MySQL Comman<br>
                            */
                        </div>
                        CREATE DATABASE LARAVEL;        
                    </div>    
                </li>
                <li class="ml-4 mt-4">Run Laravel Command</li>
                <li>
                    <div class="mt-4 bg-blue-800 text-gray-100 p-6 rounded-lg">
                        <div class="text-gray-400 mt-4 mb-2">
                            /*<br>
                            ** Create all tables for this app<br>
                            */
                        </div>
                        php artisan migrate        
                 

                        <div class="text-gray-400 mt-4 mb-2">
                            /*<br>
                            ** Create the dumpy data for this app<br>
                            */
                        </div>
                        php artisan db:seed --class=DataSeeder        
              
                        <div class="text-gray-400 mt-4 mb-2">
                            /*<br>
                            ** Run test to check for errors<br>
                            */
                        </div>
                        php artisan test        
             
                        <div class="text-gray-400 mt-4 mb-2">
                            /*<br>
                            ** Running local server<br>
                            */
                        </div>
                        php artisan serve        
                    </div>
                </li>
            </ul>
        </div>

       
        
        <hr class="hr mt-8 mb-4" />
            
        <h2 class="text-xl font-bold">
            Main Files
        </h2>    
        <ul class="break-all">
       
            <li class="text-indigo-700">App\Http\Controllers\Api\V1</li>
            <li class="ml-4">
                Controller:
            </li>
            <li class="ml-8 pb-4" title="App\Http\Controllers\Api\V1\QuoteV1Controller">QuoteV1Controller</li>
            <li class="ml-4">
                Other Classes:
            </li>
            <li class="ml-4"></li>
            <li class="ml-8" title="App\Http\Controllers\Api\V1\Calculator">Calculator</li>
            <li class="ml-8 pb-4" title="App\Http\Controllers\Api\V1\QuoteRepository">QuoteRepository</li>
 
       
            <li class="text-indigo-700">App\Http\Controllers\Api\V1\RatingFactor</li>
            <li class="ml-4">
                Interface:
            </li>
            <li class="ml-8 pb-4" title="App\Http\Controllers\Api\V1\RatingFactor\RatingFactorInterface">
                RatingFactorInterface
            </li>
            <li class="">
                <ul class="pb-4">
                    <li class="ml-4">
                        Rating Factor Classes:
                    </li>
                    <li class="ml-8" title="App\Http\Controllers\Api\V1\RatingFactor\Abicode">Abicode</li>
                    <li class="ml-8" title="App\Http\Controllers\Api\V1\RatingFactor\Age">Age</li>
                    <li class="ml-8" title="App\Http\Controllers\Api\V1\RatingFactor\Postcode">Postcode</li>
                    <li class="ml-8" title="App\Http\Controllers\Api\V1\RatingFactor\Premium">Premium</li>
                </ul>
            </li>
            <li class="text-indigo-700">App\Helpers</li>
            <li class="ml-4 pb-4" title="App\Helpers\QuoteHelper">
                QuoteHelper
            </li>
            <li class="text-indigo-700">Tests\Unit</li>
            <li class="ml-4 pb-4" title="Tests\Unit\QuoteTest">
                QuoteTest
            </li>
            <li class="lg:ml-4">
                Api Route: <i class="text-indigo-700" title="api/v1/quoting">api/v1/quoting</i>
            </li>
        </ul>
    </div>    
</x-site-layout>