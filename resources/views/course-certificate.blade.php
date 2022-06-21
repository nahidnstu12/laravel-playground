<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="zDfR551FnI1CQNviVZRXA27tA9qjx3UYJL5BCvBL">
    <title>TCM</title>
    <!-- Bootstrap v4 with Tsp-lte v3 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;700&amp;display=swap"
        rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans|Pinyon+Script|Rochester');

        .cursive {
            font-family: 'Pinyon Script', cursive;
        }

        .certificate {
            width: 800px;
            height: 600px;
            margin: auto;
        }

        .pm-certificate-container {

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 3rem;
            margin: 3rem auto;
            position: relative;
        }

        .inner-container {
            position: absolute;
            top: 30px;
            bottom: 0;
            left: 0;
            right: 0;

        }

        .pm-certificate-border {

            height: 100%;
        }

        .pm-certificate-header {

            display: grid;
            /* place-items: center; */
            height: 35%;
        }

        .logo-box {
            margin: auto;
            width: 45px;
        }

        .pm-certificate-title {
            /* border-bottom: 1px solid #333; */
            padding-top: 1rem;
        }

        .pm-certificate-text {
            padding: 0.5rem 5rem;
        }

        .pm-certificate-body {
            height: 65%;
            /* padding: 1rem; */
        }

        .pm-certificate-seal {
            position: absolute;
            right: 80px;
            bottom: 95px;
            width: 65px;
        }
    </style>
</head>

<body>
    <div class="">
        <div class="">
            <img src="images/certificate-banner.png" width="100%" height="100%" alt="" style="position: absolute">
            <div class="inner-container">
                <div class="pm-certificate-border col-xs-12">

                    <div class="p-3 h-100">

                        <div class=" w-100 pm-certificate-header">
                            <div class="logo-box">
                                <img src="images/logo.png" class="w-100 rounded-circle" alt=""
                                    style="margin-top: 10px">
                            </div>
                            <h3 class="text-white text-center">{{ $data['certificate_text'] }}</h3>
                        </div>
                        <div class=" w-100 pm-certificate-body">

                            <p class="text-center" style="margin-top: -8px">{{ $data['small_text'] }}</p>
                            <div class="pm-certificate-title text-center cursive">
                                <h2 style="margin-top: -25px">{{ $data['name'] }}</h2>
                            </div>
                            <div class="pm-certificate-text text-center">
                                {{ $data['text'] }}
                            </div>
                            <div class="pm-certificate-seal">
                                <img src="images/seal.png" alt="" class="w-100 rounded-circle">
                            </div>

                        </div>

                    </div>

                </div>



            </div>
        </div>
    </div>
</body>



</html>