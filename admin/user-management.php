<?php

include("../header.php");
?>

<h1 style="text-align: center;"> مدیریت کاربران </h1>


<div class="container mt-3">

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>id</th>
            <th>کدملی</th>
            <th>نام</th>
            <th>فامیلی</th>
            <th>نام کاربری</th>
            <th>گذرواژه</th>
            <th>موبایل</th>
            <th>ایمیل</th>
            <th>تصویر</th>
            <th>کد والد</th>
            <th>توضیحات</th>
            <th>عملیات</th>
        </tr>
        </thead>

<?php
include '../db.php';
$conn = (new class_db())->conection_database;

$sql_select = "SELECT * FROM `user`";

$result = $conn->query($sql_select);

if ($result->num_rows > 0) {

//echo "result->num_rows:$result->num_rows"."<hr>";

while ($row = $result->fetch_assoc()) {
// `id`, `code_meli`, `name`, `family`, `username`, `password`, `mobile`,
// `email`, `pic`, `user_parent_code`, `tozihat`
$id = $row['id'];
$code_meli=$row['code_meli'];
$name = $row['name'];
$family=$row['family'];
$username=$row['username'];
$password=$row['password'];
$mobile=$row['mobile'];
$email=$row['email'];
$pic=$row['pic'];
$user_parent_code=$row['user_parent_code'];
$tozihat=$row['tozihat'];
?>
<tbody>
<tr>
    <td> <?php echo $id ?> </td>
    <td> <?php echo $code_meli ?></td>
    <td> <?php echo $name ?></td>
    <td> <?php echo $family ?></td>
    <td> <?php echo $username ?></td>
    <td> <?php echo $password ?></td>
    <td> <?php echo $mobile ?></td>
    <td> <?php echo $email ?></td>
    <td><img width="200px;''" src="../images/page_content/<?php echo $pic ?>"</td>
    <td> <?php echo $user_parent_code ?></td>
    <td> <?php echo $tozihat ?></td>
    <td><a href="edit-pagescontent.php?id=<?php echo $id; ?>">ویرایش</a></td>
</tr>


<?php
}
}

$conn->close();
?>
</tbody>
</table>
</div>
</body>
</html>