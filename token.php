<? php
$ secret = '83415d06-ec4e-11e6-a41b-6c40088ab51e' ;
$ header = array ();
$ header [] = 'Jenis-Konten: application / json' ;
$ header [] = 'X-AppVersion: 3.48.2' ;
$ header [] = "X-Uniqueid: ac94e5d0e7f3f" . rand ( 111 , 999 );
$ header [] = 'X-Location: id_ID' ;
ulang:
 echo  "[+] Masukin Nomor GOJEK Kamu Disini:" ;
 $ number = trim ( fgets ( STDIN ));
 $ login = curl ( 'https://api.gojekapi.com/v3/customers/login_with_phone' , '{"phone": "+' . $ number . '"}' , $ header );
 $ login = json_decode ( $ login [ 0 ]);
 if ( $ login -> success == true ) {
     otp:
         echo  "[+] Masukin Kode OTP Kamu Disini:" ;
         $ otp = trim ( fgets ( STDIN ));
         $ data1 = '{"scopes": "gojek: customer: transaksi gojek: customer: readonly", "grant_type": "password", "login_token": "' . $ login -> data -> login_token . '", " otp ":" ' . $ otp . ' "," client_id ":" gojek: cons: android "," client_secret ":" ' . $ secret . ' "} ' ;
         $ verif = curl ( 'https://api.gojekapi.com/v3/customers/token' , $ data1 , $ header );
         $ verifs = json_decode ( $ verif [ 0 ]);
         if ( $ verifs -> success == true ) {
             $ token = $ verifs -> data -> access_token ;
             $ header [] = 'Otorisasi: Pembawa' . $ token ;
             $ live = "token-akun.txt" ;
             $ fopen1 = fopen ( $ live , "a +" );
             $ fwrite1 = fwrite ( $ fopen1 , "Token Kamu:" . $ token . "
Nomor GoJek Kamu: " . $ Number . "
" );
             fclose ( $ fopen1 );
             gema  "
" ;
             gema  "Token Kamu:" . $ token . "
" ;
             gema  "Token Berhasil dikumpulkan Di File" . $ hidup . "
" ;
             gema  "
" ;
         } lain {
             gema  "
" ;
             echo  "Yah Kode OTP Salah, Coba Kamu Ulangi Lagi Deh!
" ;
             gema  "
" ;
             pergi otp;
         }
     } lain {
         gema  "
" ;
         echo  "Yah Gagal Kirim Kode OTP, Gunakan Nomor Yang Sudah Terdaftar Di GOJEK Yah!
" ;
         gema  "
" ;
         goto ulang;
     }

fungsi  curl ( $ url , $ fields = null , $ header = null ) {
  $ ch = curl_init ();
  curl_setopt ( $ ch , CURLOPT_URL , $ url );
  curl_setopt ( $ ch , CURLOPT_RETURNTRANSFER , true );
  curl_setopt ( $ ch , CURLOPT_FOLLOWLOCATION , true );
  curl_setopt ( $ ch , CURLOPT_SSL_VERIFYPEER , false );
  if ( $ fields ! == null ) {
      curl_setopt ( $ ch , CURLOPT_POST , 1 );
      curl_setopt ( $ ch , CURLOPT_POSTFIELDS , $ bidang );
  }
  if ( $ header ! == null ) {
      curl_setopt ( $ ch , CURLOPT_HTTPHEADER , $ header );
  }
  $ result = curl_exec ( $ ch );
  $ httpcode = curl_getinfo ( $ ch , CURLINFO_HTTP_CODE );
  curl_close ( $ ch );
  pengembalian  array ( $ hasil , $ httpcode );
  }
