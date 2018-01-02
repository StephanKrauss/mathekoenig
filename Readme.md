Hallo,

ich freue mich, dass sie den Weg zu unserem Projekt **Mathekönig** gefunden haben.  
Wir, das sind besorgte Eltern und Großeltern die mit den mathematischen Grundkenntnissen   
ihrer Kinder und Enkel unzufrieden sind.  
Daher haben wir das Projekt **Mathekönig** gestartet,  
um das kleine **'Einmaleins'** an unsere Kinder und Enkel  
in spielerischer Form zu vermitteln.  
Dieses Programm ist für das erlernen der Malfolgen gedacht und  
knüpft an die die erlernten Grundlagen an.   

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
  
Das Programm und alle damit verbundenen Texte und Bilder **sind und werden**   
freie Software sein.   
  
Daher haben wir das Projekt unter die MIT Lizenz gestellt.    
https://de.wikipedia.org/wiki/MIT-Lizenz 
 
### Aufruf des Programmes 
Diese Programm wird durch den Aufruf im Browser gestartet.
Dazu in der Adresszeile:  
http://mathekoenig.stephankrauss.de  
eingeben.  Dabei ist es uninteressant ob es sich um ein Handy, ein Tablet oder einen PC handelt.  
Die Installation eines eigenen Spielservers ist nicht zwingend notwendig.  

### Installation des Spielserver (nicht zwingend notwendig):
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
Über einen Link zu unserem Spieleserver: **( http://mathekoenig.stephankrauss.de )** würden wir uns freuen.  

### weitere Entwicklung des **Mathekönigs**
+ Bildung eigener kleiner Königreiche durch eine Spielergruppe ( Vers. 1.1 )
	+ Darstellung der Liste des Spielstandes aller Spieler eines Königreiches ( Vers. 1.1.1 )  
	+ Ausdrucken von Urkunden mit dem aktuellen Spielstand und dem Adelstitel ( Vers. 1.1.2 )  
+ Einbau eines Spielmodus ( ab Vers. 1.2 )
	+ Abfrage der Quadratzahlen bis zur 20 ( ab Vers. 1.2.1 )
	+ Übernahme von nicht zu beinflussenden Ereignissen ( ab Vers. 1.2.2 )  