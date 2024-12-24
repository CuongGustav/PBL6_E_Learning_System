<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        #slider {
            position: relative;
            padding: 100px 0;
            background-color: #ffffff;
            color: #333; 
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .row {
            display: flex;
            align-items: center;
        }

        .heading-block h5 {
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #666;
            margin-bottom: 10px;
        }

        .heading-block h2 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .lead {
            font-size: 20px;
            line-height: 1.7;
        }

        .button {
            display: inline-block;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 50px;
            background-color: #24285b;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #4e54c8;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .col-md-6 img {
            margin-left: 80px;
            display: block;
        }

        @media (max-width: 768px) {
            .heading-block h2 {
                font-size: 36px;
            }

            .lead {
                font-size: 18px;
            }

            .row {
                flex-direction: column;
            }

            .col-md-6 img {
                margin: 0 auto;
            }
        }
    </style>
</head>

<body>
    <section id="slider" class="slider-element include-header">
        <div class="container position-relative clearfix" style="z-index: 1">
            <div class="row mt-0 mt-md-5 clearfix">
                <div class="col-md-6 my-5 my-md-0">
                    <div class="heading-block border-bottom-0 bottommargin-sm">
                        <h5 class="text-uppercase ls4 fw-light mb-2" data-animate="fadeInUp" data-delay="100">
                            Word Search
                        </h5>
                        <h2 class="fw-bold nott font-secondary" data-animate="fadeInUp" data-delay="200">
                            Ask me anything!
                        </h2>
                    </div>
                    <p class="mb-5 lead" data-animate="fadeInUp" data-delay="400">
                        The latest revolution of word search. Better meaning, less ambiguity!
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="m-0">
                        <img data-animate="fadeInDown" data-delay="200" class="img-fluid"
                        src="/PBL6-Dictionary/public/css/one-page/images/research.png" alt="Gravics Word Dictionary Research">

                    </div>
                </div>
            </div>
        </div>
        <div style="height: 100px"></div>
        <div class="video-wrap d-lg-none position-absolute" style="height: 100%; z-index: 0; top: 0">
            <div class="video-overlay" style="background: rgba(255, 255, 255, 0.8)"></div>
        </div>
    </section>
</body>

</html>
