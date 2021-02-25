<?php


namespace GlebRed\SearchMultiselectInput\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Livewire\LivewireManager;
use Livewire\Testing\TestableLivewire;

use GlebRed\SearchMultiselectInput\UserSearchMultiselectInput;

class LivewireInputTest extends TestCase
{
  use WithFaker;

  private function createComponent(): TestableLivewire
  {
    return app(LivewireManager::class)->test(UserSearchMultiselectInput::class);
  }

  /** @test */
  public function can_create_component()
  {
    $component = $this->createComponent();

    $this->assertNotNull($component);

  }

  /** @test */
  public function can_remove_items()
  {
    $component = $this->createComponent();

    $this->assertNotNull($component);

    $item1 = ['id' => '1', 'name' => $this->faker->name];
    $item2 = ['id' => '2', 'name' => $this->faker->name];

    Livewire::test($component->componentName)
        ->set('selected_items', [$item1, $item2])
        ->call('removeSelectedItem', $item1['id'])
        ->assertDontSee($item1['name']);
  }

}