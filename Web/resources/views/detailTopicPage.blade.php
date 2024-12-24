<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
      <link rel="stylesheet" href="/PBL6-Dictionary/public/css/swiper-bundle.min.css">
      <link rel="stylesheet" href="/PBL6-Dictionary/public/css/styles_detailTopic.css">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <title>Responsive card slider - Bedimcode</title>
      <style>
         .heart {
             font-size: 50px;
             color: rgb(255, 251, 251);
             text-decoration: none;
             cursor: pointer;
             transition: color 0.3s;
         }

         .heart_favou {
             font-size: 50px;
             color: rgb(250, 0, 0);
             text-decoration: none;
             cursor: pointer;
             transition: color 0.3s;
         }
         
         .heart.liked {
             color: red;
         }
     </style>
   </head>
   <body>
      
      <section class="container">
         <div class="h1-header">
            <h1 class="header">{{$nameTopic}}</h1>
         </div>
         
         <div class="card__container swiper">
            <div class="card__content">
               <div class="swiper-wrapper">
                  @foreach ($vocabularys as $vocabulary)
                  <article class="card__article swiper-slide">
                      <div class="card__image">
                          <img src="{{url($vocabulary->image_voca)}}" alt="image" class="card__img">
                          <div class="card__shadow"></div>
                      </div>
              
                      <div class="card__data">
                          <h1 class="card__vocabulary">{{$vocabulary->name_voca}}</h1>
                          <h2 class="card__transcribe">{{$vocabulary->transcribe_phonetically}}</h2>
                          <h2 class="card__translate">{{$vocabulary->meaning}}</h2>
                          <p class="card__example">{{$vocabulary->example}}</p>
                          
                          <a href="#" 
                             class="heart {{ $vocabulary->favourite == 1 ? 'heart_favou' : '' }}" 
                             data-id="{{ $vocabulary->id }}"
                             onclick="toggleFavourite(event, '{{ $username }}', {{ $vocabulary->id }})">
                              {{ $vocabulary->favourite == 1 ? '❤' : '♡' }}
                          </a>
                      </div>
                  </article>
              @endforeach
              
              <script>
                  function toggleFavourite(event, username, id_voca) {
                      event.preventDefault();
            
                      $.ajax({
                          url: '/PBL6/vocabulary/' + username + '/' + id_voca + '/toggle-favourite',
                          method: 'GET',
                          success: function(response) {
                              if (response.status === 'success') {
                                
                                  var heart = $('a[data-id="' + id_voca + '"]');
                                  if (response.favourite == 1) {
                                      heart.addClass('heart_favou').removeClass('heart');
                                      heart.html('❤'); 
                                  } else {
                                      heart.removeClass('heart_favou').addClass('heart');
                                      heart.html('♡'); 
                                  }
                              }
                          }
                      });
                  }
              </script>
              
 
               </div>
            </div>

            <div class="swiper-button-next">
               <i class="ri-arrow-right-s-line"></i>
            </div>
        
            <div class="swiper-button-prev">
               <i class="ri-arrow-left-s-line"></i>
            </div>
            <div class="swiper-pagination"></div>
         </div>
      </section>
    
      <script src="/PBL6-Dictionary/public/js/swiper-bundle.min.js"></script>
      <script src="/PBL6-Dictionary/public/js/main.js"></script>
   </body>
</html>