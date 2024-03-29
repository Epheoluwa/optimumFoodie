<!doctype html>
<html>

<head>
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <title>Transactional Email</title>
  <style>
    .page-break{
      page-break-after: always;
    }
    .topPadding{
      padding: 20px;
    }
    p{
      font-size: 25px;
    }
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }

      table[class=body] p,
      table[class=body] ul,
      table[class=body] ol,
      table[class=body] td,
      table[class=body] span,
      table[class=body] a {
        font-size: 16px !important;
        font-family: 'Be Vietnam Pro', sans-serif;
      }

      table[class=body] .wrapper,
      table[class=body] .article {
        padding: 10px !important;
      }

      table[class=body] .content {
        padding: 0 !important;
      }

      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
      }

      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }

      table[class=body] .btn table {
        width: 100% !important;
      }

      table[class=body] .btn a {
        width: 100% !important;
      }

      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
    }

    /* -------------------------------------
            PRESERVE THESE STYLES IN THE HEAD
        ------------------------------------- */
    @media all {
      .ExternalClass {
        width: 100%;
      }

      .ExternalClass,
      .ExternalClass p,
      .ExternalClass span,
      .ExternalClass font,
      .ExternalClass td,
      .ExternalClass div {
        line-height: 100%;
      }

      .apple-link a {
        color: inherit !important;
        /* font-family: inherit !important; */
        font-family: 'Sora', sans-serif !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }

      #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        /* font-family: inherit; */
        font-family: 'Be Vietnam Pro', sans-serif;
        font-weight: inherit;
        line-height: inherit;
      }

      .btn-primary table td:hover {
        background-color: #34495e !important;
      }

      .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
      }
    }
  </style>
</head>

<body class="" style="background-color: #f6f6f6; font-family: 'Be Vietnam Pro', sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
  <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
    <tr>
      <td style="font-family: 'Be Vietnam Pro', sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
      <td class="container" style="font-family: 'Be Vietnam Pro', sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 920px; padding: 10px; width: 920px;">
        <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 920px; padding: 10px;">

          <!-- START CENTERED WHITE CONTAINER -->
          <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">
            {{ env('APP_NAME') }} Booking
          </span>
          <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

            <!-- START MAIN CONTENT AREA -->
            <tr>
              <td class="wrapper" style="font-family: 'Be Vietnam Pro', sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 50px;">
                <p style="height:40px;">
                <!-- <img src="{{ public_path('assets/frontend/images/optimumfoodie.png') }}" height="120px" style="float:left;" /> -->
                <!-- <img src="https://i.postimg.cc/6QsgW18h/logo.png" height="120px" style="float:left;" /> -->
                  <!-- <img src="{{ url('/client-assets/img/logo.png?tok='.rand(100,999)) }}" height="120px" style="float:left;" /> -->
                </p>
                <h1 align="center">Your Customized Meal Plan</h1><br>
                @include('includes.intro_talks')

                @include('includes.guideline')

                @include('includes.before_table')

                @include('includes.main_thing')

                @include('includes.recipes') 


              </td>
            </tr>

            <!-- END MAIN CONTENT AREA -->
          </table>

          <!-- START FOOTER -->
          <!-- <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
              <tr>
                <td class="content-block" style="font-family: 'Be Vietnam Pro', sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                  <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Copyright &copy; {{ env('APP_NAME') }}</span>
                </td>
              </tr>
              <tr>
                <td class="content-block powered-by" style="font-family: 'Be Vietnam Pro', sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                  Powered by <a href="mailto:peter.okachie@gmail.com" style="color: #999999; font-size: 12px; text-align: center; text-decoration: none;">{{ env('APP_NAME') }}</a>.
                </td>
              </tr>
            </table>
          </div> -->
          <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
        </div>
      </td>
      <td style="font-family: 'Be Vietnam Pro', sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
    </tr>
  </table>
</body>

</html>