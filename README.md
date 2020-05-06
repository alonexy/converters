# 单位转换器

## 质量转换器
- 常衡制
- 金衡制
- 公制
- 市制

```

use Alonexy\Converter\QualityConverter;
use Alonexy\Converter\Quality;


var_dump(QualityConverter::Parse(1, Quality::METRIC_TONNE, 10)->ConvertTo(Quality::METRIC_KILO_GARM,4));
var_dump(QualityConverter::Parse(1, Quality::METRIC_TONNE, 10)->ConvertTo(Quality::METRIC_GRAM,4));
var_dump(QualityConverter::Parse(1, Quality::METRIC_TONNE, 10)->ConvertTo(Quality::METRIC_MILLI_GRAM,4));

var_dump(QualityConverter::Parse(1, Quality::AVOIR_OUNCE, 10)->ConvertTo(Quality::METRIC_GRAM,7));
var_dump(QualityConverter::Parse(1, Quality::TROY_OUNCE, 10)->ConvertTo(Quality::METRIC_GRAM,7));
```
### 常量表
|  常量   | 解释  |
|  ----  | ----  |
| METRIC_TONNE  | 吨 |
| METRIC_KILO_GARM  | 千克 |
| METRIC_GRAM  | 克 |
| METRIC_MILLI_GRAM  | 毫克 |
| METRIC_MICRO_GRAM  | 微克 |
| MARKET_JIN  | 斤 |
| MARKET_LIANG  | 两 |
| MARKET_QIAN  | 钱 |
| MARKET_DAN  | 单 |
| AVOIR_POUND | 磅 |
| AVOIR_LONG_TONNE | (英制)长吨 |
| AVOIR_SHORT_TONNE | (美制)短吨 |
| AVOIR_OUNCE  | 盎司 |
| AVOIR_DRAM  | 打兰 |
| AVOIR_GRAIN | 格令 |
| AVOIR_BRI_CWT | 英担 |
| AVOIR_BRI_STONE  | 英石 |
| AVOIR_US_CWT | 美担 |
| AVOIR_CARAT | 克拉 |
| TROY_POUND | 金衡磅 |
| TROY_OUNCE | 金衡盎司 |
| TROY_DWT |  英钱|
| TROY_GRAIN | 金衡格令 |


## TODO

- 体积和容量换算器
