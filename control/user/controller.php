<?php



class userSet
{
    function showUser()
    {
        require '/xampp/htdocs/E-DCL/model/user/model.php';
        $model = new userModal();
        $data = $model->showUser();
        require '/xampp/htdocs/E-DCL/view/user/view.php';
    }
}
