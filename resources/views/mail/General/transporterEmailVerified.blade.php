<!DOCTYPE html>
<html>

<head>
    <title>Verify Your Email</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <style>
        h2,
        body {
            margin: 0;
            font-size: 14px;
            line-height: 30px;
            font-weight: 300;
            font-family: "Outfit", sans-serif;
        }

        h1,
        h2,
        p {
            margin: 0;
        }
        h1 {
            line-height: 24px;
            margin: 24px 0;
        }
        .contain {
            max-width: 600px;
            width: 100%;
            margin: auto;
            text-align: center;
            padding: 35px;
            box-sizing: border-box;
        }
        .full {
            width: 100%;
            max-width: 100%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .half {
            max-width: 50%;
            width: 50%;
            text-align: left;
        }
        .center-point {
            max-width: 75%;
            margin: auto;
        }
        .half.label {
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="contain">
        <img class="adjust-space" src="{{ asset('/assets/images/transport-logo.jpg') }}" alt="Transport Logo"
            style="max-width:90px"; />
        <h1>Transport <span style="color:#0358d6; display: block;">Notification</span></h1>
        <div class="center-point">
            <div class="full">
                <div class="half label">Make & Model:</div>
                <div class="half">New Era Motorcycle</div>
            </div>
            <div class="full">
                <div class="half label">Pick-up area:</div>
                <div class="half">France</div>
            </div>
            <div class="full">
                <div class="half label">Drop-off area:</div>
                <div class="half">France</div>
            </div>
            <div class="full">
                <div class="half label">Delivery date:</div>
                <div class="half">ASAP</div>
            </div>
            <div class="full">
                <div class="half label">Starts & drives:</div>
                <div class="half">Yes</div>
            </div>
            <div class="full">
                <div class="half label">Deliverey preference:</div>
                <div class="half">Transported</div>
            </div>
        </div>
    </div>
    {{-- <a href="{{ $verificationLink }}">Verify Email</a> --}}
    {{-- <p>If you did not create an account, please ignore this email.</p> --}}
</body>

</html>
