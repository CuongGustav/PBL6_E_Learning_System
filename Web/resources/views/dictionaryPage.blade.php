<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/PBL6-Dictionary/public/css/style_dictionaryPage.css">
    <script defer src="/PBL6-Dictionary/public/js/API-Dictionary.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <div class="container">
            <form action="">
                <input type="text" placeholder="Search the word">
                <img class="search" src="/PBL6-Dictionary/public/css/one-page/images/icons8-search-24.png" >
            </form>
        </div>
    </header>
    
    <section id="article">
        <div class="container">
            <div class="disctonary_content">
                <div class="section">
                    <h2></h2>
                    <p></p>  
                </div>
            </div>
            
            <div class="noun">
                <h3 class="partofSearchNoun"></h3>
                <p></p>
                <ul class="meanings">
                    {{-- <li></li>
                    <li></li>
                    <li></li> --}}
                </ul>
            </div>

            <div class="verb">
                <div class="verbContent">
                    <h3></h3>
                    <p></p>
                    <ul class="meanings">
                        {{-- <li></li>
                        <li></li>
                        <li></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>
</html>