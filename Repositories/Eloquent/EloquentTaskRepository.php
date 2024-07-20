<?php

namespace Modules\Itask\Repositories\Eloquent;

use Modules\Itask\Repositories\TaskRepository;
use Modules\Core\Icrud\Repositories\Eloquent\EloquentCrudRepository;
use Illuminate\Support\Facades\Auth;

class EloquentTaskRepository extends EloquentCrudRepository implements TaskRepository
{
  /**
   * Filter names to replace
   * @var array
   */
  protected $replaceFilters = [];

  /**
   * Relation names to replace
   * @var array
   */
  protected $replaceSyncModelRelations = [];

  /**
   * Filter query
   *
   * @param $query
   * @param $filter
   * @param $params
   * @return mixed
   */
  public function filterQuery($query, $filter, $params)
  {
    if (!isset($params->permissions['itask.tasks.index-all']) ||
      (isset($params->permissions['itask.tasks.index-all'])
        && !$params->permissions['itask.tasks.index-all'])) {

      $id = Auth::id() ?? null;

      if (isset($id)) $query->where('assigned_to_id', Auth::id());
    }

    /**
     * Note: Add filter name to replaceFilters attribute before replace it
     *
     * Example filter Query
     * if (isset($filter->status)) $query->where('status', $filter->status);
     *
     */

    //Response
    return $query;
  }

  /**
   * Method to sync Model Relations
   *
   * @param $model ,$data
   * @return $model
   */
  public function syncModelRelations($model, $data)
  {
    //Get model relations data from attribute of model
    $modelRelationsData = ($model->modelRelations ?? []);

    /**
     * Note: Add relation name to replaceSyncModelRelations attribute before replace it
     *
     * Example to sync relations
     * if (array_key_exists(<relationName>, $data)){
     *    $model->setRelation(<relationName>, $model-><relationName>()->sync($data[<relationName>]));
     * }
     *
     */

    //Response
    return $model;
  }
}
