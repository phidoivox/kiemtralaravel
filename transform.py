import re

with open('d:/laragon/www/kiemtralaravel/at10_temp.html', 'r', encoding='utf-8') as f:
    html = f.read()

# Replace all tabs with a single dynamic tab
products_section = '''<div class="tab">
    <button class="tablinks active" onclick="openTabs(event,'tab_dynamic')">Các sản phẩm</button>
</div>
<div id="tab_dynamic" class="tabcontent" style="display: block;">
    <div class="woocommerce columns-4 ">
        <div class="grid-uniform md-mg-left-10 products columns-4">
            @foreach ($foods as $food)
            <div class="md-pd-left10 grid__item large--one-quarter medium--one-third small--one-half">
                <div class="product-item">
                    <div class="product-img">
                        <a href="#">
                           <img width="260" height="260" src="{{ $food->image && filter_var($food->image, FILTER_VALIDATE_URL) ? $food->image : ($food->image ? asset('storage/'.$food->image) : 'https://placehold.co/400x400/png?text=No+Image') }}" class="attachment-thumb_260x260 size-thumb_260x260 wp-post-image" alt="{{ $food->name }}" />
                        </a>
                    </div>
                    <div class="product-info">
                        <div class="product-title">
                            <a href="#">{{ $food->name }}</a>
                        </div>
                        <div class="product-price clearfix">
                            <span class="current-price"><span class="woocommerce-Price-amount amount">{{ number_format($food->price, 0, ',', '.') }}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                            @if($food->old_price)
                            <span class="original-price"><s><span class="woocommerce-Price-amount amount">{{ number_format($food->old_price, 0, ',', '.') }}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></s></span>
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
</div>'''

start = html.find('<div class="section-content">')
if start != -1:
    start += len('<div class="section-content">')
    # Find the end of this container somehow
    end_pattern = '</div>\n                    \t</div>\n                    </div>\n                </div>\n            </section>'
    end = html.find(end_pattern, start)
    
    # Alternatively find the end by looking for <section id="w366_home_news-2" or something
    end2 = html.find('<section id="w366_home_news-2"', start)
    if end2 != -1:
        # Step back to close divs
        end_idx = html.rfind('</section>', start, end2)
        end_idx2 = html.rfind('</div>', start, end_idx)
        # It's inside a widget
    
    if end != -1:
        new_html = html[:start] + '\n' + products_section + '\n' + html[end:]
        with open('d:/laragon/www/kiemtralaravel/resources/views/foods/index.blade.php', 'w', encoding='utf-8') as f:
            f.write(new_html)
        print("Success")
    else:
        print("End pattern not found", html.find('<section id="w366_home_news-2"'))
else:
    print("Start pattern not found")
