<?php

define('API_KEY','Token');

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function sendmessage($chat_id, $text){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>"MarkDown"
 ]);
 } 

/* ⇩⇩Variables */

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $update->message->id;
$message_id2 = $update->callback_query->message->message_id;
$chat_id = $message->chat->id;
$chatid = $update->callback_query->message->chat->id;
$cllchatid = $update->callback_query->message->chat->id;
$cllmsegid = $update->callback_query->message->message_id;
$news = file_get_contents("news.txt");
$from_id = $message->from->id;
$fwdmsg = $message->forward_from;
$fwdch = $message->forward_from_chat;
$data = $update->callback_query->data;
$ali = file_get_contents("data/$from_id/ali.txt");
$ali = file_get_contents("ali.txt");
@$ali = file_get_contents("data/$chat_id/ali.txt");
$text = $message->text;
$name = 
$inline_query = $update->inline_query;
$textmessage = isset($update->message->text)?$update->message->text:'';
 $time = time() + (979 * 11 + 1 + 30);
$admin = $message->from->id;
$user = $message->from->username;
$message_id = $update->callback_query->message->message_id;
$name = $message->from->first_name;
$stickerid = $update->message->reply_to_message->sticker->file_id;
$photo = $update->message->photo;
$video = $update->message->video;
$sticker = $update->message->sticker;
$file = $update->message->document;
$music = $update->message->audio;
$voice = $update->message->voice;
$dev = 280911803; /*⇦ ايديك*/
$channel = "Xxx_DEVRAMI_xxX"; /*⇦ معرف قناتك بدون @ */
$info = "$text"; /* معلوماتك هنا */

/* بدايه الكود ↯↯ */

if($text == '/start'){
bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>"https://tlgur.com/d/9gwMxpE8",
'caption'=>"مرحبا :  $name 💡

انت الان في بوتْSayat للرسائل°

المجهوله  يمكنك التحدث بحريه°

مطلقه دون ان تظهر  معلوماتك°

⌘⌘⌘⌘⌘⌘⌘💌⌘اكتب رسالتك الان 💌",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"قائمه المنع ⚠️",'callback_data'=>"block"],['text'=>"معلوماتي 📋",'callback_data'=>"info"]
   ],
   [
       ['text'=>"النجاح ✔️",'url'=>"t.me/$channel"],['text'=>"مدونة Team dev",'url'=>"	
https://devrami-syria.blogspot.com/"]]
] 
])
 ]);
}
if($text && $text !='/start' && $admin != $dev){
bot('sendMessage',[
'chat_id'=>$dev,
'text'=>"📮 ارسلت في :   "  . date( "*i :*" ." *g*",$time).
"\n\n"." $text",
 'parse_mode'=>"MarkDown",
 ]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"$text 
\n
 تم ارسال رسالتك 📮",
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
    ['text'=>"النجاح ✔️",'url'=>"t.me/$channel"],['text'=>"مدونة Team dev",'url'=>"	
https://devrami-syria.blogspot.com/"]
    ]
]
])
 ]);
}
elseif($text == "$midei"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"⚠️ عذرا $name 
نحن نستقبل فقط الرسائل 💌",
'reply_to_message_id'=>$message->message_id,
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"السبب ⁉️",'url'=>"t.me/$channel"]
]
]
])
 ]);
}
if($data == "block"){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"تم منع ارسال الصور 🌠

منع ارسال الصوت +  بصمه 🎙

يمنع ارسال الفيديو 🎥  + متحركه 🎞

منع ارسال أي ملف كان 📂

 يمنع ارسال المواقع وجهات الاتصال ☎️" ,
'show_alert'=>true
]);
}
if($data == "info"){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"$news",
'show_alert'=>true
]);
}
  if($data == 'setinfo'){
            file_put_contents("news.txt", "info");
            bot('editmessagetext',[
                'chat_id'=>$cllchatid,
            'message_id'=>$cllmsegid,
                           'text' =>"حسنا : 👍🏿 
الان من فضلك ارسل معلوماتك
لاضعها في قسم معلوماتي لكن ان 
لا تتعدى الحروف اكثر من 161 حرفا
 لتظهر عند ظغط المستخدم هذا الزر ☑️",
                    'parse_mode'=>'html',
              'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
                    [
                    ['text'=>"الغاء العمليه ⛔️",'callback_data'=>"aa"]
                    ]
                    ]
                    ])
                    ]);
                    }    
            if($news == 'info'&& $chat_id == $admin){
            file_put_contents("news.txt", "$text");
            file_put_contents("info.txt", $text);
                   bot('sendmessage', [
                           'chat_id' => $chat_id,
                           'text' =>"لقد تم حفظ معلوماتك بنجاح ✅",
                    'parse_mode'=>'html',
              'reply_markup'=>json_encode([
                 'inline_keyboard'=>[
                    [
                    ['text'=>"خروج 🔙",'callback_data'=>"aa"],['text'=>"معاينه للمعلومات 🔍",'callback_data'=>"info"]
                    ],
                    [
                    ['text'=>"تعديل معلوماتي 📝",'callback_data'=>"setinfo"]
                    ],
                    ]
                    ])
                    ]);
                    }
if($text == '/start' and $from_id == $dev){
 bot('SendMessage',[
  'chat_id'=>$dev, 
    'message_id'=>$message_id,
  'text'=>"مرحبا : $name
هذه هي قائمه اعدادات البوت 💡",
   'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"عرض الاعدادات 💡",'callback_data'=>"aa"]
],
]
])
 ]);
}
if($text == 'الاعدادات' and $from_id == $dev){
 bot('SendMessage',[
  'chat_id'=>$dev, 
    'message_id'=>$message_id,
  'text'=>"مرحبا : $name
هذه هي قائمه اعدادات البوت 💡",
   'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الاعدادات ⚙",'callback_data'=>"aa"]
],
]
])
 ]);
}
elseif($data == "aa" or $data == "home"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
 'message_id'=>$message_id,
'text'=>"اعدادات البوت 💡",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"رساله عامه 📮",'callback_data'=>"send"]
],
[
['text'=>"عدد المشتركين 👤"
    ,'callback_data'=>"am"]
    ],
    [
        ['text'=>"تعديل معلوماتي 📋",'callback_data'=>"setinfo"]
        ],
        [
            ['text'=>"ملاحظه صغيره 📄",'callback_data'=>"ml"]
            ],
        ]
        ])
        ]);
}
elseif ($data == "am") {
        $user = file_get_contents("users.txt");
        $member_id = explode("\n", $user);
        $member_count = count($member_id) - 1;
        @$don = file_get_contents("data/done.txt");
        @$enf = file_get_contents("data/enf.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' =>"المشتركين هم => $member_count مشترك ✅",
            'show_alert'=>true
]);
}
            elseif ($data == "send"){
        bot('answercallbackquery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"جاري التحميل ▪️▫️▪️",
            'show_alert' => semo
        ]);
        file_put_contents("data/$chatid/ali.txt", "send");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "حسنا اكتب رسالتك الان 📩",
]);
    } elseif ($ali == "send") {
        file_put_contents("data/$chat_id/ali.txt", "no");
        $fp = fopen("users.txt", 'r');
        while (!feof($fp)) {
            $ckar = fgets($fp);
            sendmessage($ckar
            ,$text );
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "تم تحويل رسالتك لجميع الاعضاء 📮",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "الاعدادات 🔧", 'callback_data' => "home"],['text'=>"رساله اخرى 📬 ",'callback_data'=>'send']
                    ],
                ]
            ])
        ]);
    }
    elseif($data == "ml"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"عزيزي : انتبه 💡
سوف تتلقئ الرسائل بشكل مستمر
وسيتم تغطيه قائمه الاعدادات لا تقلق
 ليس عليك الرجوع للبحث عن القائمه 
فنحن نسهل عليك الامر جدا وهو بكتابه كلمه ( الاعدادات ) اين ما كنت وستظهر لك قائمه اعدادات البوت من جديد شكرا لكم",
 'parse_mode'=>"MarkDown",
'reply_markup' => json_encode([
                'inline_keyboard' => [
[
['text'=>"العوده ↪️",'callback_data'=>"home"]
]
]
])
 ]);     
}
//==================//
/* نهايه الكود 
========>>>>>♥<<<<<<=========
عزيزي المطور قم بتطوير البوت
لا تدعه يبقى كم كان تقدم خطوه
في عملك وكن انت المميز دائما
========>>>>>♥<<<<<<=========
Developer => semo&rami 
Special => @lqoopl & @RAMBO_SYR
My channel => @php18 and @Xxx_DEVRAMI_xxX
========>>>>>♥<<<<<<=========
وفقكم الله (: */
