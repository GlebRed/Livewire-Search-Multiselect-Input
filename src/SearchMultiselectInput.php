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

  //Write query using $query and set $data to some meaningful result
  abstract public function updatedQuery();


  public function addSelectedItem(Model $model)
  {

    $model = Model::findOrFail($model, ['id', 'name']);

    if (!empty($this->selected_items)) {
      if (!in_array($model['id'], array_column($this->selected_items, 'id'))) $this->selected_items[] = $model;
    } else {
      $this->selected_items[] = $model;
    }


    $this->resetProps();
  }

  //Return view('your-component-name')
  abstract function render();

}
