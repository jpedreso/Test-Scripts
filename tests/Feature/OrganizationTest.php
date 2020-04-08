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
        /*  $this->withoutExceptionHandling(); */
        $response = $this->post('/organization', [
            'org_name' => 'Jerome',
            'agency_type_id' => 'Silva',
            'tax_id' => '295-225-265',
            'multi_company' => '1',
            'cost_center_enable' => '1'
        ]);

        $response->assertOk();
        $this->assertCount(1, Organization::all());
    }

    /** @test **/
    public function orgname_required()
    {
        /* $this->withoutExceptionHandling(); */
        $response = $this->post('/Organization', [
            'fname' => '',
            'mname' => 'Silva',
            'lname' => 'Pedreso'
        ]);

        $response->assertSessionHasErrors('fname');
        /* $this->assertCount(1, Organization::all()); */
    }

    /** @test **/
    public function lname_required()
    {
        /* $this->withoutExceptionHandling(); */
        $response = $this->post('/Organization', [
            'fname' => 'Jerome ',
            'mname' => 'Silva',
            'lname' => ''
        ]);

        $response->assertSessionHasErrors('lname');
        /* $this->assertCount(1, Organization::all()); */
    }

    /** @test **/
    public function mname_required()
    {
        /* $this->withoutExceptionHandling(); */
        $response = $this->post('/Organization', [
            'fname' => 'Jerome ',
            'mname' => '',
            'lname' => 'Pedreso'
        ]);

        $response->assertSessionHasErrors('mname');
        /* $this->assertCount(1, Organization::all()); */
    }

    /** @test **/
    public function update_Organization()
    {
        $this->withoutExceptionHandling();
        $this->post('/Organization', [
            'fname' => 'Jerome',
            'mname' => 'Silva',
            'lname' => 'Pedreso'
        ]);

        $Organization = Organization::first();

        $response = $this->put('/Organization/' . $Organization->id, [
            'fname' => 'Jeromes',
            'mname' => 'Silvas',
            'lname' => 'Pedresos'
        ]);

        $this->assertEquals('Jeromes', Organization::first()->fname);
        $this->assertEquals('Silvas', Organization::first()->mname);
        $this->assertEquals('Pedresos', Organization::first()->lname);
    }
}