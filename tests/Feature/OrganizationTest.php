<?php

namespace Tests\Feature;

use App\Model\MasterFiles\Organization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class OrganizationTest extends TestCase
{
    use RefreshDatabase;
    /** @test **/
    public function add_Organization()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/organization', [
            'org_name' => 'Tier3',
            'agency_type_id' => 'Software Development',
            'tax_id' => '295-225-265',
            'multi_company' => '1',
            'cost_center_enable' => '1'
        ]);

        $response->assertOk();
        $this->assertCount(1, Organization::all());
    }

    /** @test **/
    public function check_required()
    {
        $response = $this->post('/organization', [
            'org_name' => '',
            'agency_type_id' => '',
            'tax_id' => '',
            'multi_company' => '',
            'cost_center_enable' => ''
        ]);

        $response->assertSessionHasErrors(['org_name', 'agency_type_id', 'tax_id', 'multi_company', 'cost_center_enable']);
    }

    /** @test **/
    public function update_Organization()
    {
        $this->withoutExceptionHandling();
        $this->post('/organization', [
            'org_name' => 'Tier3',
            'agency_type_id' => 'Software Development',
            'tax_id' => '295-225-265',
            'multi_company' => '1',
            'cost_center_enable' => '1'
        ]);

        $organization = Organization::first();

        $response = $this->put('/organization/' . $organization->id, [
            'org_name' => 'Tier3s',
            'agency_type_id' => 'Software Developments',
            'tax_id' => '295-225-265s',
            'multi_company' => '0',
            'cost_center_enable' => '0'
        ]);
        $org = Organization::first();
        $this->assertEquals(
            [
                'Tier3s',
                'Software Developments',
                '295-225-265s',
                '0',
                '0'
            ],
            [
                $org->org_name,
                $org->agency_type_id,
                $org->tax_id,
                $org->multi_company,
                $org->cost_center_enable
            ]
        );
    }

    /** @test **/
    public function delete_Organization()
    {
        $this->post('/organization', [
            'org_name' => 'Tier3',
            'agency_type_id' => 'Software Development',
            'tax_id' => '295-225-265',
            'multi_company' => '1',
            'cost_center_enable' => '1'
        ]);

        $organization = Organization::first();
        /* $this->assertCount(1, Organization::all()); */

        $response = $this->delete('/organization/' . $organization->id);

        $this->assertCount(0, Organization::all());
        $response->assertRedirect('/organization');
    }
}