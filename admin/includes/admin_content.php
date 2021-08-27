<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Blank Page
                <small>Subheading</small>
            </h1>

            <?php
                $allUsers = User::findAllUsers();

                while ($row = $allUsers->fetch_assoc()) {
                    echo '<pre>';
                    var_dump(($row));
                    echo '</pre>';
                }

            echo '<pre>';
            var_dump(User::findUserById(2));
            echo '</pre>';

            $user = new User();

            $user->id = 6;
            $user->userName = 'username';
            $user->password = '123';
            $user->firstName = 'First Name';
            $user->LasTname = 'Last Name';

            echo '<pre>';
            var_dump($user);
            echo '</pre>';
            ?>

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->