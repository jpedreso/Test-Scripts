<?php

namespace Tests\Feature;

use App\Model\MasterFiles\SocialMediaType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class SocialMediaTypeTest extends TestCase
{
    use RefreshDatabase;
    /** @test **/
    public function add_SocialMediaType()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/socialMediaType', [
            'social_media_title' => 'Facebook'
        ]);

        $response->assertOk();
        $this->assertCount(1, SocialMediaType::all());
    }

    /** @test **/
    public function check_required()
    {
        $response = $this->post('/socialMediaType', [
            'social_media_title' => ''
        ]);

        $response->assertSessionHasErrors(['social_media_title']);
    }

    /** @test **/
    public function update_SocialMediaType()
    {
        $this->withoutExceptionHandling();
        $this->post('/socialMediaType', [
            'social_media_title' => 'Facebook',
        ]);

        $socialMediaType = SocialMediaType::first();
        $response = $this->patch('/socialMediaType/' . $socialMediaType->social_media_type_id, [
            'social_media_title' => 'Twitter',
        ]);
        $socialMedia = SocialMediaType::first();

        $this->assertEquals(
            [
                'Twitter',
            ],
            [
                $socialMedia->social_media_title,
            ]
        );
    }

    /** @test **/
    public function delete_SocialMediaType()
    {
        $this->post('/socialMediaType', [
            'social_media_title' => 'Facebook',
        ]);

        $socialMediaType = SocialMediaType::first();
        /* $this->assertCount(1, SocialMediaType::all()); */

        $response = $this->delete('/socialMediaType/' . $socialMediaType->social_media_type_id);

        $this->assertCount(0, SocialMediaType::all());
        $response->assertRedirect('/socialMediaType');
    }
}