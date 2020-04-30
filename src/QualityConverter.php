<?php
namespace Alonexy\Converter;

class Quality
{
    //公制
    const METRIC_TONNE = 't'; //Tonne
    const METRIC_GRAM = 'g'; //Gram
    const METRIC_KILO_GARM = 'kg'; //Kilogram
    const METRIC_MILLI_GRAM = 'mg'; //Milligram
    const METRIC_MICRO_GRAM = 'μg'; //Microgram

    //市制
    const MARKET_JIN = 'jin'; //市斤
    const MARKET_DAN = 'dan'; //担
    const MARKET_LIANG = 'liang'; //两
    const MARKET_QIAN = 'qian'; //钱

    // 常衡制
    const AVOIR_POUND = 'lb.av'; //磅
    const AVOIR_LONG_TONNE = 'bri.lt';  //(英制)长吨
    const AVOIR_SHORT_TONNE = 'us.sht';  //(美制)短吨
    const AVOIR_OUNCE = 'oz.av';  //盎司
    const AVOIR_DRAM = 'dr';  //打兰
    const AVOIR_GRAIN = 'gr.av';  //格令
    const AVOIR_BRI_CWT = 'bri.cwt';  //英担
    const AVOIR_BRI_STONE = 'bri.st';  //英石
    const AVOIR_US_CWT = 'us.cwt';  // 美担
    const AVOIR_CARAT = 'ct';  // 克拉

    // 金衡制
    const TROY_POUND = 'lb.tr';//金衡磅
    const TROY_OUNCE = 'oz.tr';//金衡盎司
    const TROY_DWT = 'dwt.tr';//英钱
    const TROY_GRAIN = 'gr.tr';//Grain

    //标准的 SI kg 单位值
    const SI_UNIT_VALUES = [
        self::METRIC_KILO_GARM => '1',
        self::METRIC_TONNE => '1000',
        self::METRIC_GRAM => '0.001',
        self::METRIC_MILLI_GRAM => '0.000001',
        self::METRIC_MICRO_GRAM => '0.000000001',
        self::MARKET_JIN => '0.5',
        self::MARKET_DAN => '50',
        self::MARKET_LIANG => '0.05',
        self::MARKET_QIAN => '0.005',

        self::AVOIR_POUND => '0.45359237',
        self::AVOIR_LONG_TONNE => '1016.0469088',
        self::AVOIR_SHORT_TONNE => '907.18474',
        self::AVOIR_OUNCE => '0.0283495',
        self::AVOIR_DRAM => '0.0017718',
        self::AVOIR_GRAIN => '0.0000647989',
        self::AVOIR_BRI_CWT => '50.8023454',
        self::AVOIR_BRI_STONE => '6.3502932',
        self::AVOIR_US_CWT => '45.359237',
        self::AVOIR_CARAT => '0.0002',

        self::TROY_POUND => '0.36740976',
        self::TROY_OUNCE => '0.0311034768',
        self::TROY_DWT => '0.00155517',
        self::TROY_GRAIN => '0.0000647989'

    ];

    public static function getSupportUnits()
    {
        $rcs = new \ReflectionClass(__CLASS__);
        return $rcs->getConstants();
    }
}

//质量转换器 SI -> kg
class QualityConverter extends Converter
{
    private static $value;

    private static $unit;
    private static $SupportUnits;
    private static $SI_Unit_Values;

    public function __construct($value, $unitType, $decimal)
    {
        self::$SupportUnits = Quality::getSupportUnits();
        if (!in_array($unitType, self::$SupportUnits)) {
            throw new \Exception("Unit Is Not Supported So In " . json_encode(self::$SupportUnits));
        }
        self::$SI_Unit_Values = Quality::SI_UNIT_VALUES;
        self::$unit           = $unitType;
        self::$value          = bcmul($value, self::$SI_Unit_Values[$unitType], $decimal);
        parent::__construct();
    }

    public static function Parse($value, $unitType, $decimal)
    {
        return new static($value, $unitType, $decimal);
    }

    public function ConvertTo($unitType, $decimal, $isRound = false)
    {
        if (!in_array($unitType, self::$SupportUnits)) {
            throw new \Exception("Unit Is Not Supported So In " . json_encode(self::$SupportUnits));
        }
        return $isRound ? (double)round(bcdiv(self::$value, self::$SI_Unit_Values[$unitType], $decimal + 1), $decimal) :
            (double)bcdiv(self::$value, self::$SI_Unit_Values[$unitType], $decimal);
    }
}

?>