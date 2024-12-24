<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Langauge Translator | Joshua Alana</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/PBL6-Dictionary/public/css/style_translatePage.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

    <div class="container">
        <div class="wrapper">
            <div class="text-input">
                <textarea spellcheck="false" class="from-text" placeholder="Enter text"></textarea>
                <textarea spellcheck="false" readonly disabled class="to-text" placeholder="Translation"></textarea>
            </div>
            <ul class="controls">
                <li class="row from">
                    <div class="icons">
                        <i id="from" class="fas fa-volume-up"></i>
                        <i id="from" class="fas fa-copy"></i>
                        <a href="#"  onclick="event.preventDefault(); window.location.href='{{ route('imageText') }}'"><i class="fas fa-camera"></i></a>
                    </div>
                    <select></select>
                </li>

                <li class="exchange">
                    <i class="fas fa-exchange-alt"></i>
                </li>
                <li class="row to">
                    <select></select>
                    <div class="icons">
                        <i id="to" class="fas fa-volume-up"></i>
                        <i id="to" class="fas fa-copy"></i>
                    </div>
                </li>
            </ul>
        </div>

        <button>Translate Text</button>
       
            {{-- <span class="fas fa-heart" id="headIcon"></span> --}}
           
       
     </div>

   
    <script src="/PBL6-Dictionary/public/js/countries.js"></script>
    <script src="/PBL6-Dictionary/public/js/script.js"></script>
</body>
</html>
