<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather</title>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <style>
    html, body {
      height: 100%;
      width: 100%;
    }

    .container-fluid {
      background-image: url(yellowstone.jpg);
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center;
      padding-top: 100px;
    }

    .white {
      color: #fff;
    }

    .center {
      text-align: center;
    }

    p {
      padding-top: 15px;
      padding-bottom: 15px;
    }

    button {
      margin-top: 20px;
    }

    .alert {
      margin-top: 20px;
      display: none;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 mx-auto white center">
        <h1>Weather Predictor</h1>
        <p class="lead">Enter your city to get a weather forecast.</p>
        <form>
          <div class="form-group">
            <input type="text" name="city" id="city" class="form-control" placeholder="Enter your city" autofocus>
          </div>
          <button type="submit" id="findMyWeather" class="btn btn-primary">Find My Weather</button>
        </form>

        <div id="success" class="alert alert-info" role="alert"></div>
        <div id="fail" class="alert alert-warning" role="alert"></div>

      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>  

  <script>
    $("#findMyWeather").click(function(event){
      event.preventDefault();
      $(".alert").hide();

      if($("#city").val()!=""){

        $.get("scraper.php?city="+$("#city").val(), function(data){
          if(data==""){
            $("#fail").html("Sorry, that is not a valid city.").fadeIn();
          } else {
            $("#success").html(data).fadeIn();
          }
        });

      } else {
        $("#fail").html("Please enter a city.").fadeIn();
      }
    });
  </script>

</body>
</html>