<?php

namespace App\Functions;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Neo
{
    public static $Preference;
    public static $Auth;

    public static function logo()
    {
        return asset('img/logo.png') . '?v=' . (env('APP_VERSION') ?? '0.0.1');
    }

    public static function locale($locale = null)
    {
        $current = app()->getLocale();
        return $locale ? $current == $locale : $current;
    }


    public static function auth($prop = null)
    {
        if (!static::$Auth) {
            static::$Auth = User::with('Preference')->where('id', Auth::id())->first();
        }

        return static::$Auth ? ($prop ? static::$Auth->{$prop} : static::$Auth) : false;
    }

    public static function preference($prop = null)
    {
        if (!static::$Preference) {
            static::$Preference = static::auth('Preference');
        }

        return static::$Preference ? ($prop ? static::$Preference->{$prop} : static::$Preference) : false;
    }

    public static function getDates($period = null)
    {
        switch ($period ?? static::preference('report_frequency')) {
            case "day":
                $hours = [];
                for ($hour = 0; $hour < 24; $hour += 3) {
                    $startHour = sprintf('%02d:00', $hour);
                    $endHour = sprintf('%02d:00', $hour + 2);
                    $hours["$startHour - $endHour"] = 0;
                }
                return [
                    Carbon::now()->startOfDay(),
                    Carbon::now()->endOfDay(),
                    $hours
                ];
            case "week":
                return [
                    Carbon::now()->startOfWeek(Carbon::MONDAY),
                    Carbon::now()->endOfWeek(Carbon::SUNDAY),
                    [
                        __('Monday') => 0,
                        __('Tuesday') => 0,
                        __('Wednesday') => 0,
                        __('Thursday') => 0,
                        __('Friday') => 0,
                        __('Saturday') => 0,
                        __('Sunday') => 0,
                    ]
                ];
            case "month":
                $month = Carbon::now()->format('m');
                $year = Carbon::now()->format('Y');
                $firstDay = mktime(0, 0, 0, $month, 1, $year);
                $daysInMonth = (int) date('t', $firstDay);
                $dayOfWeek = (int) date('w', $firstDay);
                $weekOffset = ($dayOfWeek === 0) ? 6 : $dayOfWeek - 1;
                $count = (int) ceil(($daysInMonth + $weekOffset) / 7);
                $weeks = [];
                for ($i = 1; $i <= $count; $i++) {
                    $weeks[__('Week') . ' ' . $i] = 0;
                }
                return [
                    Carbon::now()->startOfMonth(),
                    Carbon::now()->endOfMonth(),
                    $weeks
                ];
            case "year":
                return [
                    Carbon::now()->startOfYear(),
                    Carbon::now()->endOfYear(),
                    [
                        __('January') => 0,
                        __('February') => 0,
                        __('March') => 0,
                        __('April') => 0,
                        __('May') => 0,
                        __('June') => 0,
                        __('July') => 0,
                        __('August') => 0,
                        __('September') => 0,
                        __('October') => 0,
                        __('November') => 0,
                        __('December') => 0
                    ]
                ];
            case 'decade':
                $year = Carbon::now()->year;
                return [
                    Carbon::now()->subYears(9)->startOfYear(),
                    Carbon::now()->endOfYear(),
                    array_reduce(range($year - 9, $year), function ($carry, $item) {
                        $carry[$item] = 0;
                        return $carry;
                    }, [])
                ];
        }
    }

    public static function groupKey($model, $period = null, $prop = 'created_at')
    {
        $object = Carbon::parse($model->{$prop});
        switch ($period ?? static::preference('report_frequency')) {
            case 'day':
                $hour = $object->hour;
                $startHour = (int) floor($hour / 3) * 3;
                $endHour = $startHour + 2;
                return sprintf('%02d:00 - %02d:00', $startHour, $endHour);
            case 'week':
                return __($object->startOfWeek(Carbon::MONDAY)->format('l'));
            case 'month':
                return __('Week') . ' ' . static::formatWeek($object->format('Y-m-d'));
            case 'year':
                return __($object->format('F'));
            case 'decade':
                return (int) $object->format('Y');
        }
    }

    public static function formatWeek($datestr)
    {
        $date = Carbon::parse($datestr);
        $firstMonday = Carbon::parse($date->format('Y-m-01'))->startOfWeek(Carbon::MONDAY);
        $daysDifference = $date->diffInDays($firstMonday);
        return (int) ceil(($daysDifference + 1) / 7);
    }

    public static function formatNumber($num)
    {
        $formattedNumber = number_format((float) $num, 2);
        if (strpos($formattedNumber, '.') === false) {
            $formattedNumber .= '.00';
        } else {
            list($integerPart, $decimalPart) = explode('.', $formattedNumber);
            switch (strlen($decimalPart)) {
                case 1:
                    $formattedNumber .= '0';
                    break;
            }
        }
        return $formattedNumber;
    }

    public static function matchRoute($str)
    {
        return Str::contains(request()->path(), $str);
    }

    public static function genderList()
    {
        return ['male', 'female'];
    }

    public static function identitiesList()
    {
        return ['pasport', 'visa', 'cin'];
    }

    public static function methodsList()
    {
        return ['credit card', 'cheque', 'cash'];
    }

    public static function languagesList()
    {
        return [
            'en' => 'english',
            'fr' => 'french',
            'ar' => 'arabic',
        ];
    }

    public static function currenciesList()
    {
        return [
            'MAD' => 'moroccan dirhams',
            '$' => 'dollars',
        ];
    }

    public static function periodsList()
    {
        return ['day', 'week', 'month', 'year', 'decade'];
    }

    public static function citiesList()
    {
        return ["casablanca", "rabat", "fez", "marrakesh", "agadir", "tangier", "meknes", "oujda", "kenitra", "tetouan", "safi", "mohammedia", "khouribga", "el jadida", "nador", "beni mellal", "khemisset", "larache", "ksar el kebir", "settat", "sidi kacem", "temara", "berrechid", "oued zem", "fquih ben salah", "taroudant", "ouarzazate", "dakhla", "guelmim", "laayoune"];
    }

    public static function nationsList()
    {
        return
            ["afghan", "albanian", "algerian", "american", "andorran", "angolan", "anguillan", "citizen of antigua and barbuda", "argentine", "armenian", "australian", "austrian", "azerbaijani", "bahamian", "bahraini", "bangladeshi", "barbadian", "belarusian", "belgian", "belizean", "beninese", "bermudian", "bhutanese", "bolivian", "citizen of bosnia and herzegovina", "botswanan", "brazilian", "british", "british virgin islander", "bruneian", "bulgarian", "burkinan", "burmese", "burundian", "cambodian", "cameroonian", "canadian", "cape verdean", "cayman islander", "central african", "chadian", "chilean", "chinese", "colombian", "comoran", "congolese (congo)", "congolese (drc)", "cook islander", "costa rican", "croatian", "cuban", "cymraes", "cymro", "cypriot", "czech", "danish", "djiboutian", "dominican", "citizen of the dominican republic", "dutch", "east timorese", "ecuadorean", "egyptian", "emirati", "english", "equatorial guinean", "eritrean", "estonian", "ethiopian", "faroese", "fijian", "filipino", "finnish", "french", "gabonese", "gambian", "georgian", "german", "ghanaian", "gibraltarian", "greek", "greenlandic", "grenadian", "guamanian", "guatemalan", "citizen of guinea-bissau", "guinean", "guyanese", "haitian", "honduran", "hong konger", "hungarian", "icelandic", "indian", "indonesian", "iranian", "iraqi", "irish", "israeli", "italian", "ivorian", "jamaican", "japanese", "jordanian", "kazakh", "kenyan", "kittitian", "citizen of kiribati", "kosovan", "kuwaiti", "kyrgyz", "lao", "latvian", "lebanese", "liberian", "libyan", "liechtenstein citizen", "lithuanian", "luxembourger", "macanese", "macedonian", "malagasy", "malawian", "malaysian", "maldivian", "malian", "maltese", "marshallese", "martiniquais", "mauritanian", "mauritian", "mexican", "micronesian", "moldovan", "monegasque", "mongolian", "montenegrin", "montserratian", "moroccan", "mosotho", "mozambican", "namibian", "nauruan", "nepalese", "new zealander", "nicaraguan", "nigerian", "nigerien", "niuean", "north korean", "northern irish", "norwegian", "omani", "pakistani", "palauan", "palestinian", "panamanian", "papua new guinean", "paraguayan", "peruvian", "pitcairn islander", "polish", "portuguese", "prydeinig", "puerto rican", "qatari", "romanian", "russian", "rwandan", "salvadorean", "sammarinese", "samoan", "sao tomean", "saudi arabian", "scottish", "senegalese", "serbian", "citizen of seychelles", "sierra leonean", "singaporean", "slovak", "slovenian", "solomon islander", "somali", "south african", "south korean", "south sudanese", "spanish", "sri lankan", "st helenian", "st lucian", "stateless", "sudanese", "surinamese", "swazi", "swedish", "swiss", "syrian", "taiwanese", "tajik", "tanzanian", "thai", "togolese", "tongan", "trinidadian", "tristanian", "tunisian", "turkish", "turkmen", "turks and caicos islander", "tuvaluan", "ugandan", "ukrainian", "uruguayan", "uzbek", "vatican citizen", "citizen of vanuatu", "venezuelan", "vietnamese", "vincentian", "wallisian", "welsh", "yemeni", "zambian", "zimbabwean"];;
    }

    public static function formatsList($format = null, $index = null)
    {
        $formats = [
            'YYYY-MM-DD' => ['yyyy-mm-dd', 'Y-m-d'],
            'YYYY-DD-MM' => ['yyyy-dd-mm', 'Y-d-m'],
            'MM-DD-YYYY' => ['mm-dd-yyyy', 'm-d-Y'],
            'DD-MM-YYYY' => ['dd-mm-yyyy', 'd-m-Y'],
            'YYYY/MM/DD' => ['yyyy/mm/dd', 'Y/m/d'],
            'YYYY/DD/MM' => ['yyyy/dd/mm', 'Y/d/m'],
            'MM/DD/YYYY' => ['mm/dd/yyyy', 'm/d/Y'],
            'DD/MM/YYYY' => ['dd/mm/yyyy', 'd/m/Y'],
            'DD MMM YYYY' => ['dd mmm yyyy', 'd M Y'],
            'MMM DD YYYY' => ['mmm dd yyyy', 'M d Y'],
            'DD MMMMM YYYY' => ['dd mmmm yyyy', 'd F Y'],
            'MMMMM DD YYYY' => ['mmmm dd yyyy', 'F d Y'],
            'DDD DD MMM YYYY' => ['ddd dd mmm yyyy', 'D d M Y'],
            'DDD MMM DD YYYY' => ['ddd mmm dd yyyy', 'D M d Y'],
            'DDDD DD MMMM YYYY' => ['dddd dd mmmm yyyy', 'l d F Y'],
            'DDDD MMMM DD YYYY' => ['dddd mmmm dd yyyy', 'l F d Y'],
        ];

        return $format ? $formats[$format][$index] : $formats;
    }

    public static function themesList($color = null)
    {
        $colors = [
            'ocean tide' => ['32 138 243', '110 179 247'],
            'lavender storm' =>  ['138 32 243', '179 110 247'],
            'crimson rush' =>  ['243 32 67', '247 110 133'],
            'amber sunset' =>  ['243 103 32', '247 156 110'],
            'golden ray' =>  ['243 208 32', '247 224 110'],
            'forest haze' =>  ['32 243 173', '110 247 201'],
        ];

        return $color ? $colors[$color] : $colors;
    }
}
