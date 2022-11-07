<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZenDesk Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</head>
<body>

<style>

    h2 {
        color: navy;
    }
    h3 {
        color: rosybrown;
    }
</style>


<div class="container">
    <div class="row">
        <form action="" method="post" class="mt-1" id="contactForm">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Name" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
            </div>
            <textarea name="comment" rows="4" cols="50" placeholder="your comment"></textarea>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

        <div class="message alert alert-success mt-2" style="display: none">Thank you! message successfully sent</div>

        <div class="error alert alert-danger mt-2" style="display: none">Message failed! could not send the message.</div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#contactForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'process.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);

                    if (jsonData.success === 1)
                    {
                        $(".message").show();
                        $("#contactForm")[0].reset();
                    }
                    else
                    {
                        $(".error").show();
                    }
                }
            });
        });
    });
</script>


</body>
</html>