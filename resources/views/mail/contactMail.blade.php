@php
    date_default_timezone_set("Asia/Yangon");
    $diffWithGMT = 6 * 60 * 60 + 30 * 60; //converting time difference to seconds.
    $ygndate = gmdate("Y-F-d", time() + $diffWithGMT);
@endphp
<div style="position:relative;">
    <div class="bgStyle"></div>
    <div class="bodyContainer">
        <h2 class="header">Contact Form</h2>
        <div>
            <h3>Dear {{$client->name}} ,</h3>
            <p style="color: rgb(79, 79, 79);font-size:14px;">Date : {{$ygndate}}</p>
            <p>I have received your
                @if ($client->subject == 1) recommendation
                @elseif ($client->subject == 2) discussion
                @elseif ($client->subject == 3) hiring
                @else testing
                @endif
                form. I will reply to you within 48 hours.</p>
            <p>Thanks for visiting my portfolio site.<p>
            <p>Have a good day.</p>


            <hr><br>
            <li> Zin Min Htet</li>
            <li> 09-777637858</li>
            <li> https://linkedin.com/in/zakerxa</li>
            <li> https://portfolio.zakerxa.com</li>

        </div>
    </div>
</div>

<style>
    .bgStyle{
        background:#d6f7ff;clip-path: polygon(0 0, 100% 0, 80% 38%, 0% 100%);
        position: absolute;
        top: 0;
        bottom: 0;
        height: 100vh;
        width: 100%;
    }
    .bodyContainer{
        padding:4px;
        position: relative;
    }
    .header{
        margin-bottom: 5px;
        text-align: center;
    }
    li{
        margin-bottom: 4px;
    }
    </style>
