
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>НПО "СпецСинтез"</title>

    <link rel="canonical" href="https://specsitez.com/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
  </head>

  <body class="">

    <div class="d-flex w-100 h-100 mx-auto flex-column">
<!--
      <header class="masthead">
        <div class="inner">
          <img class="" src="images/sslogo.png">

           <h3 class="masthead-brand">НПО "СпецСинтез"</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="https://specsitez.com/">Контакты</a>
          </nav>         
        </div>
      </header>
-->

      <main role="main" class="inner cover">     

<!--Grid column-->
  <div class="row">
    <div class="container-fluid pt-0">
        <div class="row mt-2" style="background-image: url('images/opacity-30.png')">
          <!-- rgba-black-strong align-items-center opacity-3 bg-white opacity-2"-->
          <div class="col-sm-12 col-md-8  text-left" >
            <a href="https://specsintez.com" target="_blank">
              <img class="img-fluid ml-5" src="images/sslogo.png">
            </a>
            <p class="text-uppercase font-weight-bold ml-5 big-font text-dark">
              Разработка и производство <br/>профессиональных <br/>дезинфецирующих средств с 2004 года.
            </p>
          </div>
          <div class="col-sm-12 col-md-4 mb-4 py-5 text-right pr-5 text-dark big-font">
            <p class="font-weight-bold mt-4">Для заказа продукции</p>
            <p class="nowrap">
              <span class="text-success font-weight-bold">звоните:</span>&nbsp;
              <span class="font-weight-bold">8-800-333-85-99</span></p>
            <p class="nowrap">
              <span class="text-success font-weight-bold">пишите:</span>&nbsp;
              <span class="font-weight-bold">zakaz@specsintez.com</span>
            </p>
          </div>
        </div>
    </div>
  </div>
<!--Grid column-->


<!--Grid column-->
    <div class="container-fluid pt-2">
    <div class="row">

      <div id="images" class="col-md-6 col-lg-8 col-xl-8  text-right d-none d-sm-block d-sm-none d-md-block">
        <img class="img-fluid" src="images/preparats_33.png" style="max-height: 82% !important;"> 
        <p class="text-left ml-5">
          <a href="#">Перейти на сайт производителя</a>
        </p>
      </div>

      <div class="col-md-6 col-lg-4 col-xl-4">
        

        <div class="text-light p-4 rounded opacity-black-70" style="margin: 0 auto;">
        <form id="promo_request" onsubmit="do_submit(); return false;">

          <p class="font-weight-bold">
            Или оставьте заявку:
          </p>

          <div class="form-group text-left">
            <label for="s_name">Имя:</label>
            <input type="text" class="form-control form-control" id="s_name" placeholder="">
          </div>
        
          <div class="form-group text-left">
            <label for="s_phone">Номер телефона:</label>
            <input type="phone" class="form-control form-control" id="s_phone" placeholder="">
          </div>
          
          <div class="form-group text-left">
            <label for="s_email">Электронная почта:</label>
            <input type="email" class="form-control form-control" id="s_email" placeholder="">
          </div>

          <div class="form-group text-left pl-4">
            <input class="form-check-input" type="checkbox" value="" id="i_agree">
            <label class="form-check-label" for="i_agree">
              &nbsp;Я согласен на обработку персональных данных
            </label>
          </div>

          <button id="send_data_button" type="submit" class="btn btn-success mt-0">Отправить</button>

        </form>
        </div>
      </div>

    </div>

    <div class="row">
      <p class="ml-5 text-dark text-left">&copy; 2004-2020 НПО "Спецсинтез"</p>
    </div>


  </div>
<!--Grid column-->



      </main>

      <footer class="mastfoot mt-auto pb-4">
        <div class="inner text-left">
<!--
          <p>
            <a class="text-white text-uppercase big-font pl-4" href="https://specsitez.com/" target="_blank" style="text-decoration: underline;" >перейти на сайт производителя</a>
          </p>
-->
        </div>
<!--
        <div class="inner text-center">
          <p>Copyright &copy; 2004 - 2020 <a href="https://specsitez.com/">НПО СПЕЦСИНТЕЗ</a></p>
        </div>
-->
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>

    <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>

    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>

    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>

  <script type="text/javascript">

  async function do_submit() {
      //var queryString = "?p1=%D0%A1%D0%B5%D1%80%D0%B3%D0%B5%D0%B9&p2=9650432255&p3=scanner85@gmail.com";
      var Name = jQuery("#s_name").val();
      var Phone = jQuery("#s_phone").val();
      var Email = jQuery("#s_email").val();
      var queryString = "?p1="+Name+"&p2="+Phone+"&p3="+Email;
      var destinationUrl = "https://script.google.com/macros/s/AKfycbzIOYgUL1cjN0gUyQO0K1-Z4B1WeV_CKJjx4vDTcEtR-NM1nao/exec";
      var s_url = destinationUrl + queryString;
      var queryOptions =  { tags: "mount rainier", tagmode: "any", format: "json" };


      $.ajax({
        method: 'GET',
        url: destinationUrl,
        data: { "p1": Name, "p2": Phone, "p3": Email },

        dataType: 'jsonp',
        crossDomain: true,
        jsonp: true,
        jsonpCallback: 'myCallBackMethod',

      })
      .done(function( data ) {
        //console.log( data )
      })
      .always(function() {
        alert("Спасибо за заявкуЮ наши сотрудники свяжутся с Вами!");
        jQuery("#s_name").val(""); 
        jQuery("#s_phone").val("");
        jQuery("#s_email").val("");
        console.log( "complete" );
      });
      return false;
    }

    window.myCallBackMethod = function(data) {
      console.log('myCallBackMethod')
      successResponse(data);
    }
    
    successResponse = function(data) {
    //functionality goes here;
      console.log('successResponse')
    }
    
    // the json response from the server when calling the url must be in the below format only.
    myCallBackMethod({ "p1": "name", "p2": "TestName", "p3": "email@example.com" })          




  </script>

  </body>
</html>
