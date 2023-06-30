<?php
//headers

use JetBrains\PhpStorm\Language;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//initializing our api
include_once('../config/initialize.php');
$data = json_decode(file_get_contents("php://input"));
$language = isset($data->language) ? $data->language : "";
$records;


$title_pp_en = "MRTV Application Privacy Policy";

$body_pp_en = '<ol><li>Please read this policy carefully. It explains the types of Information we may collect about you, the purposes for and methods by which we collect it and the lawful basis on which we do so, as well as information about data retention, your rights and how to contact us. This Privacy Policy covers both our online and offline data processing activities, including information that we collect through our Digital Services such as website, mobile application, pages/channels/accounts on third party social networks.</li>
    <li>The information we may collect from you by registration, account and sign-up information. (e.g. name, username, password, email, contact details, date of birth or age, interest in our content, etc…) And, the information you provide when participating in consumer surveys or research studies. Also the information about your social media engagement including your interactions with our pages/channels/accounts in third party communities and social media sites. Then, the information about your location including where it is derived from device information such as IP address or country code. Technical/usage Information from your device including the type of device, browser, unique device identifier, operating system, internet provider, etc… </li>
    <li>We may use the information for the purposes described in this Privacy Policy. Please note that wile information may be processed for more than one purpose, not all of the purposes or processing activities below will necessarily apply in every case. Our particular use of your information will depend on the Offering you engage with and the manner in which you interact with us including the permissions you give us.</li>
    <li>We may use your information for the purpose of providing Customer Services, including dealing with your queries and complaints whether you contact us by email, website or via Social Media Sites. </li>
    <li>We may use cookies or similar technologies to collect and store information about your usage of our mobile application. We may use cookies to personalize your experience, to analyze usage patterns, and to deliver targeted advertisements. You can control cookies through your device settings or by using third-party tools. (copy from company’s written policy)</li>
    <li>If you have any questions about this Privacy Policy, you can contact us at <a href="http://www.mrtv.gov.mm/" www.mrtv.gov.mm </a>. We may update this Privacy Policy from time to time. We will notify you about any material changes by placing a notice on our application. We encourage you to periodically check back and review this policy so that you are up to date. </li></ol>';

$title_tu_en = "MRTV Terms of Use";

$body_tu_en = "<p>These are the MRTV Application’s terms of use.<br>We’ve kept them as short as possible, so do read them carefully. And, check in for updates as the latest version always applies. We only make updates when we release a new service, change how we provide service or have to submit with a new legal requirement.Read these terms before using our services. Whenever you use our services you agree to these terms. If you don’t stick to all these terms, we can suspend or terminate your use of services and your account.
<ol><li>Services mean anything digital offered by MRTV such us website (www.mrtv.gov.mm), application (MRTV), content available through RSS feeds and social media such as Facebook, Twitter, Twitch and Telegram. Content means anything that’s available through those services including TV and Radio Shows, Text, Audio, Video, Images, Software, Technical stuff such as metadata and open-source code and anything made by people using our services, user-generated content.</li><li><b><u>Three</u></b> options of Terms of using our services and content:<ol style='list-style-type:lower-alpha;'><li><b>Don’t mess with our services</b> by hacking them, trying to get around our content security technology, accessing content from outside of the country that you aren’t allowed to or helping others do the same. (eg. Using VPN service).</li><li><b>Don’t harm or offend other people while using our services or content.</b> That means: don’t damage our reputation by associating us with sexism or racism for instance, don’t get us sued by defaming on an active lawsuit, don’t harass or upset people, don’t post or upload anything offensive or obscene. If you disagree with someone, attack the argument, not the person or organization.</li><li><b>Don’t pretend to be the MRTV.</b> That includes: recreating a service or copying the look of service, Using our brand, trademark or logo without our permission, making money from our content or services. Sharing our content apart from shareable (Share, Embed, Social media buttons for posting to Facebook, Twitter and so on.</li></ol></li><li>You may need an account to use some of our services like commenting and sharing our contents and receiving notifications of our new uploads. Users are responsible for keeping their login credentials confidential and safe. Users’ passwords should meet the highest standards of strength permitted by this Application. By registering, Users agree to be fully responsible for all activities that occur under their username and password. Users are required to immediately inform the MRTV via the contact details if they think their personal information or data have been violated, disclosed or stolen.</li></ol></p>";

$title_pp_mm = "MRTV Application ၏ မူဝါဒများ";

$body_pp_mm = "<ol style='list-style-type:myanmar;'><li>ဤမူဝါဒများကို သေချာဖတ်ရန် လိုအပ်ပါသည်။ ဤမူဝါဒများထဲတွင် သင့်အကြောင်း သတင်း အချက်အလက်များ၊ ၎င်းကိုစုဆောင်းရသည့် ရည်ရွယ်ချက်များ၊ နည်းလမ်းများနှင့် ကျွန်ုပ်တို့ ပြုလုပ်သည့် တရားဝင်အခြေခံများ၊ ဒေတာထိန်းသိမ်းထားမှု၊ သင်၏အခွင့်အရေး လုပ်ပိုင်ခွင့်များနှင့် ကျွန်ုပ်တို့ကို ဆက်သွယ်ရမည့်နည်းလမ်းများအကြောင်း ရှင်းပြထားသည်။ ဤမူဝါဒများသည် ကျွန်ုပ်တို့၏ အွန်လိုင်းနှင့် အော့ဖ်လိုင်း ဒေတာလုပ်ဆောင်ခြင်းဆိုင်ရာ လုပ်ဆောင်ချက်များနှင့် ကျွန်ုပ်တို့၏ ဒစ်ဂျစ်တယ်ဝန်ဆောင်မှုများဖြစ်သည့် ဝဘ်ဆိုက်၊ မိုဘိုင်းအက်ပလီကေးရှင်း၊ ပြင်ပလူမှုကွန်ရက်များရှိ စာမျက်နှာများ/ ချန်နယ်များ/ အကောင့်များကဲ့သို့သော ဒစ်ဂျစ်တယ် ဝန်ဆောင်မှုများမှ တစ်ဆင့် စုဆောင်းရယူသည့် အချက်အလက်များပါ အကျုံးဝင်ပါသည်။</li>
<li>မှတ်ပုံတင်ခြင်း၊ အကောင့်နှင့် အကောင့်ဖွင့်ခြင်းဆိုင်ရာ အချက်အလက်များသည် (ဥပမာ အမည်၊ အသုံးပြုသူအမည်၊ စကားဝှက်၊ အီးမေးလ်၊ ဆက်သွယ်ရန် အသေးစိတ်အချက်အလက်များ၊ မွေးသက္ကရာဇ် သို့မဟုတ် အသက်၊ ကျွန်ုပ်တို့၏ အကြောင်းအရာအပေါ် စိတ်ဝင်စားမှု စသည်ဖြင့်...) သင့်ထံမှ ကျွန်ုပ်တို့စုဆောင်းရရှိနိုင်သည့် သတင်းအချက်အလက်များ ဖြစ်သည်။ ထို့အပြင် အသုံးပြုသူစစ်တမ်းများ သို့မဟုတ် သုတေသနလေ့လာမှုများတွင် ပါဝင်သည့်အခါ သင်ရေးသွင်းသည့် အချက်အလက်များ၊ ပြင်ပ လူမှုမီဒီယာဝဘ်ဆိုက်များရှိ ကျွန်ုပ်တို့၏ စာမျက်နှာများ/ ချန်နယ်များ/ အကောင့်များနှင့် သင့်အပြန်အလှန်တုံ့ပြန်မှုများ အပါအဝင် သင်၏ဆိုရှယ်မီဒီယာတွင် ပါဝင် ပတ်သက်မှုဆိုင်ရာ အချက်အလက်များလည်း ပါဝင်သည့်အပြင် IP လိပ်စာ သို့မဟုတ် country code ကဲ့သို့သော စက်ပစ္စည်းအချက်အလက်မှ ဆင်းသက်လာသည့်နေရာ အပါအဝင် သင့်တည်နေရာနှင့် ပတ်သက်သည့် အချက်အလက်များ၊ စက်ပစ္စည်းအမျိုးအစား၊ browser, unique device identifier, operating system, internet provider, စသည်ဖြင့် အပါအဝင် သင့်စက်ပစ္စည်းမှ နည်းပညာ/အသုံးပြုမှု အချက်အလက်များ ပါဝင်ပါသည်။</li>
<li>ဤမူဝါဒများတွင် ဖော်ပြထားသည့် ရည်ရွယ်ချက်များအတွက် ကျွန်ုပ်တို့သည် သင်၏အချက်အလက်ကို အသုံးပြုနိုင်ပါသည်။ ကျေးဇူးပြု၍ မှတ်သားထားရန်မှာ ကျွန်ုပ်တို့အနေဖြင့် အချက်အလက်ကို ရည်ရွယ်ချက်တစ်ခုထက်ပို၍ လုပ်ဆောင်နိုင်သည်။ သို့သော် ရည်ရွယ်ချက်များ (သို့မဟုတ်) လုပ်ဆောင်ခြင်း လုပ်ငန်းများအားလုံးသည် ကိစ္စတိုင်းတွင် အကျုံးဝင်မည်မဟုတ်ပါ။ သင်၏ အချက်အလက်များကို ကျွန်ုပ်တို့၏ သီးခြားအသုံးပြုမှုသည် သင်ပါဝင်သည့်ကမ်းလှမ်းချက်နှင့် ကျွန်ုပ်တို့အား သင်ပေးသောခွင့်ပြုချက်များအပါအဝင် သင်နှင့်ကျွန်ုပ်တို့ကို အပြန်အလှန် တုံ့ပြန်သည့် ပုံစံပေါ်တွင်မူတည်မည် ဖြစ်သည်။ </li>
<li>သင် ဖြည့်သွင်းထားသည့် အီးမေးလ်၊ ဝဘ်ဆိုက် သို့မဟုတ် ဆိုရှယ်မီဒီယာ ဆိုက်များမှတစ်ဆင့် သင့်မေးမြန်းချက်များနှင့် တိုင်ကြားချက်များကို ကိုင်တွယ်ဖြေရှင်းခြင်း အပါအဝင် အသုံးပြုသူ ဝန်ဆောင်မှုများပေးနိုင်ရန် ရည်ရွယ်ချက်အတွက် ကျွန်ုပ်တို့အနေဖြင့် သင့်အချက်အလက်များကို အသုံးပြုနိုင်ပါသည်။</li>
<li>ကျွန်ုပ်တို့သည် ကျွန်ုပ်တို့၏ မိုဘိုင်းအပလီကေးရှင်းအသုံးပြုမှုနှင့် ပတ်သက်သောအချက်အလက်များကို စုဆောင်းသိမ်းဆည်းရန်အတွက် cookies သို့မဟုတ် အလားတူနည်းပညာများကို အသုံးပြုနိုင်ပါသည်။ သင့်အတွေ့အကြုံကို စိတ်ကြိုက်ပြင်ဆင်ရန်၊ အသုံးပြုမှုပုံစံများကို ခွဲခြမ်းစိတ်ဖြာရန်နှင့် သင့်အတွက်ရည်ရွယ်သော ကြော်ငြာများကိုပေးပို့ရန် Cookies များကို ကျွန်ုပ်တို့ အသုံးပြုနိုင်ပါသည်။ သင့် device setting မှတစ်ဆင့် (သို့မဟုတ်) ပြင်ပမှ application များကို အသုံးပြုခြင်းဖြင့် Cookies များကို သင်ထိန်းချုပ်နိုင်ပါသည်။ </li>
<li>ဤမူဝါဒများနှင့်ပတ်သက်၍ သင့်တွင်မေးခွန်းများရှိပါက ကျွန်ုပ်တို့ထံ www.mrtv.gov.mm မှ ဆက်သွယ်နိုင်ပါသည်။ ကျွန်ုပ်တို့သည် ဤမူဝါဒများကို အခါအားလျော်စွာ update လုပ်သွားမည် ဖြစ်သောကြောင့် ကျွန်ုပ်တို့၏ application တွင် notification အနေဖြင့် မည်သည့်အကြောင်းအရာ ပြောင်းလဲမှုများအကြောင်း သင့်အား အကြောင်းကြားမည်ဖြစ်သည်။ ကျွန်ုပ်တို့၏ ဤမူဝါဒများကို အခါအားလျော်စွာ ပြန်လည်ဖတ်ရှုရန် တိုက်တွန်းပါသည်။</li></ol>";

$title_tu_mm = "MRTV အပလီကေးရှင်း အသုံးပြုမှု လိုက်နာရန်စည်းကမ်းချက်များ";

$body_tu_mm = "<p>တတ်နိုင်သမျှ တိုတိုနှင့်လိုရှင်း ရှင်းပြထားသောကြောင့် ဂရုတစိုက်ဖတ်ရန် လိုအပ်ပါသည်။ ဝန်ဆောင်မှုအသစ် တစ်ခုထုတ်သည့်အခါ၊ ဝန်ဆောင်မှုပေးပုံ အပြောင်းအလဲဖြစ်သည့်အခါ (သို့မဟုတ်) တရားဝင်လိုအပ်ချက်အသစ် တစ်ခုဖြင့်တင်သွင်းသည့်အခါမှသာ ဆော့ဖ်ဝဲအဆင့်မြှင့်တင်ခြင်းများပေးသောကြောင့် နောက်ဆုံးထွက်ဗားရှင်းကို အမြဲမြှင့်တင်ရန် လိုအပ်ပါသည်။ 
ကျွန်ုပ်တို့၏ဝန်ဆောင်မှုများကို အသုံးမပြုမီ ဤစည်းကမ်းချက်များကို သေချာစွာဖတ်ရန် လိုအပ်ပါသည်။ ကျွန်ုပ် တို့၏ဝန်ဆောင်မှုများကို သင်အသုံးပြုသည့်အခါတိုင်း ဤစည်းကမ်းချက်များကို သင်သဘောတူနေခြင်း ဖြစ်ပါ သည်။ ဤစည်းမျဉ်းများအားလုံးကို သင်မလိုက်နာပါက သင့်ဝန်ဆောင်မှုများနှင့် သင့်အကောင့်အသုံးပြုမှုကို ကျွန်ုပ်တို့အနေဖြင့် ဆိုင်းငံ့ သို့မဟုတ် ရပ်ဆိုင်းနိုင်ပါသည်။
</p><ol style='list-style-type:myanmar;'><li>ဝန်ဆောင်မှုများဆိုသည်မှာ MRTV မှ ပေးဆောင်ထားသည့် အီလက်ထရောနစ်နည်းပညာများဖြစ်သော ဝဘ်ဆိုဒ် (www.mrtv.gov.mm)၊ အက်ပ်လီကေးရှင်း (MRTV)၊ RSS feeds များမှ ရရှိနိုင်သော အကြောင်းအရာများနှင့် MRTV ၏ ဆိုရှယ်မီဒီယာများဖြစ်သည့် Facebook, Twitter, Twitch နှင့် Telegram တို့ဖြစ်သည်။ အကြောင်းအရာဆိုသည်မှာ တီဗွီနှင့် ရေဒီယိုအစီအစဉ်များ၊ စာသား၊ အသံ၊ ဗီဒီယို၊ ရုပ်ပုံများ၊ ဆော့ဖ်ဝဲ၊ Metadata နှင့် open-source code အပါအဝင် ကျွန်ုပ်တို့၏ဝန်ဆောင်မှုများကို အသုံးပြုနေသူများ၊ အသုံးပြုသူဖန်တီးထားသော အကြောင်းအရာများ အပါအဝင် အဆိုပါဝန်ဆောင်မှုများမှ ရရှိနိုင်သည့် မည်သည့်အရာမဆိုကို ဆိုလိုပါသည်။</li>
<li>ကျွန်ုပ်တို့၏ ဝန်ဆောင်မှုများနှင့် အကြောင်းအရာကို အသုံးပြုခြင်းဆိုင်ရာ စည်းမျဉ်းသုံးချက် ရှိပါသည်။
<ol style='list-style-type:myanmar;'><li>ကျွန်ုပ်တို့၏ အကြောင်းအရာ အချက်အလက်များကို ရယူနှောင့်ယှက်ခြင်း၊ လုံခြုံရေးနည်းပညာကို ခွင့်မပြုထားသည့် နိုင်ငံပြင်ပမှနေ၍ အကြောင်းအရာများကို ဝင်ရောက်ကြည့်ရှုခြင်း (သို့မဟုတ်) အခြားသူများကို ကူညီလုပ်ဆောင်ပေးခြင်းဖြင့် ကျွန်ုပ်တို့၏ဝန်ဆောင်မှုများကို မရှုပ်ထွေးပါစေနှင့်။ (ဥပမာ- VPN ဝန်ဆောင်မှုကို အသုံးပြုခြင်း)</li>
<li>ကျွန်ုပ်တို့၏ ဝန်ဆောင်မှုများ (သို့မဟုတ်) အကြောင်းအရာကို အသုံးပြုပြီး အခြားသူများကို ထိခိုက်မှု (သို့မဟုတ်) စော်ကားခြင်း မပြုပါနှင့်။ ဆိုလိုသည်မှာ- ဥပမာ- လိင်ကွဲပြားမှု သို့မဟုတ် လူမျိုးရေး ခွဲခြားမှုများဖြင့် ကျွန်ုပ်တို့၏ဂုဏ်သိက္ခာကို မထိခိုက်ပါစေနှင့်။ လူများကို နှောင့်ယှက်ခြင်း သို့မဟုတ် စိတ်အနှောင့်အယှက်မဖြစ်စေရန်၊ စော်ကားသော (သို့မဟုတ်) ညစ်ညမ်းသော မည်သည့်အရာကိုမျှ မတင်ပါနှင့်။ အကယ်၍ သင်သည် တစ်စုံတစ်ဦးနှင့် သဘောမတူပါက လူတစ်ဦး (သို့မဟုတ်) အဖွဲ့အစည်းကို မဟုတ်ဘဲ ငြင်းခုန်မှုကိုသာလျှင် တိုက်ခိုက်ပါ။</li>
<li>ဝန်ဆောင်မှုတစ်ခုကို ပြန်လည်ဖန်တီးခြင်း (သို့မဟုတ်) ဝန်ဆောင်မှု၏အသွင်အပြင်ကို ကူးယူခြင်း၊ ကျွန်ုပ်တို့၏ခွင့်ပြုချက်မရှိဘဲ အမှတ်တံဆိပ် (သို့မဟုတ်) လိုဂိုကို အသုံးပြုခြင်း၊ ကျွန်ုပ်တို့၏ အကြောင်းအရာ သို့မဟုတ် ဝန်ဆောင်မှုများမှ ငွေရှာခြင်းများ ပြုလုပ်၍ MRTV ဖြစ်ဟန် မဆောင်ပါနှင့်။ ကျွန်ုပ်တို့၏အကြောင်းအရာများကို ဆိုရှယ်မီဒီယာများတွင် Share၊ Embed၊ Facebook၊ Twitter တွင် ပို့စ်တင်ခြင်းဖြင့်သာ မျှဝေပါ။</li></ol>
<li>ကျွန်ုပ်တို့၏ အကြောင်းအရာများကို မှတ်ချက်ပေးခြင်း၊ မျှဝေခြင်းနှင့် ကျွန်ုပ်တို့၏ အကြောင်းအရာသစ် များ လွှင့်တင်ခြင်းအတွက် အကြောင်းကြားချက်များကို လက်ခံရရှိခြင်းကဲ့သို့သော ကျွန်ုပ်တို့၏ ဝန်ဆောင်မှုအချို့ကို အသုံးပြုရန်အတွက် သင်သည် ကိုယ်ပိုင်အကောင့်တစ်ခု လိုအပ်နိုင်ပါသည်။ အသုံးပြုသူများအနေဖြင့် မိမိတို့၏ အကောင့်ဝင်ခြင်းဆိုင်ရာ အထောက်အထားများကို လျှို့ဝှက်ပြီး ဘေးကင်းစေရန် တာဝန်ရှိသဖြင့် သတိထားရန် လိုအပ်ပါသည်။ အသုံးပြုသူများ၏ စကားဝှက်များသည် ဤအပလီကေးရှင်းမှ ခွင့်ပြုထားသော အမြင့်ဆုံးစံနှုန်းများနှင့် ကိုက်ညီသင့်ပါသည်။ ကိုယ်ပိုင်အကောင့် အား မှတ်ပုံတင်၍အသုံးပြုသူများသည် ၎င်းတို့၏အသုံးပြုသူအမည်နှင့် စကားဝှက်အောက်တွင် ဖြစ်ပေါ်သည့် လုပ်ဆောင်မှုများအားလုံးကို အပြည့်အဝ တာဝန်ယူရန် သဘောတူရပါမည်။ အသုံးပြုသူ များသည် ၎င်းတို့၏ ကိုယ်ရေးကိုယ်တာအချက်အလက်များ သို့မဟုတ် ဒေတာများကို ချိုးဖောက်၊ ထုတ်ဖော် သို့မဟုတ် ခိုးယူခံရသည်ဟု ယူဆပါက ဆက်သွယ်ရန်အသေးစိတ် အချက်အလက်များ မှတစ်ဆင့် MRTV သို့ ချက်ချင်းအကြောင်းကြားရန် လိုအပ်ပါသည်။</li></ol>";

if ($language == "en") {
  $records = array(
    "status" => true,
    "message" => "success",
    "pricacy_poicy" => array(
    "title"=> $title_pp_en,
    "body" => $body_pp_en),
    "terms_of_use"=>array(
    "title" => $title_tu_en,
    "body" => $body_tu_en)
);
} 
elseif($language == "mm") {
    $records = array(
        "status" => true,
        "message" => "success",
        "pricacy_poicy" => array(
        "title" => $title_pp_mm,
        "body" => $body_pp_mm),
        "terms_of_use"=>array(
        "title" => $title_tu_mm,
        "body" => $body_tu_mm)
    );
}

// set response code - 200 OK
http_response_code(200);
echo  json_encode($records);
