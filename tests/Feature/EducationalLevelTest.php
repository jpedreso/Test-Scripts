<?php

namespace Tests\Feature;

use App\Model\MasterFiles\EducationalLevel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class EducationalLevelTest extends TestCase
{
    use RefreshDatabase;
    /** @test **/
    public function add_EducationalLevel()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/educationalLevel', [
            'education_level_title' => 'College',
            'education_level_desc' => 'College Graduate',
            'active' => '1',
            'memo' => 'Test Memo'
        ]);

        $response->assertOk();
        $this->assertCount(1, EducationalLevel::all());
    }

    /** @test **/
    public function check_required()
    {
        $response = $this->post('/educationalLevel', [
            'education_level_title' => '',
            'education_level_desc' => '',
            'active' => '',
            'memo' => ''
        ]);

        $response->assertSessionHasErrors(['education_level_title', 'education_level_desc', 'active', 'memo']);
    }

    /** @test **/
    public function update_EducationalLevel()
    {
        $this->withoutExceptionHandling();
        $this->post('/educationalLevel', [
            'education_level_title' => 'College',
            'education_level_desc' => 'College Graduate',
            'active' => '1',
            'memo' => 'Test Memo'
        ]);

        $educationalLevel = EducationalLevel::first();
        $response = $this->patch('/educationalLevel/' . $educationalLevel->education_level_id, [
            'education_level_title' => 'Colleges',
            'education_level_desc' => 'College Graduates',
            'active' => '0',
            'memo' => 'Test Memos'
        ]);
        $eduLevel = EducationalLevel::first();

        $this->assertEquals(
            [
                'Colleges',
                'College Graduates',
                '0',
                'Test Memos'
            ],
            [
                $eduLevel->education_level_title,
                $eduLevel->education_level_desc,
                $eduLevel->active,
                $eduLevel->memo
            ]
        );
    }

    /** @test **/
    public function delete_EducationalLevel()
    {
        $this->post('/educationalLevel', [
            'education_level_title' => 'Colleges',
            'education_level_desc' => 'College Graduates',
            'active' => '0',
            'memo' => 'Test Memos'
        ]);

        $EducationalLevel = EducationalLevel::first();
        /* $this->assertCount(1, EducationalLevel::all()); */

        $response = $this->delete('/educationalLevel/' . $EducationalLevel->education_level_id);

        $this->assertCount(0, EducationalLevel::all());
        $response->assertRedirect('/educationalLevel');
    }
}