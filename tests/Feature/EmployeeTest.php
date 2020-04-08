<?php

namespace Tests\Feature;

use App\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class EmployeeTest extends TestCase
{
    use RefreshDatabase;
    /** @test **/
    public function add_employee()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/employee', [
            'fname' => 'Jerome',
            'mname' => 'Silva',
            'lname' => 'Pedreso'
        ]);

        $response->assertOk();
        $this->assertCount(1, Employee::all());
    }

    /** @test **/
    public function fname_required()
    {
        /* $this->withoutExceptionHandling(); */
        $response = $this->post('/employee', [
            'fname' => '',
            'mname' => 'Silva',
            'lname' => 'Pedreso'
        ]);

        $response->assertSessionHasErrors('fname');
        /* $this->assertCount(1, Employee::all()); */
    }

    /** @test **/
    public function lname_required()
    {
        /* $this->withoutExceptionHandling(); */
        $response = $this->post('/employee', [
            'fname' => 'Jerome ',
            'mname' => 'Silva',
            'lname' => ''
        ]);

        $response->assertSessionHasErrors('lname');
        /* $this->assertCount(1, Employee::all()); */
    }

    /** @test **/
    public function mname_required()
    {
        /* $this->withoutExceptionHandling(); */
        $response = $this->post('/employee', [
            'fname' => 'Jerome ',
            'mname' => '',
            'lname' => 'Pedreso'
        ]);

        $response->assertSessionHasErrors('mname');
        /* $this->assertCount(1, Employee::all()); */
    }

    /** @test **/
    public function update_employee()
    {
        $this->withoutExceptionHandling();
        $this->post('/employee', [
            'fname' => 'Jerome',
            'mname' => 'Silva',
            'lname' => 'Pedreso'
        ]);

        $employee = Employee::first();

        $response = $this->put('/employee/' . $employee->id, [
            'fname' => 'Jeromes',
            'mname' => 'Silvas',
            'lname' => 'Pedresos'
        ]);

        $this->assertEquals('Jeromes', Employee::first()->fname);
        $this->assertEquals('Silvas', Employee::first()->mname);
        $this->assertEquals('Pedresos', Employee::first()->lname);
    }
}