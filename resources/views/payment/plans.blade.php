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

        #paymentForm {
            width: 100%;
            padding: 20px 20px;
        }

        #paymentForm .title {
            font-size: 24px;
            line-height: 32px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        #paymentForm .input {
            width: 100%;
        }

        #paymentForm .input.error input {
            border-color: red;
        }

        #paymentForm .input input,
        #paymentForm .input textarea {
            border-radius: 10px;
            width: 100%;
            padding: 10px 12px;
            font-size: 14px;
            line-height: 16px;
            border: 2px solid #000;
            border-color: #28a7e9;
        }

        #paymentForm .input textarea {
            height: 80px;
            resize: none;
        }

        #paymentForm .input:not(:last-child) {
            margin-bottom: 10px;
        }

        #paymentForm .btn {
            background-color: #28a7e9;
            color: #fff;
            border-radius: 25px;
            font-size: 16px;
            padding: 8px 52px;
            cursor: pointer;
            margin-top: 15px;
            transition: 0.2s;
            border-color: #28a7e9;
        }

        #paymentForm .btn:hover {
            background-color: transparent;
            border-color: #28a7e9;
            color: #28a7e9;
        }

        #paymentForm span {
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
                <form id="paymentForm">
                    <div>
                        <h2 class="title">Payment required to have access to FULL meal plan</h2>
                        <h2 class="title">Amount to pay: &#8358;30,000</h2>
                    </div>

                    <div class="input">
                        <input type="text" id="name" name="name" placeholder="Name:">
                    </div>
                    <div class="input">
                        <input type="text" id="email-address" name="email-address" placeholder="Email:" required>
                    </div>
                    <div class="input">
                        <input type="tel" id="amount" name="amount" placeholder="Amount:" required>
                    </div>
                    <div class="btn__wrapper">
                        <button type="submit" onclick="payWithPaystack(event)" class="btn btn2">Pay Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
        e.preventDefault();

        let handler = PaystackPop.setup({
            key: 'pk_test_35053dedc279e268b2132443c3ca9500ebe4b77a', // Replace with your public key
            email: document.getElementById("email-address").value,
            amount: document.getElementById("amount").value * 100,
            // ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // // label: "Optional string that replaces customer email"
            onClose: function() {
                alert('Window closed.');
            },
            callback: function(response) {
                let reference = response.reference

                $.ajax({
                    type:"GET",
                    url: "{{URL::to('verify-payment')}}/"+reference,

                    success: function(response){
                        console.log(response)
                    }
                });
            }
        });

        handler.openIframe();
    }
</script>

</html>