<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * CodeIgniter CSV Import Class
 *
 * This library will help import a CSV file into
 * an associative array.
 * 
 * This library treats the first row of a CSV file
 * as a column header row.
 * 
 *
 * @package         CodeIgniter
 * @subpackage      Libraries
 * @category        Libraries
 * @author          Brad Stinson
 */
class Csvimport {var $fields;            /** columns names retrieved after parsing */ 
    var $separator  =   ';';    /** separator used to explode each line */
    var $enclosure  =   '"';    /** enclosure used to decorate each field */

    var $max_row_size   =   4096;    /** maximum row size to be used for decoding */

    function parse_file($p_Filepath) 
    {
        $file           =   fopen($p_Filepath, 'r');
        $this->fields   =   fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure);
        $keys_values        =   explode(',',$this->fields[0]);

        $content            =   array();
        $keys           =   $this->escape_string($keys_values);

        $i  =   1;
        while(($row = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure)) != false ) 
        {
            if (empty($row)) {
                continue; // skip empty rows
            }

            if (count($keys) === count($row)) {

                $row = $this->escape_string($row);
                $arr = [];

                for ($j = 0; $j < count($keys); $j++) {
                    if ($keys[$j] !== '') {
                        $arr[$keys[$j]] = $row[$j] ?? null;
                    }
                }

                $content[$i++] = $arr;
            }
        }
        fclose($file);
        return $content;
    }

    function escape_string($data)
    {
        $result = [];

        if (!is_array($data)) {
            return $result;
        }

        foreach ($data as $row) {
            if ($row !== null) {
                $result[] = str_replace('"', '', $row);
            } else {
                $result[] = null;
            }
        }

        return $result;
    }
}