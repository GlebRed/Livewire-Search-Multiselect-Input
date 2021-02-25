<?php

namespace GlebRed\SearchMultiselectInput;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

/**
 * Class SearchMultiselectInput
 * @package GlebRed\SearchMultiselectInput
 * @property string $query
 * @property array $data
 * @property array $selected_items
 */
abstract class SearchMultiselectInput extends Component
{

  public $query = '';
  public $data;
  public $selected_items = [];

  //Write query using $query and set $data to some meaningful result
  abstract public function updatedQuery();

  //Find your item and push the result into selected_items array
  abstract public function addSelectedItem($user_id);


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


  public function render()
  {
    return view('search-multiselect-input::search-multiselect-input');
  }

}
