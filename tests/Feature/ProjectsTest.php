<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
/**
 * Class Project Test
 */
class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_project(): void
    {
        $this->withoutExceptionHandling();
        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

        $this->post('/projects',$attributes)->assertRedirect('/projects');
        $this->assertDatabasehas('projects',$attributes);
        $this->get('/projects')->assertSee($attributes['title']);
    }

    /** @test */
    public  function a_project_requires_a_title(): void
    {
        $attributes = Project::factory()->nullTitle()->make()->toArray();

        $this->post('/projects',$attributes)->assertSessionHasErrors('title');
    }

    public function a_project_requires_a_description(): void
    {
        $attributes = Project::factory()->nullDescription()->make()->toArray();
        $this->post('/projects',$attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public  function a_user_can_view_project()
    {
        $project = Project::factory()->create();
        $this->get($project->path())->assertSee($project->title)->assertSee($project->description);
    }
}
