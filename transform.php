<?php
$html = file_get_contents('at10_temp.html');

$products_section = <<<EOF
<div class="tab">
    <button class="tablinks active" onclick="openTabs(event,'tab_dynamic')">Các sản phẩm</button>
</div>
<div id="tab_dynamic" class="tabcontent" style="display: block;">
    <div class="woocommerce columns-4 ">
        <div class="grid-uniform md-mg-left-10 products columns-4">
            @foreach (\$foods as \$food)
            <div class="md-pd-left10 grid__item large--one-quarter medium--one-third small--one-half">
                <div class="product-item">
                    <div class="product-img">
                        <a href="#">
                           <img width="260" height="260" src="{{ \$food->image && filter_var(\$food->image, FILTER_VALIDATE_URL) ? \$food->image : (\$food->image ? asset('storage/'.\$food->image) : 'https://placehold.co/400x400/png?text=No+Image') }}" class="attachment-thumb_260x260 size-thumb_260x260 wp-post-image" alt="{{ \$food->name }}" />
                        </a>
                    </div>
                    <div class="product-info">
                        <div class="product-title">
                            <a href="#">{{ \$food->name }}</a>
                        </div>
                        <div class="product-price clearfix">
                            <span class="current-price"><span class="woocommerce-Price-amount amount">{{ number_format(\$food->price, 0, ',', '.') }}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                            @if(\$food->old_price)
                            <span class="original-price"><s><span class="woocommerce-Price-amount amount">{{ number_format(\$food->old_price, 0, ',', '.') }}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></s></span>
                            @endif
                        </div>
                        <div class="product-actions text-center clearfix">
                            <a href="#"><button type="button" class="btn-buyNow buy-now medium--hide small--hide">Chi tiết</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
EOF;

$startPos = strpos($html, '<div class="section-content">');
if ($startPos !== false) {
    $startContentPos = $startPos + strlen('<div class="section-content">');
    
    // We look for the closing structure
    // Since there are 3 tabs with similar structures, let's just find where <section id="w366_home_news-2"> begins,
    // and go back parsing.
    $endPos = strpos($html, '</section>', $startPos);
    if ($endPos !== false) {
        $endContentPos = strrpos(substr($html, 0, $endPos), '</div>'); // actually there are several closing divs.
        
        // Simpler: Just extract the string between `<div class="section-content">` and the next closing sequence before <section...
        // Let's just find `<div class="tab">` and replace everything until `<section id="w366_home_news-2"`
        $tabStart = strpos($html, '<div class="tab">');
        $nextSection = strpos($html, '<section id="w366_home_news-2"');
        
        // We replace from tabStart to nextSection, minus some closing divs
        // wait, nextSection is inside a widget. The best way is replacing regex or substring.
        $cut1 = substr($html, 0, $tabStart);
        $cut2_start = strrpos(substr($html, 0, $nextSection), '</div></div></div>'); // approximate structure
        
        // Let's just find the end of products. The last product is Bi Ngo.
        // It ends around "<div id=\"tab_19\"" ... and then some divs.
        
        $replacedHtml = $cut1 . $products_section . "\n</div></div></div></div></section>\n" . substr($html, $nextSection);
        
        // Add a "Thêm sản phẩm" button
        $addBtn = '<div class="text-right" style="padding: 20px;"><a href="{{ route(\'foods.create\') }}" style="background: green; color: white; padding: 10px 20px;">+ Thêm Sản Phẩm</a></div>';
        $replacedHtml = str_replace('<div class="section-content">', '<div class="section-content">'.$addBtn, $replacedHtml);

        file_put_contents('resources/views/foods/index.blade.php', $replacedHtml);
        echo "Done";
    }
}
