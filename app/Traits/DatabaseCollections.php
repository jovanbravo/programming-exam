<?php

namespace App\Traits;

trait DatabaseCollections
{

    private static function theClass()
    {
        return  static::class;
    }

    /** Get table Name
     * @return string
     */
    private function getTableName()
    {
        $classFullName = static::theClass();
        $matches = [];
        preg_match('|^.*\\\(?:([A-Z][a-z]+)+)$|', $classFullName, $matches);
        $className = $matches[1] ?? '';
        $unserscClassName = preg_replace('|[A-Z]|', '_$0', $className);
        $lowercaseClassName = substr(strtolower($unserscClassName), 1);

        return $lowercaseClassName . 's';
    }


    /** Get all data
     * @return mixed
     */
    public function getAll()
    {

        return static::theClass()::all();
    }


    /** Det data by id
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return static::theClass()::query()->where('id', $id)->first();
    }


    /** Get data by column name and value
     * @param $column
     * @param $value
     * @return mixed
     */
    public function getByColumn($column, $value)
    {

        return static::theClass()::query()->where($column, $value)->get();
    }


    /** Get data by two columns and two values
     * @param $column1
     * @param $value1
     * @param $column2
     * @param $value2
     * @return mixed
     */
    public function getByColumns($column1, $value1, $column2, $value2)
    {
        return static::theClass()::query()->where($column1, $value1)->where($column2, $value2)->get();
    }


    /** Get data by search bar
     * @param $column
     * @param $value
     * @return mixed
     */
    public function searchColumn($column, $value)
    {
        return static::theClass()::query()->where($column, 'LIKE' . '%' . $value . '%')->get();
    }


    /** Join with one table
     * @param $table
     * @param $firstId
     * @param $secondId
     * @return mixed
     */
    public function joinWithOne($table, $firstId, $secondId)
    {
        $modelTableName = $this->getTableName();
        return static::theClass()::query()->join($table, $table . '.' . $firstId, '=', $modelTableName . '.' . $secondId);
    }
}
