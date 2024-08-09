<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>avatar</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <img src="{{ $avatar }}" class="img" alt="">


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Pastikan jQuery sudah tersedia
            if (window.$) {
                console.log('jQuery is loaded');
                window.$('.img').on('click', function() {
                    alert('Hello, World!');
                });
            } else {
                console.log('jQuery is not loaded');
            }
        });
    </script>

</body>

</html>
