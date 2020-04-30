# alonexy/converters


## 单位转换器

# 新增 质量转换器
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