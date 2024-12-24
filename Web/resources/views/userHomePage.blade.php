<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="/PBL6/public/css/style_homePage.css">
  <title>Responsive Header</title>
</head>
<body>
  <script>
    const toggle = () => {
      document.getElementById("nav").classList.toggle("navactive");
    };

    function loadPage(url) {
      document.getElementById('contentFrame').src = url;
    }
  </script>

  <header>
    <div class="brand">
      <span class="fas fa-globe-asia fa-3x"></span>
      <h1>Dictionary</h1>
    </div>
    {{-- <span c  lass="fas fa-bars" id="menuIcon" onclick="toggle()"></span> --}}
    <div class="navbar" id="nav">
      <ul>
        <li>
          <span class="fas fa-home" id="headIcon"></span>
          <a href="#homePage" onclick="event.preventDefault(); loadPage('{{ route('homePage') }}')"> Home </a>
        </li>
        <li>
          <span class="fab fa-themeisle" id="headIcon"></span>
          <a href="#" onclick="event.preventDefault(); loadPage('{{ route('topicPage', ['username' => $username]) }}')"> Topic </a>
        </li>
        <li>
          <span class="fas fa-spell-check" id="headIcon"></span>
          <a href="#" onclick="event.preventDefault(); loadPage('{{ url('/dictionaryPage') }}')"> Dictionary </a>
        </li>
        <li>
          <span class="fas fa-language" id="headIcon"></span>
          <a href="#" onclick="event.preventDefault(); loadPage('{{ url('/translatePage') }}')"> Translate </a>
        </li>
        <li>
          <span class="fas fa-book" id="headIcon"></span>
          <a href=""  onclick="event.preventDefault(); loadPage('{{ route('listTestUser') }}')"> Test </a>
        </li>
        <li>
            <span class="fas fa-info" id="headIcon"></span>
            <a href=""  onclick="event.preventDefault(); loadPage('{{ route('infoPage', ['username' => $username]) }}')"> Info </a>
        </li>
        <li>
          <span class="fas fa-heart" id="headIcon"></span>
          <a href=""  onclick="event.preventDefault(); loadPage('{{ route('favouritePage', ['username' => $username]) }}')"> Heart </a>
        </li>
     
        
      </ul>
      <ul style="width: 100px">
        <li>
          <span class="fas fa-sign-out-alt" id="headIcon"></span>
          <a href="{{ route('header') }}"> Log Out </a>
      </li>
      </ul>
    </div>
  </header>
  <div id="content">
    <iframe id="contentFrame" src="{{ route('homePage') }}" frameborder="0" style="width: 100%; height: calc(100vh - 70px);"></iframe>
  </div>
</body>
</html>
