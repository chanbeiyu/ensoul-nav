<?php
//生成常量给前端处理
$mb =
    '[PP] = {
    title: "[name]",
    sort: [order],
    ficon: "[ficon]",
    description: "[description]",
    nav: [data]
},';
$aa = 'N1=Object.freeze(Object.defineProperty({__proto__:null,default:N2},Symbol.toStringTag,{value:"Module"}))';
$cs = 'Vp = Object.assign({ ';
echo "<script>\n";
echo "const\n";
$i = 0;
$c = count($categorys);
foreach ($categorys as $category) {
    $i++;
    $temp = str_replace("[name]", unicode_encode($category['name']), $mb);
    $temp = str_replace("[PP]", "C{$category['id']}", $temp);
    $temp = str_replace("[order]", $i, $temp);
    $temp = str_replace("[ficon]", unicode_encode($category['font_icon']), $temp);
    $temp = str_replace("[description]", unicode_encode($category['description']), $temp);


    $links = get_links($category['id']);
    $nav = [];
    foreach ($links as $link) {
        array_push($nav, ['text' => $link['title'], 'link' => $link['url'], 'icon' => $link['ico']]);
    }
    $temp = str_replace("[data]", json_encode($nav, JSON_UNESCAPED_SLASHES), $temp);

    $cs = $cs . "A{$category['id']}" . ($i == $c ? '' : ',');
    echo $temp . str_replace("N1", "A{$category['id']}", str_replace("N2", "C{$category['id']}", $aa)) . "\n,";

}


echo $cs . " }),os = Object.values(Vp).map((e) => e.default).sort((e, t) => e.sort - t.sort);\nvar Ba;\n\n";
$logo = unicode_encode($site['logo']);
echo "var logo = \"{$logo}\";\n";

if (is_login) {
    echo 'var admin = "' . './index.php?c=admin&u=' . $u . "\";\n";
} elseif ($site['GoAdmin']) {
    echo 'var admin = "' . './index.php?c=' . ($login == 'login' ? $login : $Elogin) . '&u=' . $u . '"' . ";\n";
} else {
    echo 'var admin = "/";' . "\n";
    $style = '<style>.LM-admin {display:none;}</style>';
}
echo "</script>\n\n";

//字符串转unicode编码
function unicode_encode($strLong)
{
    $strArr = preg_split('/(?<!^)(?!$)/u', $strLong);
    $resUnicode = '';
    foreach ($strArr as $str) {
        $bin_str = '';
        $arr = is_array($str) ? $str : str_split($str);
        foreach ($arr as $value) {
            $bin_str .= decbin(ord($value));
        }
        $bin_str = preg_replace('/^.{4}(.{4}).{2}(.{6}).{2}(.{6})$/', '$1$2$3', $bin_str);
        $unicode = dechex(bindec($bin_str));
        $_sup = '';
        for ($i = 0; $i < 4 - strlen($unicode); $i++) {
            $_sup .= '0';
        }
        $str = '\\u' . $_sup . $unicode;
        $resUnicode .= $str;
    }
    return $resUnicode;
}

?>