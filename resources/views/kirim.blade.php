<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <form id="dataForm">
        <input type="password" id="password" name="password" placeholder="password">
        <input type="email" id="email" name="email" placeholder="Email">
        <button type="submit">Submit</button>
    </form>

    <script>
        document.getElementById('dataForm').addEventListener('submit', function(e) {
            e.preventDefault();

            var password = document.getElementById('password').value;
            var email = document.getElementById('email').value;

            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'http://127.0.0.1:8000/api/kirim-order', true);
            xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        alert(response.message);
                    } else {
                        alert('An error occurred: ' + xhr.status + ' ' + xhr.statusText);
                    }
                }
            };

            var data = JSON.stringify({ password: password, email: email });
            xhr.send(data);
        });
    </script>
</body>
</html>