<?php

include("../header-theme-Sneat.php");
?>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <!--Search-->
        <div class="container-xxl flex-grow-1  cls-sj-saf---content-search-box">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">جستجو</h5>

                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="نام یا نام خانوادگی" />
<!--                                onkeyup="showUser(this.value)"-->
                            </div>
                            <div class="col-sm-6" id="txtHint"></div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-11">
                                <button type="submit" class="btn btn-primary">بیاب</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
                $(document).ready(function(){
                    $("#basic-default-name").keyup(function(){
                        //console.log("input#basic-default-name")
                        var str =  $("#basic-default-name").val()
                    $.ajax({
                        type: "GET",
                        url: "ajax-test.php",
                        //data: "fname=" + fname + '&lname=' + lname,
                        data:"data=" + str,
                        success: function (result) {
                            //console.log(data2);
                            $("#tbody-tabledata").html(result)
                        }
                    });
                });
            });
            function showUser2(str) {
                if (str == "") {
                    //document.getElementById("txtHint").innerHTML = "";
                    //return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    console.log( "xmlhttp.readyState= " +  xmlhttp.readyState)
                    console.log( "xmlhttp.status= " +  xmlhttp.status)
                    console.log(xmlhttp)
                    xmlhttp.onreadystatechange = function() {
                        document.getElementById("tbody-tabledata").innerHTML = this.responseText;
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("tbody-tabledata").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET","ajax-test.php?q="+str,true);
                    xmlhttp.send();
                }
            }
        </script>
        <!--/Search-->
        <div class="container-xxl flex-grow-1  cls-sj-saf---content-Table-box">
            <!-- Bootstrap Table with Header - Dark -->
            <div class="card">
                <div id="card-bar" class="row">
                    <div id="card-bar-right" class="col-sm-6">
                        <h5 class="card-header">مدیریت کاربران</h5>
                    </div>
                    <div id="card-bar-left"  class="col-sm-6">
                        <a href="#" class="btn btn-primary">اضافه کردن +</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive text-nowrap" id="div-container-table">
                <table class="table">
                    <thead class="table-dark">
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
                    <tbody class="table-border-bottom-0" id="tbody-tabledata">


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

                            $fulnsme = $name . " ".$family;
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
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="<?php echo $fulnsme ?>">
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
                                                            <input type="text" id="nameBasic<?php echo $id; ?>" class="form-control" placeholder="Enter Name" />
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col mb-0">
                                                            <label for="emailBasic<?php echo $id; ?>" class="form-label">Email</label>
                                                            <input type="text" id="emailBasic<?php echo $id; ?>" class="form-control" placeholder="xxxx@xxx.xx" />
                                                        </div>
                                                        <div class="col mb-0">
                                                            <label for="dobBasic<?php echo $id; ?>" class="form-label">DOB</label>
                                                            <input type="text" id="dobBasic<?php echo $id; ?>" class="form-control" placeholder="DD / MM / YY" />
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
                    }

                    $conn->close();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Bootstrap Table with Header Dark -->
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

<?php
include("../footer-theme-Sneat.php");
