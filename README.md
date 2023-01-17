## Key Files
- [Kernel](https://github.com/jdw5/laravel-prune-models/blob/main/app/Console/Kernel.php)
- [EventsModel](https://github.com/jdw5/laravel-prune-models/blob/main/app/Models/Event.php)
- [PruneEventsCommand](https://github.com/jdw5/laravel-prune-models/blob/main/app/Console/Commands/PruneEvents.php)

## Using Prunable Trait
- Apply the `use Prunable` trait on a model
- Generate the `prunable` method to return a builder applying conditions of which models to delete
- `pruning` method is used to access the objects and apply methods on relations etc
- Run using `php artisan model:prune`
    - This will prune all models, select specific models using the --model options
    - See all options with the --help flag

## Prunable vs MassPrunable
- Altneratively use the `MassPrunable` trait which will improve performance
- Only `Prunable` trait allows for pruning method as it retrieves a collection chunk of the models in memory, allowing for relation accessing
- Use `MassPrunable` when pruning method is not required as it has better performance
- Effective difference is
    - Prunable: `Model::get()->delete()`
    - MassPrunable: `Model::delete()`

## Notes
- Prunable will also prune any soft delete models as it applies a force delete
