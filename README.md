# R6StatsAPI-PHP

## 概要 - Overview

### 日本語-Japanese
RainbowSix:Siegeのプレイヤーの戦績を取得します。 
使うには[R6Stats](https://r6stats.com/),さんのAPIキーが必要です。 
[R6Stats](https://r6stats.com/)さんのdiscordに入り、APIキーを個別に取得してきてください。 

### 英語-English 
Get player stats for RainbowSix:Siege. 
You need [R6Stats](https://r6stats.com/)'s API key to use it.
Please enter [R6Stats](https://r6stats.com/)'s discord and get the API key individually.

## 使い方 - How To Use

### 日本語 - Japanese 
1,R6StatsAPI.phpを移してhtmlのヘッダーに
```php
<?php
include("path/R6StatsAPI.php");
?>
```
を書き込みます。
2,  Edit in R6StatsAPI.php
```php
<?php
    const APIKEY="";//APIキーを貼り付けてください
    
    const SEASON="shadow_legacy";//今のシーズンを入力してください。
    
    const LOCATION="apac";//ランクでプレイしているサーバーを入力してください。
?>
```

### 英語 - English
1, Move R6StatsAPI.php to your working folder.
2,  Write 
```php
<?php
include("path/R6StatsAPI.php");
?>
```
 in the html header.
 3,  Edit in R6StatsAPI.php
```php
<?php
    const APIKEY="";//Paste the API key.
    
    const SEASON="shadow_legacy";//Please write the current season name.
    
    const LOCATION="apac";//Please write the server name of the rank.
?>
```

## サンプル - sample code

```php
<?php
	include("path/R6StatsAPI.php");
	$api=new R6StatsAPI("playername","pc");
	$api->getUserLevel();//return UserLevel
	$api->getAllAssists();//return Assist in all matches
	$api->getCasualKills();//return Kills in casual match
	$api->getRankedKills();//return Kills in Ranked match
	$api->getRankedWinLoseRatio();//return win lose ratio in Ranked match
	$api->getLatestMMR();//return Latest MMR
?>
``` 

## TODO
- [ ] Gamemode stats
- [ ] Season stats
- [ ] weapon stats 

## Contact 
### yurisi
- [x] https://homepage.yurisi.space 
- [x] https://twitter.com/Dev_yrs