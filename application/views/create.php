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
            <a href="#" class="navbar-brand"> Testing MVC </a>
        </div>
    </div>
    <div class="container" style="padding-top: 10px;">
        <form method="post" name="createUser" enctype="multipart/form-data" action="<?php echo base_url().'index.php/user/create'; ?>">

            <div class="row">
                <div class="col-sm-4">
                    <h3>Fill The following Details</h3>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="">
                        <?php echo form_error('name'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" value="" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        <?php echo form_error('name'); ?>
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control" id="img" name="img">
                        <?php echo form_error('img'); ?>
                    </div>

                    <a href="<?php echo base_url() . 'index.php/user/index'; ?>" class="btn-secondary btn"> Cancel</a>
                    <!-- <input class="btn btn-primary" type="reset" onclick="Reset()" value="Reset"> </input> -->
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <div id="content">

                    </div>
                    <!-- <div class="col-sm-12">
                        <input type="file" id="img" name="img">
                        <input type="button" name="upload" value="Upload Image">
                        <img src="#img" class="rounded" alt="Cinque Terre" width="304" height="236">
                    </div> -->
                </div>

        </form>
        </span>
        <span id="error_message" class="text-danger"></span>
        <span id="success_message" class="text-success"></span>


    </div>
    </div>

</body>

</html>