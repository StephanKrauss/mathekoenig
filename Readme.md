Hallo,

ich freue mich, dass sie den Weg zu unserem Projekt **Mathekönig** gefunden haben.  
Wir, das sind besorgte Eltern und Großeltern die mit den mathematischen Grundkenntnissen   
ihrer Kinder und Enkel unzufrieden sind.  
Daher haben wir das Projekt **Mathekönig** gestartet,
um das kleine **'Einmaleins'** an unsere Kinder und Enkel
in spielerischer Form zu vermitteln. 

![alt Mathekoenig](http://mathekoenig.stephankrauss.de/werbung.png "Mathekönig")
 
Die Grundidee ist die Gründung eines eigenen kleinen Königreiches.  
In diesem Königreich kann jeder in der Adelspyramide aufsteigen.  
Je mehr Goldstücke der Spieler durch das lösen von Matheaufgaben erwirbt,  
um so höher steigt er in der Adelspyramide auf.  
Die besten 3 Spieler des Königreiches  
werden zum   
+ König / Königin,
+ Prinz / Prinzessin
+ und Ritter / Burgfräulein  
auf der Königsburg ernannt.  

Wir sind auf der Suche nach Mitstreitern die dieses Spiel durch neue Ideen bereichern wollen.  
Ideen oder Vorschläge zur Mitarbeit bitte an **info@stephankrauss.de**.

Wir unterstützen Interessenten bei der Einrichtung eigener Spielserver.  
Daher haben wir das Projekt unter die MIT Lizenz gestellt.  
https://de.wikipedia.org/wiki/MIT-Lizenz  

### Installation des Spielserver:
+ Es wird eine MySQL Datenbank benötigt
	+ Das Skript zum Aufbau der Datenbank befindet sich im Verzeichnis **'database'**
	+ Im Verzeichnis **'bootstrap'** befindet sich die Datei **'config.demo'**  
	  diese wird umbenannt in **'config.php'**  
	  In dieser Konfigurationsdatei werden die Zugangswerte zur Datenbank eingetragen.  
+ Es wird ein Account mit Php ab Version 7.0 benötigt. Dieser Account muss Git und Composer  
  unterstützen.  
	+ Klonen des Projektes **Mathekönig** mit **'git clone  https://github.com/StephanKrauss/mathekoenig.git'**  
	  in das Verzeichnis **'mathekoenig'**  	  
	+ Aufbau des Verzeichnis **'vendor'** mit **'composer update'**  
+ Der Spielserver muss die Bildung von eigenen Subdomain unterstützen. 
  Zum Aufruf des **Mathekönigs** muss eine Subdomain auf das Verzeichnis **'public'**	verweisen.
  
**Bei auftretenden Fragen helfen wir gern !**

### weitere Entwicklung des **Mathekönig**
+ Bildung eigener kleiner Königreiche durch eine Spielergruppe ( Vers. 1.1 )
+ Einbau eines Spielmodus ( ab Vers. 1.2 )
	+ Abfrage der Quadratzahlen bis zur 20 ( ab Vers. 1.2.1 )
	+ Übernahme von nicht zu beinflussenden Ereignissen ( ab Vers. 1.2.2 )
	+ entwickeln von *'Spielkarten'* ( ab Vers. 1.2.3 )	