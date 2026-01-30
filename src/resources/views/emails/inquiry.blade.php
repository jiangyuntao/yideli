<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
        }

        .label {
            font-weight: bold;
            width: 100px;
            display: inline-block;
        }

        .row {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h2>您收到了一条新的网站询盘</h2>

    <div class="row">
        <span class="label">姓名:</span> {{ $enquiry->name }}
    </div>
    <div class="row">
        <span class="label">邮箱:</span> {{ $enquiry->email }}
    </div>
    <div class="row">
        <span class="label">公司:</span> {{ $enquiry->meta_data['company'] ?? 'N/A' }}
    </div>
    <div class="row">
        <span class="label">电话:</span> {{ $enquiry->meta_data['phone'] ?? 'N/A' }}
    </div>

    @if(!empty($enquiry->meta_data['interest']))
        <div class="row">
            <span class="label">感兴趣产品:</span>
            {{ implode(', ', $enquiry->meta_data['interest']) }}
        </div>
    @endif

    <hr>

    <div class="row">
        <h3>留言内容:</h3>
        <p style="white-space: pre-wrap;">{{ $enquiry->message }}</p>
    </div>

    <p style="color: #888; font-size: 12px; margin-top: 30px;">
        发送时间: {{ $enquiry->created_at }}<br>
        来源 IP: {{ $enquiry->ip_address }}
    </p>
</body>

</html>