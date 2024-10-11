<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi</title>
    <script src="jquery-3.7.1.js"></script>
</head>
<body>
    <h1>Form Input dengan Validasi</h1>
    <form method="post" action="proses_validasi.php">
        <label for="nama">Nama: </label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" style="color: red;"></span><br>

        <label for="email">Email: </label>
        <input type="text=" id="email" name="email">
        <span id="email-error" style="color: red;"></span><br>

        <label for="password">Password: </label>
        <input type="password" id="password" name="password">
        <span id="password-error" style="color: red;"></span><br>

        <input type="submit" value="Submit">
    </form>
    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(event) {
                var nama = $("#nama").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var valid = true;

                if (nama === "") {
                    $("#nama-error").text("Nama harus diisi.");
                    valid = false;
                } else {
                    $("#nama-error").text("");
                }

                if (email === "") {
                    $("#email-error").text("Email harus diisi.");
                    valid = false;
                } else {
                    $("#email-error").text("");
                }

                
                  if (password === "") {
                    $("#password-error").text("Password harus diisi.");
                    valid = false;
                } else {
                    $("#password-error").text("");
                }

                if (valid) {
                    var formData = $(this).serialize();

                    $.ajax({
                        url: "proses_validasi.php",
                        type: "POST",
                        data: formData,
                        success: function(response) {
                            $("#hasil").html(response); 
                        },
                        error: function() {
                            $("#hasil").html("<p style='color:red;'>Terjadi kesalahan saat mengirim data.</p>");
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>