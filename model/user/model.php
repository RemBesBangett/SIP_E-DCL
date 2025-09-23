<?php

class userModal
{

    public function showUser()
    {
        $conn = Database::getConnection();
        $tsql = 'SELECT * FROM [E-DCL_M_USER]';
        $stmt = sqlsrv_query($conn, $tsql);
        if (!$stmt) {
            return ['status' => false, 'message' => 'Check Database'];
        }

        $data = [];
        // Loop untuk ambil semua row  
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
}
