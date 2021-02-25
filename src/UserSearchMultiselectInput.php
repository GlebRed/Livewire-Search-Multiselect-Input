<?php

namespace GlebRed\SearchMultiselectInput;

use App\Models\User;
use Livewire\Component;

/**
 * Class UserSearchMultiselectInput
 * @package GlebRed\SearchMultiselectInput
 * @property string $query
 * @property array $data
 * @property array $selected_items
 */
class UserSearchMultiselectInput extends Component
{

  public $query = '';
  public $data;
  public $selected_items = [];


  public function resetProps()
  {
    $this->reset(['query', 'data']);
  }


  public function removeSelectedItem($id)
  {
    foreach ($this->selected_items as $key => $item) {
      if ($item['id'] == $id) {
        unset($this->selected_items[$key]);
        break;
      }
    }
  }

  public function updatedQuery()
  {
    $this->data = User::where('name', 'like', '%' . $this->query . '%')
        ->get()
        ->toArray();
  }

  public function addSelectedItem($user)
  {
    $user = User::findOrFail($user, ['id', 'name']);


    if (!empty($this->selected_items)) {
      if (!in_array($user['id'], array_column($this->selected_items, 'id'))) $this->selected_items[] = $user;
    } else {
      $this->selected_items[] = $user;
    }


    $this->resetProps();
  }

  public function render()
  {
    return view('search-multiselect-input::search-multiselect-input');
  }

}
