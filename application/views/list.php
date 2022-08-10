<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand"> Testing Veiw </a>
        </div>
    </div>

    <div class="container" style="padding-top: 10px;">
        <div class="row">
            <div class="col-md-12">
                <?php
                $success = $this->session->userdata('success');
                if ($success != "") {
                ?>
                    <div class="alert alert-success"><?php echo $success ?></div>
                <?php
                }
                ?>
                <?php
                $failure = $this->session->userdata('failure');
                if ($failure != "") {
                ?>
                    <div class="alert alert-danger"><?php echo $failure ?></div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container" style="padding-top: 10px;">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h2 class="col-6"> Details of Users</h2>
                    <div class="col-6 text-right">
                        <a href="<?php echo base_url() . 'index.php/user/create/' ?>" class="btn btn-primary">Create</a>
                    </div>

                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <table class="table table-hover table-striped">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Names</th>
                        <th scope="col">Emails</th>
                        <th scope="col">Image</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    <?php if (!empty($Users)) {
                        foreach ($Users as $user) { ?>
                            <tr>
                                <td scope="col">#</td>
                                <td scope="col"> <?php echo $user['id'] ?></td>
                                <td scope="col"><?php echo $user['name'] ?></td>
                                <td scope="col"><?php echo $user['email'] ?></td>
                                <td scope="col">
                                
                                    <img src="<?php echo base_url().'assets/img/'.$user['img']; ?>" class="rounded" width="50" height="50">
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'index.php/user/edit/' . $user['id'] ?>" class="btn btn-primary"> Edit</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'index.php/user/delete/' . $user['id'] ?>" class="btn btn-primary"> Delete</a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td>Record not found</td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
        </div>

    </div>

    </div>

</body>

</html>