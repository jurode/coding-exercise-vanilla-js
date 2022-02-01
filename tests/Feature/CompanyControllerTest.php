<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test get all available companies.
     *
     * @return void
     */
    public function testIndex()
    {
        Company::factory()->create(['name' => 'Company1']);
        Company::factory()->create(['name' => 'Company2']);

        $response = $this->getJson('/companies');

        $response->assertOk();
        $response->assertJson(['companies' => Company::all()->toArray()]);
    }
}
