<?php

class simpleCsv
{
    /**
     * @var
     */
    protected $output;

    /**
     * @const DELIMITER
     */
    const DELIMITER = ";";

    /**
     * @param string $filename
     */
    function __construct($filename = "data.csv")
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $filename);
        $this->output = fopen('php://output', 'w');
    }

    function __destruct()
    {
        fclose($this->output);
    }

    /**
     * @param array $data
     */
    function saveRow(array $data)
    {
        fputcsv($this->output, $data, self::DELIMITER);
    }

    /**
     * @param array $data
     */
    function saveArray(array $data)
    {
        foreach ($data as $row) {
            if (!is_array($row)) {
                continue;
            }
            fputcsv($this->output, $row, self::DELIMITER);
        }
    }

}
