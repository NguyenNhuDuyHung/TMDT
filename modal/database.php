<?php
function insertData($table, $data)
{
    $key = array_keys($data);
    $truong = implode(',', $key); // Nối các trường
    $value = ':' . implode(',:', $key); // Danh sach value

    $sql = 'INSERT INTO ' . $table . '(' . $truong . ') VALUES (' . $value . ')';
    $ketqua = pdo_query($sql, $data);
    return $ketqua;
}
