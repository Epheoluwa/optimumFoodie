<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        * {
            box-sizing: border-box;
            /* outline:1px solid ;*/
        }

        body {
            background: #ffffff;
            background: linear-gradient(to bottom, #ffffff 0%, #e1e8ed 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#e1e8ed', GradientType=0);
            height: 100%;
            margin: 0;
            background-repeat: no-repeat;
            background-attachment: fixed;

        }

        .wrapper-1 {
            width: 100%;
            height: 800vh;
            display: flex;
            flex-direction: column;
        }

        .wrapper-2 {
            padding: 30px;
            text-align: center;
        }

        input,
        textarea {
            font-family: "Roboto";
            outline: none;
        }

        #form {
            width: 100%;
            padding: 20px 20px;
        }

        #form .title {
            font-size: 24px;
            line-height: 32px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        #form .input {
            width: 100%;
        }

        #form .input.error input {
            border-color: red;
        }

        #form .input input,
        #form .input textarea {
            border-radius: 10px;
            width: 100%;
            padding: 10px 12px;
            font-size: 14px;
            line-height: 16px;
            border: 2px solid #000;
            border-color: #5892FF;
        }

        #form .input textarea {
            height: 80px;
            resize: none;
        }

        #form .input:not(:last-child) {
            margin-bottom: 10px;
        }

        #form .btn {
            background-color: #5892FF;
            color: #fff;
            border-radius: 25px;
            font-size: 16px;
            padding: 8px 52px;
            cursor: pointer;
            margin-top: 15px;
            transition: 0.2s;
            border-color: #5892FF;
        }

        #form .btn:hover {
            background-color: transparent;
            border-color: #5892FF;
            color: #5892FF;
        }

        #form span {
            font-size: 12px;
        }


        @media (min-width:600px) {
            .content {
                max-width: 1000px;
                margin: 0 auto;
            }

            .wrapper-1 {
                height: initial;
                max-width: 620px;
                margin: 0 auto;
                margin-top: 50px;
                box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
            }

        }
    </style>
</head>

<body>
    <div class=content>
        <div class="wrapper-1">
            <div class="wrapper-2">
                <form id="form">
                    <div>
                    <h2 class="title">Active User Details</h2>
                    <h2 class="title">Amount to pay: &#8358;30,000</h2>
                    </div>
                    
                    <div class="input">
                        <input type="text" id="form__name" name="form__name" placeholder="Name:">
                    </div>
                    <div class="input">
                        <input type="text" id="form__email" name="form__email" placeholder="Email:">
                    </div>
                    <div class="input">
                        <input type="text" id="form__phone" name="form__phone" placeholder="Phone:">
                    </div>
                    <div class="btn__wrapper">
                        <button type="submit" id="form__btn" class="btn btn2">Pay Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>