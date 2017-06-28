<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2017
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace Admin\Testing;


use FastD\TestCase;
use PHPUnit_Extensions_Database_DataSet_ArrayDataSet;
use PHPUnit_Extensions_Database_DataSet_CompositeDataSet;

class ApiTestCase extends TestCase
{
    protected function getDataSet()
    {
        $path = app()->getPath().'/../database/dataset/*';

        $composite = new PHPUnit_Extensions_Database_DataSet_CompositeDataSet();

        foreach (glob($path) as $file) {
            $dataSet = load($file);
            if (empty($dataSet)) {
                $dataSet = [];
            }
            $tableName = pathinfo($file, PATHINFO_FILENAME);
            $composite->addDataSet(
                new PHPUnit_Extensions_Database_DataSet_ArrayDataSet(
                    [
                        $tableName => $dataSet,
                    ]
                )
            );
        }

        return $composite;
    }
}