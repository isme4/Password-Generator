<?php
/**
 * OFFICIAL TOOL NAME: GENERATOR
 * VERSION: 13.0 (STABLE & FINAL)
 * LANGUAGES: ARABIC & ENGLISH
 */

// تنظيف الشاشة عند التشغيل
system("clear");

// تعريف الألوان للواجهة الاحترافية
$G = "\e[1;32m"; $Y = "\e[1;33m"; $B = "\e[1;34m"; $R = "\e[1;31m"; $C = "\e[1;36m"; $NC = "\e[0m";

// --- الواجهة الأولى: اختيار اللغة ---
echo "{$Y}1. English\n2. العربية{$NC}\n";
echo "Choose your language / اختر لغتك: ";
$handle = fopen("php://stdin", "r");
$langSelection = trim(fgets($handle));

if ($langSelection == "2") {
    $msg_welcome = "مرحباً بك في أداة GENERATOR الاحترافية";
    $msg_count   = "كم عدد الكلمات الأساسية التي ستدخلها؟: ";
    $msg_input   = "أدخل الكلمات (افصل بينها بفراغ واحد):";
    $msg_working = "جاري معالجة المعطيات وتوليد 1000 نمط احترافي...";
    $msg_done    = "تمت العملية بنجاح تام!";
    $msg_file    = "تم حفظ القائمة في الملف:";
} else {
    $msg_welcome = "Welcome to GENERATOR Professional Tool";
    $msg_count   = "How many seed keywords will you provide?: ";
    $msg_input   = "Enter the keywords (separated by space):";
    $msg_working = "Processing and generating 1000 professional patterns...";
    $msg_done    = "Operation completed successfully!";
    $msg_file    = "Wordlist saved in:";
}

system("clear");
echo "{$B}
  ██████╗ ███████╗███╗   ██╗███████╗██████╗  █████╗ ████████╗ ██████╗ ██████╗ 
  ██╔════╝ ██╔════╝████╗  ██║██╔════╝██╔══██╗██╔══██╗╚══██╔══╝██╔═══██╗██╔══██╗
  ██║  ███╗█████╗  ██╔██╗ ██║█████╗  ██████╔╝███████║   ██║   ██║   ██║██████╔╝
  ██║   ██║██╔════╝██║╚██╗██║██╔════╝██╔══██╗██╔══██║   ██║   ██║   ██║██╔══██╗
  ╚██████╔╝███████╗██║ ╚████║███████╗██║  ██║██║  ██║   ██║   ╚██████╔╝██║  ██║
   ╚═════╝ ╚══════╝╚═╝  ╚═══╝╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝    ╚═════╝ ╚═╝  ╚═╝
{$NC}\n";
echo "{$G}[+]{$NC} $msg_welcome\n\n";

// --- الخطوة 1: استقبال الكلمات ---
echo "{$C}[?]{$NC} $msg_count";
$countNum = trim(fgets($handle));

if (!is_numeric($countNum) || $countNum <= 0) {
    die("{$R}[-]{$NC} Error: Invalid Input. / خطأ في المدخلات.\n");
}

echo "{$C}[?]{$NC} $msg_input \n>> ";
$wordsInput = trim(fgets($handle));
$seeds = array_filter(explode(" ", $wordsInput));

echo "\n{$Y}[*] $msg_working{$NC}\n";

$finalPasswords = [];

// --- الخطوة 2: محرك التوليد (Logic Matrix) ---
// تم فحص هذا الجزء بدقة لضمان إغلاق كافة الحلقات البرمجية
foreach ($seeds as $s1) {
    $s1 = strtolower(trim($s1));
    $cap1 = ucfirst($s1);
    
    // أنماط أحادية (Single)
    $finalPasswords[] = $s1;
    $finalPasswords[] = $cap1;
    $finalPasswords[] = strtoupper($s1);
    $finalPasswords[] = str_replace(['a','e','i','o','s'], ['4','3','1','0','5'], $s1);

    foreach ($seeds as $s2) {
        $s2 = strtolower(trim($s2));
        if ($s1 !== $s2) {
            $cap2 = ucfirst($s2);
            // أنماط ثنائية (Double)
            $finalPasswords[] = $s1 . $s2;
            $finalPasswords[] = $cap1 . $s2;
            $finalPasswords[] = $cap1 . $cap2;
            $finalPasswords[] = $s1 . "_" . $s2;
            $finalPasswords[] = $s1 . "." . $s2;

            foreach ($seeds as $s3) {
                $s3 = strtolower(trim($s3));
                if ($s1 !== $s2 && $s2 !== $s3) {
                    $cap3 = ucfirst($s3);
                    // أنماط ثلاثية (Triple)
                    $finalPasswords[] = $s1 . $s2 . $s3;
                    $finalPasswords[] = $cap1 . $cap2 . $cap3;
                    $finalPasswords[] = $s1 . "_" . $s2 . "_" . $s3;
                    
                    foreach ($seeds as $s4) {
                        $s4 = strtolower(trim($s4));
                        if ($s1 !== $s4 && $s2 !== $s4 && $s3 !== $s4) {
                            // أنماط رباعية (Quad) لضمان الوصول لـ 1000
                            $finalPasswords[] = $cap1 . $s2 . $s3 . $s4;
                            $finalPasswords[] = $s1 . "." . $s2 . "." . $s3 . "." . $s4;
                            
                            // كسر الحلقة إذا تجاوزنا العدد المطلوب بكثير لتوفير الذاكرة
                            if (count($finalPasswords) > 2000) break;
                        }
                    } // نهاية س4
                }
                if (count($finalPasswords) > 2000) break;
            } // نهاية س3
        }
        if (count($finalPasswords) > 2000) break;
    } // نهاية س2
} // نهاية س1

// --- الخطوة 3: التصفية والوصول لـ 1000 كلمة بالضبط ---
$finalPasswords = array_unique($finalPasswords);
shuffle($finalPasswords);
$resultList = array_slice($finalPasswords, 0, 1000);

// --- الخطوة 4: الحفظ في ملف ---
$fileName = "Generator_Elite_Wordlist.txt";
file_put_contents($fileName, implode("\n", $resultList));

echo "----------------------------------------------------------\n";
echo "{$G}[DONE]{$NC} $msg_done\n";
echo "{$G}[+]{$NC} $msg_file {$Y}$fileName{$NC}\n";
echo "{$B}[*]{$NC} Total: " . count($resultList) . " Professional Passwords.\n";
echo "----------------------------------------------------------\n";
?>
