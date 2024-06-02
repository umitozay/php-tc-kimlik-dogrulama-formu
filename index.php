<?php
session_start();

function karakterDuzelt($yazi){
    $ara = array("ç", "i", "ı", "ğ", "ö", "ş", "ü");
    $degistir = array("Ç", "İ", "I", "Ğ", "Ö", "Ş", "Ü");
    $yazi = str_replace($ara, $degistir, $yazi);
    $yazi = strtoupper($yazi);
    return $yazi;
}

if (isset($_POST['CikisYap'])) {
    // Clear session data
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$tcKimlikNo = isset($_SESSION['tcKimlikNo']) ? $_SESSION['tcKimlikNo'] : '';
$ad = isset($_SESSION['ad']) ? $_SESSION['ad'] : '';
$soyad = isset($_SESSION['soyad']) ? $_SESSION['soyad'] : '';
$dogumYili = isset($_SESSION['dogumYili']) ? $_SESSION['dogumYili'] : '';

if (!empty($ad)) {
    echo "<span>Hoş geldin $ad</span><br>";
    echo '<form action="" method="POST">
            <button type="submit" name="CikisYap">Çıkış Yap</button>
          </form>';
} else {
		if (isset($_POST['IsimDogrula'])) {
			$tcKimlikNo = $_POST['TC'];
			$ad = karakterDuzelt(trim($_POST['AD']));
			$soyad = karakterDuzelt(trim($_POST['SOYAD']));
			$dogumYili = $_POST['DOGUMYILI'];

			if (preg_match("/^[0-9]{11}$/", $tcKimlikNo) && preg_match("/^[a-zA-ZğüşıöçĞÜŞİÖÇ]+$/", $ad) && preg_match("/^[a-zA-ZğüşıöçĞÜŞİÖÇ]+$/", $soyad) && preg_match("/^[0-9]{4}$/", $dogumYili)) {
				try {
					$veriler = array(
						'TCKimlikNo' => $tcKimlikNo,
						'Ad' => $ad,
						'Soyad' => $soyad,
						'DogumYili' => $dogumYili
					);
					$baglan = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");
					$sonuc = $baglan->TCKimlikNoDogrula($veriler);

					if ($sonuc->TCKimlikNoDogrulaResult) {
						$_SESSION['ad'] = $ad;
						$_SESSION['soyad'] = $soyad;
						$_SESSION['tcKimlikNo'] = $tcKimlikNo;
						$_SESSION['dogumYili'] = $dogumYili;
						header("Location: " . $_SERVER['PHP_SELF']);
						exit();
					} else {
						echo "Girmiş olduğunuz kimlik bilgileri yanlıştır.";
						header("Refresh: 1; url=" . $_SERVER['PHP_SELF']);
						exit();
					}

				} catch (Exception $e) {
					echo "İstek sırasında bir hata oluştu.";
					header("Refresh: 1; url=" . $_SERVER['PHP_SELF']);
					exit();
				}
			} else {
				echo "Girmiş olduğunuz bilgiler geçerli değil.";
				header("Refresh: 1; url=" . $_SERVER['PHP_SELF']);
				exit();
			}
		} else {
        ?>
        <!DOCTYPE html>
        <html lang="tr" dir="ltr">
        <head>
            <meta charset="utf-8">
            <title>TC Kimlik Bilgileri Doğrulama</title>
        </head>
        <body>
            <form action="" method="POST">
                <input type="text" required="" name="TC" maxlength="11" placeholder="TC Kimlik Numaranız"><br>
                <input type="text" required="" name="AD" placeholder="Adınız"><br>
                <input type="text" required="" name="SOYAD" placeholder="Soyadınız"><br>
                <input type="text" required="" name="DOGUMYILI" maxlength="4" placeholder="Doğum Yılınız"><br>
                <button type="submit" name="IsimDogrula">GİRİŞ YAP</button>
            </form>
            <hr>
        </body>
        </html>
        <?php
    }
}
?>
