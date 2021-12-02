<?php

include "include/autoloader.php";

$emailContr1 = new emailcontrol();
$emailContr2 = new emailview();
$deleteObj1 = new emailcontrol();
$emails = new emailsort();
$devEmails = $emails->devideEmail();

if(isset($_POST['order'])){
    $result = $emailContr2->getEmailOrd($_POST['order']);
}else{
    $result = $emailContr2->getEmails();
}

if(isset($_POST['orderEmail'])){
    $result = $emailContr2->getEmailVal($_POST['orderEmail']);
}

if(isset($_POST["delete"])){
    $deleteObj->delEmail($_POST["hiddenvalue"]);
    header("Location: emails.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emails</title>
</head>
<body>
    <form method="POST">
        <select name ="order">
            <option>Order by</option>
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
            <option value="dtof">DateOf</option>
        </select>
        <input type="submit"value="Select">
    </form>
    <div id="btns">
        <form method="post">
            <label for="order">Order by:</label>
            <select name="orderEmail" id="order">
                <?for($i = 0; $i < count($devEmails);$i++){?>
                <option><?php if(isset($devEmails[$i])){echo $devEmails[$i];}?></option>
                <?}?>
            </select>

            <input type="submit" name="submit" value="Enter">
        </form>
    </div>
        <table>
            <thead>
                <tr>
                    <th>Emails</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?for($i = 0; $i < count($result); $i++){?>
                <?$delId = $result[$i]["id"]?>
                <tr>
                    <td><?php echo $result[$i]["email"];?></td>
                    <td><?php echo $result[$i]["date_joined"];?></td>
                    <form method="post">
                        <td><input type="submit" name="delete" value="DELETE"></td>
                        <td><input type="hidden" value="<?php echo $delId?>" name="hiddenvalue"></td>
                    </form>
                </tr>
                <?}?>
            </tbody>
        </table>
</body>
</html>