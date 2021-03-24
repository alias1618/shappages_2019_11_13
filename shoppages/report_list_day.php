<?php
// Include the main TCPDF library (search for installation path).
ini_set("display_errors", "Off");
require_once('TCPDF/tcpdf.php');
$html = "";
$total_buy_money="";
$total_subtotal="";
$html_02="";
date_default_timezone_set("Asia/Taipei");
// Extend the TCPDF class to create custom Header and Footer
// 自訂頁首與頁尾
class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // Set font
        $this->SetFont('msungstdlight', '', 10);
        
        // 公司與報表名稱
        $title = '
<h4 style="font-size: 20pt; font-weight: normal; text-align: center;">訂單分析報表</h4>
            
<table>
    <tr>
        <td style="width: 30%;"></td>
        <td style="border-bottom: 2px solid black; font-size: 20pt; font-weight: normal; text-align: center; width: 40%;">日報表</td>
        <td style="width: 30%;"></td>
    </tr>
    <tr>
        <td colspan="3"></td>
    </tr>
</table>';
        
        
        /**
         * 標題欄位
         *
         * 所有欄位的 width 設定值均與「資料欄位」互相對應，除第一個 <td> width 須向左偏移 5px，才能讓後續所有「標題欄位」與「資料欄位」切齊
         * 最後一個 <td> 必須設定 width: auto;，才能將剩餘寬度拉至最寬
         * style 屬性可使用 text-align: left|center|right; 來設定文字水平對齊方式
         */
        $fields = '
<table cellpadding="1">
    <tr>
        <td style="border-bottom: 1px solid black; width: 90px;"  align="center">商品ID</td>
        <td style="border-bottom: 1px solid black; width: 150px;"  align="center">商品名稱</td>
        <td style="border-bottom: 1px solid black; width: 90px;"  align="center">顧客訂購金額</td>
        <td style="border-bottom: 1px solid black; width: 90px;"  align="center">顧客訂購數量</td>
        <td style="border-bottom: 1px solid black; width: 90px;"  align="center">商品獲利</td>

    </tr>
</table>';
        

        
        // 設定不同頁要顯示的內容 (數值為對應的頁數)
        switch ($this->getPage()) {
            case '1':
                // 設定資料與頁面上方的間距 (依需求調整第二個參數即可)
                $this->SetMargins(1, 50, 1);
                
                // 增加列印日期的資訊
                $html = $title . '
<table cellpadding="1">
    <tr>
        <td>列印日期：' . date('Y-m-d') . ' ' . date('H:i') . '</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="3"></td>
    </tr>
</table>' .  $fields;
                break;
                // 其它頁
            default:
                $this->SetMargins(1, 40, 1);
                $html = $title . $fields;
        }
        
        // Title
        $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    }
    
    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('台灣超市 - 訂單分析報表');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// 版面配置 > 邊界
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(1, 1, 1);

// 頁首上方與頁面頂端的距離
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// 頁尾上方與頁面底端的距離
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
// 自動分頁
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
// $pdf->SetFont('dejavusans', '', 14, '', true);
// 中文字體名稱, 樣式 (B 粗, I 斜, U 底線, D 刪除線, O 上方線), 字型大小 (預設 12pt), 字型檔, 使用文字子集
$pdf->SetFont('msungstdlight', '', 10);

// Add a page
// This method has several options, check the source code documentation for more information.
// 版面配置：P 直向 | L 橫向, 紙張大小 (必須大寫字母)
$pdf->AddPage('P', 'LETTER');

// set text shadow effect
// 文字陰影
// $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
// $html = <<<EOD
// <h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;"> <span style="color:black;">TC</span><span style="color:white;">PDF</span> </a>!</h1>
// <i>This is the first example of TCPDF library.</i>
// <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
// <p>Please check the source code documentation and other examples for further information.</p>
// <p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
// EOD;
require_once("connect_db.php");
//$date_from = '2019-09-01 00:00:00';
//$date_to = '2019-09-01 23:59:59';

$month_02 = $_GET['month_02'];

$day_02 = $_GET['day_02'];
//$day_02 =$day_02.'&nbsp';
$date_from_01 = '2019-';
$date_from_02 = ' 00:00:00';
$date_to_01 = '2019-';
$date_to_02 = ' 23:59:59';
//$set = "";
//ORDER BY product_id
$sql_query_01 = 
"SELECT product_id, sum(buy_number), product_name, product_price, product_buy_price, sum(buy_money)
FROM report
WHERE buy_date BETWEEN '$date_from_01.$month_02.-.$day_02.$date_from_02' AND '$date_to_01.$month_02.-.$day_02.$date_to_02'
GROUP BY product_name
ORDER BY product_id";

//"SELECT * FROM report WHERE buy_date BETWEEN '$date_from' AND '$date_to' GROUP BY product_name";
mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
$result_01 = $conn->query($sql_query_01) or die("MySQL query error");
while($row_01 = mysqli_fetch_array($result_01)){
    $buy_id_01 = $row_01['buy_id'];
    
    //$sql_query_02 = "SELECT * FROM report WHERE product_id='$buy_id_01' ORDER BY product_id";
    //mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
    //$result_02 = $conn->query($sql_query_02) or die("MySQL query error");
    //while($row_02 = mysqli_fetch_array($result_02)){
        $product_name = $row_01['product_name'];
        $buy_date = $row_01['buy_date'];
        $product_id = $row_01['product_id'];
        $buy_number = $row_01['sum(buy_number)'];                    //單一商品總數量
        $product_price = $row_01['product_price'];
        $product_buy_price = $row_01['product_buy_price'];    
        $buy_money = $row_01['sum(buy_money)'];                      //單一商品訂購總金額
        
        //$sub_buy_money = ($sub_buy_money+$buy_money);                   
        //$sub_buy_number = ($sub_buy_number+$buy_number);                
        $subtotal = ($product_price-$product_buy_price)*$buy_number;    //單一商品總獲利
    
        $total_buy_number =($total_buy_number+$buy_number);
        $total_buy_money = ($total_buy_money+$buy_money);
        $total_subtotal = ($total_subtotal+$subtotal);
//for ($i = 0; $i < 50; $i++) {
    /**
     * 資料欄位
     *
     * 所有欄位的 width 設定值均與「標題欄位」互相對應，除第一個 <td> width 須 -5px
     * 最後一個 <td> 必須設定 width: auto;，才能將剩餘寬度拉至最寬
     * style 屬性可使用 text-align: left|center|right; 來設定文字水平對齊方式
     */
    $html .= '
        <tr>
            <td style="line-height: 1.5; width: 80px;" align="center">' . $product_id . '</td>
            <td style="line-height: 1.5; width: 150px;" align="center">' . $product_name . '</td>
            <td style="line-height: 1.5; width: 100px;" align="center">' . $buy_money . '</td>            
            <td style="line-height: 1.5; width: 90px;" align="center">'. $buy_number .'</td>
            <td style="line-height: 1.5; width: 90px;" align="center">'. $subtotal .'</td>

        </tr>';
    //}


}
'<br>';
'<br>';
'<br>';
$fields_01 = '
<table cellpadding="1">
    <tr>
        <td style="border-bottom: 1px solid black; width: 250px;" align="center">今日顧客訂購總金額</td>
        <td style="border-bottom: 1px solid black; width: 250px;" align="center">今日總訂購數量</td>
        <td style="border-bottom: 1px solid black; width: 250px;" align="center">今日獲利總金額</td>    
    </tr>
</table>';

$html_02 .= '
        <tr>
            <td style="line-height: 1.5; width: 250px;" align="center">'.$total_buy_money. '</td>
            <td style="line-height: 1.5; width: 250px;" align="center">'.$total_buy_number.'</td>
            <td style="line-height: 1.5; width: 250px;" align="center">'.$total_subtotal.'</td>
        </tr>';



//echo '今日顧客訂購總金額'.$total_buy_money.'<br>';
///echo '今日獲利總金額'.$total_subtotal.'<br>';
$html = '
<table cellpadding="1">' . $html . $fields_01 . $html_02.'</table>';

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
// 下載 PDF 的檔案名稱 (不可取中文名，即使有也會自動省略中文名)
$pdf->Output('mis-employees.pdf', 'I');