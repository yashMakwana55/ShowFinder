<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("head.php");
    ?>
</head>

<body>

    <?php
    include("header.php");
    ?>
    <div class="content">
        <div class="ch3ontainer">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row align-items-center">
                        <div class="col-lg-7 mb-5 mb-lg-0">

                            <h2 class="mb-5">Fill the form. <br> It's easy.</h2>
                            <form onsubmit="return feedbackvalidate();">

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="feedbackname" id="feedbackname"
                                            placeholder="First name">
                                        <div id="nameerror"></div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="feedbackemail" id="feedbackemail"
                                            placeholder="Email">
                                        <div id="emailerror"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <textarea class="form-control" name="feedbackmassage" id="feedbackmassage"
                                            cols="30" rows="7" placeholder="Write your message"></textarea>
                                        <div id="massageerror"></div>
                                        <div id="msg"></div>
                                    </div>
                                </div>
                                <?php
                                if (!isset($_SESSION['uname'])) {
                                  ?>
                                  <div class="col-lg-12">
                                      <div class="form-group">
                                          <button type="button" data-toggle="modal" data-target="#tailer_modal"
                                              class="btn btn-dark">
                                              <font style="color:white;">Send Message</font>
                                          </button>
                                      </div>
                                  </div>
                                  <div class="modal fade" id="tailer_modal" tabindex="-1" role="dialog"
                                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <h3>You need to login</h3>
                                              <a class="btn btn-primary btn-sm" href="login_form.php">Login</a>
                                          </div>
                                      </div>
                                  </div>
                                  <?php
                                } else {
                                  ?>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <button type="button" id="feedbackform" class="btn btn-primary">Send
                                              Massage</button>
                                      </div>
                                  </div>
                                <?php }
                                ?>
                            </form>

                        </div>
                        <div class="col-lg-4 ml-auto">
                            <h3 class="mb-4">Let's talk about <font color="#f9bc50">everything.</font></h3>
                            <p>Your feedback fuels our growth! We value your thoughts and insights, no matter how big or small. 
                              Your input shapes our journey towards delivering an exceptional experience.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    include("footer.php");
    ?>
    <script type="text/javascript">
    function feedbackvalidate() {
        var error = "";
        var f_name = document.getElementById("feedbackname");
        var f_email = document.getElementById("feedbackemail");
        var f_massage = document.getElementById("feedbackmassage");

        if (f_name.value == "") {
            error = " <font color='red'>!Requrie Name.</font> ";
            document.getElementById("nameerror").innerHTML = error;
            return false;
        }
        if (f_email.value == "") {
            error = " <font color='red'>!Requrie Name.</font> ";
            document.getElementById("emailerror").innerHTML = error;
            return false;
        }
        if (f_massage.value == "") {
            error = " <font color='red'>!Requrie Name.</font> ";
            document.getElementById("massageerror").innerHTML = error;
            return false;
        }
    }

    $(document).ready(function() {
        $("#feedbackform").click(function() {
            var feedbackname = $("#feedbackname").val().trim();
            var feedbackemail = $("#feedbackemail").val().trim();
            var feedbackmassage = $("#feedbackmassage").val().trim();
            $.ajax({
                url: 'feedback_action.php',
                type: 'post',
                data: {
                    feedbackname: feedbackname,
                    feedbackemail: feedbackemail,
                    feedbackmassage: feedbackmassage
                },
                success: function(response) {
                    if (response == 1) {
                        window.location = "feedback.php";
                    } else {
                        error = " <font color='red'>!Invalid UserId.</font> ";
                        document.getElementById("msg").innerHTML = error;
                        return false;
                    }
                    $("#message").html(response);
                }
            });
        });
    });
    </script>
</body>

</html>