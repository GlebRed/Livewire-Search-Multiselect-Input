# Livewire Searchable Multiselect Input

Livewire component for searchable multiselect input with **dynamic** data source

### Preview

![preview](https://github.com/GlebRed/Livewire-Search-Multiselect-Input/raw/master/preview.gif)

### Installation

Install the package via composer:

```bash
composer require glebred/search-multiselect-input
```

Publish the view 
```bash
php artisan vendor:publish --provider="GlebRed\SearchMultiselectInput\SearchMultiselectInputServiceProvider" --tag="views"
```
You will find that new view in `views/vendor/search_multiselect_input/components`

### Requirements

This package uses `livewire/livewire` (https://laravel-livewire.com/) under the hood.

It also uses TailwindCSS (https://tailwindcss.com/) for base styling.

Please make sure you include both of these dependencies before using this component.

### Usage

In order to use this component, you must create a new Livewire component that extends from
`SearchMultiselectInput`

You can use `make:livewire` to create a new component. For example.
```bash
php artisan make:livewire MyMultiInput --inline
```

In the `MyMultiInput` class, instead of extending from the base Livewire `Component` class,
extend from `SearchMultiselectInput` class. Also, remove the `render` method.

```php
class MyMultiInput extends SearchMultiselectInput
{
    //
}
```

In this class, you must implement the following methods to configure data sources. For instance, here I'm getting data from my User model
```php
public function updatedQuery()
{
    $this->data = User::where('name', 'like', '%' . $this->query . '%')
        ->get()
        ->toArray();
}

public function addSelectedItem($user_id)
{
    $user = User::findOrFail($user_id, ['id', 'name']);

    if (!empty($this->selected_items)) {
        if (!in_array($user['id'], array_column($this->selected_items, 'id'))) $this->selected_items[] = $user;
    } else {
        $this->selected_items[] = $user;
    }

    //Emit selected items to parent's participantsAdded($participants)
    $this->emit('participantsAdded', $this->selected_items);

    $this->resetProps();
}

```

To render the component in a view, just use the Livewire tag or include syntax

 ```blade
 <livewire:my-multi-input></livewire:my-multi-input>
 ```

### Advanced behavior

// TODO 😬

### AlpineJs support

Add AlpineJs for arrow-keys navigation, enter key for selection, enter/space keys for reset. 😎

### Security

If you discover any security related issues, please email gleb@redko.ninja instead of using the issue tracker.

## Credits

- [Gleb Redko](https://github.com/glebred)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.