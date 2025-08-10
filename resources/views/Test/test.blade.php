<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: row;
            margin: 20px auto;
            max-width: 800px;
        }

        .left-side, .right-side {
            flex: 1;
            padding: 10px;
            border-radius: 10px;
            overflow-y: auto;
            max-height: 400px;
        }

        .left-side {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            margin-right: 10px;
        }

        .right-side {
            background-color: #fff;
            border: 1px solid #ddd;
            margin-left: 10px;
        }

        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 10px;
            word-wrap: break-word;
            max-width: 70%;
        }

        .message p {
            margin: 0;
        }

        .my-message {
            background-color: #dcf8c6;
            align-self: flex-start;
        }

        .received-message {
            background-color: #e5e5ea; /* Light gray background for received messages */
            align-self: flex-end;
            color: #333; /* Text color for received messages */
        }

        .message::after {
            content: '';
            position: absolute;
            width: 0;
            height: 0;
            border-style: solid;
        }

        .my-message::after {
            top: 50%;
            right: -10px;
            border-width: 10px 0 10px 15px;
            border-color: transparent transparent transparent #dcf8c6;
        }

        .received-message::after {
            top: 50%;
            left: -10px;
            border-width: 10px 15px 10px 0;
            border-color: transparent #e5e5ea transparent transparent; /* Tail color for received messages */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-side">
            @foreach($mymsg as $msg)
                <div class="message my-message">
                    <p>{{ Crypt::decryptString($msg->msg) }}</p>
                </div>
            @endforeach
        </div>
        <div class="right-side">
            @foreach($receivermsg as $msg)
                <div class="message received-message">
                    <p>{{ Crypt::decryptString($msg->msg) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
