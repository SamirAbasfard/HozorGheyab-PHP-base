<?php

//$q = $_GET['q'];
$q = $_GET['data'];

/*
echo "q=$q";
var_dump($q);

if($q == ""){
    echo "empty!";
}
die();
*/

include '../db.php';
$conn = (new class_db())->conection_database;



$sql_select = "SELECT * FROM `user` WHERE `email` LIKE '%$q%' ";

$result = $conn->query($sql_select);

if ($result->num_rows > 0) {

//echo "result->num_rows:$result->num_rows"."<hr>";

    while ($row = $result->fetch_assoc()) {
// `id`, `code_meli`, `name`, `family`, `username`, `password`, `mobile`,
// `email`, `pic`, `user_parent_code`, `tozihat`
        $id = $row['id'];
        $code_meli = $row['code_meli'];
        $name = $row['name'];
        $family = $row['family'];
        $username = $row['username'];
        $password = $row['password'];
        $mobile = $row['mobile'];
        $email = $row['email'];
        $pic = $row['pic'];
        $user_parent_code = $row['user_parent_code'];
        $tozihat = $row['tozihat'];

        $fulnsme = $name . " " . $family;
        ?>

        <tr>
            <td> <?php echo $id ?> </td>
            <td> <?php echo $code_meli ?></td>
            <td> <?php echo $name ?></td>
            <td> <?php echo $family ?></td>
            <td> <?php echo $username ?></td>
            <td> <?php echo $password ?></td>
            <td> <?php echo $mobile ?></td>
            <td> <?php echo $email ?></td>
            <td>
                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                        class="avatar avatar-xs pull-up" title="" data-bs-original-title="<?php echo $fulnsme ?>">
                        <img src="<?php echo $pic ?>" alt="Avatar" class="rounded-circle">
                    </li>
                </ul>
            </td>
            <td> <?php echo $user_parent_code ?></td>
            <td> <?php echo $tozihat ?></td>
            <td>

                <!-- Button trigger modal -->
                <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#basicModal<?php echo $id; ?>"
                >
                    Launch modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="basicModal<?php echo $id; ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                                <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBasic<?php echo $id; ?>" class="form-label">Name</label>
                                        <input type="text" id="nameBasic<?php echo $id; ?>" class="form-control"
                                               placeholder="Enter Name"/>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="emailBasic<?php echo $id; ?>" class="form-label">Email</label>
                                        <input type="text" id="emailBasic<?php echo $id; ?>" class="form-control"
                                               placeholder="xxxx@xxx.xx"/>
                                    </div>
                                    <div class="col mb-0">
                                        <label for="dobBasic<?php echo $id; ?>" class="form-label">DOB</label>
                                        <input type="text" id="dobBasic<?php echo $id; ?>" class="form-control"
                                               placeholder="DD / MM / YY"/>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="user-edit.php?id=<?php echo $id; ?>">
                    <i class="bx bx-edit-alt me-1"></i>
                    ویرایش
                </a>
                |
                <a href="delete-user.php?id=<?php echo $id; ?>">
                    <i class="bx bx-trash me-1"></i>
                    حذف
                </a>
            </td>
        </tr>

        <?php
    }
    mysqli_close($conn);
} else {
    echo "<tr>---</tr>";
}
