<h1>Ողջույն</h1>
Իմ անունը {!! $user_name !!} է, ես Ձեզ գրում եմ <a href="https://www.masisjan.net/"> masisjan.net</a> կայքից։<br><br>
Ես ցանկանում եմ, որ ինձ համար պատրաստեք ցուցանակ հետևյալ տվյալներով։<br><br>
QR կոդ՝։ {!! $qr !!}<br>
Անվանում՝։ {!! $text !!}<br>
@if($user_tel)
    Հեռ՝։ {!! $user_tel !!}<br>
@endif
Չապսը՝։ 12*30սմ։<br><br>
Շնորհակալ եմ, ինձ հետ կարող եք կապ հաստատել այս էլեկտրոնային փոստով՝ {!! $user_email !!} ։