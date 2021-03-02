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

  //Find your item, push the result into selected_items array and emit updated $selected_items array to parent component
  abstract public function addSelectedItem($user_id);

  //Remove item from $selected_items by $id and emit updated $selected_items array to parent component
  abstract public function removeSelectedItem($id);

  public function resetProps()
  {
    $this->reset(['query', 'data']);
  }


  public function render()
  {
    return view('search-multiselect-input::search-multiselect-input');
  }

}
