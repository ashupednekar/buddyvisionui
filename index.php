<?php ?>
<!DOCTYPE html>
<html>
<head>

</head>
<body class="container">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <div class="jumbotron"><h1><b>Bankbuddy Speech</b></h1> <h3>API testing</h3></div>
<div class='form-inline'><div class="form-group">
<form method="POST" enctype="multipart/form-data" id="fileUploadForm">
    <input type="file" name="file"/><br/><br/>
    <input type="submit" class="btn btn-sm btn-success" value="Submit" id="btnSubmit"/> <br><br>
</form>
</div></div>
<h1>API Result</h1>
<span id="result"></span>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>
        $(document).ready(function () {
            $("#btnSubmit").click(function (event) {
                //stop submit the form, we will post it manually.
                event.preventDefault();
                // Get form
                var form = $('#fileUploadForm')[0];
                // Create an FormData object
                var data = new FormData(form);
                console.log(data);
                // If you want to add an extra field for the FormData
                // disabled the submit button
                $("#btnSubmit").prop("disabled", true);
                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "http://sensei.bankbuddy.ai/speechapi/ar/",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    success: function (data) {
                        $("#result").text(data);
                        console.log("SUCCESS : ", data);
                        $("#btnSubmit").prop("disabled", false);
                    },
                    error: function (e) {
                        $("#result").text(e.responseText);
                        console.log("ERROR : ", e);
                        $("#btnSubmit").prop("disabled", false);
                    }
                });
            });
        });
    </script>
