<?php
class keyword
{
    public static function cut($text){
        //karakterlerin toplam sayısını bul.
        //eğer 30 dan büyükse 30 'a kadar olan kısmını al ve sonuna 3 nokta ekle.

        //!return ile döndermeyi unutma
$uzunluk = strlen($text);
$limit=30;
if ($uzunluk > $limit) {
$text = substr($text,0,$limit) . "...";
}
return $text;


    }
} 