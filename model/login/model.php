<?php

class logindb
{
    public function loginProc($username, $password)
    {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM [E-DCL_M_USER] WHERE NAMA = ? AND PASSWORD = ?";
        $params = [$username, $password];
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            return [
                'status' => false,
                'message' => 'Database error',
                'detail' => print_r(sqlsrv_errors(), true)
            ];
        }
        if (sqlsrv_has_rows($stmt)) {
            return ['status' => true, 'message' => 'Login berhasil'];
            // include 'index.php?page=user';
        } else {
            return ['status' => false, 'message' => 'Login gagal'];
        }
    }
}
