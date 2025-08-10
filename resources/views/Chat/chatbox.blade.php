<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Box</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .chat-window {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            max-height: 600px;
            overflow-y: auto;
        }
        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 10px;
            word-wrap: break-word;
            max-width: 70%;
            position: relative;
        }
        .my-message {
            background-color: #dcf8c6;
            align-self: flex-end;
        }
        .received-message {
            background-color: #e5e5ea;
            align-self: flex-start;
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
            border-color: transparent #e5e5ea transparent transparent;
        }
        .message p {
            margin: 0;
        }
        .timestamp {
            font-size: 0.8em;
            color: #888;
            margin-top: 5px;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-5 max-w-3xl">
        <h1 class="text-center text-3xl font-semibold mb-5">Chat Box</h1>
        <div class="chat-window p-4 mb-4">
            @foreach($mymsg->merge($receivermsg)->sortBy('created_at') as $msg)
                <div class="message {{ $msg->sender_id == $sender_id ? 'my-message' : 'received-message' }}">
                    <p>{{ Crypt::decryptString($msg->msg) }}</p>
                    <div class="timestamp">{{ $msg->created_at->format('Y-m-d H:i:s') }}</div>
                </div>
            @endforeach
        </div>
        <div class="input-form mt-3">
            <form action="{{ url('savemsg') }}" method="post" class="flex">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $receiver_id }}">
                <input type="text" id="message-input" class="form-control flex-grow p-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Type your message..." name="msg">
                <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-400">Send</button>
            </form>
        </div>
    </div>
</body>
</html>
