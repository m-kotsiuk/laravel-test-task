<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $name
 * @property int $position_id
 * @property \Illuminate\Support\Carbon $employment_date
 * @property string $phone_number
 * @property string $email
 * @property float $salary
 * @property string|null $photo
 * @property int|null $node_depth
 * @property int|null $parent_id
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Kalnoy\Nestedset\Collection|Employee[] $children
 * @property-read int|null $children_count
 * @property-read \App\Models\User|null $creator
 * @property-read \App\Models\User|null $editor
 * @property-read Employee|null $parent
 * @property-read \App\Models\Position $position
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection|static[] get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee query()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereAdminCreatedId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereAdminUpdatedId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereCreatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereEmail($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereEmploymentDate($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereName($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereNodeDepth($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee wherePhoneNumber($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee wherePhoto($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee wherePositionId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereSalary($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee whereUpdatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Employee withoutRoot()
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Position
 *
 * @property int $id
 * @property string $name
 * @property int|null $admin_created_id
 * @property int|null $admin_updated_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $creator
 * @property-read \App\Models\User|null $editor
 * @property-read \Kalnoy\Nestedset\Collection|\App\Models\Employee[] $employees
 * @property-read int|null $employees_count
 * @method static \Illuminate\Database\Eloquent\Builder|Position newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position query()
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereAdminCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereAdminUpdatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereUpdatedAt($value)
 */
	class Position extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

