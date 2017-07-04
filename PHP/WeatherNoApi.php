<html lang="en">
<head>
    <style type="text/css">
        body {
            background: url(forrest-cavale-13484.jpg);
            background-size: 100% 100%;

        }

        .topmargin {
            margin-top: 50px;
        }
        .minMargin {
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .colWhite {
            color:white;
        }
        .paddInput {
            padding-right: 200px;
            padding-left: 200px;
        }
        #city {

            width: 300px;
        }



    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<div class="lead text-center">
    <h1 class="display-3 topmargin colWhite">Weather APP no API.</h1>

    <p class="lead colWhite">Enter city you want to look up.</p>

    <div class="col-lg-12">
        <div class="row">
            <div class="col-xs-4">
         <input type="text" class="form-control text-center"  name="city" id="city" placeholder="Enter here" value = "<?php

                echo $_GET["city"];

            ?>">
            </div>
        </div>
    </div>


      <p><button type="submit" class="btn btn-primary">Submit</button></p>

    </div>


        <div class="lead paddInput">
        <div class="alert alert-success text-center" role="alert">
        <?php
        $html = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($html);
        $finder = new DomXPath($doc);
        $node = $finder->query("//*[contains(@class, 'summary')]");
        print_r($doc->saveHTML($node->item(0)));
        ?>
    </div>
        </div>



    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>