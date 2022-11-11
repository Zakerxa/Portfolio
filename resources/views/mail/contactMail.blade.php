@php
    date_default_timezone_set("Asia/Yangon");
    $diffWithGMT = 6 * 60 * 60 + 30 * 60;
@endphp

<div style="position:relative;">
    <div style=" background:#d6f7ff;clip-path: polygon(0 0, 100% 0, 80% 38%, 0% 100%);
    position: absolute;
    top: 0;
    bottom: 0;
    height: 100vh;
    width: 100%;"></div>
    <div style="position: relative;padding-top:10px;padding-left: 3px;">
        <div>
            <h2>Dear {{$client->name}} ,</h2>

            <div>
                <p>I have received your
                    @if ($client->subject == 1) recommendation
                    @elseif ($client->subject == 2) discussion
                    @elseif ($client->subject == 3) hiring
                    @else testing
                    @endif
                    form and I will check this form as fast as I can. When it is correct with my community standard I will reply to you within 48 hours.
                </p>
            </div>

            <div>
                <br>
                <h4>- - - A Mistake? - - -</h4>

                <p>If that was a mistake or something errors, you can delete that form by clicking a profile pic of your form on the following site.</p>
            </div>

            <div>
                <br>
                <p>------------------------------------</p>
                <p>Thanks for visiting my portfolio site.<p>
                <p>Have a good day.</p>
                <br>
            </div>

            <div>
                <hr>
                <br>
                <li style="padding-bottom: 5px;"> Zin Min Htet</li>
                <li style="padding-bottom: 5px;"> 09-777637858</li>
                <li style="padding-bottom: 5px;"> https://linkedin.com/in/zakerxa</li>
                <li style="padding-bottom: 5px;"> https://portfolio.zakerxa.com</li>
            </div>

            <p style="color: rgb(79, 79, 79);font-size:14px;padding:10px 0;">Date : {{ gmdate("Y-F-d", time() + $diffWithGMT) }}</p>

        </div>
    </div>
</div>
